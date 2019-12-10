<?php
/**
 * Template part for displaying ASIDE posts
 * Estou utilizando para exibir AULAS!
 */

?>
<!-- content-aside.php -->

<?php
	//Metadados da aula
	//Turma | Módulo | Aula
	$meta 				= "";
	$add_class 		= "";
	$add_header		= "";

	//Número da unidade
	$terms = get_post_custom_values( 'unidade', $post->ID );
	if ( $terms && ! is_wp_error( $terms ) ) {
		$theterm	= array();
		foreach ( $terms as $term ) {
			$theterm[] = $term;
			$unidade = join( " ", $theterm );
		}
	}
	if (strlen($unidade) == 1) { $unidade = "0".$unidade; }

	//Número da aula
	$terms = get_post_custom_values( 'aula', $post->ID );
	if ( $terms && ! is_wp_error( $terms ) ) {
		$theterm	= array();
		foreach ( $terms as $term ) {
			$theterm[] = $term;
			$aulanum = join( " ", $theterm );
		}
	}
	if (strlen($aulanum) == 1) { $aulanum = "0".$aulanum; }

	//Primeiro loop: série
	$terms	= get_the_terms( $post->ID, 'post_tag' );
	if ( $terms && ! is_wp_error( $terms ) ) {
		$tag		= array();
		$tag_link	= array();
		$tags		= array();
		$tags_link	= array();
		foreach ( $terms as $term ) {
			$handle = $term->slug;
			if ( strpos( $handle, 'serie' ) !== false ) {
				$tag[] = $handle;
				$tag_link[] = '<span class="foo-btn label-' . $term->slug . '"><a href="'. get_term_link($term->slug, 'post_tag') .'" title="'. $term->name .'">' . $term->name . '</a></span> ';
			}
		}
		$tags = join( " ", $tag );
		$tags_link = join( " ", $tag_link );
	}
	$add_header	.= $tags_link . " | ";

	//Segundo loop: tópico
	$terms = get_post_custom_values( 'topico', $post->ID );
	if ( $terms && ! is_wp_error( $terms ) ) {
		$modulo	= array();
		foreach ( $terms as $term ) {
			$modulo[] = '<span class="foo-btn label-' . $term. '">Módulo '. $unidade .': ' . $term . '</span> ';
		$modules = join( " ", $modulo );
	}
	$add_header	.= $modules . " | ";
	}

	//Terceiro loop: categoria (aula)
	$terms	= get_the_terms( $post->ID, 'category' );
	if ( $terms && ! is_wp_error( $terms ) ) {
		$cat = array();
		$category = array();
		foreach ( $terms as $term ) {
			$cat[] = $term->slug;
			$category[] = '<span class="foo-btn label-' . $term->slug . '"><a href="'. get_term_link($term->slug, 'category') .'" title="'. $term->name .'">' . $term->name .' '. $aulanum . '</a></span> ';
		}
		$categories = join( " ", $category );
	}
	$add_header	.= $categories;
	$add_class	.= 'article-cat-'.$cat[0];

	//Quarto loop: tags
	$terms = get_the_terms( $post->ID, 'post_tag' );
	if ( $terms && ! is_wp_error( $terms ) ) {
		$tag = array();
		foreach ( $terms as $term ) {
			$tag[] = '<span class="label light"><a href="'. get_term_link($term->slug, 'post_tag') .'" title="'. $term->name .'">' . $term->name . '</a></span>';
		}
		$tags = join( " ", $tag );
	}

	//URLs para svg e pdf
	$url 			= "/wp-content/uploads/aulas/" . $unidade . "/aula_" . $aulanum;
  $url_pdf 	= $url . ".pdf";
	$url_svg 	= $url . ".svg";

	//Material extra
	$terms = get_post_custom_values( 'material_extra', $post->ID );
	if ( $terms && ! is_wp_error( $terms ) ) {
		$theterm	= array();
		foreach ( $terms as $term ) {
			$theterm[] = $term;
			$material_extra = join( " ", $theterm );
		}
	}

	//Painel de ajuda
	$terms = get_post_custom_values( 'ajuda_aulas', $post->ID );
	if ( $terms && ! is_wp_error( $terms ) ) {
		$theterm	= array();
		foreach ( $terms as $term ) {
			$theterm[] = $term;
			$ajuda_aulas = join( " ", $theterm );
		}
	}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php
	if ( is_sticky() && is_home() ) :
		echo twentyseventeen_get_svg( array( 'icon' => 'thumb-tack' ) );
	endif;
	?>

	<header class="entry-header">
		<div class="entry-meta"><?php
			//Série | Módulo | Aula
			echo $add_header;
		?></div>

		<?php
			//Título da aula
			the_title( '<h1 class="entry-title">', '</h1>' );
		?>
	</header><!-- .entry-header -->

	<section id="jessy-content">
	<?php
		//Verifica se existe video associado à aula
		$terms = get_post_custom_values( 'videoaula', $post->ID );
		if ( $terms && ! is_wp_error( $terms ) ) {

			$theterm	= array();
			foreach ( $terms as $term ) {
				$theterm[] = $term;
				$videoaula = join( " ", $theterm );
			} ?>
			<article class="youtube video">
				<iframe width="780" height="585" src="<?php echo $videoaula; ?>"></iframe>
			</article>
	<?php } else { 	?>
			<article class="jessy">
				<iframe width="740" height="555" src="<?php echo $url_svg; ?>" class="attachment-twentyseventeen-featured-image size-twentyseventeen-featured-image wp-post-image"></iframe>
				<!--<div class="single-featured-image-header">
					<img width="740" height="555" src="<?php echo $url_svg; ?>" class="attachment-twentyseventeen-featured-image size-twentyseventeen-featured-image wp-post-image" />
				</div>-->
			</article>
	<?php } ?>
	</section>

	<input id="tab1" type="radio" name="tabs" checked>
  <label for="tab1">Resumo</label>

  <input id="tab2" type="radio" name="tabs">
  <label for="tab2">Ajuda</label>

  <input id="tab3" type="radio" name="tabs">
  <label for="tab3">Download</label>

	<section id="content1" class="entry-content tab-content">
		<?php
		/* translators: %s: Name of current post */
		the_content( sprintf(
			__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'twentyseventeen' ),
			get_the_title()
		) );

		wp_link_pages( array(
			'before'      => '<div class="page-links">' . __( 'Pages:', 'twentyseventeen' ),
			'after'       => '</div>',
			'link_before' => '<span class="page-number">',
			'link_after'  => '</span>',
		) );
		?>

		<?php echo do_shortcode($material_extra); ?>
	</section><!-- .entry-content -->

	<section id="content2" class="entry-content tab-content">
		<h3>Como faço para utilizar os slides?</h3>
		<p>Para "navegar" entre os slides da apresentação, você pode usar seu mouse, seu teclado ou, caso esteja visualizando num tablet ou smartphone, usar toques na tela, deslizando com o dedo. Para tanto, basta dar o primeiro toque (ou clique) na área de apresentação e começar sua navegação.</p>
		<h4>Teclado</h4>
		<ul>
			<li><strong>Direita</strong>: avança um passo</li>
			<li><strong>Esquerda</strong>: retorna um passo</li>
			<li><strong>Cima</strong>: retorna ao início do slide</li>
			<li><strong>Baixo</strong>: avança para o fim do slide</li>
			<li><strong>Home</strong>: primeiro slide</li>
			<li><strong>End</strong>: último slide</li>
			<li><strong>i</strong>: índice de visualização de vários slides</li>
		</ul>
		<h4>Mouse</h4>
		<ul>
			<li><strong>Clique</strong>: avança um passo</li>
			<li><strong>Scroll down</strong>: avança um passo</li>
			<li><strong>Scroll up</strong>: retorna um passo</li>
		</ul>
		<h4>Toques (tablet ou smartphone)</h4>
		<ul>
			<li>Um <strong>toque</strong> na tela: avança um passo</li>
			<li>Deslizar o dedo para a <strong>esquerda</strong>: avança um passo</li>
			<li>Deslizar o dedo para a <strong>direta</strong>: retorna um passo</li>
			<li>Deslizar o dedo para <strong>baixo</strong>: retorna ao início do slide</li>
			<li>Deslizar o dedo para <strong>cima</strong>: avança para o fim do slide</li>
		</ul>
	</section>

	<section id="content3" class="entry-content tab-content">
		<h3>Baixar arquivos</h3>
		<p>
			Os arquivos estão sob uma <strong>licença CC-BY-NC-SA 3.0</strong>.
			Você pode utilizá-los para estudos ou modificá-los para utilizar em suas
			aulas, palestras, etc.
			<a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/4.0/" target="_blank">Entenda mais sobre essa licença.</a>
		</p>
		<ul>
			<li class="btn icon-file-pdf"><a href="<?php echo $url_pdf; ?>" target="_blank">Baixar versão pdf</a></li>
			<li class="btn icon-file-svg"><a href="<?php echo $url_svg; ?>" target="_blank">Baixar arquivo original</a></li>
		</ul>
	</section>

	<?php
	if ( is_single() ) {
		twentyseventeen_entry_footer();
	}
	?>

</article><!-- #post-<?php the_ID(); ?> -->
