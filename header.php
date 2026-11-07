<?php
/**
 * Site header.
 *
 * @package versteegentuinen
 */

defined( 'ABSPATH' ) || exit;

$kj_logo     = kj_logo_url();
$kj_facebook = 'https://www.facebook.com/Versteegen-Tuinen-109998540405124/';
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div class="page-wrapper">
	<header id="header">
		<div class="header header-1 d-none d-lg-block js-header-1">
			<div class="header__bar">
				<div class="wrap wrap--w1790">
					<div class="container-fluid">
						<div class="header__content">
							<div class="logo">
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
									<img src="<?php echo esc_url( $kj_logo ); ?>" alt="<?php esc_attr_e( 'Logo Versteegen Tuinen', 'kj' ); ?>">
								</a>
							</div>
							<div class="header__content-right">
								<nav class="header-nav-menu" aria-label="<?php esc_attr_e( 'Hoofdmenu', 'kj' ); ?>">
									<ul class="menu nav-menu">
										<?php kj_menu_items( 'header-menu' ); ?>
									</ul>
								</nav>
								<div class="header-social">
									<ul class="list-social">
										<li class="list-social__item">
											<a class="ic-fb" href="<?php echo esc_url( $kj_facebook ); ?>" target="_blank" rel="noopener noreferrer" aria-label="<?php esc_attr_e( 'Versteegen Tuinen op Facebook', 'kj' ); ?>">
												<i class="zmdi zmdi-facebook" aria-hidden="true"></i>
											</a>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="header-mobile d-block d-lg-none">
			<div class="header-mobile__bar">
				<div class="container-fluid">
					<div class="header-mobile__bar-inner">
						<a class="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
							<img src="<?php echo esc_url( $kj_logo ); ?>" alt="<?php esc_attr_e( 'Logo Versteegen Tuinen Venray', 'kj' ); ?>">
						</a>
						<button class="hamburger hamburger--slider float-right" type="button" aria-label="<?php esc_attr_e( 'Menu openen', 'kj' ); ?>">
							<span class="hamburger-box">
								<span class="hamburger-inner"></span>
							</span>
						</button>
					</div>
				</div>
			</div>
			<nav class="header-nav-menu-mobile" aria-label="<?php esc_attr_e( 'Mobiel menu', 'kj' ); ?>">
				<div class="container-fluid">
					<ul class="menu nav-menu menu-mobile">
						<?php kj_menu_items( 'header-menu' ); ?>
					</ul>
				</div>
			</nav>
		</div>
	</header>
