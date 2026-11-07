<?php
/**
 * Template Name: Home
 *
 * One-pager: slider, about, services, recent projects and reviews.
 *
 * @package versteegentuinen
 */

defined( 'ABSPATH' ) || exit;

get_header();

$kj_has_acf = function_exists( 'get_field' );
$kj_sliders = $kj_has_acf ? (array) get_field( 'sliders' ) : array();
$kj_about   = $kj_has_acf ? get_field( 'over-ons-image' ) : null;
$kj_service = $kj_has_acf ? (array) get_field( 'alles_in_een' ) : array();
$kj_reviews = $kj_has_acf ? (array) get_field( 'reviews' ) : array();

// Revolution Slider layer settings, unchanged from the original template.
$kj_frames_sub   = '[{"delay":0,"speed":1800,"frame":"0","from":"y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":800,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]';
$kj_frames_title = '[{"delay":800,"speed":2100,"frame":"0","from":"x:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":800,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]';
$kj_frames_btn   = '[{"delay":0,"speed":1800,"frame":"0","from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:[100%];s:inherit;e:inherit;","to":"o:1;","ease":"Power2.easeInOut"},{"delay":"wait","speed":800,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]';
?>
<main id="main">
	<?php get_template_part( 'templates/components/page-line' ); ?>

	<section id="slider-section">
		<div class="rev_slider_wrapper rev_slider_wrapper--p80 tp-overflow-hidden">
			<div class="rev_slider fullwidthabanner js-rev" data-version="5.4.4" style="display:none" data-rev-layout="fullscreen" data-rev-stylearrow="au-rev-arrow-1" data-rev-bullets="true" data-rev-stylebullet="au-rev-bullet-1" data-rev-voffbullet="55">
				<ul>
					<?php foreach ( array_slice( $kj_sliders, 0, 3 ) as $kj_slide ) : ?>
						<li class="rev-item rev-item-1" data-transition="crossfade">
							<img class="rev-slidebg" src="<?php echo esc_url( $kj_slide['image']['url'] ?? '' ); ?>" alt="Versteegen Tuinen">
							<div class="sliderOverlay"></div>
							<h4 class="tp-caption tp-resizeme rev-text-1" data-frames="<?php echo esc_attr( $kj_frames_sub ); ?>"
								data-x="['left']" data-y="['middle']" data-hoffset="[0, 0, 0, 0, 0]" data-voffset="[-118, -118, -70, -80, -80]" data-paddingleft="[0, 0, 0, 0, 15]" data-paddingright="[0, 0, 0, 0, 15]" data-width="['auto']" data-height='["auto"]'
								data-whitespace="[nowrap, nowrap, nowrap, nowrap, nowrap]" data-color="#fff" data-fontweight="700" data-fontsize="[16, 16, 18, 20, 20]" data-textalign="[left, left, left, center, center]"><?php echo esc_html( $kj_slide['subtitle'] ?? '' ); ?></h4>
							<h2 class="tp-caption tp-resizeme rev-text-2" data-frames="<?php echo esc_attr( $kj_frames_title ); ?>"
								data-x="[left]" data-y="[center]" data-hoffset="[0, 0, 0, 0, 0]" data-voffset="[-35, -30, 15, 10, 10]" data-paddingleft="[0, 0, 0, 0, 15]" data-paddingright="[0, 0, 0, 0, 15]" data-width="[600,600,500,576,500]" data-height='["auto"]'
								data-lineheight="[60, 60, 45, 50, 45]" data-whitespace="normal" data-color="#fff" data-fontweight="700" data-fontsize="[48, 48, 46, 42, 46]" data-textalign="[left, left, left, left, left]"><?php echo esc_html( $kj_slide['title'] ?? '' ); ?></h2>
							<a class="tp-caption tp-resizeme" href="<?php echo esc_url( get_post_type_archive_link( 'projecten' ) ); ?>" target="_self" data-frames="<?php echo esc_attr( $kj_frames_btn ); ?>" data-x="[left]" data-y="[center]" data-hoffset="[0, 0, 0, 0, 15]" data-voffset="[87, 87, 130, 130, 130]" data-width="['auto']" data-height='["auto"]' data-responsive_offset="on" data-responsive="off" data-whitespace="[nowrap, nowrap, nowrap, nowrap, nowrap]">
								<span class="rev-btn-1"><?php echo esc_html( $kj_slide['button-text'] ?? '' ); ?><span class="arrow" data-paddingleft="5"><i class="zmdi zmdi-arrow-right"></i></span></span>
							</a>
						</li>
					<?php endforeach; ?>
				</ul>
			</div>
		</div>
		<div class="rev-spacer"></div>
	</section>

	<section id="section-about" class="p-t-10 p-b-55">
		<div class="container">
			<div class="media-about">
				<div class="row">
					<div class="col-lg-7">
						<div class="media__body">
							<h5 class="title-sub"><?php esc_html_e( 'Over', 'kj' ); ?></h5>
							<h2 class="title-1 over-ons-titel"><?php echo esc_html( $kj_has_acf ? (string) get_field( 'over-ons-title' ) : '' ); ?></h2>
							<p class="media__text over-ons-beschrijving"><?php echo wp_kses_post( $kj_has_acf ? (string) get_field( 'over-ons-text' ) : '' ); ?></p>
							<a class="au-btn au-btn--arrow" href="<?php echo esc_url( home_url( '/#contact' ) ); ?>"><?php esc_html_e( 'Neem contact op', 'kj' ); ?>
								<i class="zmdi zmdi-arrow-right ic-arrow"></i>
							</a>
						</div>
					</div>
					<div class="col-lg-5">
						<div class="media__img js-line">
							<?php if ( ! empty( $kj_about['url'] ) ) : ?>
								<img src="<?php echo esc_url( $kj_about['url'] ); ?>" alt="<?php echo esc_attr( $kj_about['alt'] ?: __( 'Niek Versteegen aan het werk', 'kj' ) ); ?>" loading="lazy">
							<?php endif; ?>
							<span class="line"></span>
							<span class="line line-bottom"></span>
							<div class="media__img-inner wow fadeIn" data-wow-duration="0.8s" data-wow-delay="0.2s"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section id="werk-section" class="p-t-60 p-b-55">
		<div class="container">
			<div class="section-title">
				<h2 class="title-1"><?php esc_html_e( 'Alles - in - een', 'kj' ); ?></h2>
			</div>
			<div class="row no-gutters">
				<?php foreach ( $kj_service as $kj_index => $kj_item ) : ?>
					<div class="col-md-6 col-lg-4">
						<article class="media media-service">
							<figure class="media__img">
								<img src="<?php echo esc_url( $kj_item['icon']['sizes']['small'] ?? '' ); ?>" alt="<?php echo esc_attr( $kj_item['icon']['alt'] ?? '' ); ?>" loading="lazy">
							</figure>
							<div class="media__title">
								<h3 class="title"><?php echo esc_html( $kj_item['title'] ?? '' ); ?></h3>
								<span class="number"><?php echo esc_html( sprintf( '%02d', $kj_index + 1 ) ); ?></span>
							</div>
						</article>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section id="projecten" class="wrap wrap--w1790 p-b-75">
		<div class="section-title m-b-70">
			<h2 class="title-1"><?php esc_html_e( 'Recente projecten', 'kj' ); ?></h2>
		</div>
		<div class="container-fluid">
			<?php
			for ( $kj_i = 1; $kj_i <= 4; $kj_i++ ) :
				$kj_project = $kj_has_acf ? get_field( 'project_' . $kj_i ) : null;
				if ( ! $kj_project instanceof WP_Post ) {
					continue;
				}
				$kj_image = kj_project_first_image( $kj_project->ID );
				$kj_link  = get_permalink( $kj_project );
				$kj_title = get_the_title( $kj_project );
				?>
				<div class="slick-item col-sm-12 col-md-6 col-lg-3">
					<article class="media media-project">
						<?php if ( $kj_image ) : ?>
							<figure class="media__img">
								<img src="<?php echo esc_url( $kj_image['url'] ); ?>" alt="<?php echo esc_attr( $kj_image['alt'] ?: $kj_title ); ?>" loading="lazy">
							</figure>
						<?php endif; ?>
						<div class="bg-overlay"></div>
						<a class="media-project__cover" href="<?php echo esc_url( $kj_link ); ?>" tabindex="-1" aria-hidden="true"></a>
						<span class="line"></span>
						<span class="line line--bottom"></span>
						<div class="media__body">
							<h3 class="title"><a href="<?php echo esc_url( $kj_link ); ?>"><?php echo esc_html( $kj_title ); ?></a></h3>
							<div class="address"><?php echo esc_html( (string) get_field( 'project_location', $kj_project->ID ) ); ?></div>
						</div>
					</article>
				</div>
			<?php endfor; ?>
		</div>
	</section>

	<section id="review-section" class="p-t-35 p-b-85">
		<div class="container">
			<div class="section-title m-b-80">
				<h2 class="title-1"><?php esc_html_e( 'Klanten aan het woord', 'kj' ); ?></h2>
			</div>
			<div class="slick-wrap slick-testi js-slick-wrapper" data-slick-xs="1" data-slick-sm="1" data-slick-md="1" data-slick-lg="2" data-slick-xl="2" data-slick-customnav="true" data-slick-autoplay="true">
				<div class="slick-wrap-content">
					<div class="slick-content js-slick-content">
						<?php foreach ( $kj_reviews as $kj_review ) : ?>
							<div class="slick-item">
								<div class="media-testi">
									<p class="media__text"><?php echo esc_html( $kj_review['review-text'] ?? '' ); ?></p>
									<div class="media__title">
										<span class="ti-quote-left quote"></span>
										<h4 class="name"><?php echo esc_html( $kj_review['review-writer'] ?? '' ); ?></h4>
									</div>
									<?php if ( ! empty( $kj_review['review-image']['sizes']['thumbnail'] ) ) : ?>
										<figure class="media__img img--rounded">
											<img src="<?php echo esc_url( $kj_review['review-image']['sizes']['thumbnail'] ); ?>" alt="<?php echo esc_attr( $kj_review['review-writer'] ?? '' ); ?>" loading="lazy">
										</figure>
									<?php endif; ?>
								</div>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
				<div class="slick__nav arrows-1">
					<i class="slick-prev slick-arrow js-slick-prev ti-angle-left"></i>
					<i class="slick-next slick-arrow js-slick-next ti-angle-right"></i>
				</div>
			</div>
		</div>
	</section>
</main>
<?php
get_footer();
