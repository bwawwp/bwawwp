$.ajax( {
    url: apiSettings.root + 'wp/v2/posts/1',
    method: 'POST',
    beforeSend: function ( xhr ) {
        xhr.setRequestHeader( 'X-WP-Nonce', apiSettings.nonce );
    },
    data:{
        'title' : 'Hello World'
    }
} ).done( function ( response ) {
    console.log( response );
} );