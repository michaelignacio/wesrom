
</main>

<?php do_action( 'tailpress_content_end' ); ?>

</div>

<?php do_action( 'tailpress_content_after' ); ?>

<footer id="colophon" class="site-footer bg-gray-50 py-12" role="contentinfo">
	<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 max-w-screen-content mx-auto px-10 2xl:px-0 gap-10">
		<div>
			<h2><?php echo wp_get_nav_menu_name('footer_menu_1'); ?></h2>
			<?php wp_nav_menu(
				array(
					'container_id'    => 'footer-menu-1',
					'container_class' => '',
					'menu_class'      => 'lg:flex lg:-mx-4',
					'theme_location'  => 'footer_menu_1',
					'li_class'        => 'lg:mx-4',
					'fallback_cb'     => false,
				)
			);
			?>
		</div>
		<div>
			<h2><?php echo wp_get_nav_menu_name('footer_menu_2'); ?></h2>
			<?php wp_nav_menu(
				array(
					'container_id'    => 'footer-menu-2',
					'container_class' => '',
					'menu_class'      => 'lg:flex lg:-mx-4',
					'theme_location'  => 'footer_menu_2',
					'li_class'        => 'lg:mx-4',
					'fallback_cb'     => false,
				)
			);
			?>
		</div>
		<div class="widget">
			<?php dynamic_sidebar('footer-address-widget'); ?>
		</div>
		<div class="widget">
			<?php dynamic_sidebar('footer-socials-widget'); ?>
		</div>
	</div>
	<?php do_action( 'tailpress_footer' ); ?>
</footer>

</div>

<?php wp_footer(); ?>

</body>
</html>
