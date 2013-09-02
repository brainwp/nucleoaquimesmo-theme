<?php
$id_in = array_search('179', $post->ancestors);

/*179*/
if ( $post->post_parent == '179' || $id_in == 1 ) {
	get_header( 'feira' );
}
elseif (is_single( '179' )) {
	get_header( 'feira' );
}
else {
	get_header();
}
?>

<?php
if ( $post->post_parent == '179' || $id_in == 1) {
	get_template_part( 'part-feira' );
}
elseif (is_single( '179' )) {
	get_template_part( 'part-feira' );
}
else {
	get_template_part( 'part-projetos' );
}
?>

<?php
if ( $post->post_parent == '179' || $id_in >= 1) {
	get_footer( 'feira' );
}
elseif (is_single( '179' )) {
	get_footer( 'feira' );
}
else {
	get_footer();
}
?>
