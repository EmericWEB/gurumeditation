(function($, window, document) {
    
    var app = {
        init : function() {
                    app.resize();
            $('body').addClass('preload');
            
             if (true == $.browser.mozilla) {
               $('body').addClass('firefox');
            }
                app.click();
                //app.resize();
                app.triggers();
                $(window).resize(function() {
                    app.resize();
                });
                
                
            $('.loading').hide();
            if($('.loading').find('img').length) {
               
            $('.loading').imagesLoaded()
            .always( function( instance ) {
                app.preload();
    /*                app.gallery();
                app.equal();
                app.resize();
                */
            })
            .done( function( instance ) {
            })
            .fail( function() {
            })
            .progress( function( instance, image ) {
              $(image.img).parents('.loading').fadeIn(800);
            });
        }
        else {
            $('.loading').show();
            
                app.preload();
            }
            /*
            var $imgLoaded = imagesLoaded('.loadimg img');
            $imgLoaded.on('progress',  function( instance, image ) {
                $(image.img).parents('.loading').fadeIn(1600);
                
            })  ;
            $imgLoaded.on('always',  function( instance ) {
            })  ;*/
            
            
            
        },
        preload : function() {
            $('body').removeClass('preload');
            //$('nav#primary-navigation').show();
            $('nav#primary-navigation').css({top : -60}).show().animate({top : 0}, 1200);

            $('header#masthead').fadeIn(1200);  
            $('footer#colophon').fadeIn(1200);  
              
            app.gallery();
            app.equal();
            app.resize();
        },
        triggers: function() {
            $('.blogpost').hover(function() {
                $('.blogpost').addClass('off');
                $(this).removeClass('off').addClass('on');
            }, function() {
                $('.blogpost').removeClass('off');
                $(this).removeClass('on');
            });
            
            $('.pic, .col-bg').hover(function() {
                $(this).addClass('on');
            }, function() {
                $(this).removeClass('on');
            });
                    /*
            $('.col-flip a').hover(function() {
                $(this).addClass('flipped');
            }, function() {
                $(this).removeClass('flipped');
            });
            */
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
        gallery: function() {
            
            $('.masonry').justifiedGallery({
                rowHeight : 230,
                maxRowHeight : 320,
                margins : 7
            });
            
        },
        menu : function() {
             $('div.nav-menu').toggleClass("open").stop(true, true).slideToggle(200, 'easeInQuad');
             //$('nav#primary-navigation div.nav-menu').toggleClass("open").stop(true, true).fadeToggle(200, 'easeInQuad');
             //app.loading($('nav#primary-navigation div.nav-menu').hasClass("open"));
        },
        contact : function(open) {
            var $c = $('div#contact-hide');
            if(open === 1) {
               $c.stop(true, true).slideDown(400, 'easeInQuad');
            }
            else {
               //$c.stop(true, true).slideUp(400, 'easeInQuad');
               $c.hide();
               //$c.removeClass("open").stop(true, true).slideUp(400, 'easeInQuad');
            }
             //$('nav#primary-navigation div.nav-menu').toggleClass("open").stop(true, true).fadeToggle(200, 'easeInQuad');
             //app.loading($('nav#primary-navigation div.nav-menu').hasClass("open"));
        },
        toggle : function(rel) {
            var $c = $(rel);
            $('.contact-hide').slideUp();
            $c.slideDown();
             //$('nav#primary-navigation div.nav-menu').toggleClass("open").stop(true, true).fadeToggle(200, 'easeInQuad');
             //app.loading($('nav#primary-navigation div.nav-menu').hasClass("open"));
        },
        header : function() {
             //$('div.header-menu').toggleClass("open").stop(true, true).slideToggle(200, 'easeInQuad');
             //app.loading($('nav#primary-navigation div.nav-menu').hasClass("open"));
        },
        newsletter : function() {
             $('div.form-newsletter').toggleClass("open").stop(true, true).slideToggle(200, 'easeInQuad');
             //app.loading($('nav#primary-navigation div.nav-menu').hasClass("open"));
        },
        click : function() {
            
            //$('#page').on('click', 'a#btn-menu', function() {
            $('a#btn-menu').click(function() {
               app.menu();
               return false;
            });
            $('a#btn-header').click(function() {
               app.header();
               return false;
            });
            $('a#btn-newsletter').click(function() {
               app.newsletter();
               return false;
            });
             $('#loading').click(function() {
               app.menu();
               return false;
            });
            
            $('input[name="date"]').click(function() {
               //alert($(this).val());
               //app.contact(parseInt($(this).val()));
               app.toggle($(this).data('rel'));
            });
            
            $('form.json').submit(function() {
               app.submit(this);
               return false;
            });
            
        },
        submit : function(form) {
                //alert('submit')
            var $this = $(form),
            $log = $('.json-log');
            /*
            var pseudo = $('#pseudo').val();
            var mail = $('#mail').val();
            
            if(pseudo === '' || mail === '') {
                alert('Les champs doivent êtres remplis');
            } else {*/
                $log.hide();
                $.ajax({
                    url: $this.prop('action'),
                    type: $this.prop('method'),
                    data: $this.serialize(),
                   dataType: 'json', // JSON
                    success: function(json) {
                        if(json.error === true) {
                            $log.empty().html(json.errors).slideDown();  
                        } else {
                            $this.slideUp(function() {
                                $log.empty().html(json.success).slideDown();                                
                            });

                            
                        }
                    }
                });
            /*}*/
        },
        equal : function() {
            var h = 0;
            if($('.blogpost').length <= 1) {
                return;
            }
            $('.blogpost').each(function() {
               if($(this).height() > h) {
                   h = $(this).height();
               } 
            });
               $('.blogpost').height(h);
        },
        resize : function() {
            $('#page').css({minHeight : $(window).height() - 70 - $('footer#colophon').height()});
            /*    
            if($('#page').height() < $(window).height()) {
                //$('#page').height($(window).height() - 28);
                $('#page').css({minHeight : $(window).height() - 70 - $('footer#colophon').height()});
            }
            else {
                $('#page').css({minHeight : '100%'});
                //$('#page').height('100%');
            }
            */
                $('#homesplash').height($(window).height());
        }
    };
    
    app.init();
    
    var slider = {
        interval : false,
        zIndex : 0,
        loaded : false,
        $slide : $('.guru-team'),
        init : function() {
            slider.$slide.each(function(e) {
                slider.step(e, 0);
            });
            
            slider.$slide.hover(function() {
                $(this).find('.txt-team').stop(true, true).fadeIn(400);
            }, function() {
                $(this).find('.txt-team').stop(true, true).fadeOut(400);
                
            });
        },
        step : function(e, i) {
            setTimeout(function() {
                
                switch(i) {
                    case 0:
                        if(e%2) {
                            $(slider.$slide[e]).find('.img-team-2').css({left : '0%', top: '100%'}).delay(e*200).animate({left :0, top: 0});
                        }
                        else {
                            $(slider.$slide[e]).find('.img-team-2').css({left : '100%', top: '0%'}).delay(e*200).animate({left :0, top: 0});
                        }
                    break;
                    case 1:
                        if(e%2) {
                            $(slider.$slide[e]).find('.img-team-2').delay(e*200).animate({left : 0, top: '-100%'});
                            $(slider.$slide[e]).find('.img-team-3').delay(e*200).css({left : '0%', top: '100%'}).animate({left :0, top: 0});
                        }
                        else {
                            $(slider.$slide[e]).find('.img-team-2').delay(e*200).animate({left : '-100%', top: '0'});
                            $(slider.$slide[e]).find('.img-team-3').delay(e*200).css({left : '100%', top: '0'}).animate({left :0, top: 0});
                        }
                    break;
                    case 2:
                        if(e%2) {
                            $(slider.$slide[e]).find('.img-team-3').delay(e*200).animate({left : '-100%', top: 0});
                        }
                        else {
                            
                            $(slider.$slide[e]).find('.img-team-3').delay(e*200).animate({left : 0, top: '-100%'});
                        }
                        i = -1;
                    break;
                }
                
                slider.step(e, i + 1);
                
            }, 5000);
        }
    };
    
    slider.init();
    
}(jQuery,window,document));