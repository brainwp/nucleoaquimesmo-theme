<?php
/**
 * Template Name: Projetos Nucleo
 */

get_header( 'home' ); ?>

<div id="logo-home">
</div><!-- #logo-home -->

<?php while ( have_posts() ) : the_post(); ?>

<div id="thumb-home" <?php thumbnail_bg(); ?>></div>

<div class="hack"></div>

	<div id="content-home"><?php the_content(); ?></div>
    
    <div id="single-navigation">
    <?php
      if( $post->post_parent )
      $children = wp_list_pages( "post_type=projetos&title_li=&child_of=".$post->post_parent."&echo=0" );
      else
      $children = wp_list_pages( "post_type=projetos&title_li=&child_of=".$post->ID."&echo=0" );
      if ( $children ) { ?>
      <ul>
      <?php echo $children; ?>
      </ul>
    <?php } ?>
    </div><!-- #single-navigation -->

<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>