<footer class="row expanded">

	<div class="column sign-up">

		<div class="row">
			<?php if ( $sign_up_title = get_field ('sign_up_title', 'option') ): ?>
				<h3 class=""><?php echo $sign_up_title; ?></h3>
			<?php endif; ?>

			<?php if ( $sign_up_description = get_field ('sign_up_description', 'option') ): ?>
			   <p class="footer-p"><?php echo $sign_up_description; ?></p>
			<?php endif; ?>

			<?php echo do_shortcode( '[contact-form-7 id="101" title="Sign Up Form"]' ); ?>
		</div>

	</div>

	<div class="column contacts">

		<?php if ( $your_artistry_name = get_field ('your_artistry_name', 'option') ): ?>
			<h3 class=""><?php echo $your_artistry_name; ?></h3>
		<?php endif; ?>

		<?php if ( $footer_position = get_field ('footer_position', 'option') ): ?>
		   <p class="footer-p"><?php echo $footer_position; ?></p>
		<?php endif; ?>

		<?php if ( $footer_name = get_field ('footer_name', 'option') ): ?>
		   <p class="footer-p"><?php echo $footer_name; ?></p>
		<?php endif; ?>

		<div class="column medium-4">
			<?php if ($footer_address_icon = get_field('footer_address_icon', 'option')): ?>
			  <span class="footer-address-icon"><?php echo $footer_address_icon ?></span>
			<?php endif ?>

			<?php if ( $footer_address = get_field ('footer_address', 'option') ): ?>
			   <span class=""><?php echo $footer_address; ?></span>
			<?php endif; ?>
		</div>

		<div class="column medium-4">
			<?php if ($footer_email_icon = get_field('footer_email_icon', 'option')): ?>
			  <span class="footer-email-icon"><?php echo $footer_email_icon ?></span>
			<?php endif ?>

			<?php if ( $footer_email = get_field ('footer_email', 'option') ): ?>
			   <span class=""><?php echo $footer_email; ?></span>
			<?php endif; ?>
		</div>

		<div class="column medium-4">
			<?php if ($footer_phone_icon = get_field('footer_phone_icon', 'option')): ?>
			  <span class="footer-phone-icon"><?php echo $footer_phone_icon ?></span>
			<?php endif ?>

			<?php if ( $footer_phone_number = get_field ('footer_phone_number', 'option') ): ?>
			   <span class=""><?php echo $footer_phone_number; ?></span>
			<?php endif; ?>
		</div>

	</div>

	<div class="column social">

		<?php if ( $social_title = get_field ('social_title', 'option') ): ?>
		   <h3 class=""><?php echo $social_title; ?></h3>
		<?php endif; ?>

		<?php if ( $social_description = get_field ('social_description', 'option') ): ?>
		   <p class="footer-p"><?php echo $social_description; ?></p>
		<?php endif; ?>


		<?php if (have_rows('footer_social_icons', 'option')): ?>

	      <div class="footer-social-icons row">

	         <?php while (have_rows('footer_social_icons', 'option')): the_row();
	            $footer_social_icon = get_sub_field('footer_social_icon', 'option');
	            $footer_social_link = get_sub_field('footer_social_link', 'option');
	         ?>
	            <?php if ($footer_social_link): ?>
	              <div class="wrapper-icon"><a class="footer-social-link" href="<?php echo $footer_social_link ?>"><?php echo $footer_social_icon ?></a></div>
	            <?php endif ?>

	         <?php endwhile ?>
	      </div>

		 <?php endif ?>

	</div>
	
</footer>

<?php wp_footer(); ?>

</body>
</html>