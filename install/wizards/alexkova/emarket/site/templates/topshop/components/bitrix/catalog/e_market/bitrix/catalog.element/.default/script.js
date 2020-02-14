(function (window) {

    var stopSlideNext = false;
    var stopTabNext = false;
    var currentImage = 0;



    function setNewActiveTab(tabId){

        if (!stopTabNext){
            stopTabNext = true;

            $('.emarket-tabs > li').removeClass('active');
            $('#'+tabId).addClass('active');
            $('.emarket-detail-area-container').css('display', 'none');
            $('#'+tabId+'-tab').css('display', 'block');
            stopTabNext = false;
        }

    }

    function jCarouselInit(){

        $('.sale-carousel').each(function(){

            if ($(this).data('resize') != true && $(this).css('display') != 'none'){
                $(this).data('resize', true);

                idC = $(this).attr('id');

                jCarouselWidthT = 0;
                delta = 44; if (idC == 'c_nav') delta = 25;
                $('#'+idC+' > .sale-carousel-row > li').each(function(){
                    jCarouselWidthT += $(this).width()+delta;
                });

                $('#'+idC+' > .sale-carousel-row').width(jCarouselWidthT);

            };


            if ($('#'+idC).data('carousel') != true){
                $('#'+idC).jcarousel({

                });

                $('#emarket-photo-slider > input').show(200);
                $('#c_bigphotos_next').show(200);
                $('#c_bigphotos_prev').show(200);

                $(document).on(
                    'click',
                    '#'+idC+'_prev',
                    function(){
                        midC = $(this).data('fix');
                        $('#'+midC).jcarousel('scroll', "-=2")
                    }
                );

                $(document).on(
                    'click',
                    '#'+idC+'_next',
                    function(){
                        midC = $(this).data('fix');
                        $('#'+midC).jcarousel('scroll', "+=2")
                    }
                );

            }
        });
    }

    function prevPhoto(){
        if (!stopSlideNext){
            stopSlideNext = true;

            if (currentImage == 0){
                currentImage = countPhoto-1;
            }
            else{
                currentImage = currentImage-1;
            }
            setActivePhoto('i'+currentImage);
        }
    }

    function nextPhoto(){

        if (!stopSlideNext){
            stopSlideNext = true;

            if (currentImage > (countPhoto-1)){
                currentImage = 0;
            }
            else{
                currentImage = (currentImage+1);
            }
            setActivePhoto('i'+currentImage);
        }
    }

    function setActivePhoto(item){

        changePhoto = item;

        currentPhoto = parseInt(item.replace('i',''));

        $('#c_photos .photo').removeClass('active');
        $('#c_photos img[data-item='+changePhoto+']').parent().parent().addClass('active');

        $('#emarket_big_photo .inslider').each(function(){
                if ($(this).data('state') == 'show'){
                    $(this).data('state', 'hide');
                    $(this).hide(200, function(){
                        $('#'+changePhoto).show(200, function(){
                            $('#'+changePhoto).data('state', 'show');
                            stopSlideNext = false;
                        });
                    })
                }
            }
        )
    }

    $(document).ready(function(){



        if (createSlider){
            jCarouselInit();
        }



        $('#emarket_big_photo > a').fancybox();
        $('.emarket-offers-ico > a').fancybox();

        $(document).on(
            'click',
            '#c_photos .photo',
            function(){

                if (!stopSlideNext){
                    stopSlideNext = true;

                    changePhoto = $(this).children('.photo-wrap').children('img').data('item');
                    setActivePhoto(changePhoto);
                }
            }
        );

        $(document).on(
            'click',
            '#c_bigphotos_prev',
            function(){
                prevPhoto();
            }
        );

        $(document).on(
            'click',
            '#c_bigphotos_next',
            function(){
                nextPhoto();
            }
        );

        $(document).on(
            'click',
            '#c_bigphotos_zoom',
            function(){
                $('#i'+currentImage).trigger('click');
            }
        );

        $(document).on(
            'click',
            '.emarket-tabs > li',
            function(){
                eMarket.setNewActiveTab($(this).attr('id'));
            }
        );





        $("#").trigger('click');

    });


if (!!window.JCCatalogElement)
{
	return;
}

window.JCCatalogElement = function (arParams)
{
	this.productType = 0;

	this.config = {
		useCatalog: true,
		showQuantity: true,
		showPrice: true,
		showAbsent: true,
		showOldPrice: false,
		showPercent: false,
		showSkuProps: false,
		showOfferGroup: false,
		mainPictureMode: 'IMG'
	};

	this.checkQuantity = false;
	this.maxQuantity = 0;
	this.stepQuantity = 1;
	this.isDblQuantity = false;
	this.canBuy = true;
	this.canSubscription = true;
	this.currentIsSet = false;
	this.updateViewedCount = false;

	this.precision = 6;
	this.precisionFactor = Math.pow(10,this.precision);

	this.listID = {
		main: ['PICT_ID', 'BIG_SLIDER_ID', 'BIG_IMG_CONT_ID'],
		stickers: ['STICKER_ID'],
		productSlider: ['SLIDER_CONT', 'SLIDER_LIST', 'SLIDER_LEFT', 'SLIDER_RIGHT'],
		offerSlider: ['SLIDER_CONT_OF_ID', 'SLIDER_LIST_OF_ID', 'SLIDER_LEFT_OF_ID', 'SLIDER_RIGHT_OF_ID'],
		offers: ['TREE_ID', 'TREE_ITEM_ID', 'DISPLAY_PROP_DIV'],
		quantity: ['QUANTITY_ID', 'QUANTITY_UP_ID', 'QUANTITY_DOWN_ID', 'QUANTITY_MEASURE', 'QUANTITY_LIMIT'],
		price: ['PRICE_ID'],
		oldPrice: ['OLD_PRICE_ID', 'DISCOUNT_VALUE_ID'],
		discountPerc: ['DISCOUNT_PERC_ID'],
		basket: ['BASKET_PROP_DIV', 'BUY_ID'],
		magnifier: ['MAGNIFIER_ID', 'MAGNIFIER_AREA_ID']
	};

	this.visualPostfix = {
		// main pict
		PICT_ID: '_pict',
		BIG_SLIDER_ID: '_big_slider',
		BIG_IMG_CONT_ID: '_bigimg_cont',
		// stickers
		STICKER_ID: '_sticker',
		// product pict slider
		SLIDER_CONT: '_slider_cont',
		SLIDER_LIST: '_slider_list',
		SLIDER_LEFT: '_slider_left',
		SLIDER_RIGHT: '_slider_right',
		// offers sliders
		SLIDER_CONT_OF_ID: '_slider_cont_',
		SLIDER_LIST_OF_ID: '_slider_list_',
		SLIDER_LEFT_OF_ID: '_slider_left_',
		SLIDER_RIGHT_OF_ID: '_slider_right_',
		// offers
		TREE_ID: '_skudiv',
		TREE_ITEM_ID: '_prop_',
		DISPLAY_PROP_DIV: '_sku_prop',
		// quantity
		QUANTITY_ID: '_quantity',
		QUANTITY_UP_ID: '_quant_up',
		QUANTITY_DOWN_ID: '_quant_down',
		QUANTITY_MEASURE: '_quant_measure',
		QUANTITY_LIMIT: '_quant_limit',
		// price and discount
		PRICE_ID: '_price',
		OLD_PRICE_ID: '_old_price',
		DISCOUNT_VALUE_ID: '_price_discount',
		DISCOUNT_PERC_ID: '_dsc_pict',
		// basket
		BASKET_PROP_DIV: '_basket_prop',
		BUY_ID: '_buy_link',
		ADD_BASKET_ID: '_add_basket_link',
		// magnifier
		MAGNIFIER_ID: '_magnifier',
		MAGNIFIER_AREA_ID: '_magnifier_area'
	};

	this.visual = {};

	this.product = {
		checkQuantity: false,
		maxQuantity: 0,
		stepQuantity: 1,
		isDblQuantity: false,
		canBuy: true,
		canSubscription: true,
		name: '',
		pict: {},
		id: 0,
		addUrl: '',
		buyUrl: '',
		slider: {},
		sliderCount: 0,
		useSlider: false,
		sliderPict: []
	};
	this.mess = {};

	this.basketData = {
		useProps: false,
		emptyProps: false,
		quantity: 'quantity',
		props: 'prop',
		basketUrl: '',
		sku_props: '',
		sku_props_var: 'basket_props'
	};

	this.defaultPict = {
		preview: null,
		detail: null
	};

	this.offers = [];
	this.offerNum = 0;
	this.treeProps = [];
	this.obTreeRows = [];
	this.showCount = [];
	this.showStart = [];
	this.selectedValues = {};
	this.sliders = [];

	this.obProduct = null;
	this.obQuantity = null;
	this.obQuantityUp = null;
	this.obQuantityDown = null;
	this.obPict = null;
	this.obPictAligner = null;
	this.obPrice = {
		price: null,
		full: null,
		discount: null,
		percent: null
	};
	this.obTree = null;
	this.obBuyBtn = null;
	this.obSkuProps = null;
	this.obSlider = null;
	this.obMeasure = null;
	this.obQuantityLimit = {
		all: null,
		value: null
	};

	this.viewedCounter = {
		path: '/bitrix/components/bitrix/catalog.element/ajax.php',
		params: {
			AJAX: 'Y',
			SITE_ID: '',
			PRODUCT_ID: 0,
			PARENT_ID: 0
		}
	};

	this.currentImg = {
		src: '',
		width: 0,
		height: 0,
		screenWidth: 0,
		screenHeight: 0,
		screenOffsetX: 0,
		screenOffsetY: 0,
		scale: 1
	};

	this.obPopupWin = null;
	this.basketUrl = '';
	this.basketParams = {};

	this.obPopupPict = null;
	this.magnify = {
		obMagnifier: null,
		obMagnifyPict: null,
		obMagnifyArea: null,
		obBigImg: null,
		magnifyShow: false,
		areaParams : {
			width: 100,
			height: 130,
			left: 0,
			top: 0,
			scaleFactor: 1,
			globalLeft: 0,
			globalTop: 0,
			globalRight: 0,
			globalBottom: 0
		},
		magnifierParams: {
			top: 0,
			left: 0,
			width: 0,
			height: 0,
			ratioX: 10,
			ratioY: 13,
			defaultScale: 1
		},
		magnifyPictParams: {
			marginTop: 0,
			marginLeft: 0,
			width: 0,
			height: 0
		}
	};

	this.treeRowShowSize = 5;
	this.treeEnableArrow = { display: '', cursor: 'pointer', opacity: 1 };
	this.treeDisableArrow = { display: '', cursor: 'default', opacity: 0.2 };
	this.sliderRowShowSize = 5;
	this.sliderEnableArrow = { display: '', cursor: 'pointer', opacity: 1 };
	this.sliderDisableArrow = { display: '', cursor: 'default', opacity: 0.2 };

	this.errorCode = 0;

	if ('object' === typeof arParams)
	{
		this.params = arParams;
		this.initConfig();

		if (!!this.params.MESS)
		{
			this.mess = this.params.MESS;
		}
		switch (this.productType)
		{
			case 0:// no catalog
			case 1://product
			case 2://set
				this.initProductData();
				break;
			case 3://sku
				this.initOffersData();
				break;
			default:
				this.errorCode = -1;
		}
		this.initBasketData();
	}
	if (0 === this.errorCode)
	{
		BX.ready(BX.delegate(this.Init,this));
	}
	this.params = {};
};


window.JCCatalogElement.prototype.allowViewedCount = function(update)
{
    update = !!update;
    this.currentIsSet = true;
    if (update)
    {
        this.incViewedCounter();
    }
};

})(window);