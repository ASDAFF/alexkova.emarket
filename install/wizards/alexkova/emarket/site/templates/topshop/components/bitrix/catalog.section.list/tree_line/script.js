(function (window) {

    window.Designer = {

        init: function(){
            window.Designer.Menu.init();
            window.Designer.Menu.menu_columns();            

            $(window).resize(function() {
                window.Designer.Menu.menu_columns();                
            });

        }
    };

    window.Designer.Menu =  {
        
        LG: 4,
        MD: 3,
        SM: 2,
        XS: 1,
        rScreen: 0,
        
        init: function() {
            var menu = $('#horizontal-multilevel-menu');
            (menu.data("lg") != undefined) ? this.LG = menu.data("lg") : this.LG=this.LG;
            (menu.data("md") != undefined) ? this.MD = menu.data("md") : this.MD=this.MD;
            (menu.data("sm") != undefined) ? this.SM = menu.data("sm") : this.SM=this.SM;
            (menu.data("xs") != undefined) ? this.XS = menu.data("xs") : this.XS=this.XS;
            var t = this;
            
            menu.find(".l-1 > ul > li").css('display', "none");
            menu.find(".l-1 > ul").each(function(indx, element){
                for(i=0;i<4;i++) {
                    $(element).append("<div class='lg-hmml"+t.LG+" md-hmml"+t.MD+" sm-hmml"+t.SM+"  xs-hmml"+t.XS+" columns-left'><ul></ul></div>");
                }
            });
        },
        
        isScreen: function(){
            if($(window).outerWidth()>=1200)
                return "LG";
            
            if($(window).outerWidth()<1200 && $(window).outerWidth()>=992)
                return "MD";

            if($(window).outerWidth()<992 && $(window).outerWidth()>=768)
                return "SM";
            
            if($(window).outerWidth()<768)
                return "XS";
            
            return "LG";
        },

        menu_columns: function(){
            var tiS = this.isScreen();
            
            if(this.rScreen == tiS)
                return false;
  
            $('#horizontal-multilevel-menu .columns-left').html("<ul></ul>");
            
            var menu = $('#horizontal-multilevel-menu');            
            var top_li = menu.find("> ul > li");
            var columns = this[tiS];
            
            top_li.each(function(indx, element){
                
                var li = $(element).find("> ul > li");
                var height = 0;
                var max_height = 0;
                var t_element = $(element);
                
                li.each(function(indx, element){
                    height += $(element).height();
                });
                              
                var max_height = height/columns-10;
                var i = 0;
                var columns_height = 0;
                

                li.each(function(indx, element){
                    if(i>=(columns) || i<0)
                        i = 0;
                    
                    var div = t_element.find('div.columns-left:eq(' + i +')');                    
                    div.find("> ul").append('<li calss=" l-2">'+$(element).html()+"</li>");
                    columns_height += $(element).height();
                    
                    if(columns_height > max_height) {
                        ++i;
                        columns_height = 0;
                    }
                });
                                
                /*li.each(function(indx, element){
                    if(i>=(columns))
                        i = 0;
                    
                    var div = t_element.find('div.columns-left:eq(' + i +')');
                    
                    if($(div).outerHeight() < max_height)
                        div.find("> ul").append('<li calss=" l-2">'+$(element).html()+"</li>");
                    
                    ++i;
                });*/

                
            });
            this.rScreen = tiS;
        }
    };

    $(document).ready(function(){
       window.Designer.init();
    });


})(window);


