<?php

// Adiciona uma nova coluna a listagem (WP-ADMIN) de Eventos da Agenda
	function nova_coluna_agenda ( $agenda_columns ) {
		$new_columns['cb'] = '<input type="checkbox" />';
		$new_columns['title'] = _x('Titulo', 'column name');
		$new_columns['source'] = __('Data do Evento');
		return $new_columns;
	}
	add_filter( 'manage_edit-agenda_columns', 'nova_coluna_agenda' );
// Fim


// Content da nova coluna de listagem (WP-ADMIN) de Eventos da Agenda
	function content_nova_coluna_agenda ( $column_name, $id ) {
		global $post;
		switch ($column_name) {
			case 'source':
				$data_invert = get_post_meta( $post->ID , 'agenda-event-date' , true );
				$data_explo = explode("/", $data_invert);
				echo
				'<span style="font-size:15px;">' .
				$data_explo[2]
				. "." .
				$data_explo[1]
				. "." .
				$data_explo[0]
				. '</span>';
				break;
			default:
				break;
		} // Fim switch
	}
	add_action( 'manage_agenda_posts_custom_column', 'content_nova_coluna_agenda', 10, 2 );
// Fim


// Ordena automaticamente os Eventos da Agenda de forma ascendente (ASC)
	function agenda_pre_get_posts( $query ) {
		if (is_admin()) {
	
			if (isset($query->query_vars['post_type'])) {
			   if ($query->query_vars['post_type'] == 'eventos') {
	
					$query->set('meta_key', 'agenda-event-date');
					$query->set('orderby', 'meta_value');
					$query->set('order', 'DESC');
				}
			}
		}
	}
	add_filter( 'pre_get_posts' , 'agenda_pre_get_posts' );
// Fim

// Função para imprimir o dia em dois dígitos
function ag_dia() {
	global $post;
	$ag_data = get_post_meta( $post->ID,'agenda-event-date', true );
	
	// Transforma a $ag_data em tempo
	$ag_datatime = strtotime( $ag_data );
	$ag_data_invertida = $ag_data;
	
	/* Quebra (explode) a data ($ag_data_invertida) em 3 */
	$ag_data_explode = explode("/", $ag_data_invertida);
	/* Dia */				
	echo $ag_data_explode[2];
}

// Função para imprimir o mês escrito por extenso
function ag_mes() {
	global $post;
	$ag_data = get_post_meta( $post->ID,'agenda-event-date', true );
	
	// Transforma a $ag_data em tempo
	$ag_datatime = strtotime( $ag_data );
	$ag_data_invertida = $ag_data;
	
	/* Quebra (explode) a data ($ag_data_invertida) em 3 */
	$ag_data_explode = explode("/", $ag_data_invertida);
	$ag_mes = $ag_data_explode[1];
		switch ($ag_mes){
			case 1: $ag_mes="Jan"; break;
			case 2: $ag_mes="Fev"; break;
			case 3: $ag_mes="Mar"; break;
			case 4: $ag_mes="Abr"; break;
			case 5: $ag_mes="Mai"; break;
			case 6: $ag_mes="Jun"; break;
			case 7: $ag_mes="Jul"; break;
			case 8: $ag_mes="Ago"; break;
			case 9: $ag_mes="Set"; break;
			case 10: $ag_mes="Out"; break;
			case 11: $ag_mes="Nov"; break;
			case 12: $ag_mes="Dez"; break;
			default: $ag_mes="Valor invalido"; 
		}
	/* Mês */
	echo $ag_mes;

}

// Função para imprimir o ano em quatro dígitos
function ag_ano() {
	global $post;
	$ag_data = get_post_meta( $post->ID,'agenda-event-date', true );
	
	// Transforma a $ag_data em tempo
	$ag_datatime = strtotime( $ag_data );
	$ag_data_invertida = $ag_data;
	
	/* Quebra (explode) a data ($ag_data_invertida) em 3 */
	$ag_data_explode = explode( "/", $ag_data_invertida );
	
	/* Ano */
	echo $ag_data_explode[0];
}

// Função para imprimir horário
function ag_horario() {
	global $post;
	$ag_inicio = get_post_meta( $post->ID,'agenda_horario_inic', true );
	$ag_termino = get_post_meta( $post->ID,'agenda_horario_fim', true );
	echo "<div class=\"das-agenda-archive\">";
		if (empty($ag_termino))
	echo "As " . $ag_inicio;
		else
	echo "das " . $ag_inicio;
	echo "</div><!-- .das-agenda-archive -->";

	echo "<div class=\"as-agenda-archive\">";
		if (empty($ag_termino))
	echo "";
		else
		echo "&agrave;s " . $ag_termino;
	echo "</div><!-- .as-agenda-archive -->";
}

// Função que imprime o link para o evento, deve ser usado dentro de um loop
function ag_permalink() {
	global $post;
	echo get_permalink();
}


// Função que imprime o local do evento, deve ser usado dentro de um loop
function ag_local() {
	global $post;
	$ag_local = get_post_meta( $post->ID,'agenda_local', true );
	echo $ag_local;
}
// Função que imprime o Endereço do evento, deve ser usado dentro de um loop
function ag_endereco() {
	global $post;
	$ag_endereco = get_post_meta( $post->ID,'agenda_endereco', true );
	echo $ag_endereco;
}

// Função que imprime o Bairro do evento, deve ser usado dentro de um loop
function ag_bairro() {
	global $post;
	$ag_bairro = get_post_meta( $post->ID,'agenda_bairro', true );
	echo $ag_bairro;
}

// Função que imprime a cidade do evento, deve ser usado dentro de um loop
function ag_cidade() {
	global $post;
	$ag_cidade = get_post_meta( $post->ID,'agenda_cidade', true );
	echo $ag_cidade;
}

// Função que imprime o Estado do evento, deve ser usado dentro de um loop
function ag_estado() {
	global $post;
	$ag_estado = get_post_meta( $post->ID,'agenda_estado', true );
	echo $ag_estado;
}

// Função para imprimir o thumbnail
function ag_thumbnail( $tamanho = 'thumbnail' ) {
	global $post;
	echo the_post_thumbnail( $tamanho );
}

// Função para imprimir o título
function ag_titulo() {
	echo get_the_title();
}

/*
// Adiciona um filtro aos posts da Agenda
	function agenda_admin_posts_filter_restrict_manage_posts () {
		//only add filter to post type you want
		global $post;
		if ( $post->post_type=='agenda' ){
			$values = array(
				'Todos' => 'any',
				'Futuros' => 'publish',
				'Rascunhos' => 'draft',
				'Passado' => 'passado',
			);
			?>
			
			<label><span style="margin:0 5px 0 20px;">Mostrar Eventos:</span></label>
			<select name="filter_status_post">
			<option value=""><?php _e('Filtrar por: '); ?></option>
			<?php
				$current_v = isset($_GET['filter_status_post'])? $_GET['filter_status_post']:'';
				foreach ($values as $label => $value) {
					printf
						(
							'<option value="%s"%s>%s</option>',
							$value,
							$value == $current_v? ' selected="selected"':'',
							$label
						);
					}
			?>
			</select>
			<?php
		}
	}
	add_action( 'restrict_manage_posts', 'agenda_admin_posts_filter_restrict_manage_posts' );
	*/
	/*
	function agenda_posts_filter( $query ){
		global $post;
		if ( $post->post_type=='agenda' && is_admin() && isset($_GET['filter_status_post']) && $_GET['filter_status_post'] != '') {
			$query->query_vars['post_status'] = $_GET['filter_status_post'];
		}
	}
	add_filter( 'parse_query', 'agenda_posts_filter' );
// Fim*/

/*
// Filtra a lista (WP-ADMIN) de Eventos da Agenda para mostrar apenas os eventos futuros
	function agenda_filtro_futuros ( $query ) {
		if ( isset($query->query_vars['post_type']) ) {
			if ( $query->query_vars['post_type'] == 'agenda' ) {
				if ( !isset($_GET['post_status']) )
					$query->query_vars['post_status'] = 'publish';
			}
		}
	}
	
	add_action( 'parse_query', 'agenda_filtro_futuros' );
// Fim */


?>