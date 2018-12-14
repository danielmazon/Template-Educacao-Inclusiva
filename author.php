<?php get_header(); ?>

<div class="container" style="padding-top:100px;">



<div id="autorarea">
<?php if (function_exists('get_avatar')) { echo get_avatar( get_the_author_email(), '100' ); }?>
<div>
<h3>Sobre o Autor <?php the_author_posts_link(); ?></h3>
<p><?php the_author_description(); ?></p>
</div>
</div>

<p><?php //echo do_shortcode( '[wppb-register role="first_name"]' ); ?></p>

<p><?php //echo do_shortcode( '[meta "first_name"]' ); ?></p>





<div class="author-info">
	<h2 class="author-heading"><?php _e( 'Published by', 'twentyfifteen' ); ?></h2>
	<div class="author-avatar"><?php //echo get_wp_user_avatar(get_the_author_meta('ID'), 96); ?>

	</div><!-- .author-avatar -->

	<div class="author-description">
		<h3 class="author-title"><?php echo get_the_author(); ?></h3>

		<p class="author-bio">
			<?php the_author_meta( 'description' ); ?>
			<a class="author-link" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
				<?php printf( __( 'View all posts by %s', 'twentyfifteen' ), get_the_author() ); ?>
			</a>
		</p><!-- .author-bio -->

	</div><!-- .author-description -->
</div><!-- .author-info -->
</div>


<?php get_footer(); ?>