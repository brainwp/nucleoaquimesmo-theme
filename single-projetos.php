<?php
if ( $post->post_parent == '179' ) {
	get_header( 'feira' );
}
elseif (is_single( 'de-segunda-a-sexta-feira' )) {
	get_header( 'feira' );
}
else {
	get_header( 'projetos' );
}
?>

<?php
if ( $post->post_parent == '179' ) {
	get_template_part( 'part-feira' );
}
elseif (is_single( 'de-segunda-a-sexta-feira' )) {
	get_template_part( 'part-feira' );
}
else {
	get_template_part( 'part-projetos' );
}
?>

<?php
if ( $post->post_parent == '179' ) {
	get_footer( 'feira' );
}
elseif (is_single( 'de-segunda-a-sexta-feira' )) {
	get_footer( 'feira' );
}
else {
	get_footer();
}
?>
