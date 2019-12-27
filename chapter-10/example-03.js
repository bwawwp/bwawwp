$.ajax( {
    url: 'localhost/wp-json/wp/v2/posts/1',
    method: 'POST',
    beforeSend: function ( xhr ) {
        xhr.setRequestHeader( 'Authorization',
                              'Basic ' + btoa( username + ':' + password ) );
    },
    data:{
        'title' : 'Hello World'
    }
} ).done( function ( response ) {
    console.log( response );
} );