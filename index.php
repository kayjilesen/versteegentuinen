<?php
/**
 * Fallback template.
 *
 * @package versteegentuinen
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>
<main id="main">
	<?php get_template_part( 'templates/components/page-line' ); ?>
	<?php get_template_part( 'templates/components/page-heading', null, array( 'title' => wp_strip_all_tags( get_the_archive_title() ) ) ); ?>
	<section class="section p-b-120">
		<div class="container">
			<?php if ( have_posts() ) : ?>
				<ul class="page-content">
					<?php
					while ( have_posts() ) :
						the_post();
						?>
						<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
					<?php endwhile; ?>
				</ul>
				<?php the_posts_pagination(); ?>
			<?php else : ?>
				<p><?php esc_html_e( 'Er is hier niets te vinden.', 'kj' ); ?></p>
			<?php endif; ?>
		</div>
	</section>
</main>
<?php
get_footer();
