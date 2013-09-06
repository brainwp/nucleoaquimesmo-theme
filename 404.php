<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package nucleoaquimesmo-theme
 */

get_header(); ?>


	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		<div id="content" class="site-content">
			<h1 class="entry-title">404</h1>
			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title"><?php _e( 'Oops! That page can&rsquo;t be found.', 'nucleoaquimesmo-theme' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content">
					<p><?php _e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'nucleoaquimesmo-theme' ); ?></p>

					<?php get_search_form(); ?>

				</div><!-- .page-content -->
			</section><!-- .error-404 -->
		</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>