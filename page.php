<?php get_header(); ?>

<section>

	<div class="container">

		<?php while ( have_posts() ) : the_post(); ?>

		<?php the_content(); ?>

		<?php endwhile; ?>

	</div>

</section>

<?php get_footer(); ?>