(function($, window, document) {
    
    var app = {
        isMobile : false,
        init : function() {
             if (true == $.browser.mozilla) {
               $('body').addClass('firefox');
            }
            
            $('#main').fadeIn();
            
                    app.isMobile = $(window).width() < 991 || $(window).height() < 360;
                    if( app.isMobile ) {
                        $('body').addClass('mobile');
                        $('#mobilemenu').hide()
                    }
                    else {
                        $('body').removeClass('mobile open-aside');
                    }
                 //   app.preload();
                app.click();
                app.resize();
                app.hover();
                app.slider();

                $(window).resize(function() {
                    app.resize();
                });
            $('.loadimg').hide();
            var $imgLoaded = imagesLoaded('.loadimg');
            $imgLoaded.on('progress',  function( instance, image ) {
                $(image.img).parents('.loadimg').fadeIn(1200);
            })  ;
            $imgLoaded.on('always',  function( instance ) {
                
                app.hashnav();
                //$('#main').fadeIn();

            })  ;
            
        },
        menu : function() {
            $('#bigmenuWrap').height($(window).height());
            var menuHeight = $('#bigmenu').find('ul').height();
            
            $('#bigmenu').find('ul').css({marginTop : ($('#bigmenuWrap').height() - menuHeight) / 2 } );
            /*
            if($(window).width() < 480) {
                    $('div#bigmenu').addClass('mobile');
            }
            else {
                    $('div#bigmenu').removeClass('mobile');
            }
            */
            
            
        },
        preload : function() {
          //$('article.guru-article').hide();  
          var loaded = imagesLoaded( 'article.guru-article' );
                
                loaded.on('progress',  function( instance,image ) {
                    //$this.hide().delay(200).fadeIn(400);
                    $(image).hide().delay(200).fadeIn(400);
                })  ;
                
                loaded.on('always',  function( instance ) {
                    //$this.hide().delay(200).fadeIn(400);
                    //$this.hide().delay(200).slideDown(400);
                })  ;
          /*
          $('article.guru-article').each(function(e) {
              
                var $this = $(this),
                //img = [].push($this.data("image")),
                img = $this.data("image"),
                loaded = imagesLoaded( $('<img src="' + img + '" />') );
                
                loaded.on('always',  function( instance ) {
                    //$this.hide().delay(200).fadeIn(400);
                    $this.hide().delay(200).slideDown(400);
                })  ;
          }); */
          
        },
        click : function() {

            $('a.toggle').click(function(e) {
                e.preventDefault();
                $(this).toggleClass('open');
                
                if($(this).hasClass('x')) {
                    $(this).text($(this).hasClass('open')?"x" : $(this).prop('title'));
                }
                $($(this).data('toggle')).stop(true, true).slideToggle(900, function() {
                       app.menu(); 
                });
            });

            $('a.menu-toggle').click(function(e) {
                e.preventDefault();
                $(this).toggleClass('on')
                //$('#bigmenu').height($('body').hasClass('open-aside')?0:$(window).height());
                app.menu();
                if(app.isMobile) {
                    $('body').removeClass("open-aside");
                    $('#mobilemenu').slideToggle()
                }
                else {
                    $('body').toggleClass("open-aside");
                }
                app.resize();
            });
            
            $('div#bigmenu a, a.fakeajax').click(function(event) {
                event.preventDefault();
                var h = this.href;
                
                $('body').removeClass("open-aside");
                setTimeout(function() {window.location.href = h;}, 900)
                /*$('div#main').fadeOut(1200,function() {
                   
                   $('div#main').show()
                });*/
                
            });
            
            $(' a.video').click(function(e) {
                e.preventDefault();
                
                $('#videoplayer').hide().load(this.href + ' .entry-content', function() {$('#videoplayer').slideDown()});
                
            });
        },
        resize : function() {
                /*
                var leftpos = $('#main').position().left - 50;
                //alert(leftpos)
                $('#openmenu').css({left : leftpos});
                */
                app.isMobile = w < 991 || $(window).height() < 540;
                if( app.isMobile ) {
                    $('body').addClass('mobile');
                    $('body').removeClass('open-aside');
                }
                else {
                    $('body').removeClass('mobile');
                    $('#mobilemenu').hide();
                }
                 
               var w = $(window).width(),
                v = - 60 + ( $('body').hasClass('open-aside')? 0 : ($('#main').width() - w )/4 ) ;
               
               $('#openmenu').stop(true, true).css({right : v});
                
                app.menu(); 
                
        },
        hover : function() {
            $('.guru-homepage').hover(function() {
                    $(this).find('.hide-toggle').stop(true, true).slideDown();
            },function() {
                    $(this).find('.hide-toggle').stop(true, true).slideUp();
            });
        },
        slider : function() {
            
            $('div.gururoll').each(function() {
               
                var s = 0,
                $a = $(this).parent('a'),
                h = $a.prop('href'),
                $slide = $(this).find('.slide'),
                n = $slide.length;

                if(n) {
                    $slide.hide();

                    $slide.eq(s).fadeIn(1200);
                    $a.prop('href', h + '#' + $slide.eq(s).data('post'));
                    setInterval(function() {
                        //$('.slide').hide();
                        $slide.eq(s).fadeOut(800);
                        s = (s+1)%(n);
                        $slide.eq(s).hide().fadeIn(1200);
                        $a.prop('href', h + '#' +  $slide.eq(s).data('post'));
                    },
                    6000);
                } 
            });
            
            if($('#team-quote').length) {
                
                var s = 0,
                $a = $(this).find('a'),
                h = $a.prop('href'),
                $slide = $('#team-quote p'),
                n = $slide.length;

                if(n) {
                    $slide.hide();

                    $slide.eq(s).fadeIn(600);
                    
                    setInterval(function() {
                        //$('.slide').hide();
                        $slide.eq(s).fadeOut(600, function() {

                            s = (s+1)%(n);
                            $slide.eq(s).hide().fadeIn(600);
                        });
                    },
                    6000);
                } 
            }
            
            
        },
        hashnav : function() {
            var hash = window.location.hash.substr(1);
            if(hash) {
                //alert(hash)
                
                if($('article#post-' + hash).length) {
                    //window.scrollTo(0, $('article#post-' + hash).offset().top);
                    
                        $("html, body").animate({
                            scrollTop: $('article#post-' + hash).offset().top - 40 
                        }, function() {
                            $('article#post-' + hash).find('.entry-content').hide();
                            $('article#post-' + hash).find('a.toggle').first().trigger('click');
                        });
                        
                    /*$('body, html').scrollTo($('article#post-' + hash).offset().top, function() {
                        
                        $('article#post-' + hash).find('a.toggle').trigger('click');
                    });*/
                }
                /*
                if($('div#entry-' + hash).length) {
                    $('div#entry-' + hash).slideDown();
                }
                */
            }
        }
    };
    
    app.init();
    
}(jQuery,window,document));