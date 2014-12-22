(function($, window, document) {
    
    var app = {
        init : function() {

            app.click();
            app.resize();

            $(window).resize(function() {
                app.resize();
            });
                
            app.loading(true);
            
            $('.loading').imagesLoaded()
            .always( function( instance ) {
                app.loading(false);
                slider.init();
            })
            .done( function( instance ) {
            })
            .fail( function() {
            })
            .progress( function( instance, image ) {
              //$(image.img).parents('.loading').fadeIn(800);
            });
            
        },
        loading:function(show) {
            //return;
          if(show) {
              $('#loading').show();
              //$('#loading').hide().fadeIn(app.speed/4);
          }  
          else {
              $('#loading').fadeOut(app.speed/4);
              //$('#loading').hide();
          }
        },
        click : function() {
            
            
        },
        resize : function() {
            var h = $(window).height();
            $('div#homesplash').height(h);
            $('div#home-nav').css({paddingTop : (h - $('div#home-nav').height()) / 2 });
                
        }
    };
    
    app.init();
    
    
    var slider = {
        interval : false,
        zIndex : 0,
        n : 0,
        loaded : false,
        slide : $('.slide'),
        init : function() {
            this.n = this.slide.length;
            var src = '';
            this.slide.each(function() {
                src = $(this).find('img:first').prop('src');
                $(this).css({backgroundImage : 'url(' + src + ')'});
                $(this).find('img:first').hide();
            });
            
            slider.triggers();
        },
        anim : function(sel) {
            $(sel).css({zIndex : slider.zIndex++}).stop(true, true).hide().fadeOut(0).fadeIn(200, 'easeInSine');
            //slider.slide.eq(slider.current).fadeOut(800);

        },
        hide : function(sel) {
            $(sel).delay(200).fadeOut(200, 'easeInSine');
            //slider.slide.eq(slider.current).fadeOut(800);

        },
        triggers : function() {
            $('div#homesplash a').mouseenter(function(e) {
                var rel = $(this).data('rel');
                slider.interval = setTimeout(function() {
                   slider.anim(rel);
                   slider.interval = false;
                   slider.loaded = true;
                },50);
            });
            $('div#homesplash a').mouseleave(function(e) {
               if(slider.interval) {
                   clearTimeout(slider.interval);
                   slider.zIndex = 0;
                   slider.slide.css({zIndex : slider.zIndex});
               }
               slider.hide($(this).data('rel'));
            });
        }
    };
    
}(jQuery,window,document));