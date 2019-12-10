<!-- content-portfolio.php -->

<?php
	//Metadados da aula
	//Turma | Módulo | Aula
	$meta 				= "";
	$add_class 		= "";
	$add_header		= "";

	//Unidade
	$terms = get_post_custom_values( 'unidade', $post->ID );
	if ( $terms && ! is_wp_error( $terms ) ) {
		$theterm	= array();
		foreach ( $terms as $term ) {
			$theterm[] = $term;
			$unidade = join( " ", $theterm );
		}
	}
	if (strlen($unidade) == 1) { $unidade = "0".$unidade; }

	//Série
	$terms = get_post_custom_values( 'serie', $post->ID );
	if ( $terms && ! is_wp_error( $terms ) ) {
		$theterm	= array();
		foreach ( $terms as $term ) {
			$theterm[] = $term;
			$serie = join( " ", $theterm );
		}
	}
	$add_header .= $serie . " | ";

	//Tópico
	$terms = get_post_custom_values( 'topico', $post->ID );
	if ( $terms && ! is_wp_error( $terms ) ) {
		$modulo	= array();
		foreach ( $terms as $term ) {
			$modulo[] = '<span class="foo-btn label-' . $term. '">Módulo '. $unidade .': ' . $term . '</span> ';
			$modules = join( " ", $modulo );
		}
	$add_header	.= $modules . " | ";
	}

	//Aula
	$terms = get_post_custom_values( 'aula', $post->ID );
	if ( $terms && ! is_wp_error( $terms ) ) {
		$theterm	= array();
		foreach ( $terms as $term ) {
			$theterm[] = $term;
			$aulanum = join( " ", $theterm );
		}
	}
	if (strlen($aulanum) == 1) { $aulanum = "0".$aulanum; }
	$add_header .= "Aula ". $aulanum;

	//Material extra
	$terms = get_post_custom_values( 'material_extra', $post->ID );
	if ( $terms && ! is_wp_error( $terms ) ) {
		$theterm	= array();
		foreach ( $terms as $term ) {
			$theterm[] = $term;
			$material_extra = join( " ", $theterm );
		}
	}

	//Videoaula
	$terms = get_post_custom_values( 'videoaula', $post->ID );
	if ( $terms && ! is_wp_error( $terms ) ) {
		$theterm	= array();
		foreach ( $terms as $term ) {
			$theterm[] = $term;
			$videoaula = join( " ", $theterm );
		}
	}

	//Tipo e tags de projeto
	$taxonomies = get_object_taxonomies( 'jetpack-portfolio', 'objects' );
	$project = array();
	foreach ( $taxonomies as $taxonomy_slug => $taxonomy ){
			// Get the terms related to post.
			$terms = get_the_terms( $post->ID, $taxonomy_slug );

			if ( ! empty( $terms ) ) {
					++$i;
					foreach ( $terms as $term ) {
							$project[$taxonomy->label][] = $term->name;
					}
			}
	}
	$project_type = $project['Tipos de projetos'];
	$project_tags = $project['Tags de projeto'];

	//URLs para svg e pdf
	$url 			= "/wp-content/uploads/aulas/" . $unidade . "/aula_" . $aulanum;
  $url_pdf 	= $url . ".pdf";
	$url_svg 	= $url . ".svg";

	/**
	 * PEGANDO LINKS DE ARQUIVOS DIRETO DO DROPBOX
	 * Versão 0.1
	 * Última atualização: 2019-03-16
	*/

	//SVG
	$terms = get_post_custom_values( 'dropbox_svg', $post->ID );
	if ( $terms && ! is_wp_error( $terms ) ) {
		$theterm	= array();
		foreach ( $terms as $term ) {
			$theterm[] = $term;
			$dropbox_svg = join( " ", $theterm );
		}
	}

	//PDF
	$terms = get_post_custom_values( 'dropbox_pdf', $post->ID );
	if ( $terms && ! is_wp_error( $terms ) ) {
		$theterm	= array();
		foreach ( $terms as $term ) {
			$theterm[] = $term;
			$dropbox_pdf = join( " ", $theterm );
		}
	}

	//Capa
	$terms = get_post_custom_values( 'dropbox_capa', $post->ID );
	if ( $terms && ! is_wp_error( $terms ) ) {
		$theterm	= array();
		foreach ( $terms as $term ) {
			$theterm[] = $term;
			$dropbox_capa = join( " ", $theterm );
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
		if ( !empty($videoaula) ) : /*Exibe video do youtube*/ ?>

			<!-- Exibe video do youtube -->
			<article class="youtube video">
				<iframe width="904" height="509" src="<?php echo $videoaula; ?>"></iframe>
			</article>

		<?php elseif ( !empty($dropbox_capa) ) : /*Exibe somente capa*/ ?>

			<!-- Exibe capa da aula -->
			<figure class="wp-caption">
				<a href="<?php echo $dropbox_svg; ?>" target="_blank">
					<img sizes="(max-width: 767px) 89vw, (max-width: 1000px) 54vw, (max-width: 1071px) 543px, 580px" width="904" height="678" src="<?php echo $dropbox_capa; ?>" class="attachment-twentyseventeen-featured-image size-twentyseventeen-featured-image wp-post-image size-full" />
				</a>
			</figure>

		<?php else : /*Exibe svg*/ ?>

			<!-- Exibe svg -->
			<article class="jessy">
				<iframe width="904" height="678" src="<?php echo $url_svg; ?>" class="attachment-twentyseventeen-featured-image size-twentyseventeen-featured-image wp-post-image"></iframe>
			</article>

		<?php endif; ?>
	</section>

	<input id="tab1" type="radio" name="tabs" checked>
  <label for="tab1" class="tab-file">Resumo</label>

  <input id="tab2" type="radio" name="tabs">
  <label for="tab2" class="tab-help">Ajuda</label>

  <input id="tab3" type="radio" name="tabs">
  <label for="tab3" class="tab-download">Download</label>

	<section id="content1" class="entry-content tab-content">
		<?php the_content(); ?>

		<ul>
			<?php if ( !empty($dropbox_pdf) ) : /* Exibe link para pdf do dropbox */ ?>
				<li class="btn icon-file-pdf"><a href="<?php echo $dropbox_pdf; ?>" target="_blank">Baixar versão pdf</a></li>
			<?php else : /* Exibe link para pdf do servidor */ ?>
				<li class="btn icon-file-pdf"><a href="<?php echo $url_pdf; ?>" target="_blank">Baixar versão pdf</a></li>
			<?php endif; ?>

			<?php if ( !empty($dropbox_svg) ) : /* Exibe link para svg do dropbox */ ?>
				<li class="btn icon-file-svg"><a href="<?php echo $dropbox_svg; ?>" target="_blank">Baixar arquivo original</a></li>
			<?php else : /* Exibe link para svg do servidor */ ?>
				<li class="btn icon-file-svg"><a href="<?php echo $url_svg; ?>" target="_blank">Baixar arquivo original</a></li>
			<?php endif; ?>
		</ul>
		<p>
			Os arquivos estão sob uma <strong>licença CC-BY-NC-SA 3.0</strong>.
			Você pode utilizá-los para estudos ou modificá-los para utilizar em suas
			aulas, palestras, etc.
			<a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/4.0/" target="_blank">Entenda mais sobre essa licença.</a>
		</p>

		<?php
		echo '<aside class="material-extra">';
		echo do_shortcode($material_extra);
		echo '</aside>';
		?>
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
			<?php if ( !empty($dropbox_pdf) ) : /* Exibe link para pdf do dropbox */ ?>
				<li class="btn icon-file-pdf"><a href="<?php echo $dropbox_pdf; ?>" target="_blank">Baixar versão pdf</a></li>
			<?php else : /* Exibe link para pdf do servidor */ ?>
				<li class="btn icon-file-pdf"><a href="<?php echo $url_pdf; ?>" target="_blank">Baixar versão pdf</a></li>
			<?php endif; ?>

			<?php if ( !empty($dropbox_svg) ) : /* Exibe link para svg do dropbox */ ?>
				<li class="btn icon-file-svg"><a href="<?php echo $dropbox_svg; ?>" target="_blank">Baixar arquivo original</a></li>
			<?php else : /* Exibe link para svg do servidor */ ?>
				<li class="btn icon-file-svg"><a href="<?php echo $url_svg; ?>" target="_blank">Baixar arquivo original</a></li>
			<?php endif; ?>
		</ul>
	</section>

	<?php
	if ( is_single() ) {
		entry_footer_portfolio($project_type, $project_tags);
	}
	?>

</article><!-- #post-<?php the_ID(); ?> -->
