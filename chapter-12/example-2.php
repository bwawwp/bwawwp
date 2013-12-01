<?php
// Only turn this on in the backend
add_action( 'admin_init', 'sp_register_meta_directions' );

// Add Directions Meta Box
function sp_register_meta_directions() {
    add_meta_box( 
        'sp-directions-meta', 
        'Address Information', 
        'sp_directions_meta_box', 
        'post', 
        'normal', 
        'high' 
    );
    add_action( 'save_post', 'sp_directions_save_meta' );
}

// Meta Box
function sp_directions_meta_box( $post='' ) {
    // Get curretn post ID
    $post_id = $post->ID;
    // Get pos meta data if exists
    $sp_directions_address = get_post_meta( $post_id, '_sp_directions_address', true );
    $sp_directions_latitude = get_post_meta( $post_id, '_sp_directions_latitude', true );
    $sp_directions_longitude = get_post_meta( $post_id, '_sp_directions_longitude', true );
    // Output text box to collect any address?>
    <input type="text" 
        id="sp_directions_address" 
        name="sp_directions_address" 
        value="<?php echo $sp_directions_address;?>" 
        size="60" />
    *123 Main St, New York, NY
    <input type="hidden" 
        id="sp_directions_latitude" 
        name="sp_directions_latitude" 
        value="<?php echo $sp_directions_latitude;?>"/>
    <input type="hidden" 
        id="sp_directions_longitude" 
        name="sp_directions_longitude" 
        value="<?php echo $sp_directions_longitude;?>"/>
    <?php // Javascript for the Map?>
    <script type="text/javascript" 
        src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <script type="text/javascript">
    // sets the hidden text boxes for lat & lng to the lat & lng of the dragged
    // and dropped marker
    function updateMarkerPosition(latLng) {
    document.getElementById('sp_directions_latitude').value = latLng.lat();
    document.getElementById('sp_directions_longitude').value = latLng.lng();
    }

    // initialize the Google map
    function sp_map_initialize() {
    var map = new google.maps.Map(document.getElementById("map_canvas"), {
    scaleControl: true});
    var bounds = new google.maps.LatLngBounds();
    map.setMapTypeId(google.maps.MapTypeId.HYBRID);

    var myLatLng = new google.maps.LatLng(
        <?php echo $sp_directions_latitude;?>,
        <?php echo $sp_directions_longitude;?>
    );
    bounds.extend(myLatLng);

    var marker<?php echo $post_id;?> = new google.maps.Marker(
        {map: map, draggable: true, position:
    new google.maps.LatLng(
        <?php echo $sp_directions_latitude;?>,
        <?php echo $sp_directions_longitude;?>)});

    google.maps.event.addListener(marker<?php echo $post_id;?>, 'dragend', function() {
      updateMarkerPosition(marker<?php echo $post_id;?>.getPosition());
    });

    map.fitBounds(bounds);
    }

    setTimeout("sp_map_initialize()",10);
    </script>
    <div id="map_canvas" style="height:300px;width:100%;"></div>
    <?php
}

// Save Data
function sp_directions_save_meta( $post_id ) {
    $address=strip_tags( $_POST['sp_directions_address'] );
    $lat=strip_tags( $_POST['sp_directions_latitude'] );
    $lng=strip_tags( $_POST['sp_directions_longitude'] );
    if ( $address != get_post_meta( $post_id, '_sp_directions_address', 1 ) ) {
        sp_get_lat_lng( $post_id, $address );
    }elseif ( $lat ) {
        update_post_meta( $post_id, '_sp_directions_latitude', $lat );
        update_post_meta( $post_id, '_sp_directions_longitude', $lng );
    }
}


// Get lat & lng from address and update post meta
function sp_get_lat_lng( $post_id, $address ) {
    global $wpdb, $bp;
    if ( $address ) {
        // Get GeoLocattion data from Google by passin in an address
        $url = 'http://maps.googleapis.com/maps/api/geocode/json';
        $g_address = $url . '?sensor=true&address='.urlencode( $address );
        $g_address = wp_remote_get( $g_address );
        $g_address = $g_address["body"];
        $g_address = json_decode( $g_address );
        $lat = $g_address->results[0]->geometry->location->lat;
        $lng = $g_address->results[0]->geometry->location->lng;

        /*
        // Uncomment if you want to see the raw JSON response
        echo '<pre>';
        print_r($g_address);
        echo '</pre>';
        exit();
        */

        // update post meta for lat and lng
        update_post_meta( $post_id, '_sp_directions_latitude', $lat );
        update_post_meta( $post_id, '_sp_directions_longitude', $lng );
    }else {
        // if no address then delete post meta
        delete_post_meta( $post_id, '_sp_directions_latitude' );
        delete_post_meta( $post_id, '_sp_directions_longitude' );
    }
}
?>