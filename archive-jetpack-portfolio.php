<?php
/**
 * Exibe a página de aulas (lista de todas as aulas do site).
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header('portfolio'); ?>

<!-- page-aulas.php -->

<?php
	/* * *
	 * LISTÃO DE TODAS AS AULAS DO MALANDRAUM
	 * Faz o loop com todos os posts da categoria 'aula',
	 * armazena num array $aula, pra ser posteriormente
	 * utilizado num foreach (painéis de aulas).
	 */

	$args = array(
		'post_type'			 	=> 'jetpack-portfolio',
		'posts_per_page' 	=> -1,
		'meta_key'				=> 'unidade',
		'orderby'					=> 'meta_value_num',
		'order'						=> 'ASC'
	);
	$aula 	= array();
	$topico	= array();
	$loop = new WP_Query( $args );
	if ( $loop->have_posts() ) :
		while ( $loop->have_posts() ) : $loop->the_post();
			$get_u 	= get_post_meta( $post->ID , 'unidade' );		$u = $get_u[0];
			$get_t 	= get_post_meta( $post->ID , 'topico' );		$t = $get_t[0];
			$get_a	= get_post_meta( $post->ID , 'aula' );			$a = $get_a[0];
			$get_v	= get_post_meta( $post->ID , 'videoaula' );	$v = $get_v[0];
			if (strlen($u) == 1) { $u = "0".$u; }
			if (strlen($a) == 1) { $a = "0".$a; }
			if ($v == "" ) {
				$tipo = "canvas";
			} else {
				$tipo = "eduvideo";
			}

			$aula[$u][$a]	= array(
				'link'		=> get_the_permalink(),
				'title'		=> get_the_title(),
				'topico'	=> $t,
				'tipo' 		=> $tipo
			);
			$topico[$u]		= $t;
		endwhile;
	endif;
?>

<div class="wrap">
	<div id="primary" class="content-area">
		<main id="main" class="site-main page-aulas" role="main">

			<!-- Texto para descrever esta seção aqui -->

			<input id="tab1" type="radio" name="tabs" checked>
		  <label for="tab1">Índice geral</label>

			<input id="tab2" type="radio" name="tabs">
		  <label for="tab2">1ª série</label>

		  <input id="tab3" type="radio" name="tabs">
		  <label for="tab3">2ª série</label>

		  <input id="tab4" type="radio" name="tabs">
		  <label for="tab4">3ª série</label>

			<input id="tab5" type="radio" name="tabs">
		  <label for="tab5">Extras</label>

			<?php
				//Índice geral
				$esq = array(1,2,3,4,5,6);
				$dir = array(7,8,9,10,11,12);
				lista_aulas_top(1, $esq, $dir, $aula, $topico);

				//1a serie
				$esq = array(1,2,3);
				$dir = array(4,5);
				lista_aulas_top(2, $esq, $dir, $aula, $topico);

				//2a serie
				$esq = array(6,8);
				$dir = array(7);
				lista_aulas_top(3, $esq, $dir, $aula, $topico);

				//3a serie
				$esq = array(9);
				$dir = array(10);
				lista_aulas_top(4, $esq, $dir, $aula, $topico);

				//Extras
				$esq = array(11);
				$dir = array(12);
				lista_aulas_top(5, $esq, $dir, $aula, $topico);
			 ?>

		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .wrap -->

<?php get_footer(); ?>
