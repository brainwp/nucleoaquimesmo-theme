<?php get_header(); ?>

		<div id="primary" class="content-area">
			<div id="content" class="site-content content-projetos" role="main">
            
         <?php
		//Pega o CPT
		$post_type_obj = get_post_type_object('agenda');
		//Pega o Título do CPT
		$title_agenda = apply_filters('post_type_archive_title', $post_type_obj->labels->name );
		?>
            
            <article id="post-<?php the_ID(); ?>" <?php post_class( 'content-projetos' ); ?>>
                <header class="entry-header">
                    <h2 class="entry-title"><?php echo $title_agenda; ?></h2>
                </header><!-- .entry-header -->
            
                <div class="entry-content">
                   
             <?php
			/* $paged é a variável para paginação do Loop CPT Projetos */
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

			/* $args_loop_cpt_projetos são os argumentos para o Loop */
			$args_loop_cpt_agenda = array(
				'post_type' => 'agenda',
				"meta_key" => "agenda-event-date", // Campo da Data do Evento
				"orderby" => "meta_value", // This stays as 'meta_value' or 'meta_value_num' (str sorting or numeric sorting)
				"order" => "DESC",
				'paged' => $paged,
			);
		
			$loop_cpt_agenda = new WP_Query( $args_loop_cpt_agenda ); if ( $loop_cpt_agenda->have_posts() ) {
			while ( $loop_cpt_agenda->have_posts() ) : $loop_cpt_agenda->the_post();

			?>

					<div class="cada-agenda-archive <?php echo $ag_final_class; ?>">
					
                    <div class="esquerda-agenda-archive">
						<div class="mes-agenda-archive">
							<?php ag_mes(); ?>
						</div><!-- .mes-agenda-archive -->

						<div class="dia-agenda-archive">
							<?php ag_dia(); ?>
						</div><!-- .dia-agenda-archive -->

						<div class="ano-agenda-archive">
							<?php ag_ano(); ?>
						</div><!-- .ano-agenda-archive -->
					
						<?php ag_horario(); ?>
                        
   						<div class="mais-agenda-archive">
							<a href="<?php ag_permalink(); ?>">Mais</a>
						</div><!-- .mais-agenda-archive -->

					</div><!-- .esquerda-agenda-archive -->
                    

					<div class="direita-agenda-archive">
						<div class="thumb-agenda-archive">
							<a href="<?php ag_permalink(); ?>"><?php ag_thumbnail( 'medium' ); ?></a>
						</div><!-- .thumb-agenda-archive -->

						<div class="titulo-agenda-archive">
							<span><a href="<?php ag_permalink(); ?>"><?php ag_titulo(); ?></a></span>
						</div><!-- .titulo-agenda-archive -->



					</div><!-- .direita-agenda-archive -->

					<div class="">
					</div><!--  -->

					</div><!-- .cada-agenda-archive -->
                  
                <?php
                // Fim do Loop
				endwhile;
				}
				?>
                   
                </div><!-- .entry-content -->
                <footer class="entry-meta">
                    <?php edit_post_link( __( 'Edit', 'twentyeleven' ), '<span class="edit-link">', '</span>' ); ?>
                </footer><!-- .entry-meta -->
            </article><!-- #post-<?php the_ID(); ?> -->
            			
                <?php if (function_exists( 'wp_pagenavi' )) { wp_pagenavi(array( 'query' => $loop_cpt_agenda )); } ?>
            
			</div><!-- #content .site-content -->
		</div><!-- #primary .content-area -->

<?php get_footer();?>