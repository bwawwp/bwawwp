<?php
$class_title_field_label = _x( 'Title', 'class title', 'schoolpress' );
$class_professor_title_field_label = _x( 'Title', 'name prefix', 'schoolpress' );
?>
<h3>Class Description</h3>
<label><?php echo $class_title_field_label; ?></label>
<input type="text" name="title" value="" />

<h3>Professor</h3>
<label><?php echo $class_professor_title_field_label; ?></label>
<input type="text" name="professor_title" value="" />