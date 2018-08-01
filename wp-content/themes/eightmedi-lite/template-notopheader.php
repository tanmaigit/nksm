<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * Template Name: HomePage without Top Header
 * @package 8Medi Lite
 */
?>
<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package 8Medi Lite
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div id="page" class="hfeed site">
		<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'eightmedi-lite' ); ?></a>
		<?php if(0==1): ?>
			<div class="top-header">
				<div class="ed-container-home">
					<div class="header-callto">
						<div class="callto-left">
							<?php echo wp_kses_post(get_theme_mod('eightmedi_lite_callto_text','Left CTA'));?>
						</div>
						<div class="callto-right">
							<div class="cta">
								<?php echo wp_kses_post(get_theme_mod('eightmedi_lite_callto_text_right','Right CTA'));?>
							</div>
							<?php if(get_theme_mod('eightmedi_lite_social_icons_in_header','1')==1){ ?>
							<div class="header-social social-links">
								<?php do_action('eightmedi_lite_social_links');?>
							</div>
							<?php }?>						

							<?php if(get_theme_mod('eightmedi_lite_hide_header_search')!='1'){
								?>
								<div class="header-search">
									<i class="fa fa-search"></i>
									<?php 
									get_search_form();
									?>
								</div>
								<?php
							}?>						
						</div>
					</div>
				</div>
			</div>
		<?php endif;?>
		<header id="masthead" class="site-header" role="banner">
			<?php $logo_align = get_theme_mod('eightmedi_lite_logo_alignment_setting','1');
			if($logo_align == 0){ $logo_align_class='center-align'; }
			else{ $logo_align_class='left-align'; }
			?>
			<div class="ed-container-home <?php echo esc_attr($logo_align_class);?>">
				<div class="site-branding">
					<div class="site-logo">
						<?php if ( get_header_image() ) : ?>
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
								<img src="<?php header_image(); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="">
							</a>
						<?php endif; // End header image check. ?>
					</div>
					<div class="site-text">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
							<h1 class="site-title"><?php bloginfo( 'name' ); ?></h1>
							<p class="site-description"><?php bloginfo( 'description' ); ?></p>
						</a>
					</div>
				</div><!-- .site-branding -->

				<nav id="site-navigation" class="main-navigation" role="navigation">
					<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
						<?php //esc_html_e( 'Primary Menu', 'eightmedi-lite' ); ?>
						<span class="menu-bar menubar-first"></span>
						<span class="menu-bar menubar-second"></span>
						<span class="menu-bar menubar-third"></span>
					</button>
					<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
				</nav><!-- #site-navigation -->
			</div>
		</header><!-- #masthead -->
		<?php 
		$no_margin = "";
		if(is_page_template( 'template-home.php' ) || is_page_template('template-boxedhome.php')){
			if(is_home() || is_front_page() || is_page_template('template-boxedhome.php')){
				$yes_slider = esc_attr(get_theme_mod('eightmedi_lite_display_slider','1'));
				if($yes_slider==1){
					$no_margin=' no-margin';
				}
			}
		}
		$no_margin=' no-margin';
		?>
		<div id="content" class="site-content<?php echo $no_margin;?>">

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<?php
		//load slider
		do_action('eightmedi_lite_homepage_slider'); 
		?>
		<?php
		//Featured Section
		if(get_theme_mod('eightmedi_lite_featured_setting_option')=='enable'){
			$wl_featured_cat    =   get_theme_mod('eightmedi_lite_featured_setting_category');
			if($wl_featured_cat!='0'):
				?>
			<section class="featured clear" id="featured-content">
				<div class="ed-container-home">
					<?php
					$featured_title = esc_attr(get_theme_mod('eightmedi_lite_featured_title'));
					if(!empty($featured_title)){
						?>
						<h2 class="title home-title wow flipInX"><?php echo $featured_title; ?></h2>
						<?php
					}

					$featured_args      =   array('cat'=>$wl_featured_cat, 'post_status'=>'publish', 'posts_per_page'=>5,'order'=>'asc');
					$featured_query     =   new WP_Query($featured_args);
					$i=0;
					if($featured_query->have_posts()):
						while($featured_query->have_posts()):$featured_query->the_post();
					$i++;
					?>
					<div class="featured-block<?php if($i%5==0){echo " nomargin";} echo ' featured-post-'.$i;?> wow fadeInLeft"  data-wow-delay="0.8s">
						<div class="featured-text">
							<a href="<?php the_permalink(); ?>">
								<figure class="featured-image">
									<?php if (has_post_thumbnail()):
									$image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()),'thumbnail'); ?>
									<img src="<?php echo esc_attr($image[0]); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" /><?php
									endif;
									?>
								</figure>
								<div class="featured-single-title"><?php the_title(); ?></div>
							</a>
							<div class="featured-content"><?php echo eightmedi_lite_excerpt(get_the_excerpt(),'300','...',true,true);?></div>
						</div>
					</div>
					<?php 
					endwhile;
					endif;
					wp_reset_postdata();
					?>
				</div>
			</section>
			<?php
			endif;
		}
		?>
		<?php
		if(get_theme_mod('eightmedi_lite_appointment_setting_option')=='enable'){
			$appointment_title = get_theme_mod('eightmedi_lite_appointment_title','Book An Appointment'); 
			$appointment_desc = get_theme_mod('eightmedi_lite_appointment_desc');
			$appointment_formid = get_theme_mod('eightmedi_lite_appointment_formid');
			if(!empty($appointment_title)):
				?>
			<section class="appointment clear" id="book-an-appointment">
				<div class="ed-container-home">
					<h2 class="title home-title wow fadeInUp"><?php echo $appointment_title; ?></h2>
					<div class="appointment-desc home-description wow fadeInUp"><?php echo $appointment_desc; ?></div>
				</div>
				<div class="custom-appointment-form">
					<?php echo do_shortcode($appointment_formid);?>
				</div>
			</section>
			<?php
			endif;
		}
		?>
		<?php
		if (get_theme_mod('eightmedi_lite_about_setting_option')=='enable') {
			$eightmedi_lite_post_id = get_theme_mod('eightmedi_lite_about_setting_post');
			if(!empty($eightmedi_lite_post_id)):
				?>
			<section class="about">
				<div class="about-wrap clear">
					<?php 
					$eightmedi_lite_about_args  = array('post_type'=>'post', 'page_id' => $eightmedi_lite_post_id, 'post_status' => 'publish','posts_per_page'=>1);
					$eightmedi_lite_about_query = new WP_Query($eightmedi_lite_about_args);
					if ($eightmedi_lite_about_query->have_posts()):
						while ($eightmedi_lite_about_query->have_posts()):
							$eightmedi_lite_about_query->the_post();
						?>
						<figure class="about-img wow fadeInRight" data-wow-delay="0.8s">
							<?php if (has_post_thumbnail()):
							$eightmedi_lite_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()),'full'); ?>
							<img src="<?php echo esc_url($eightmedi_lite_image[0]); ?>" alt="<?php the_title(); ?>" /><?php
							else:
								?><img src="<?php echo esc_url('http://placehold.it/581x540');?>" alt="<?php echo __('Placehold','eightmedi-lite');?>" /><?php
							endif;
							?>
						</figure>
						<div class="about-content">
							<h2 class="title home-title wow flipInX"><?php the_title(); ?></h2>
							<div class="about-excerpt home-description wow fadeInLeft "><?php the_content(); ?></div>
							<div class="btn-wrapper wow fadeInUp" data-wow-delay="0.5s"><a href="<?php the_permalink(); ?>" class="btn"><?php echo esc_attr(get_theme_mod('eightmedi_lite_aboutus_viewmore_text','Details')); ?></a></div>
						</div>
						<?php
						endwhile;
						endif;

						?>
					</div>
				</section>
				<?php
				endif;
			}
			?>
			<?php
			if(get_theme_mod('eightmedi_lite_teammember_setting_option')=='enable'){
				$wl_team_cat    =   get_theme_mod('eightmedi_lite_teammember_setting_category');
				if($wl_team_cat!='0'):
					?>
				<section class="our-team-member clear">
					<div class="ed-container-home">
						<div class="team-text-wrap">
							<h2 class="title home-title wow fadeInUp"><?php echo esc_attr(get_theme_mod('eightmedi_lite_teammember_title','Our Doctors')); ?></h2>
							<div class="home-description wow fadeInUp"><?php echo (get_theme_mod('eightmedi_lite_teammember_desc','Lorem ipsum dolor sit')); ?></div>
						</div>
						<div class="team-slider-wrap">
							<div class="team-slider">
								<?php
								$team_args      =   array('cat'=>$wl_team_cat, 'post_status'=>'publish', 'posts_per_page'=>4);
								$team_query     =   new WP_Query($team_args);
								$i=0;
								if($team_query->have_posts()):
									while($team_query->have_posts()):$team_query->the_post();
								$i++;
								?>
								<div class="team-block<?php if($i%4==0){echo " nomargin";} ?>" >
									<a href="<?php the_permalink(); ?>">
										<figure class="team-image">
											<?php if (has_post_thumbnail()):
											$image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()),'eightmedi-lite-team-image'); ?>
											<img src="<?php echo esc_attr($image[0]); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" /><?php
											endif;
											?>
											<div class="team-hover">
												<div class="team-hover-title"> <?php echo get_the_title();?> 
													<div class="team-hover-text"><?php echo eightmedi_lite_excerpt(get_the_excerpt(), 60);?></div>
												</div>
											</div>
										</figure>
									</a>
								</div>
								<?php 
								endwhile;
								endif;
								wp_reset_postdata();
								?>
							</div>
						</div>
					</section>
					<?php
					endif;
				}
				?>
				<?php
				if(get_theme_mod('eightmedi_lite_callto_setting_option')=='enable'){
					$call_to_action = force_balance_tags(wp_kses_post(get_theme_mod('eightmedi_lite_callto_desc')));
					if(!empty($call_to_action)):
						?>
					<section class="call-to-action clear">
						<?php
						$cta_bg_v = get_theme_mod('eightmedi_lite_callto_bkgimage');
						if(!empty($cta_bg_v)){
							?>
							<figure>
								<img src="<?php echo esc_url($cta_bg_v);?>" alt="<?php echo esc_attr(get_theme_mod('eightmedi_lite_callto_title')); ?>">
							</figure>
							<?php
						}
						?>						
						<div class="cta-content-wrap <?php echo (empty($cta_bg_v))?'fullwidth':'';?>">
							<h2 class="title home-title wow fadeInDown"><?php echo (get_theme_mod('eightmedi_lite_callto_title')); ?></h2>
							<div class="call-to-action-desc clear home-description wow fadeInLeft"><?php echo $call_to_action; ?></div>
							<div class="cta-link wow fadeInRight" data-wow-delay="0.5s"><a href="<?php echo esc_url(get_theme_mod('eightmedi_lite_callto_link')); ?>"><?php echo esc_attr(get_theme_mod('eightmedi_lite_callto_readmore')); ?></a></div>
						</div>
					</section>
					<?php
					endif;
				}
				?>
				<?php
			//News Section
				if(get_theme_mod('eightmedi_lite_news_setting_option')=='enable'){
					$wl_news_cat    =   get_theme_mod('eightmedi_lite_news_setting_category');
					if($wl_news_cat!='0'):
						?>
					<section class="latest-news clear">
						<div class="ed-container-home">
							<h2 class="title home-title wow fadeInUp"><?php echo esc_attr(get_theme_mod('eightmedi_lite_news_title','Our Journal')); ?></h2>
							<div class="home-description wow fadeInUp"><?php echo (get_theme_mod('eightmedi_lite_news_desc','Lorem ipsum dolor sit')); ?></div>
							<?php
							if(get_theme_mod('eightmedi_lite_news_button_option')=='enable'){
								$wl_news_cat_url = get_category_link($wl_news_cat);
								?> 
								<div class="btn-wrapper wow FadeInUp" data-wow-delay="0.5s"><a href="<?php echo esc_url($wl_news_cat_url); ?>" class="btn"><?php echo esc_attr(get_theme_mod('eightmedi_lite_news_button_text')); ?></a></div> 
								<?php } ?>
								<?php

								$news_args      =   array('cat'=>$wl_news_cat, 'post_status'=>'publish', 'posts_per_page'=>3);
								$news_query     =   new WP_Query($news_args);
								$i=0;
								if($news_query->have_posts()):
									while($news_query->have_posts()):$news_query->the_post();
								$i++;
								?>
								<div class="news-block <?php if($i%4==0){echo " nomargin";} ?>  wow fadeInRight"  data-wow-delay="0.8s">
									<a href="<?php the_permalink(); ?>">
										<figure class="news-image">
											<?php if (has_post_thumbnail()):
											$image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()),'eightmedi-lite-news-image');?>
											<img src="<?php echo esc_attr($image[0]); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" /><?php
											else: ?>
											<img class="no-image" src="<?php echo get_template_directory_uri().'/css/images/no-image.jpg';?>" alt="no-image" /><?php
											endif;
											?>
											<div class="news-date"><?php echo "<span>".get_the_date('d')."</span>".get_the_date('M'); ?></div>
										</figure>
									</a>
									<div class="news-text">
										<div class="news-title-comment">
											<div class="news-single-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
											<div class="news-text"><?php echo eightmedi_lite_excerpt(get_the_excerpt(), 160);?></div>
											<a href="<?php the_permalink(); ?>"><?php echo __('Read More','eightmedi-lite')?></a>
										</div>
									</div>
								</div>
								<?php 
								endwhile;
								endif;
								wp_reset_postdata();
								?>
							</div>
						</section>
						<?php
						endif;
					}
					?>

					<?php
			//Sponsers Section
					if(get_theme_mod('eightmedi_lite_sponsers_setting_option')=='enable'){
						$wl_sponsers_cat    =   get_theme_mod('eightmedi_lite_sponsers_setting_category');
						if($wl_sponsers_cat!='0'):
							?>
						<section class="our-sponsers clear">
							<div class="ed-container-home">
								<h2 class="title home-title wow fadeInUp"><?php echo esc_attr(get_theme_mod('eightmedi_lite_sponsers_title','Our Sponsers')); ?></h2>
								<div class="sponsers-wrap">
									<?php
									$sponsers_args      =   array('cat'=>$wl_sponsers_cat, 'post_status'=>'publish', 'posts_per_page'=>-1);
									$sponsers_query     =   new WP_Query($sponsers_args);
									$i=0;
									if($sponsers_query->have_posts()):
										while($sponsers_query->have_posts()):$sponsers_query->the_post();
									$i++;
									?>
									<div class="sponsers-block <?php if($i%4==0){echo " nomargin";} ?>  wow fadeInRight"  data-wow-delay="0.8s">
										<a href="<?php the_permalink(); ?>">
											<figure class="sponsers-image">
												<?php if (has_post_thumbnail()):
												$image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()),'eightmedi-lite-sponsers-image');?>
												<img src="<?php echo esc_attr($image[0]); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" /><?php
												endif;
												?>
											</figure>
										</a>
									</div>
									<?php 
									endwhile;
									endif;
									wp_reset_postdata();
									?>
								</div>
							</div>
						</section>
						<?php
						endif;
					}
					?>

					<?php
					if(get_theme_mod('eightmedi_lite_callto_small_setting_option')=='enable'){
						$call_to_action_small = get_theme_mod('eightmedi_lite_callto_small_title','Make Your Appointment Today');
						if(!empty($call_to_action_small)):
							?>
						<section class="call-to-action-small clear">
							<?php
							$cta_bg_v_small = get_theme_mod('eightmedi_lite_callto_bkgimage_small');
							if(!empty($cta_bg_v_small)){
								?>
								<figure>
									<img src="<?php echo esc_url($cta_bg_v_small);?>" alt="<?php echo esc_attr(get_theme_mod('eightmedi_lite_callto_title')); ?>">
								</figure>
								<?php
							}
							?>						
							<div class="content-wrap <?php echo (empty($cta_bg_v_small))?'fullwidth':'';?>">
								<?php  ?>
								<h2 class="title cta-small-title home-title wow fadeInDown"><?php echo $call_to_action_small; ?></h2>
								<div class="cta-link-small wow fadeInRight" data-wow-delay="0.5s"><a href="<?php echo esc_url(get_theme_mod('eightmedi_lite_callto_link_small','#')); ?>"><?php echo esc_attr(get_theme_mod('eightmedi_lite_callto_readmore_small','Book Now')); ?></a></div>
							</div>
						</section>
						<?php
						endif;
					}
					?>

					<?php
					$eightmedi_lite_google_map_iframe = get_theme_mod('eightmedi_lite_google_map_iframe');
					$eightmedi_lite_contact_address = get_theme_mod('eightmedi_lite_contact_address');
					if(!empty($eightmedi_lite_google_map_iframe)) { ?>           
					<section id="google-map" class="clear">
						<?php		
						$allowed = array(
							'iframe' => array(
								'src' => array()
								)
							);		        	
						echo wp_kses($eightmedi_lite_google_map_iframe , $allowed);

						if(!empty($eightmedi_lite_contact_address)) { ?>
						<div class="google-section-wrap em-container">			
							<div class="em-contact-address">
								<h3><?php _e('Contact Us', 'eightmedi-lite'); ?></h3>
								<?php echo wpautop($eightmedi_lite_contact_address);?>
							</div>
						</div>
						<?php } ?>
					</section>
					<?php } ?>
				</main><!-- #main -->
			</div><!-- #primary -->

			<?php get_footer(); ?>