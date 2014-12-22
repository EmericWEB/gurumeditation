(function($, tinymce) {
    tinymce.create('tinymce.plugins.GuruTheme', {
        init : function(ed, url) {
            
            ed.addButton('guru_usp', {
                title : 'USP',
                cmd : 'guru_usp',
                //image : '../wp-includes/images/smilies/icon_mrgreen.gif'
                image : url + '/clipboard.png'
            });
 
 
            ed.addCommand('guru_usp', function() {
                
                // triggers the thickbox
                var width = $(window).width(), H = $(window).height(), W = ( 720 < width ) ? 720 : width;
                W = W - 80;
                H = H - 160;
                tb_show( 'Afficher des posts', '#TB_inline?width=' + W + '&height=' + H + '&inlineId=guru_display_posts_popup' );
                /*
                var number = prompt("XML File URL ? "),
                    shortcode;
                if (number !== null) {
                    
                    shortcode = '[alacarte xml="' + number + '"/]';
                    ed.execCommand('mceInsertContent', 0, shortcode);
                    
                }
                */
            });
            
            ed.addButton('guru_team', {
                title : 'Team',
                cmd : 'guru_team',
                //image : '../wp-includes/images/smilies/icon_mrgreen.gif'
                image : url + '/clipboard.png'
            });
             ed.addCommand('guru_team', function() {
                
			var shortcode = '[guru_team]';
			/*if(tinyMCE.activeEditor.selection) {
                            shortcode += tinyMCE.activeEditor.selection.getContent();
                        }
			shortcode += '[/parallax]';*/
			
			// inserts the shortcode into the active editor
			tinyMCE.activeEditor.execCommand('mceInsertContent', 0, shortcode);
            });
            
            ed.addButton('guru_btn', {
                title : 'Faire un bouton',
                cmd : 'guru_btn',
                //image : '../wp-includes/images/smilies/icon_mrgreen.gif'
                image : url + '/clipboard.png'
            });
             ed.addCommand('guru_btn', function() {
                
			var shortcode = '[guru_btn]';
			if(tinyMCE.activeEditor.selection) {
                            shortcode += tinyMCE.activeEditor.selection.getContent();
                        }
			shortcode += '[/guru_btn]';
			
			// inserts the shortcode into the active editor
			tinyMCE.activeEditor.execCommand('mceInsertContent', 0, shortcode);
            });
        },
        createControl : function(n, cm) {
            return null;
        },
 
        getInfo : function() {
            return {
                longname : 'TinyMCE Buttons by GuruMeditation',
                author : 'Guru Meditation',
                authorurl : 'http://gurumeditation.fr',
                infourl : 'http://gurumeditation.fr',
                version : "0.1"
            };
        }
    });
    // Register plugin
    tinymce.PluginManager.add( 'guru_usp', tinymce.plugins.GuruTheme );
    //
    
	$(function(){
		// creates a form to be displayed everytime the button is clicked
		// you should achieve this using AJAX instead of direct html code like this
		var form = $('#guru_display_posts_popup').hide();
		//alert('pop')
		var table = form.find('table');
		//form.appendTo('body').hide();
		
		// handles the click event of the submit button
		form.find('#guru_display_posts_popup-submit').click(function(){
			// defines the options and their default values
			// again, this is not the most elegant way to do this
			// but well, this gets the job done nonetheless
			var options = { 
				//'post_type': 'post',
				'cat': '',
				//'posts_per_page': 12,
                                /*,
				'id'         : ''*/
				};
			var shortcode = '[guru_usp';
			
			for( var index in options) {
				var value = table.find('[name="guru_display_posts-' + index + '"]:checked').val();
				
				// attaches the attribute to the shortcode only if it's different from the default value
				if ( value !== options[index] )
					shortcode += ' ' + index + '="' + value + '"';
			}
			
			shortcode += ']';
			
			// inserts the shortcode into the active editor
			tinyMCE.activeEditor.execCommand('mceInsertContent', 0, shortcode);
			
			// closes Thickbox
			tb_remove();
		});
	});
    
})(jQuery, tinymce);