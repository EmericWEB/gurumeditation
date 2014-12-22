(function( $, document, window) {
    var $canvas = $('#map-canvas');
    if(!$canvas.length) {
        return;
    }
    $canvas.show();
    var addr =  $canvas.data('map');
    $canvas.prepend('<img src="http://maps.googleapis.com/maps/api/staticmap?center='+ 
            encodeURIComponent(addr)
    +'&zoom=13&size=1920x360" alt="" />');
    

})(jQuery, document, window)