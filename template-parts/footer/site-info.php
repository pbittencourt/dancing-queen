<?php
/**
 * Displays footer site info
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?>
<div class="site-info">
	<p>&copy; <span class="footer-copy">2013-<?php echo date("Y"); ?></span> <span class="footer-by">por</span> <span class="footer-author"><a xmlns:cc="http://creativecommons.org/ns#" href="http://www.pedrobittencourt.com.br" property="cc:attributionName" rel="cc:attributionURL">Pedro P. Bittencourt</a></span>. <a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/4.0/deed.pt_BR">Alguns direitos reservados</a>.
	<br />Desenvolvido utilizando <a href="<?php echo esc_url( __( 'http://wordpress.org/', 'twentyseventeen' ) ); ?>" title="<?php esc_attr_e( 'Semantic Personal Publishing Platform', 'twentyseventeen' ); ?>"><?php printf( __( '%s', 'twentyseventeen' ), 'WordPress' ); ?></a>
	e <a href="https://sass-lang.com/">SASS</a>. Code is love <3
	</p>
</div><!-- .site-info -->
