<?php
	$id_in = array_search('179', $post->ancestors);
	$id_2 = array_search('660', $post->ancestors);
	$id_situacoes = get_the_id();
	
	/*179*/
	if ( $post->post_parent == '179' || $id_in == 179 ) {
		get_header( 'feira' );
	}
	elseif (is_single( '179' )) {
		get_header( 'feira' );
	}
	elseif ($post->post_parent == '660' || $id_2 == 660) {
		get_header( 'situacoes' );
	}
	elseif ($id_situacoes == '660') {
		get_header( 'situacoes' );
	}
	else {
		get_header();
	}
?>

<?php
	if ( $post->post_parent == '179' || $id_in == 179) {
		get_template_part( 'part-feira' );
	}
	elseif (is_single( '179' )) {
		get_template_part( 'part-feira' );
	}
	elseif ($post->post_parent == '660' || $id_2 == 660) {
		get_template_part( 'part-situacoes' );
	}
	elseif ($id_situacoes == '660') {
		get_template_part( 'part-situacoes-home' );
	}

	else {
		get_template_part( 'part-projetos' );
	}
	?>

<?php
	if ( $post->post_parent == '179' || $id_in >= 179) {
		get_footer( 'feira' );
	}
	elseif (is_single( '179' )) {
		get_footer( 'feira' );
	}

	elseif ($post->post_parent == '660' || $id_2 == 660) {
		get_footer( 'situacoes' );
	}
	elseif ($id_situacoes == '660') {
		get_footer( 'situacoes' );
	}
	else {
		get_footer();
	}
?>
