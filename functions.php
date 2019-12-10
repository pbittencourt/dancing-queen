<?php

//esse codigo veio do plugin que utilizei para 'instalar' o child-theme.
//mas nao carregou o MEU style.css, apenas o do tema.
//ou seja, desativei e coloquei o codigo a seguir.
//mantendo aqui por uma questão de documentação e revisão futura.
/*function theme_enqueue_styles() {
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
    wp_enqueue_style('child-style', get_stylesheet_directory_uri() . '/style.css', array($parent_style));
}
add_action('wp_enqueue_scripts', 'theme_enqueue_styles');*/

//o mesmo que acima.
//source: https://kinsta.com/blog/twenty-seventeen-theme
function childtheme_enqueue_styles() {
  wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );

  wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css',
    array( 'parent-style' ),
    wp_get_theme()->get('Version')
  );
}
add_action( 'wp_enqueue_scripts', 'childtheme_enqueue_styles' );

/*  ========================================  */

/*  Registra mais menus (topo página inicial e CV)
    ======================================== */
    register_nav_menus( array(
      'top-front'    => __( 'Top Menu Front', 'twentyseventeen' ),
      'menu-cv'    => __( 'Menu CV', 'twentyseventeen' ),
    ) );

/*  Registra mais um tipo de formato de post
    ======================================== */
    //add_theme_support( 'post-formats', array(
  		//'aula',   //NÃO FUNCIONA!!!
      /* POST SCRIPTUM: não funcionaria mesmo, pois não é essa a proposta. A lista
      de post-formats é PADRONIZADA e não é possível CRIAR um novo tipo. Uma pena.
      Aguardando novas atualizações )': */
  	//) );

/*  Adiciona suporte a excerpt em páginas
    ======================================== */
    add_post_type_support( 'page', 'excerpt' );

/*  Adiciona mais seções na página inicial
    ========================================  */
    /*add_filter( 'twentyseventeen_front_page_sections', 'prefix_custom_front_page_sections' );
    function prefix_custom_front_page_sections( $num_sections )
    {
      return 6;
    }*/
    add_filter( 'twentyseventeen_front_page_sections', function(){ return 6; } );

/*  Exibe aulas dentro de um módulo
    ======================================== */
    function lista_aulas($list, $aula, $topico) {
      foreach ($aula as $key => $unidade) {
        if (in_array($key, $list)) {
          echo "<h5 class='module module-". $key."'>Unidade " . $key . ": " . $topico[$key] . "</h5><ul class='aula-icons'>";
          ksort($unidade);
          foreach ($unidade as $key => $contents) {
            $titulo = $contents['title'];
            $url		= $contents['link'];
            $topic	= $contents['topico'];
            $classe	= $contents['tipo'];

            echo "<li class='$classe'>Aula $key: <a title='$topic &ndash $titulo' href='$url'>$titulo</a></li>";

          }
          echo "</ul>";
        }
      }
    }

    function lista_aulas_top($id, $esq, $dir, $aula, $topico) {
      echo "<section id='content$id' class='tab-content pure-g'><div class='pure-u-1 pure-u-md-1-2'> \n";
      //Painel da esquerda
      foreach ($aula as $key => $unidade) {
        if (in_array($key, $esq)) {
          echo "<h5 class='module module-". $key."'>Unidade " . $key . ": " . $topico[$key] . "</h5><ul class='aula-icons'> \n";
          ksort($unidade);
          foreach ($unidade as $key => $contents) {
            $titulo = $contents['title'];
            $url		= $contents['link'];
            $topic	= $contents['topico'];
            $classe	= $contents['tipo'];

            echo "<li class='$classe'>Aula $key: <a title='$topic — $titulo' href='$url'>$titulo</a></li> \n";

          }
          echo "</ul> \n";
        }
      }

      echo "</div><div class='pure-u-1 pure-u-md-1-2'> \n";
      //Painel da direita
      foreach ($aula as $key => $unidade) {
        if (in_array($key, $dir)) {
          echo "<h5 class='module module-". $key."'>Unidade " . $key . ": " . $topico[$key] . "</h5><ul class='aula-icons'> \n";
          ksort($unidade);
          foreach ($unidade as $key => $contents) {
            $titulo = $contents['title'];
            $url		= $contents['link'];
            $topic	= $contents['topico'];
            $classe	= $contents['tipo'];

            echo "<li class='$classe'>Aula $key: <a title='$topic — $titulo' href='$url'>$titulo</a></li> \n";

          }
          echo "</ul> \n";
        }
      }

      echo "</div></section> \n";

    }

/*  Adiciona alguns labels que descrevem itens de aulas
    ======================================== */
    function label_shortcode( $atts, $content = null ) {
        $a = shortcode_atts( array(
            'c' => 'info',
            't' => 'Info'
        ), $atts );

    		$text		= $a['t'];
    		$class	= $a['c'];

    		/*switch ($class) {
    			case 'video':
    				$icon = 'video';    //f1c8
    				break;
    			case 'texto':
    				$icon = 'docs';     //f0f6 ou f15c
    				break;
    			case 'animacao':
    				$icon = 'star';     //f006
    				break;
    			case 'podcast':
    				$icon = 'podcast';     //f1c7
    				break;
    			case 'musica':
    				$icon = 'musica';     //f1c7
    				break;
    			case 'exercicios':
    				$icon = 'doc-text'; //f016
    				break;
    			case 'galeria':
    				$icon = 'picture';  //f1c5
    				break;
    			case 'livro':
    				$icon = 'book';     //f02d
    				break;
          case 'book':
    				$icon = 'book';     //f02d
    				break;
    			case 'download':
    				$icon = 'download'; //f019
    				break;
    			default:
    				$icon = 'info';     //f05a ou f129
    				break;
    		}*/

    		return '<span class="label icon-' . $class . '">' . $text . '</span> '. $content;
    }
    add_shortcode( 'label', 'label_shortcode' );

/*  Adaptação de 'entry_footer' para posts do portfolio
    ======================================== */
    if ( ! function_exists( 'entry_footer_portfolio' ) ) :
    /**
     * Prints HTML with meta information for the categories, tags and comments.
     */
    function entry_footer_portfolio($type="", $tags="") {

    	/* translators: used between list items, there is a space after the comma */
    	$separate_meta = __( ', ', 'twentyseventeen' );

    	// Get Categories for posts.
      $categories_list = implode(", ", $type);

    	// Get Tags for posts.
      $tags_list = implode(", ", $tags);

  		echo '<footer class="entry-footer">';

  			if ( 'jetpack-portfolio' === get_post_type() ) {
  				if ( $categories_list  || $tags_list ) {
  					echo '<span class="cat-tags-links">';

  						// Make sure there's more than one category before displaying.
  						if ( $categories_list ) {
  							echo '<span class="cat-links">' . twentyseventeen_get_svg( array( 'icon' => 'folder-open' ) ) . '<span class="screen-reader-text">' . __( 'Categories', 'twentyseventeen' ) . '</span>' . $categories_list . '</span>';
  						}

  						if ( $tags_list ) {
  							echo '<span class="tags-links">' . twentyseventeen_get_svg( array( 'icon' => 'hashtag' ) ) . '<span class="screen-reader-text">' . __( 'Tags', 'twentyseventeen' ) . '</span>' . $tags_list . '</span>';
  						}

  					echo '</span>';
  				}
  			}

  			twentyseventeen_edit_link();

    		echo '</footer> <!-- .entry-footer -->';
    }
    endif;

/*  Adiciona texto padrão aos posts de podcast
    ======================================== */
    function insert_default_body_content( $content ) {
        global $post_type;
        switch ( $post_type ) {
            case 'podcast':
                $content = "
                <h3>Referências citadas no programa:</h3>
                <ul>
                  <li></li>
                </ul>
                <h3>Músicas utilizadas no programa:</h3>
                <ul>
                  <li><em>Running Waters</em> de <strong>Audionautix</strong> está licenciada sob uma licença Creative Commons Attribution (<a href='https://creativecommons.org/licenses/by/4.0/'>https://creativecommons.org/licenses/by/4.0/</a>) Artista: <a href='http://audionautix.com/'>http://audionautix.com/</a></li>
                </ul>
                <h3>Entre em contato comigo!</h3>
                <ul>
                  <li>Email: <a href='mailto:ensigno@pedrobittencourt.com.br'>ensigno@pedrobittencourt.com.br</a></li>
                  <li>Medium: <a href='https://medium.com/@pedropbittencourt'>https://medium.com/@pedropbittencourt</a></li>
                  <li>Youtube: <a href='https://www.youtube.com/channel/UCy8FNEoBR1qPm7u1IlgseEg'>https://www.youtube.com/channel/UCy8FNEoBR1qPm7u1IlgseEg</a></li>
                  <li>Twitter: <a href='https://twitter.com/profebitten'>https://twitter.com/profebitten</a></li>
                  <li>Instagram: <a href='https://www.instagram.com/pedropbittencourt'>https://www.instagram.com/pedropbittencourt</a></li>
                </ul>
                <hr class='wp-block-separator'/>
                <p><strong>Ensigno</strong> é um podcast que traz reflexões pessoais sobre questões profissionais — discussões a respeito de ensino, educação e a visão de um professor sobre o mundo. Publicado três vezes por mês, nos dias de final sete. Produzido por <strong><a href='mailto:ensigno@pedrobittencourt.com.br'>Pedro P. Bittencourt</a></strong>.</p>";
                break;
        }
        return $content;
    }
    add_filter( 'default_content', 'insert_default_body_content' );
