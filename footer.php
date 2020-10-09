<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Operation_O3
 */
?>
	<footer id="colophon" class="site-footer">
	
<?php
$the_query = new WP_Query(array(
	'pagename' => 'footer-info'
));

if ( $the_query->have_posts() ) :
	while ( $the_query->have_posts() ) :
		$the_query-> the_post();

$address_line1 = get_field('address_line_1');
$address_line2 = get_field('address_line_2');
$phone_number = get_field('phone_number');
$team_members = get_field('team_members');

?>
		
		<div class="footer__content-cont">
			<div class="footer__logo"><img alt="O3 Logo" src="<?php	echo get_template_directory_uri() . '/images/o3_footer-logo.png' ?>"></div>
			<div class="footer__contact-info">
				<span class="footer__address-line1"><?php echo $address_line1; ?></span>
				<span class="footer__address-line2"><?php echo $address_line2; ?></span>
				<span class="footer__phone-number"><?php echo $phone_number; ?></span>
			</div>
			<?php if ($team_members) : ?>
			<div class="footer__team-members">
				<?php foreach ($team_members as $team_member) : ?>
				<div class="footer__team-member-cont">
					<span class="footer__team-member-name"><?php echo $team_member['name']; ?></span>
					<span class="footer__team-member-phone-number"><?php echo $team_member['phone_number']; ?></span>
					<span class="footer__team-member-email"><?php echo $team_member['email_address']; ?></span>
				</div>
				<?php endforeach; ?>
			</div>
			<?php endif; ?>
		</div><!-- .site-info -->
		
<?php endwhile; endif; ?>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
