<?php
/**
 * Template Name: Home
 */

get_header( 'home' ); ?>

	<div class="topo-home">
	    <span class="site-description"><?php bloginfo( 'description' ); ?></span>
    </div><!-- .topo-home -->
    
    <div id="esquerda-home">
    
        <?php
        $resumo = get_page_by_title( 'Intro' );
        $content_resumo = apply_filters('the_content', $resumo->post_content);
        ?>
            <div class="content-resumo">
            <?php
			if (empty( $content_resumo )) {
				echo "Por favor, preencha o Intro do N&uacute;cleo Aqui Mesmo.";
			} else {
			echo $content_resumo;
			}
			?>
            </div><!-- .content-resumo -->
            
            <a class="a-mais" href="<?php echo home_url( 'nucleo-aqui-mesmo' ) ?>">
            <div class="mais">
            	<p>Mais</p>
                
            </div><!-- .mais -->
            </a>
    </div><!-- esquerda-home -->
    
    <div id="direita-home">
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("facebook")):?> <?php endif; ?>
    </div><!-- direita-home -->
    
    <div class="quebra"></div>
    
    <div id="sub-home">
    	<div class="header-projetos-home">
        	<h2><a href="<?php echo home_url('projetos'); ?>">Projetos</a></h2>
        </div><!-- .header-projetos-home -->
        <div class="loop-projetos-home">
        
         <?php
			$args_loop_cpt_projetos = array(
				'post_type' => 'projetos',
				'orderby' => 'date',
				'order' => 'DESC',
				'posts_per_page' => '3',
				'post_parent' => 0
			);
		
			$loop_cpt_projetos = new WP_Query( $args_loop_cpt_projetos ); if ( $loop_cpt_projetos->have_posts() ) {

			while ( $loop_cpt_projetos->have_posts() ) : $loop_cpt_projetos->the_post();
		?>
            <div class="cada-projeto">
            
                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('home-projetos'); ?></a>
            
                <h2><a class="titulo-resumo" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                
            </div><!-- .cada-projeto -->
                <?php endwhile;
				wp_reset_query(); }
				?>
        
        </div><!-- .loop-projetos-home -->
    </div><!-- #sub-home -->

<?php get_footer(); ?>
