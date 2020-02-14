<?
$js_sku_props = CUtil::PhpToJSObject($arResult["SKU_PROPS_LIST"]);
$js_offers = CUtil::PhpToJSObject($arResult["OFFERS"]);
$offer_cnt = count($arResult["OFFERS"]);
?>

<?
   /*function plural_form($number, $after) {
        $cases = array (2, 0, 1, 1, 1, 2);
        echo $number.' '.$after[ ($number%100>4 && $number%100<20)? 2: $cases[min($number%10, 5)] ];
    }
    
    $temp = plural_form(2, array('sd','qwe','qweee'));*/

?>
<script>
    var sku_props = <?=$js_sku_props?>;
    var offers = <?=$js_offers?>;
    var offer_cnt = <?=$offer_cnt?>;
    var default_price = "<?=$arResult['MIN_PRICE']['PRINT_DISCOUNT_VALUE']?>";
    //alert("-<?=$temp;?>")
    
    function declOfNum(number, titles)
    {
        cases = [2, 0, 1, 1, 1, 2];
        return titles[ (number%100>4 && number%100<20)? 2 : cases[(number%10<5)?number%10:5] ];
    }
    
    //alert( declOfNum(1, [' модель', ' модели', ' моделей']));
    
    $(document).on("click", ".sku-prop-value", function() {
        sku_clicked = $(this).data("prop-code");
        if ($(this).hasClass("deactive")) {
            alert("<?=GetMessage('NO_OFFER_WITH_PARAMS')?>");
        } else 
        {
            if (!$(this).hasClass("active"))  {
                $(this).closest("ul").find(".sku-prop-value").removeClass("active");
                $(this).addClass("active");
            } else {
                $(this).removeClass("active");
            }
            availOffer = [];
            buy_offers = [];
            prop_variants = [];
            index = 0;
            
            $.each(offers, function(offerId) {
                index++;
                curOffer = this;
                availOffer[offerId] = [];
                availOffer[offerId]["VAL"] = true;
                $(".sku-prop-value.active").each(function() {
                    curProp = this;
                    propCode = $(curProp).data("prop-code");
                    propType = $(curProp).data("prop-type");
                    valId = $(curProp).data("val-id");
                    valName = $(curProp).data("val-name");
                    valCode = $(curProp).data("val-code");
                    availOffer[offerId][propCode] = true;
                    if ( (propType == "E" && valId != curOffer["PROPERTIES"][propCode]["VALUE"]) || 
                         (propType == "L" && valName != curOffer["PROPERTIES"][propCode]["VALUE"]) || 
                         ( propType == "S" && valCode != curOffer["PROPERTIES"][propCode]["VALUE"]) 
                       ) 
                    {
                        availOffer[offerId][propCode] = false;
                        availOffer[offerId]["VAL"] = false;
                    }
                });
                if (index == offer_cnt) {
                    $.each(availOffer, function(offerId) {
                        if (this["VAL"])
                        buy_offers.push(offerId);
                    });
                    if (buy_offers.length > 0) {
                        foundMsg = declOfNum(buy_offers.length, ['<?=GetMessage("OFFERS_FOUND_1")?>', '<?=GetMessage("OFFERS_FOUND_2")?>', '<?=GetMessage("OFFERS_FOUND_n")?>']);
                        countMsg = foundMsg.replace("#CNT#", buy_offers.length);
                        //countMsg += " " + declOfNum(buy_offers.length, ['<?=GetMessage("OFFERS_FOUND_1")?>', '<?=GetMessage("OFFERS_FOUND_2")?>', '<?=GetMessage("OFFERS_FOUND_n")?>']);
                        watch = "";
                        <?if( $arParams["HIDE_OFFERS_LIST"] != 'Y') {?>
                        watch = "<a href='#detail' data-scroll='emarket-offers' class='text-link scroll-navigate'><?=GetMessage("LOOK_OFFERS")?></a>";
                        <?}?>
                        $(".offers-cnt").html(countMsg+watch);
                    } else {
                        foundMsg = "<?=GetMessage("NO_OFFER_WITH_PARAMS")?>";
                        selectParams = "";
                        $(".sku-prop-value.active").each(function() {
                            selectParams += $(this).closest('div').data('prop-name');
                            selectParams += ': ';
                            selectParams += $(this).data('val-name');
                            selectParams += '<br>';
                        });
                        notFoundMsg = foundMsg.replace("#PARAMS#",selectParams);
                        leaveRequest = "<?=GetMessage('LEAVE_REQUEST')?>";
                        requestBtn = "<a href='javascript:void(0)' data-trade='<?=$arResult["NAME"]?>' data-params='"+selectParams+"' class='phone-url phone-url-ding' id='leave_request'><?=GetMessage("REQUEST_BTN")?></a>";
                        $(".offers-cnt").html(notFoundMsg+'<br>'+leaveRequest+requestBtn);
                    }
                    $(".offers-cnt").show();
                    if (buy_offers.length == 1) {
                        setBasketIds(buy_offers[0]);
                        $('.offer-buy-form').show();
                        $('.emarket-current-price').html(offers[buy_offers[0]]['MIN_PRICE']['PRINT_DISCOUNT_VALUE']);
                    } else {
                        $('.emarket-current-price').html('<?=GetMessage("PRICE_FROM")?> '+default_price.replace(".",""));
                        $('.offer-buy-form').hide();
                    };
                    $('.sku-row').removeClass("avail");
                    $.each(buy_offers, function() {
                        $('.sku-row[data-sku-id="'+this+'"]').addClass("avail");
                    });
                    buyIndex = 0;
                    $.each(buy_offers, function() {
                        cur_buy_offer = this;
                        buyIndex++;
                        $.each(offers[cur_buy_offer]["PROPERTIES"], function() {
                            cur_prop = this;
                            if (cur_prop["CODE"] in sku_props) {
                                if (!$.isArray(prop_variants[cur_prop["CODE"]]))
                                    prop_variants[cur_prop["CODE"]] = [];
                                if (!$.isArray(prop_variants[cur_prop["CODE"]]["VAL"]))
                                    prop_variants[cur_prop["CODE"]]["VAL"] = [];
                                prop_variants[cur_prop["CODE"]]["TYPE"] = cur_prop["PROPERTY_TYPE"];
                                if ($.inArray(cur_prop["VALUE"], prop_variants[cur_prop["CODE"]]["VAL"]) < 0) {
                                    if (cur_prop["PROPERTY_TYPE"] == "E") {
                                        prop_variants[cur_prop["CODE"]]["VAL"].push(parseInt(cur_prop["VALUE"]));
                                    } else {
                                        prop_variants[cur_prop["CODE"]]["VAL"].push(cur_prop["VALUE"]);
                                    }
                                }
                            }
                        });
                        if (buyIndex == buy_offers.length) {
                            cur_prop_deactive_val_name = [];
                            $('.sku-prop-value.deactive[data-prop-code="'+sku_clicked+'"]').each(function() {
                                cur_prop_deactive_val_name.push($(this).data("val-name"));
                            });
                            $('.sku-prop-value').removeClass('deactive');
                            for (key in prop_variants) {
                                cur_prop_var = prop_variants[key];
                                propCode = cur_prop_var["TYPE"];
                                $('.sku-prop-value[data-prop-code="'+key+'"]').each(function() {
                                    propType = $(this).data("prop-type");
                                    valName = $(this).data("val-name");
                                    valCode = $(this).data("val-code");
                                    valId = $(this).data("val-id");
                                    if ( (propType == "E" && $.inArray(valId, cur_prop_var["VAL"]) < 0) || 
                                         (propType == "L" && $.inArray(valName, cur_prop_var["VAL"]) < 0) || 
                                         (propType == "S" && $.inArray(valCode, cur_prop_var["VAL"]) < 0) 
                                       ) 
                                    {
//                                        if ($(this).data('prop-code') != sku_clicked || $('.sku-prop-value.active').length > 1)
//                                    if ($(this).data('prop-code') != sku_clicked || 
//                                            ($.inArray(valName, cur_prop_deactive_val_name) > -1)
//                                            ) 
//                                        $(this).addClass('deactive');
                                    }
                                })
                            }
                        };
                    });
                }
            });
        }
    })
</script>
