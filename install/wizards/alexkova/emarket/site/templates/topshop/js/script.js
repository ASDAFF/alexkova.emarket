(function (window) {

        window.eMarket = {
            stopTabNext: false,
            slideTime: 100,
            inBasketButtonName: '',
            toBasketButtonName: '',
            inBasketState: '',
            phoneTitle: 'Call me please',
            oneClickTitle: 'OneClick Order',

            showAjaxShadow: function(element, idArea, localeShadow){

                if (localeShadow == true){
                    $(element).addClass('ajax-shadow');
                    $(element).addClass('ajax-shadow-r');
                }
                else{
                    if ($('div').is('#'+idArea)){

                    }
                    else
                    {
                        $('<div id="'+idArea+'" class="ajax-shadow"></div>').appendTo('body');
                    }

                    $('#'+idArea).show();
                    $('#'+idArea).width($(element).width());
                    $('#'+idArea).height($(element).height());
                    $('#'+idArea).css('top', $(element).offset().top+'px');
                    $('#'+idArea).css('left', $(element).offset().left+'px');
                }

            },

            closeAjaxShadow: function(idArea, localShadow){
                if (localShadow == true){
                    $(idArea).removeClass('ajax-shadow-r');
                    $(idArea).removeClass('ajax-shadow');
                }
                else{
                    $('#'+idArea).hide();
                }
            },

            resizeSaleCart: function(){

                maxSize = 0; addSize = 0;
                maxSizePrice = 0;

                $('.sale-cart-name > span').each(function(){

                    if ($(this).height() > maxSize){
                        maxSize = $(this).height();
                    }
                });

                $('.sale-cart-name > span').height(maxSize);

                $('.sale-cart-price-line').each(function(){

                    if ($(this).height() > maxSizePrice){
                        maxSizePrice = $(this).height();
                    }
                });

                $('.sale-cart-price-line').height(maxSizePrice);

                $('.sale-cart > div').each(function(){

                    if ($(this).height() > maxSize){
                        maxSize = $(this).height();
                    }
                });

                $('.sale-cart').css('min-height', maxSize+'px');
            },

            resizeCatalogCarts: function(){
                maxSize = 0;

                $('.catalog-index > li').each(function(){

                    if ($(this).height() > maxSize){
                        maxSize = $(this).height();
                    }
                });

                $('.catalog-index > li').height(maxSize+20);
                $('.catalog-index .catalog-image').css('minHeight', maxSize+'px');
            },

            toggleSlidePanel: function(panelID, groupID, noClose){

                if (noClose == true){


                    $('#'+panelID).slideDown(eMarket.slideTime);
                    $('div[data-group='+groupID+']').data('state', 'hide');
                    $('#'+panelID).data('state', 'show');


                    if ($('#'+panelID).data('state') == 'hide' || $('#'+panelID).data('state') == undefined)
                    {
                        $('#'+panelID).slideDown(eMarket.slideTime);
                        $('div[data-group='+groupID+']').data('state', 'hide');
                        $('#'+panelID).data('state', 'show');

                    }
                }
                else{
                    $('div[data-group='+groupID+']').slideUp(eMarket.slideTime);

                    if ($('#'+panelID).data('state') == 'hide'  || $('#'+panelID).data('state') == undefined)
                    {
                        $('#'+panelID).slideDown(eMarket.slideTime);
                        $('div[data-group='+groupID+']').data('state', 'hide');
                        $('#'+panelID).data('state', 'show');

                    }
                    else
                    {
                        $('#'+panelID).slideUp(eMarket.slideTime);
                        $('#'+panelID).data('state', 'hide');
                    }
                }
            },

            setPriceCents: function(){

                $('.emarket-format-price').each(function(){
                    price = $(this).html();
                    newPrice = price.replace(/(\.\d\d)/g, '<sup>$1</sup>');
                    newPrice = newPrice.replace(/(\.)/g, '');
                    $(this).html(newPrice);
                });
            },

            scrollMenuInit: function(){
                $(document).on(
                    'click',
                    "ul.emarket-top-link > li > a, a.scroll-navigate",
                    function(){

                        eMarket.scrollTo('#'+$(this).data('scroll'));

                        eMarket.setNewActiveTab($(this).data('scroll'));
                        return false;
                    }
                );

                $(document).on(
                    'click',
                    "input[data-scrollable=1]",
                    function(){

                        eMarket.scrollTo('#'+$(this).data('scroll'));
                        return false;
                    }
                );
            },

            scrollTo: function(targetElement){

                $("html, body").animate({
                    scrollTop: $(targetElement).offset().top-20 + "px"
                }, {
                    duration: 500
                });
            },

            setNewActiveTab : function(tabId){
                if (!eMarket.stopTabNext){
                    stopTabNext = true;

                    $('.emarket-tabs > li').removeClass('active');
                    $('#'+tabId).addClass('active');
                    $('.emarket-detail-area-container').css('display', 'none');
                    $('#'+tabId+'-tab').css('display', 'block');
                    window.eMarket.stopTabNext = false;
                }
            },

            setNewArrowPosition: function(bodyTarget, parentTarget){
                leftPosition = $(parentTarget).offset().left;
                leftOffset = $(bodyTarget).offset().left;

                newOffset = leftPosition-leftOffset-10;
                if (newOffset<0){

                    $(bodyTarget).css('right', (0+ (-1)*newOffset+50)+'px');
                    newOffset = 50;
                }

                $(bodyTarget+" > .body-before").css({'left': (newOffset)+'px', 'right': 'auto'});
            },

            phoneButtonUrl: '/',

            phoneButtonInit: function(){
                $(document).on(
                    'click',
                    '.phone-url-ding',
                    function(){
                        addUrl = "?tname="+$(this).data('trade');
                        if ($(this).data('params')){
                            addUrl += "&params="+$(this).data('params');
                        };
                        window.phonePopup = BX.PopupWindowManager.create("phonePopup", null, {
                            autoHide: true,
                            //	zIndex: 0,
                            offsetLeft: 0,
                            offsetTop: 0,
                            overlay : true,
                            draggable: {restrict:true},
                            closeByEsc: true,
                            closeIcon: { right : "12px", top : "10px"},
                            titleBar: {content: BX.create("span", {html: "<div>"+eMarket.phoneTitle+"</div>"})},
                            content: '<iframe src="'+eMarket.phoneButtonUrl+'ajax/phone_form.php'+addUrl+'" style="width: 340px; height: 300px" class="popup-phone-frame"></iframe>',
                            events: {
                                onAfterPopupShow: function()
                                {
                                    
                                },
                                onPopupClose: function () {
                                    window.phonePopup.destroy();
                                }
                            }
                        });
                        window.phonePopup.show();
                    }
                );
            },

            oneClickUrl: '/',

            oneClickButtonInit: function(){

                $(document).on(
                    'click',
                    '.one-click-button',
                    function(){
                        
                        addUrl = "?tid="+$(this).data('trade');
                        if (parseInt($(this).data('offer'))>0){
                            addUrl += "&tid_off="+$(this).data('offer');
                        };
                        window.oneClickPopup = BX.PopupWindowManager.create("oneClickPopup", null, {
                            autoHide: true,
                            //	zIndex: 0,
                            offsetLeft: 0,
                            offsetTop: 0,
                            overlay : true,
                            draggable: {restrict:true},
                            closeByEsc: true,
                            closeIcon: { right : "12px", top : "10px"},
                            titleBar: {content: BX.create("span", {html: "<div>"+eMarket.oneClickTitle+"</div>"})},
                            content: '<iframe src="'+eMarket.oneClickUrl+'ajax/oneclick_form.php'+addUrl+'" style="width: 400px; height: 450px" class="popup-phone-frame"></iframe>',
                            events: {
                                onAfterPopupShow: function()
                                {
                                    
                                },
                                onPopupClose: function () {
                                    window.oneClickPopup.destroy();
                                }
                            }
                        });
                        window.oneClickPopup.show();
                    }
                );
            },

            toggleContent: function(){
                $(document).on(
                    'click',
                    '.content-slide-button',
                    function(){
                        parentItem = $(this).data('slide');

                        if ($(this).data('state') == "up"){
                            $(parentItem).data('oldheight', $(parentItem).css('height'));

                            $(parentItem).css('height', 'auto');
                            $(this).data('state', 'down');
                            $(this).html($(this).data('slideup'));
                        }else{

                            $(parentItem).css('height', $(parentItem).data('oldheight'));
                            $(this).data('state', 'up');
                            $(this).html($(this).data('slideup'));

                        }
                    }
                );
            },

            tooltipActivation: function(){

            },

            init: function(){
                this.Basket.init();
                this.Compare.init();
                this.resizeSaleCart();
                this.resizeCatalogCarts();
                this.phoneButtonInit();
                this.oneClickButtonInit();
                this.Promo.resizeRK();
                this.Menu.resize();
                this.setPriceCents();
                this.scrollMenuInit();
                this.toggleContent();
                this.tooltipActivation();

                this.jCarousel.init();
            }
        };


    window.eMarket.Basket = {

        ajaxUrl: '',
        delayWindow: false,

        newQty: function(item, qty){

            if (window.eMarket.Basket.ajaxUrl.length <= 0) return;

            data ='action=SETNEWQTY&quantity='+qty+'&item='+item+'&ajaxbuy=yes&rg='+Math.random();
            $.ajax({
                url: window.eMarket.Basket.ajaxUrl+'?'+data,
                success: function(data){
                    $('#basket-body').html(data);
                    window.eMarket.Basket.refresh();
                    window.eMarket.closeAjaxShadow('basket-body-shadow');
                }
            });
        },

        refresh: function(){
            $('#basket-line .icon-basket').html(
                $('#content-body .icon-basket').html()
            );

            $('#basket-line .icon-delay').html(
                $('#content-body .icon-delay').html()
            );

            $('#delay-body').html(
                $('#delay-body-content').html()
            );

            eMarket.Basket.list = JSON.parse($('#basket-data').html());

            $('.basket-button-area > .basket-button-state').removeClass('active');
            $('.icon-delay-transparent').removeClass('active');
            if (eMarket.toBasketButtonName.length >0 ) $('.basket-button-area > input[name=basketadd]').val(eMarket.toBasketButtonName);

            if (eMarket.Basket.list.ITEMS.length > 0){
                a = eMarket.Basket.list.ITEMS;
                for (var i = 0; i < a.length; i++){
                    if (eMarket.inBasketButtonName.length >0 ) $('.basket-button-area[data-basketitem='+a[i]+'] > input[name=basketadd]').val(eMarket.inBasketButtonName);
                    if (eMarket.inBasketState.length >0 ) $('.basket-button-area[data-basketitem='+a[i]+'] > .basket-button-state').html(eMarket.inBasketState);
                    $('.basket-button-area[data-basketitem='+a[i]+'] > .basket-button-state').addClass('active');
                }
            }

            if (eMarket.Basket.list.DELAY.length > 0){
                a = eMarket.Basket.list.DELAY;
                for (var i = 0; i < a.length; i++){
                    $('.icon-delay-transparent[data-basketitem='+a[i]+']').addClass('active');

                }
            }

            eMarket.setPriceCents();
        },

        refreshData: function(){

            if (eMarket.Basket.ajaxUrl.length <= 0) return;

            data = 'ajaxbuy=yes&rg='+Math.random();
            $.ajax({
                url: eMarket.Basket.ajaxUrl+'?'+data,
                success: function(data){
                    $('#basket-body').html(data);
                    eMarket.Basket.refresh();
                }
            });
        },

        addItem: function(form, delay){

            if (eMarket.Basket.ajaxUrl.length <= 0) return;

            data = form.serialize()+'&ajaxbuy=yes&rg='+Math.random();
            if (delay) data = data + '&delay=yes';

            $.ajax({
                url: eMarket.Basket.ajaxUrl+'?'+data,
                success: function(data){

                    $('#basket-body').html(data);

                    if (eMarket.Basket.delayWindow != true && delay ){

                        $('.icon-delay-transparent').removeClass('ajax-shadow');
                        $('.icon-delay-transparent').removeClass('ajax-shadow-r');
                        eMarket.closeAjaxShadow('body-shadow');

                    }
                    else{
                        eMarket.closeAjaxShadow('body-shadow');

                        eMarket.basketPopup = BX.PopupWindowManager.create("basketPopup", null, {
                            autoHide: true,
                            //	zIndex: 0,
                            offsetLeft: 0,
                            offsetTop: 0,
                            overlay : true,
                            draggable: {restrict:true},
                            closeByEsc: true,
                            closeIcon: { right : "12px", top : "10px"},
                            titleBar: {content: BX.create("span", {html: "<div>"+BX.message('setItemAdded2BasketTitle')+"</div>"})},
                            content: '<div style="width:400px;height:400px; text-align: center;"><span style="position:absolute;left:50%; top:50%"><img src="<?=$this->GetFolder()?>/images/wait.gif"/></span></div>',
                            events: {
                                onAfterPopupShow: function()
                                {
                                    this.setContent(BX("basket-popup"));

                                    $(document).on(
                                        'click',
                                        '#continue-buy',
                                        function(){
                                            eMarket.basketPopup.close()
                                        }
                                    );
                                }
                            }
                        });
                        eMarket.basketPopup.show();


                    }

                    eMarket.Basket.refresh();
                }
            });
        },

        deleteItem: function(item){

            if (eMarket.Basket.ajaxUrl.length <= 0) return;

            data ='action=DELETEFROMCART&item='+item+'&ajaxbuy=yes&rg='+Math.random();

            $.ajax({
                url: eMarket.Basket.ajaxUrl+'?'+data,
                success: function(data){
                    $('#basket-body').html(data);
                    eMarket.Basket.refresh();
                    eMarket.closeAjaxShadow('basket-body-shadow');
                }
            });
        },

        delayItem: function(item){
            if (eMarket.Basket.ajaxUrl.length <= 0) return;
            data ='action=DELAYFROMCART&item='+item+'&ajaxbuy=yes&rg='+Math.random();

            $.ajax({
                url: eMarket.Basket.ajaxUrl+'?'+data,
                success: function(data){
                    $('#basket-body').html(data);
                    eMarket.closeAjaxShadow('basket-body-shadow');
                    $('.icon-delay-transparent-notext').removeClass('ajax-shadow');
                    $('.icon-delay-transparent-notext').removeClass('ajax-shadow-r');
                    eMarket.Basket.refresh();
                }
            });
        },

        delayToCart: function(item){
            if (eMarket.Basket.ajaxUrl.length <= 0) return;
            data ='action=ADDBACKCART&item='+item+'&ajaxbuy=yes&rg='+Math.random();

            $.ajax({
                url: eMarket.Basket.ajaxUrl+'?'+data,
                success: function(data){
                    $('#basket-body').html(data);
                    eMarket.Basket.refresh();
                    eMarket.closeAjaxShadow('basket-body-shadow');
                }
            });
        },

        basketButtonsInit: function(){
            $('form.basket_action').submit(
                function(){

                    if ($(this).children('input[name=basketadd]').hasClass('active')){
                        eMarket.scrollTo('#body-counter');
                        eMarket.toggleSlidePanel('basket-body', 'basket-group');
                        eMarket.setNewArrowPosition('#basket-body', this);
                    }
                    else{
                        eMarket.showAjaxShadow('body','body-shadow');
                        eMarket.Basket.addItem($(this));
                    }
                    return false;
                }
            );
        },

        init: function(){

            this.basketButtonsInit();

            $(document).on(
                'click',
                '#basket-line .icon-basket, #basket-body .icon-close',
                function(e){

                    eMarket.toggleSlidePanel('basket-body', 'basket-group');
                    eMarket.setNewArrowPosition('#basket-body', this);
                }
            );

            $(document).on(
                'click',
                '#basket-line .icon-compare, #compare-body .icon-close',
                function(e){
                    eMarket.toggleSlidePanel('compare-body', 'basket-group');
                    eMarket.setNewArrowPosition('#compare-body', this);
                }
            );

            $(document).on(
                'click',
                '#basket-line .icon-delay, #delay-body .icon-close',
                function(e){
                    eMarket.toggleSlidePanel('delay-body', 'basket-group');
                    eMarket.setNewArrowPosition('#delay-body', this);
                }

            );

            $(document).on(
                'click',
                '#delay-body .icon-button-delete',
                function(){
                    itemID = $(this).data('item');
                    eMarket.showAjaxShadow('#delay-body','basket-body-shadow');
                    eMarket.Basket.deleteItem(itemID);
                }
            );

            $(document).on(
                'click',
                '#basket-body .icon-button-delete',
                function(){
                    itemID = $(this).data('item');
                    eMarket.showAjaxShadow('#basket-body','basket-body-shadow');
                    eMarket.Basket.deleteItem(itemID);
                }
            );

            $(document).mouseup(function (e) {
                var container = $('div[data-group=basket-group]');

                if (container.has(e.target).length === 0){
                    container.hide();
                }
            });

            $(document).on(
                'click',
                '.icon-button-delay',
                function(){
                    itemID = $(this).data('item');
                    eMarket.showAjaxShadow('#basket-body','basket-body-shadow');
                    eMarket.Basket.delayItem(itemID);
                }
            );

            $(document).on(
                'click',
                '.icon-button-cart',
                function(){
                    itemID = $(this).data('item');
                    eMarket.showAjaxShadow('#delay-body','basket-body-shadow');
                    eMarket.Basket.delayToCart(itemID);
                }
            );

            $(document).on(
                'click',
                '.quantity-button-minus, .quantity-button-plus',
                function(){

                    if ($(this).hasClass('quantity-button-minus')){
                        id = parseInt($(this).attr('id').replace('quantity-button-minus-',''));
                        valOld = parseInt($('#quantity-'+id).val());
                        valNew = valOld-1;
                        if (valNew<1) valNew = 1;
                        $('#quantity-'+id).val(valNew);
                    };
                    if ($(this).hasClass('quantity-button-plus')){
                        id = parseInt($(this).attr('id').replace('quantity-button-plus-',''));
                        valOld = parseInt($('#quantity-'+id).val());
                        valNew = valOld+1;
                        $('#quantity-'+id).val(valNew);
                    };

                    if ($(this).hasClass('basket-line-quantity')){
                        itemID = $(this).data('item');
                        qty = parseFloat($('#quantity-'+itemID).val());
                        eMarket.showAjaxShadow('#basket-body','basket-body-shadow');
                        eMarket.Basket.newQty(itemID, qty);
                    }
                }
            );

            $(document).on(
                'click',
                '.emarket-sale-buttons .icon-delay-transparent, .emarket-offers-advanced .icon-delay-transparent',
                function(){

                    if ($(this).hasClass('active')) return false;

                    if ($(this).hasClass('icon-transparent-notext')){

                            eMarket.showAjaxShadow(this,'delay-shadow', true);
                            eMarket.Basket.addItem($('#cart_form_'+$(this).data('basketitem')), true);
                    }
                    else{

                        eMarket.showAjaxShadow('body','body-shadow');
                        eMarket.Basket.addItem($('#cart_form_'+$(this).data('basketitem')), true);
                    }

                    return false;
                }
            );


            eMarket.Basket.refreshData();
        }
    }

    window.eMarket.Compare = {

        ajaxURL : '',
        messList : '',
        mess : '',
        iblockID : 0,
        scrollUp: false,

        refresh: function(data){
            $('#compare-body').html(data);
            $('#body-counter').html($('#content-counter').html());
        },

        add: function(element){

            if (
                eMarket.Compare.ajaxURL.length <= 0
                    || eMarket.Compare.iblockID <= 0)
                return;

            url = eMarket.Compare.ajaxURL+'?action=ADD_TO_COMPARE_LIST&bid='+eMarket.Compare.iblockID+'&id='+$(element).data('compare')+'&ajaxbuy=yes&rg='+Math.random();
            newMessage = eMarket.Compare.messList;

            $.ajax({
                url: url,
                success: function(data){

                     $(element).data('comparestate', 'show');
                    if ($(element).hasClass('compare-button')) $(element).html(newMessage);
                    if ($(element).hasClass('compare-icon')) $(element).addClass('active');
                    if ($(element).hasClass('compare-button')) eMarket.closeAjaxShadow('compare-shadow');
                    if ($(element).hasClass('compare-icon')) eMarket.closeAjaxShadow(element , true);
                    eMarket.Compare.refresh(data);

                    //topshop.scrollTo('#body-counter');
                    //topshop.toggleSlidePanel('compare-body', 'basket-group', true);
                }
            });

            return false;
        },

        delete: function(element){

            if (
                eMarket.Compare.ajaxURL.length <= 0
                    || eMarket.Compare.iblockID <= 0)
                return;

            url = eMarket.Compare.ajaxURL+'?action=DELETE_FROM_COMPARE_LIST&bid='+eMarket.Compare.iblockID+'&id='+$(element).data('compare')+'&ajaxbuy=yes&rg='+Math.random();
            newMessage = eMarket.Compare.mess;

            $.ajax({
                url: url,
                success: function(data){

                    $('[data-compare='+$(element).data('compare')+']').data('comparestate', 'set');
                    $('.compare-button[data-compare='+$(element).data('compare')+']').html(newMessage);
                    $('.compare-icon[data-compare='+$(element).data('compare')+']').removeClass('active');

                    eMarket.Compare.refresh(data);
                    eMarket.closeAjaxShadow('basket-body-shadow');
                }
            });

            return false;
        },

        init: function(){
            $(document).on(
                'click',
                '.compare-button, .compare-icon',
                function(){
                    if ($(this).data('comparestate') == 'set'){
                        if ($(this).hasClass('compare-button')) eMarket.showAjaxShadow('body','compare-shadow');
                        if ($(this).hasClass('compare-icon')) eMarket.showAjaxShadow(this,'compare-shadow-r',true);
                        eMarket.Compare.add(this);
                    }else{
                        if (eMarket.Compare.scrollUp){
                            eMarket.scrollTo('#body-counter');
                            eMarket.toggleSlidePanel('compare-body', 'basket-group', true);
                        }
                        else{
                            eMarket.Compare.delete(this);
                        }
                    }

                    return false;
                }
            );

            $(document).on(
                'click',
                '.compare-delete-button',
                function(){
                    eMarket.showAjaxShadow('#compare-body','basket-body-shadow');
                    eMarket.Compare.delete(this);
                    return false;
                }
            );

            $(document).on(
                'click',
                '.compare-button-group',
                function(){
                    eMarket.toggleSlidePanel('compare-body', 'basket-group');
                    eMarket.setNewArrowPosition('#compare-body', this);
                    return false;
                }
            );
        }
    };

    window.eMarket.Promo =  {

        resizeRK: function(){
            $('.rk-fullwidth').each(function(){
                rkWidth = $(this).children('.rk-fullwidth-canvas').children('img').width();
                if (rkWidth>0 && rkWidth>$(this).width()){
                    rkWidth = Math.round((rkWidth-$(this).width())/2);
                    $(this).children('.rk-fullwidth-canvas').css('margin-left', '-'+rkWidth+'px');
                }
            });
        }

    }

    window.eMarket.Menu =  {

        resize: function(){
            maxWidth = $('ul.top-menu').width();
            currentWidth = 0;

            columnCount = 2;

            if (maxWidth > 900){
                columnCount = 3;
            }

            if (maxWidth > 1100){
                columnCount = 4;
            }

            countMenu = 0;
            fullCounter = false;
            summaryWidth = 0;
            maxWidth = $('ul.top-menu').width();

            $('ul.top-menu>li').removeClass('last');
            $('ul.top-menu>li.other').css('display', 'none');

            $('ul.top-menu>li').each(function(){

                if (countMenu<=0) lastItem = $(this);

                if (!$(this).is('.other')){
                    summaryWidth += ($(this).children('a').children('span').width()+60);
                    if (summaryWidth>=maxWidth){
                        fullCounter = true;
                        $(this).css('display', 'none');
                    }
                    else{
                        countMenu ++;
                        lastItem = $(this);
                    }
                }
            });

            if (fullCounter){
                lastItem.css('display', 'none');
                $('ul.top-menu>li.other').css('display', 'block');
                $('ul.top-menu>li.other').addClass('last');
            }
            else{
                $(lastItem).addClass('last');
            }

            widthMenu = 100/countMenu;

            $('ul.top-menu>li').css('width', widthMenu+'%');

            addHTML = '<a href="#"><span>&nbsp;</span></a>';

            $('#flex-menu-li').html('');
            strAddUL = '<ul>';

            $('ul.top-menu>li').each(function(){

                if (
                    !$(this).is('.other')
                        && $(this).css('display') == 'none'){

                        strAddUL += '<li class="l-2">'+$(this).children('a').get(0).outerHTML+'</li>';

                }
            });

            strAddUL += '</ul>';
            $('#flex-menu-li').html(addHTML+strAddUL);
            $('ul.top-menu').css('overflow', 'visible');
            $('ul.top-menu').css('visibility', 'visible');
        }

    }

    window.eMarket.Slider = {

        startWidth: 0,
        initRevApi: false,

        init: function(){

            var revapi = jQuery('.tp-banner').revolution(
                {
                    delay:9000,
                    /*startwidth:'100%',*/
                    startheight:366,
                    autoHeight:"off",
                    fullScreenAlignForce:"on",
                    onHoverStop:"off",
                    lazyLoad:"on",
                    hideThumbs: 0

                });
        }
    }

    window.eMarket.jCarousel = {

        ajaxUrl: '',
        iblockID: 0,
        initState: false,
        initMarks: false,

        init: function(){

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

                    if ($('#'+idC).data('carousel') != true){
                        $('#'+idC).jcarousel({

                        });

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

                };

                if (eMarket.jCarousel.initState == false){

                    eMarket.jCarousel.initState = true;

                    $(document).on(
                        'click',
                        '#c_nav li.best-choice',
                        function(){
                            eMarket.jCarousel.load($(this).data('slide'),$(this).data('type'));
                        }
                    );

                    $(document).on(
                        'click',
                        'a.rec_mobile_button',
                        function(){
                            eMarket.jCarousel.load($(this).data('slide'),$(this).data('type'), true);
                        }
                    );

                    $(document).on(
                        'click',
                        '.top-sale-button',
                        function(){
                            eMarket.MarkCarousel.load($(this).data('slide'),$(this).data('type'));
                        }
                    );



                }
            });

            $(document).ready(function(){
                startElement = $('#best_panel #c_nav li.active');
                activeBestseller = parseInt(startElement.data('slide'));

                if (activeBestseller > 0){
                    eMarket.jCarousel.load(startElement.data('slide'),startElement.data('type'));
                }

                if (eMarket.jCarousel.initMarks != true) {
					markShow = "SPECIALOFFER";
					if (eMarket.jCarousel.startMarks){
						markShow = eMarket.jCarousel.startMarksName;
						eMarket.jCarousel.startMarks = false;
					}
                    eMarket.MarkCarousel.load(markShow, "markers");
                    eMarket.jCarousel.initMarks = true;
                }
            })
        },

        load: function(idC, type, mobileMode){

            if (eMarket.jCarousel.ajaxUrl.length > 0 && eMarket.jCarousel.iblockID > 0){



                if ($('#rec_tab'+idC).data('state') != 'load'){
                    $('#rec_tab'+idC).data('state', 'load');

                    targetUrl = eMarket.jCarousel.ajaxUrl + '?kc_ajax_req=yes&ID=' + idC+'&IBLOCK_ID='+eMarket.jCarousel.iblockID+'&rmT='+Math.random();

                    eMarket.showAjaxShadow('#best_panel', 'best_shadow');

                    $.ajax({
                        url: targetUrl,
                        success: function(data){

                            $('#best_panel').append(data);

                            $('#cont_mobile_'+idC).html($('#c'+idC+' ul').html());

                            $('.lslider').css('display', 'none');

                            if (mobileMode == true){
                                $('#cont_mobile_'+idC).css({
                                    'display' : 'inline-block',
                                    'margin-bottom' : '20px'
                                });
                                $('#cont_mobile_'+idC).data('display', 'show');
                            }else{
                                $('#c'+idC).css('display', 'block');
                            }

                            eMarket.jCarousel.init();
                            eMarket.Basket.basketButtonsInit();

                            if ($('#c'+idC).data('rcart') != true){
                                $('#c'+idC).data('rcart', true);
                                eMarket.resizeSaleCart();
                            }
                            eMarket.closeAjaxShadow('best_shadow');

                        }
                    });
                }else{
                    $('.lslider').css('display', 'none');

                    if (mobileMode == true){

                        if ($('#cont_mobile_'+idC).data('display') == 'show'){
                            $('#cont_mobile_'+idC).css({
                                'display' : 'none'
                            });
                            $('#cont_mobile_'+idC).data('display', 'none');

                        }else{
                            $('#cont_mobile_'+idC).css({
                                'display' : 'inline-block',
                                'margin-bottom' : '20px'
                            });
                            $('#cont_mobile_'+idC).data('display', 'show');
                        }



                    }else{
                        $('#c'+idC).css('display', 'block');
                    }

                    if ($('#c'+idC).data('rcart') != true){
                        $('#c'+idC).data('rcart', true);
                        eMarket.resizeSaleCart();
                    }
                }


            }

            $('.mobile-carts').removeClass('active');
            $('#c'+idC).addClass('active');

            $('.best-choice').removeClass('active');
            $('#rec_tab'+idC).addClass('active');

        }
    }

    window.eMarket.MarkCarousel = {

        ajaxUrl: '',

        load: function(idC, mobileMode){

            if (window.eMarket.MarkCarousel.ajaxUrl.length > 0){



                if ($('#c'+idC).data('state') != 'load'){
                    $('#c'+idC).data('state', 'load');

                    targetUrl = eMarket.MarkCarousel.ajaxUrl + '?kc_ajax_req=yes&MARK=' + idC+ '&rmT='+Math.random();
                    eMarket.showAjaxShadow('#mark_panel', 'mark_shadow');

                    $.ajax({
                        url: targetUrl,
                        success: function(data){

                            $('#c'+idC).html(data);

                            $('#cont_mobile_'+idC).html($('#c'+idC+' ul').html());

                            $('.mobile-carts').each(function(){
                                if ($(this).attr('id') != 'cont_mobile_'+idC ){
                                    $(this).css('display', 'none');
                                }
                            });

                            $('.top-slider').css('display', 'none');

                            if (mobileMode == true){
                                $('#cont_mobile_'+idC).slideDown(100,function(){
                                    eMarket.scrollTo('#cont_mobile_'+idC);
                                });

                            }else{
                                $('#c'+idC).css('display', 'block');
                            }

                            eMarket.jCarousel.init();

                            if ($('#c'+idC).data('rcart') != true){
                                $('#c'+idC).data('rcart', true);
                                eMarket.resizeSaleCart();
                            }
                            eMarket.closeAjaxShadow('mark_shadow');

                        }
                    });
                }else{
                    $('.top-slider').css('display', 'none');

                    $('.mobile-carts').each(function(){
                        if ($(this).attr('id') != 'cont_mobile_'+idC ){
                            $(this).slideUp();
                        }
                    });

                    if (mobileMode == true){
                        $('#cont_mobile_'+idC).slideDown(100,function(){
                            eMarket.scrollTo('#cont_mobile_'+idC);
                        });
                    }else{
                        $('#c'+idC).css('display', 'block');
                    }

                    if ($('#c'+idC).data('rcart') != true){
                        $('#c'+idC).data('rcart', true);
                        eMarket.resizeSaleCart();
                    }
                }


            }

            $('.top-sale-button').removeClass('active');
            $('.top-sale-button[data-slide='+ idC +']').addClass('active');

        }
    }




    function collapseSearchLine(inverse){
        if ($('div.search-line').data('show') == 'show'){
            $('div.search-line').slideUp(eMarket.slideTime);
            $('div.search-line').data('show', 'close')
        }
        else{
            if (inverse != true){
                $('div.search-line').slideDown(eMarket.slideTime);
                $('div.search-line').data('show', 'show')
            }
        }
    }

    function prepareMobileCatalog(){
        addText = '';
        $('ul.top-menu > li > a').each(function(){
            if ($(this).parent().attr('id') != 'flex-menu-li'){
                addText += '<li class="catalog-item lg-hide md-hide sm-hide">'+$(this).get(0).outerHTML+'</li>';
            }
        });
        $('li.mobile-menu-catalog').after(addText);
    }

    function collapseMobileMenu(inverse){
        if ($('#mobile-menu').data('show') == 'show'){
            $('#mobile-menu').slideUp(eMarket.slideTime);
            $('#mobile-menu').data('show', 'close')
        }
        else{
            if (inverse != true){
                $('#mobile-menu').slideDown(eMarket.slideTime);
                $('#mobile-menu').data('show', 'show')
            }
        }
    }

    function collapseMobileCatalogMenu(){
        if ($('li.mobile-menu-catalog').data('show') == 'show'){
            $('li.catalog-item').slideUp(eMarket.slideTime);
            $('li.mobile-menu-catalog').data('show', 'close')
        }
        else{
            $('li.catalog-item').slideDown(eMarket.slideTime);
            $('li.mobile-menu-catalog').data('show', 'show')
        }
    }
/*
    function buildMenuInterval(){

        maxWidth = $('ul.top-menu').width();
        currentWidth = 0;

        columnCount = 2;

        if (maxWidth > 900){
            columnCount = 3;
        }

        if (maxWidth > 1100){
            columnCount = 4;
        }

        fullDetect = false;

        $('#flex-menu').html('');

        $('ul.top-menu>li').each(function(){
            if (!fullDetect){
                if (currentWidth + $(this).width() + 40 > maxWidth){
                    delta = maxWidth  - currentWidth;
                    fullDetect = true;

                }else{
                    currentWidth += ($(this).width()+2);
                }
            }
            if (fullDetect){
                $(this).css('display', 'none');

                if ($(this).children('div.sub-menu').html() != 'undefined' && $(this).children('div.sub-menu').html() != ''){

                    if ($(this).attr('id') != 'flex-menu-li'){
                        text = $('#flex-menu').html();

                        strAddUL = '<ul>';

                        strAddUL += '<li class="tmt">'+$(this).children('a').get(0).outerHTML+'</li>';

                        $(this).children('div.sub-menu').children('ul').children('li.tmt').each(function(){

                            strAddUL += '<li>'+$(this).html()+'</li>';
                        });

                        strAddUL += '</ul>';



                        $('#flex-menu').html(text+strAddUL);
                    }
                }

            }
        });

        if (fullDetect){
            $('ul.top-menu>li.other').css({'display':'block'});
            $('ul.top-menu>li.other').width(delta-10);
        }
    }*/

    var columnCount = 3;
    var menuColWidth = 270;
    var menuLineHeight = 0;
    var deltaM = 0;
    var fullMenu = false;

    $(document).ready(function() {



        eMarket.init();
        $('.fancy-show').fancybox();

        //resizeMenu();
        //buildMenuInterval();
        prepareMobileCatalog();
        //mainSliderInit();
        //topshop.setPriceCents();

        //topshop.scrollMenuInit();


        //jCarouselInit();

        $(window).resize(function() {
            $('ul.top-menu>li').each(function(){
                $(this).css('display','block');
            });
            window.eMarket.Menu.resize();
            eMarket.Promo.resizeRK();
            eMarket.resizeSaleCart();
            window.eMarket.jCarousel.init();

        });



        $(document).on(
            'click',
            '#nav-bar',
            function(){
                collapseMobileMenu();
                collapseSearchLine(true);
            }
        );

        $(document).on(
            'click',
            '#nav-cart',
            function(){
                collapseMobileMenu(true);
                collapseSearchLine(true);
            }
        );

        $(document).on(
            'click',
            '#nav-search',
            function(){
                collapseMobileMenu(true);
                collapseSearchLine();
            }
        );

        $(document).on(
            'click',
            'li.mobile-menu-catalog',
            function(){
                collapseMobileCatalogMenu()
            }
        );

        

        $(document).on('click','.sku-select-chosen',function(){

            $('.sku-select-items').slideToggle(100);
        });

        $(document).on('click','.sku-select-item',function(event){
            event.stopPropagation();
            $('.offer-buy-form').show();
            var thisObj = $(this);
            var id = $(this).data('pid');
            setBasketIds(id);
            $('.sku-select-chosen-inner').html('<div>'+thisObj.find(".emarket-offer-props-name").html()+'</div>');
            $('.emarket-current-price').html(thisObj.find(".emarket-offer-price").val());
            $('.sku-select-items').slideUp(100);
            $('.sku-select-chosen').attr('data-pid',id);
        });
        

    });

})(window);