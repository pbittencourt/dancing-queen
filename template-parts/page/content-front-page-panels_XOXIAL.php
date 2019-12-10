<?php
/**
 * Template part for displaying pages on front page
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

global $twentyseventeencounter;

$section_link = array('aulas/','servicos/','podcast/','blog/','social/','contato/');
$section_text = array('Acesse','Requisite','Ouça','Leia','Siga','Escreva');
?>
<!-- content-front-page-panels.php -->

<?php if ($twentyseventeencounter=="5") : ?>

<article id="panel<?php echo $twentyseventeencounter; ?>" <?php post_class( 'twentyseventeen-panel ' ); ?> >

	<?php if ( has_post_thumbnail() ) :
		$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'twentyseventeen-featured-image' );

		// Calculate aspect ratio: h / w * 100%.
		$ratio = $thumbnail[2] / $thumbnail[1] * 100;
		?>

		<div class="panel-image" style="background-image: url(<?php echo esc_url( $thumbnail[0] ); ?>);">
			<div class="panel-image-title">
				<?php the_title( '<h2>', '</h2>' ); ?>
				<h3><span><?php echo  get_the_excerpt(); ?></span></h3>
				<p class="seemore">
					<a href="#social_media"><?php echo $section_text[$twentyseventeencounter - 1]; ?></a>
				</p>
			</div>
			<div class="panel-image-prop" style="padding-top: <?php echo esc_attr( $ratio ); ?>%"></div>
		</div><!-- .panel-image -->

	<?php endif; ?>

</article>
<article id="social_media" style="padding: 2rem 0"><!-- Redes sociais -->
	<div class="wrap">

		<?php the_content(); ?>

	</div>
</article>

<?php else: ?>

<article id="panel<?php echo $twentyseventeencounter; ?>" <?php post_class( 'twentyseventeen-panel ' ); ?> >

	<?php if ( has_post_thumbnail() ) :
		$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'twentyseventeen-featured-image' );

		// Calculate aspect ratio: h / w * 100%.
		$ratio = $thumbnail[2] / $thumbnail[1] * 100;
		?>

		<div class="panel-image" style="background-image: url(<?php echo esc_url( $thumbnail[0] ); ?>);">
			<div class="panel-image-title">
				<?php the_title( '<h2>', '</h2>' ); ?>
				<h3><span><?php echo  get_the_excerpt(); ?></span></h3>
				<p class="seemore">
					<a href="<?php echo $section_link[$twentyseventeencounter - 1]; ?>"><?php echo $section_text[$twentyseventeencounter - 1]; ?></a>
				</p>
			</div>
			<div class="panel-image-prop" style="padding-top: <?php echo esc_attr( $ratio ); ?>%"></div>
		</div><!-- .panel-image -->

	<?php endif; ?>

</article><!-- #post-## -->

<?php endif; ?>
