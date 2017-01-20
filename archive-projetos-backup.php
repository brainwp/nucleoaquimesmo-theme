<?php get_header( 'projetos' ); ?>

		<div id="primary" class="content-area">
			<div id="content" class="site-content content-projetos" role="main">
			
            <h2 class="title-projetos">Projetos</h2>

			<ul id="gallery" class="clearfix">
				
			<?php
			/* $page é a variável para paginação do Loop CPT Projetos */
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

			/* $args_loop_cpt_projetos são os argumentos para o Loop */
			$args_loop_cpt_projetos = array(
				'post_type' => 'projetos',
				'orderby' => 'date',
				'order' => 'DESC',
				/*'posts_per_page' => '5',*/
				'paged' => $paged,
			'post_parent' => 0
			);
		
			$loop_cpt_projetos = new WP_Query( $args_loop_cpt_projetos ); if ( $loop_cpt_projetos->have_posts() ) {

			while ( $loop_cpt_projetos->have_posts() ) : $loop_cpt_projetos->the_post();
			?>

                <div class="cada-projeto-archive">
                    <div class="titulo-cada-projeto-archive">
                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    </div><!-- .titulo-cada-projeto-archive -->

                    <div class="thumb-projetos-archive">
					<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'projetos' ); ?></a>
                    </div><!-- .thumb-projetos-archive -->
                </div><!-- .cada-projeto-archive -->
                <?php
                // Fim do Loop
				endwhile;
				}
				?>
                <?php if (function_exists( 'wp_pagenavi' )) { wp_pagenavi(array( 'query' => $loop_cpt_projetos )); } ?>
            </ul>
            
			</div><!-- #content .site-content -->
		</div><!-- #primary .content-area -->

<?php get_footer();?>