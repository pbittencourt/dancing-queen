<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area" role="complementary">
	<?php
		if ( is_active_sidebar( 'Podcast' ) ): dynamic_sidebar( 'Podcast' );
		else:
	?>
	<div class="textwidget"><p><strong>Ensigno</strong> é um podcast que traz reflexões pessoais sobre questões profissionais — discussões a respeito de ensino, educação e a visão de um professor sobre o mundo. Publicado três vezes por mês, nos dias de final sete.</p></div>
	<div class="textwidget custom-html-widget">
		<ul class="podcast_listen_on">
			<li><a target="blank" href="https://open.spotify.com/show/11EyaADIjIsGLD1WASBuzL" class="spotify_badge" rel="noopener noreferrer"><span>Ouvir no Spotify</span></a></li>
			<li><a target="blank" href="https://podcasts.apple.com/br/podcast/ensigno/id1227315467?l=en" class="itunes_badge" rel="noopener noreferrer"><span>Ouvir no Apple Podcasts</span></a></li>
			<li><a target="blank" href="https://podcasts.google.com/?feed=aHR0cHM6Ly93d3cucGVkcm9iaXR0ZW5jb3VydC5jb20uYnIvZmVlZC9wb2RjYXN0" class="google_badge" rel="noopener noreferrer"><span>Ouvir no Google Podcasts</span></a></li>
			<li><a target="blank" href="https://overcast.fm/itunes1227315467/ensigno" class="overcast_badge" rel="noopener noreferrer"><span>Ouvir no Overcast</span></a></li>
			<li><a target="blank" href="https://castbox.fm/channel/Ensigno-id2127351?country=br" class="castbox_badge" rel="noopener noreferrer"><span>Ouvir no Castbox</span></a></li>
			<li><a target="blank" href="https://www.youtube.com/playlist?list=PLr0Ge7iESUIDa56Xr9TX3QMPkg2b8xdAu" class="youtube_badge" rel="noopener noreferrer"><span>Ouvir no Youtube</span></a></li>
			<li><a target="blank" href="http://pedrobittencourt.com.br/feed/podcast/" class="rss_badge" rel="noopener noreferrer"><span>RSS</span></a></li>
		</ul>
	</div>
	<?php endif; ?>
</aside><!-- #secondary -->
