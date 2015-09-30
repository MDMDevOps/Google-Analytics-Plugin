jQuery( document ).ready( function( $ ) {
    'use strict';
    // set initial state of boxes
    var radios = $('.mpress-analytics-tog');

    $.each( radios, function() {
        if( $(this).attr('checked') ) {
            var target = $(this).data('target');
            $( '[data-selector=' + target + ']' ).attr( 'disabled', true );
        }
    });

    // set state of boxes on change
    radios.on('change', function() {
        var target = $(this).data('target');
        $( '[data-selector=' + target + ']' ).attr( 'disabled', true );
        if( target == 0 ) {
            $( '[data-selector=1]' ).attr( 'disabled', false );
        } else if( target == 1) {
            $( '[data-selector=0]' ).attr( 'disabled', false );
        }
    });
});
