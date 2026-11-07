<?php
/**
 * Page not found.
 *
 * @package versteegentuinen
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>
<main id="main">
	<?php get_template_part( 'templates/components/page-line' ); ?>
	<?php get_template_part( 'templates/components/page-heading', null, array( 'title' => __( 'Pagina niet gevonden', 'kj' ) ) ); ?>
	<section class="section p-b-120">
		<div class="container page-content">
			<p><?php esc_html_e( 'Deze pagina bestaat niet (meer).', 'kj' ); ?></p>
			<a class="au-btn au-btn--arrow" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Naar de homepage', 'kj' ); ?> <i class="zmdi zmdi-arrow-right ic-arrow"></i></a>
		</div>
	</section>
</main>
<?php
get_footer();
