<?php get_header('agenda'); ?>

		<div id="primary" class="content-area agenda-content">
            
         <?php
		//Pega o CPT
		$post_type_obj = get_post_type_object('agenda');
		//Pega o Título do CPT
		$title_agenda = apply_filters('post_type_archive_title', $post_type_obj->labels->name );
		?>
            
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
					
					<div id="data-evento-agenda">
					
						<div class="dia-agenda">
							<?php ag_dia(); ?>
						</div><!-- .dia-agenda-archive -->
					
						<div class="mes-agenda">
							<?php ag_mes(); ?>
						</div><!-- .mes-agenda-archive -->
					
					</div>
					<div class="horario">
						<?php ag_horario(); ?>
					</div><!-- .horario -->
					</div><!-- .esquerda-agenda-archive -->
                    

					<div class="direita-agenda-archive">

						<div class="titulo-evento">
							<span><?php ag_titulo(); ?></span>
						</div><!-- .titulo-agenda-archive -->
						
						                        
   						<div class="excerpt-evento">
							<strong><?php ag_local(); ?></strong><br />
							<?php ag_endereco(); ?><br />
							<?php ag_bairro(); ?> - <?php ag_cidade(); ?> / <?php ag_estado(); ?>
						</div><!-- .mais-agenda-archive -->




					</div><!-- .direita-agenda-archive -->

					</div><!-- .cada-agenda-archive -->
                  
                <?php
                // Fim do Loop
				endwhile;
				}
				?>
                   
                </div><!-- .entry-content -->
            			
                <?php if (function_exists( 'wp_pagenavi' )) { wp_pagenavi(array( 'query' => $loop_cpt_agenda )); } ?>
            
		</div><!-- #primary .content-area -->

<?php get_footer();?>