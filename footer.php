<?php
/**
 * Site footer.
 *
 * @package versteegentuinen
 */

defined( 'ABSPATH' ) || exit;

$kj_lists = array(
	'diensten'    => array( __( 'Diensten', 'kj' ), 'dienst-title', 'footer-col p-l-70 p-md-l-0', 'widget widget_pages' ),
	'kernwaarden' => array( __( 'Kernwaarden', 'kj' ), 'kernwaarden-title', 'footer-col', 'widget widget_text' ),
);

$kj_privacy_id = (int) get_option( 'wp_page_for_privacy_policy' );
$kj_cookie_id  = 0;
if ( function_exists( 'get_option' ) ) {
	$kj_surecookie = get_option( 'surecookie_settings' );
	$kj_cookie_id  = is_array( $kj_surecookie ) ? (int) ( $kj_surecookie['cookie_policy_page_id'] ?? 0 ) : 0;
}
$kj_site_host = wp_parse_url( home_url(), PHP_URL_HOST );
?>
	<footer id="contact" class="footer bg-parallax">
		<div class="container">
			<div class="row">
				<div class="col-lg-4 col-md-6">
					<div class="footer-col">
						<div class="widget widget_text">
							<h4 class="widget-title green"><?php esc_html_e( 'Contactgegevens', 'kj' ); ?></h4>
							<div class="widget widget-address">
								<ul>
									<li>Kerkweg 14A</li>
									<li>5813BS Ysselsteyn</li>
									<li></li>
									<li><a href="tel:+31618686551">+31 6 18686551</a></li>
									<li><a href="mailto:info@versteegentuinen.nl">info@versteegentuinen.nl</a></li>
									<li>www.versteegentuinen.nl</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<?php foreach ( $kj_lists as $kj_field => $kj_list ) : ?>
					<div class="col-lg-4 col-md-6">
						<div class="<?php echo esc_attr( $kj_list[2] ); ?>">
							<div class="<?php echo esc_attr( $kj_list[3] ); ?>">
								<h4 class="widget-title"><?php echo esc_html( $kj_list[0] ); ?></h4>
								<ul>
									<?php
									if ( function_exists( 'have_rows' ) && have_rows( $kj_field, 'option' ) ) :
										while ( have_rows( $kj_field, 'option' ) ) :
											the_row();
											echo '<li>' . esc_html( get_sub_field( $kj_list[1] ) ) . '</li>';
										endwhile;
									endif;
									?>
								</ul>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</footer>
	<div class="footer-bottom">
		<div class="container">
			<div class="footer-bottom__inner">
				<p class="footer-bottom__copy">
					&copy; <?php echo esc_html( wp_date( 'Y' ) ); ?> Versteegen Tuinen
				</p>
				<ul class="footer-bottom__links">
					<?php if ( $kj_privacy_id && 'publish' === get_post_status( $kj_privacy_id ) ) : ?>
						<li><a href="<?php echo esc_url( get_permalink( $kj_privacy_id ) ); ?>"><?php esc_html_e( 'Privacyverklaring', 'kj' ); ?></a></li>
					<?php endif; ?>
					<?php if ( $kj_cookie_id && 'publish' === get_post_status( $kj_cookie_id ) ) : ?>
						<li><a href="<?php echo esc_url( get_permalink( $kj_cookie_id ) ); ?>"><?php esc_html_e( 'Cookies', 'kj' ); ?></a></li>
					<?php endif; ?>
				</ul>
				<a class="footer-bottom__studio" href="<?php echo esc_url( 'https://studiowaterpas.nl/hoveniers/?rel=' . $kj_site_host ); ?>" title="<?php esc_attr_e( 'Website ontwikkeld door Studio Waterpas', 'kj' ); ?>" target="_blank" rel="noopener noreferrer">
					<span class="footer-bottom__studio-logo" aria-hidden="true"></span>
					<span class="sr-only"><?php esc_html_e( 'Studio Waterpas', 'kj' ); ?></span>
				</a>
			</div>
		</div>
	</div>
</div>
<?php wp_footer(); ?>
</body>
</html>
