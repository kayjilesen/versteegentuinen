<?php
/**
 * Projects overview.
 *
 * @package versteegentuinen
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>
<main id="main">
	<?php get_template_part( 'templates/components/page-line' ); ?>
	<?php get_template_part( 'templates/components/page-heading', null, array( 'title' => __( 'Onze projecten', 'kj' ) ) ); ?>

	<section class="section p-b-120">
		<div class="container">
			<div class="row gutter-xl">
				<?php
				while ( have_posts() ) :
					the_post();
					$kj_image = kj_project_first_image( get_the_ID() );
					?>
					<div class="col-md-4">
						<a href="<?php the_permalink(); ?>" data-title="<?php the_title_attribute(); ?>">
							<article class="media media-project m-b-50">
								<?php if ( $kj_image ) : ?>
									<figure class="media__img">
										<img src="<?php echo esc_url( $kj_image['sizes']['project-size'] ?? $kj_image['url'] ); ?>" alt="<?php echo esc_attr( $kj_image['alt'] ?: get_the_title() ); ?>" loading="lazy">
									</figure>
								<?php endif; ?>
								<span class="line"></span>
								<span class="line line--bottom"></span>
								<div class="media__body"></div>
							</article>
						</a>
					</div>
				<?php endwhile; ?>
			</div>
		</div>
	</section>
</main>
<?php
get_footer();
