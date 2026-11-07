<?php
/**
 * Default page template (cookiebeleid, privacyverklaring).
 *
 * @package versteegentuinen
 */

defined( 'ABSPATH' ) || exit;

get_header();

while ( have_posts() ) :
	the_post();
	?>
	<main id="main">
		<?php get_template_part( 'templates/components/page-line' ); ?>
		<?php get_template_part( 'templates/components/page-heading' ); ?>
		<section class="section p-b-120">
			<div class="container">
				<article id="post-<?php the_ID(); ?>" <?php post_class( 'page-content' ); ?>>
					<?php the_content(); ?>
				</article>
			</div>
		</section>
	</main>
	<?php
endwhile;

get_footer();
