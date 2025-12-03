<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package growink
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'growink'); ?></a>

		<header id="masthead" class="site-header">

			<div class="mobile-header-holder">
				<div class="top-header">
					<div class="container">
						<div class="main-header-content">
							<div class="burger-menu">
								<span></span>
								<span></span>
								<span></span>
							</div>

							<div class="site-branding">
								<?php the_custom_logo(); ?>
							</div>
						</div>
					</div>
				</div>

				<div class="bottom-header">
					<div class="container">
						<div class="bottom-header-content">
							<nav class="main-navigation">
								<?php
								wp_nav_menu(
									array(
										'theme_location' => 'menu-1',
										'menu_id'	=>	'primary',
										'after' => '<i class="fa-solid fa-chevron-down dropdown-arrow"></i>'
									)
								)
								?>
							</nav>

							<div class="socialmedia">
								<?php
								$facebook = get_theme_mod('facebook_social_link', '');
								$x        = get_theme_mod('x_social_link', '');
								$linkedin = get_theme_mod('linkedin_social_link', '');
								?>

								<?php if (!empty($facebook)) : ?>
									<a href="<?php echo esc_url($facebook); ?>" class="socialmedia-item" target="_blank">
										<img src="<?php echo get_template_directory_uri() . '/dist/imgs/facebook-icon.png'; ?>" alt="">
									</a>
								<?php endif; ?>

								<?php if (!empty($x)) : ?>
									<a href="<?php echo esc_url($x); ?>" class="socialmedia-item" target="_blank">
										<img src="<?php echo get_template_directory_uri() . '/dist/imgs/x-icon.png'; ?>" alt="">
									</a>
								<?php endif; ?>

								<?php if (!empty($linkedin)) : ?>
									<a href="<?php echo esc_url($linkedin); ?>" class="socialmedia-item" target="_blank">
										<img src="<?php echo get_template_directory_uri() . '/dist/imgs/linkedin-icon.png'; ?>" alt=">">
									</a>
								<?php endif; ?>
							</div>
						</div>
					</div>
				</div>
			</div>



			<div class="container">
				<div class="desktop-header-holder">
					<div class="header-decor top-decor">
						<?php include get_template_directory() . '/dist/imgs/blue-rec-decor.svg' ?>
					</div>

					<div class="header-decor bottom-decor">
						<?php include get_template_directory() . '/dist/imgs/green-cir-decor.svg' ?>
					</div>

					<div class="desktop-header-container">
						<div class="desktop-header">
							<div class="socialmedia">
								<?php
								$facebook = get_theme_mod('facebook_social_link', '');
								$x        = get_theme_mod('x_social_link', '');
								$linkedin = get_theme_mod('linkedin_social_link', '');
								?>

								<?php if (!empty($facebook)) : ?>
									<a href="<?php echo esc_url($facebook); ?>" class="socialmedia-item" target="_blank">
										<img src="<?php echo get_template_directory_uri() . '/dist/imgs/facebook-icon.png'; ?>" alt="">
									</a>
								<?php endif; ?>

								<?php if (!empty($x)) : ?>
									<a href="<?php echo esc_url($x); ?>" class="socialmedia-item" target="_blank">
										<img src="<?php echo get_template_directory_uri() . '/dist/imgs/x-icon.png'; ?>" alt="">
									</a>
								<?php endif; ?>

								<?php if (!empty($linkedin)) : ?>
									<a href="<?php echo esc_url($linkedin); ?>" class="socialmedia-item" target="_blank">
										<img src="<?php echo get_template_directory_uri() . '/dist/imgs/linkedin-icon.png'; ?>" alt=">">
									</a>
								<?php endif; ?>
							</div>

							<nav class="main-navigation">
								<?php
								wp_nav_menu(
									array(
										'theme_location' => 'menu-1',
										'menu_id'	=>	'primary',
										'after' => '<i class="fa-solid fa-chevron-down dropdown-arrow"></i>'
									)
								)
								?>
							</nav>

							<div class="site-branding">
								<?php the_custom_logo(); ?>
							</div>
						</div>

					</div>
				</div>
			</div>
		</header>