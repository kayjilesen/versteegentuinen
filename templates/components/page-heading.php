<?php
/**
 * Page heading.
 *
 * @package versteegentuinen
 *
 * @var array{title?: string} $args
 */

defined( 'ABSPATH' ) || exit;

$kj_title = $args['title'] ?? get_the_title();
?>
<section class="section p-t-100 p-b-65">
	<div class="container">
		<div class="page-heading">
			<h1 class="title-2"><?php echo esc_html( $kj_title ); ?></h1>
		</div>
	</div>
</section>
