<div id="primary" class="content-area">
			<div id="content" class="site-content content-interno" role="main">

			<?php while ( have_posts() ) : the_post(); ?>
			
		

                <article id="single-projetos" >
                    <div class="entry-content">

                    	<h2>
						<?php the_title(); ?>
						<?php if ( $post->post_parent ) echo '<a class="link-voltar" href="'. get_permalink( $post->post_parent ) .'"> / Voltar</a>'; ?>
                        </h2>
					

                        <?php the_content(); ?>
                        <?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'nucleoaquimesmo-theme' ), 'after' => '</div>' ) ); ?>
                        <?php edit_post_link( __( 'Clique aqui para Editar&gt;&gt;', 'nucleoaquimesmo-theme' ), '<span class="edit-link">', '</span>' ); ?>
                    </div><!-- .entry-content -->
			<?php endwhile; // end of the loop. ?>

 <?php wp_reset_postdata(); // reset the query ?>  

		<div class="entry-content">
			
	<div class="header-sub-home">
		<div class="titulo-header-noticias">
			<h2>Blog</h2>
			<span class="noticias"><a href="<?php echo home_url('/categoria/situacoes-posts'); ?>"><em>Ver todos os posts</em></a></span>
		</div>
	</div>

					<div class="todas-noticias">
					<?php $custom_query = new WP_Query('posts_per_page=2&category_name=situacoes-posts');
                 			    while($custom_query->have_posts()) : $custom_query->the_post(); ?>
                    
                  	<div class="cada-noticia">
                        
                        <div class="thumb-cada-noticia">
                        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'thumb-noticias' ); ?></a>
            		</div>
						<a class="titulo-cada-noticia" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
				<div class="clear"></div>                        
					<div class="content-cada-noticia">
						<?php limit_words(get_the_excerpt(), '20'); ?>...
			            	</div>
                        
                     		<div class="footer-cada-noticia">
                        		<div class="mais-cada-noticia"><a href="<?php the_permalink(); ?>">Leia Mais</a></div>
			        </div>
                    </div>
					<?php endwhile; ?>

				<?php get_sidebar('situacoes'); ?>
                   
				</div>

		</div><!-- .entry-content -->

                </article><!-- #single-projetos-feira -->
                
			
			</div><!-- #content .site-content -->
		</div><!-- #primary .content-area -->
