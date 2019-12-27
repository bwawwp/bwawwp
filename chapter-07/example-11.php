<?php
//show note widget, overriding global note
the_widget('SchoolPress_Note_Widget',  //classname
    array('note'=>''), 	               //instance vars
    array(		                       //widget vars
    	'before_widget' => '',
        'after_widget' => '',
        'before_title' => '',
        'after_title' => ''
    )
);