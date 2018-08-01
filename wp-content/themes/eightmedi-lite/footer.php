<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package 8Medi Lite
 */

?>

</div><!-- #content -->

<footer id="colophon" class="site-footer" role="contentinfo">
	<div class="footer-wrap">
		<div class="ed-container-home">
			<?php
			if(is_active_sidebar('eightmedi-lite-widget-footer-1')){ ?>
				<div class="top-footer wow fadeInLeft">
					<?php
					dynamic_sidebar('eightmedi-lite-widget-footer-1');
					?>
				</div>
				<?php
			}
			?>
		</div>
		<div class="main-footer">
			<div class="ed-container-home">
				<div class="site-info">
					&copy; 2017 Bản quyền thuộc về Nha Khoa Sao Mỹ
				</div><!-- .site-info -->
				<?php if(get_theme_mod('eightmedi_lite_social_icons_in_footer','1')==1){ ?>
					<div class="footer-social social-links">
						<?php do_action('eightmedi_lite_social_links');?>
					</div>
					<?php }?>
				</div>
			</div>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->
<!-- <div id="es-top"></div> -->
<?php wp_footer(); ?>

</body>
</html>