<div id="primary" class="content-area">
			<div id="content" class="site-content content-interno" role="main">

			<?php while ( have_posts() ) : the_post(); ?>
			
			<div id="single-navigation-feira">
				<?php

					$parent = array();
					$parent = get_post_ancestors($post->ID);
					$last =  end($parent);

					if ( $post->post_parent && count($post->ancestors) == 1 ) {
						$children = wp_list_pages( "post_type=projetos&title_li=&child_of=".$post->post_parent."&echo=0&depth=1" );
					}
					elseif ( count($post->ancestors) == 2) {
						$children = wp_list_pages( "post_type=projetos&title_li=&child_of=".$last."&echo=0&depth=1" );
					}
					else {
						 $children = wp_list_pages( "post_type=projetos&title_li=&child_of=".$post->ID."&echo=0&depth=1" );
					}

				  if ( $children ) { ?>
				  <ul>
				  <?php echo $children; ?>
				  </ul>
				<?php } ?>
			</div><!-- #single-navigation-feira -->

                <article id="single-projetos-feira" >
                    <div class="entry-content">

                    	<h2>
						<?php echo get_the_title($post->post_parent); ?> / <?php the_title(); ?>
						<?php if ( $post->post_parent ) echo '<a class="link-voltar" href="'. get_permalink( $post->post_parent ) .'"> / Voltar</a>'; ?>
                        </h2>
                        
                        	<?php if ( count($post->ancestors) == 1) echo wp_list_pages("post_type=projetos&depth=1&title_li=&child_of=".$post->ID."&echo=0"); ?>
		
                        <?php the_content(); ?>
                        <?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'celestial_theme' ), 'after' => '</div>' ) ); ?>
                        <?php edit_post_link( __( 'Clique aqui para Editar&gt;&gt;', 'celestial_theme' ), '<span class="edit-link">', '</span>' ); ?>
                    </div><!-- .entry-content -->
                </article><!-- #single-projetos-feira -->
                
			<?php endwhile; // end of the loop. ?>

			</div><!-- #content .site-content -->
		</div><!-- #primary .content-area -->