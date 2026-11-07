<?php
/**
 * Project detail: title and photo gallery.
 *
 * @package versteegentuinen
 */

defined( 'ABSPATH' ) || exit;

get_header();

while ( have_posts() ) :
	the_post();
	$kj_rows = function_exists( 'get_field' ) ? (array) get_field( 'project_images' ) : array();
	?>
	<main id="main" class="project">
		<div class="container">
			<article class="project-style-1">
				<h1 class="entry-title"><?php the_title(); ?></h1>
				<div class="projectImages">
					<?php
					foreach ( $kj_rows as $kj_index => $kj_row ) :
						$kj_image = $kj_row['afbeelding'] ?? null;
						if ( empty( $kj_image['url'] ) ) {
							continue;
						}
						?>
						<img src="<?php echo esc_url( $kj_image['url'] ); ?>" alt="<?php echo esc_attr( $kj_image['alt'] ?: get_the_title() ); ?>"<?php echo $kj_index > 0 ? ' loading="lazy"' : ''; ?>>
					<?php endforeach; ?>
				</div>
			</article>
		</div>
	</main>
	<?php
endwhile;

get_footer();
