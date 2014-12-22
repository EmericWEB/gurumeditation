jQuery(document).ready(function($)
{
    if(wp.media) {
    var _custom_media = true,
        _orig_send_attachment = wp.media.editor.send.attachment;

    // ADJUST THIS to match the correct button
    $('.guru-upload').click(function(e) 
    {
        //var send_attachment_bkp = wp.media.editor.send.attachment;
        var button = $(this);
        //var id = button.attr('id').replace('_button', '');
        _custom_media = true;
        wp.media.editor.send.attachment = function(props, attachment)
        {
            if ( _custom_media ) 
            {
                var size = props.size;
                var url = attachment.sizes[size].url;
                button.prev('input').val(url);
                if(! button.next('.guru-upload-preview').length) {
                    button.after('<p class="guru-upload-preview"><img src="'+ url +'" alt="" style="max-width:240px;height:auto;" /></p>');
                }
                else {
                    button.next('.guru-upload-preview').find('img').prop('src', url);
                }
                //$("#"+id).val(attachment.url);
            } else {
                return _orig_send_attachment.apply( this, [props, attachment] );
            };
        }

        wp.media.editor.open(button);
        return false;
    });

    $('.add_media').on('click', function()
    {
        _custom_media = false;
    });
}
});

//{"id":7,"title":"mediterranean-346997","filename":"mediterranean-346997.jpg","url":"http://www.vdeux.com/depur/wp-content/uploads/2014/09/mediterranean-346997.jpg","link":"http://www.vdeux.com/depur/?attachment_id=7","alt":"","author":"1","description":"","caption":"","name":"mediterranean-346997","status":"inherit","uploadedTo":0,"date":"2014-09-18T21:31:37.000Z","modified":"2014-09-18T21:31:37.000Z","menuOrder":0,"mime":"image/jpeg","type":"image","subtype":"jpeg","icon":"http://www.vdeux.com/depur/wp-includes/images/media/default.png","dateFormatted":"18 septembre 2014","nonces":{"update":"c5165faa42","delete":"4e5a49bb85","edit":"8a38f77799"},"editLink":"http://www.vdeux.com/depur/wp-admin/post.php?post=7&action=edit","meta":false,"authorName":"emeric","filesizeInBytes":378368,"filesizeHumanReadable":"370 kB","sizes":{"thumbnail":{"height":150,"width":150,"url":"http://www.vdeux.com/depur/wp-content/uploads/2014/09/mediterranean-346997-150x150.jpg","orientation":"landscape"},"medium":{"height":228,"width":300,"url":"http://www.vdeux.com/depur/wp-content/uploads/2014/09/mediterranean-346997-300x228.jpg","orientation":"landscape"},"large":{"height":360,"width":474,"url":"http://www.vdeux.com/depur/wp-content/uploads/2014/09/mediterranean-346997-1024x778.jpg","orientation":"landscape"},"post-thumbnail":{"height":262,"width":474,"url":"http://www.vdeux.com/depur/wp-content/uploads/2014/09/mediterranean-346997-672x372.jpg","orientation":"landscape"},"twentyfourteen-full-width":{"height":263,"width":474,"url":"http://www.vdeux.com/depur/wp-content/uploads/2014/09/mediterranean-346997-1038x576.jpg","orientation":"landscape"},"guru_fullscreen":{"height":316,"width":474,"url":"http://www.vdeux.com/depur/wp-content/uploads/2014/09/mediterranean-346997-1920x1280.jpg","orientation":"landscape"},"guru_square":{"height":300,"width":300,"url":"http://www.vdeux.com/depur/wp-content/uploads/2014/09/mediterranean-346997-300x300.jpg","orientation":"landscape"},"guru_bigsquare":{"height":474,"width":474,"url":"http://www.vdeux.com/depur/wp-content/uploads/2014/09/mediterranean-346997-600x600.jpg","orientation":"landscape"},"guru_169":{"height":266,"width":474,"url":"http://www.vdeux.com/depur/wp-content/uploads/2014/09/mediterranean-346997-640x360.jpg","orientation":"landscape"},"guru_large":{"height":359,"width":474,"url":"http://www.vdeux.com/depur/wp-content/uploads/2014/09/mediterranean-346997-640x486.jpg","orientation":"landscape"},"guru_col":{"height":243,"width":320,"url":"http://www.vdeux.com/depur/wp-content/uploads/2014/09/mediterranean-346997-320x243.jpg","orientation":"landscape"},"full":{"url":"http://www.vdeux.com/depur/wp-content/uploads/2014/09/mediterranean-346997.jpg","height":1521,"width":2000,"orientation":"landscape"}},"height":1521,"width":2000,"orientation":"landscape","compat":{"item":"","meta":""}}