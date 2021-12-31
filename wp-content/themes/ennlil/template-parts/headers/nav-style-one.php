<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

$ennlil_logo = cs_get_option( 'theme_logo' );
$ennlil_logo_id = isset($ennlil_logo['id']) && !empty($ennlil_logo['id']) ? $ennlil_logo['id'] : '';
$ennlil_logo_url = isset( $ennlil_logo[ 'url' ] ) ? $ennlil_logo[ 'url' ] : '';
$ennlil_logo_alt = get_post_meta($ennlil_logo_id,'_wp_attachment_image_alt',true);

$ennlil_logo_light = cs_get_option( 'theme_logo_light' );
$ennlil_logo_light_id = isset($ennlil_logo_light['id']) && !empty($ennlil_logo_light['id']) ? $ennlil_logo_light['id'] : '';
$ennlil_logo_light_url = isset( $ennlil_logo_light[ 'url' ] ) ? $ennlil_logo_light[ 'url' ] : '';
$ennlil_logo_light_alt = get_post_meta($ennlil_logo_light_id,'_wp_attachment_image_alt',true);


$ennlil_header_top = cs_get_option('header_top_enable');
$ennlil_header_search = cs_get_option('search_bar_enable');
$ennlil_header_social = cs_get_option('header_social_enable');
$ennlil_social_icon = cs_get_option( 'social-icon' );

$ennlil_header_ads = cs_get_option('show_header_ads');
$ennlil_ads_img = cs_get_option( 'top_ads_img' );
$ennlil_ads_id = isset($ennlil_ads_img['id']) && !empty($ennlil_ads_img['id']) ? $ennlil_ads_img['id'] : '';
$ennlil_ads_url = isset( $ennlil_ads_img[ 'url' ] ) ? $ennlil_ads_img[ 'url' ] : '';
$ads_link = cs_get_option('top_ads_link');

$breaking_enable = cs_get_option('breaking_enable');
$header_date = cs_get_option('header_top_calender');
$dark_mode_enable = cs_get_option('dark_mode_enable');
$theme_header_sticky = cs_get_option('theme_header_sticky');

?>

<header id="theme-header" class="theme_header__Top header-area breaking_header_Top <?php if( $theme_header_sticky == true ) { echo "stick-top"; } else { echo "stick-disable"; } ?>">

	<?php if($ennlil_header_top == true) :?>
	<div class="top-header-area">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-md-8">
					<?php if($breaking_enable == true) :?>
					<?php get_template_part('template-parts/breaking', 'news'); ?>					
					<?php endif; ?>	
				</div>
				<div class="col-md-4 text-right top-right-box">
					<?php if($header_date == true) :?>
					<div class="header-date">
						<i class="icofont-ui-calendar"></i> <?php echo date(get_option('date_format')); ?>
					</div>
					<?php endif; ?>
				</div>
			</div>	
		</div>
	</div> 
	<?php endif; ?>

	<div class="logo-area">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-md-3">
				
					<div class="logo theme-logo">
					<?php  
					if ( has_custom_logo() || !empty( $ennlil_logo_url ) ) {
						if( isset( $ennlil_logo['url'] ) && !empty( $ennlil_logo_url ) ) { 
							?>
								<a href="<?php echo esc_url( site_url('/')) ?>" class="logo">
									<img class="img-fluid" src="<?php echo esc_url( $ennlil_logo_url ); ?>" alt="<?php echo esc_attr( $ennlil_logo_alt  ) ?>">
								</a>
						    <?php 
						} else {
							 the_custom_logo();
						}

					} else {
						printf('<h1 class="text-logo"><a href="%1$s">%2$s</a></h1>',esc_url(site_url('/')),esc_html(get_bloginfo('name')));
					}
					?>
					</div>
					
					<?php if($dark_mode_enable == true) :?>
							
						<div class="logo dark-mode-logo">
						<?php  
							if (!empty( $ennlil_logo_light_url ) ) {
								if( isset( $ennlil_logo_light['url'] ) && !empty( $ennlil_logo_light_url ) ) { 
									?>
									<a href="<?php echo esc_url( site_url('/')) ?>" class="logo">
										<img class="img-fluid" src="<?php echo esc_url( $ennlil_logo_light_url ); ?>" alt="<?php echo esc_attr( $ennlil_logo_light_alt  ) ?>">
									</a>
									<?php 
								} else {
									 the_custom_logo();
								}

							} else {
								printf('<h1 class="text-logo theme-logo-text text-dark-logo"><a href="%1$s">%2$s</a></h1>',esc_url(site_url('/')),esc_html(get_bloginfo('name')));
							}
						?>
						</div>
						
					<?php endif; ?>
							
							
					
				</div>
				<div class="col-md-6 nav-one-ads">
					<?php if($ennlil_header_ads == true) :?>
					<div class="ad-banner">
						<?php if( isset( $ennlil_ads_img['url'] ) && !empty( $ennlil_ads_url ) ) : ?>	
						<a href="<?php echo esc_url($ads_link); ?>">
							<img src="<?php echo esc_url( $ennlil_ads_url ); ?>" class="img-ad" alt="<?php the_title_attribute(); ?>">
						</a>

						<?php endif; ?>
					</div>
					<?php endif; ?>
				</div>
				
				<!-- Social Links -->
				<div class="col-md-3 text-right">
					<?php if($ennlil_header_social == true) : ?>
					<ul class="top-social <?php if( $dark_mode_enable == true ) { echo "dark-social"; } else { echo "social-rightzero"; } ?>">
					<?php 
						if ( ! empty( $ennlil_social_icon ) ) : 
						foreach( $ennlil_social_icon as $item ) :
					?>
						<li class="social-list__item">
							<a href="<?php echo esc_url( $item['link'] ); ?>" target="_blank" class="social-list__link">
							<i class="<?php echo esc_attr( $item['icon'] ); ?>"></i>
							</a>
						</li>
					<?php 
						endforeach; 
						endif; 
					?>
					</ul>
					<?php endif; ?>
					
					
					<?php if($dark_mode_enable == true) :?>
						<!-- drak mode switcher -->
						<div class="wpnm-button">
							<div class="wpnm-button-inner-left"></div>
							<div class="wpnm-button-inner"></div>
						</div>
					<?php endif; ?>
								
					
				</div>
				
				
			</div>
		</div>
	</div>
	
	<div class="site-navigation theme_header_design__gradient theme_header_design__One header_search_alt">
		<div class="nav-wrapper">
			<div class="container nav-wrapp">
				<div class="ennlil-responsive-menu"></div>
				<div class="mainmenu">
					<?php
						wp_nav_menu( array(
							'theme_location' => 'primary',
							'menu_id'        => 'primary-menu',
						) );
					?>
				</div>
				
				<?php if($ennlil_header_search == true) :?>
				<div class="theme_search__Wrapper theme-search-box">
					<i class="search-btn icofont-search"></i>
					<i class="close-btn icofont-close-line"></i>
													
					<div class="search_box__Wrap search-popup">
						<div class='search-box'>
							<form role="search" method="get" id="searchform"
								class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
									<input type="text" class="search-input" value="<?php echo get_search_query(); ?>" name="s" id="s" placeholder="<?php esc_attr_e('Search ...','ennlil'); ?>" required />
									<button type="submit" id="searchsubmit" class="search-button"><i class="icofont-search-1"></i></button>
							</form>
						</div>
					</div>
				</div> 
				<?php endif; ?>
				
			</div>
		</div>
	</div>	
	
</header>