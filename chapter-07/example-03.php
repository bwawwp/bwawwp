<?php
global $post;
$sidebar_content = $post->sidebar_content;
?>
<div class="post">
  <?php the_content(); ?>
</div>
<div class="sidebar">
  <?php
    //echo do_shortcode($sidebar_content);
    echo apply_filters('the_content', $sidebar_content);
  ?>
</div>