<?php
/**
 * @package Posts_in_Page
 * @author Eric Amundson <eric@ivycat.com>
 * @copyright Copyright (c) 2017, IvyCat, Inc.
 * @license http://www.gnu.org/licenses/gpl-2.0.html
 */
?>

<!-- template-ic-aula.php -->
<!-- Post Wrap Start-->
<div class="post hentry ivycat-post">

	<!-- 	This outputs the post TITLE -->
	<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

	<?php if ( '' !== get_the_post_thumbnail() && ! is_single() ) : ?>
		<div class="post-thumbnail">
			<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail( 'twentyseventeen-featured-image' ); ?>
			</a>
		</div><!-- .post-thumbnail -->
	<?php endif; ?>

	<!-- 	This outputs the post EXCERPT.  To display full content including images and html,
		replace the_excerpt(); with the_content();  below. -->
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div>

</div>
<!-- // Post Wrap End -->
