<?php
/**
 * Template Name: Banner Test
 *
 * Testpagina voor de aankondigingsbalk.
 * Wijs dit template toe via Dashboard → Pagina → Pagina-attributen → Sjabloon.
 */

get_header();
?>

<section class="container content-page" style="padding-top:2rem;">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<article <?php post_class(); ?>>
			<h1><?php the_title(); ?></h1>
			<div class="entry-content"><?php the_content(); ?></div>
		</article>
	<?php endwhile; endif; ?>
</section>

<?php get_footer();