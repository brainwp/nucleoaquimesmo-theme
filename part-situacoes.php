<div id="primary" class="content-area"> 
               <article id="single-projetos">
		
			<div id="content" class="site-content with-sidebar" role="main">
	

			<?php while ( have_posts() ) : the_post(); ?>

                    	<h2>
						<?php the_title(); ?>
						<?php if ( $post->post_parent ) echo '<a class="link-voltar" href="'. get_permalink( $post->post_parent ) .'"> / Voltar</a>'; ?>
                        </h2>
					

                        <?php the_content(); ?>
                        <?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'nucleoaquimesmo-theme' ), 'after' => '</div>' ) ); ?>
                        <?php edit_post_link( __( 'Clique aqui para Editar&gt;&gt;', 'nucleoaquimesmo-theme' ), '<span class="edit-link">', '</span>' ); ?>
			<?php endwhile; // end of the loop. ?>

 			<?php wp_reset_postdata(); // reset the query ?>

			</div><!-- #content .site-content -->

	<?php get_sidebar(); ?>  
     

                </article><!-- #single-projetos-feira -->
</div><!-- #primary .content-area -->
