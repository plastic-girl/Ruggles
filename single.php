<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Starkers
 * @since Starkers 3.0
 */

get_header(); ?>
<div id="main-content">
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

<div class="date">
<div id="heart">
<div id="month"><?php the_time('n') ?>/ </div>
<div id="day"><?php the_time('j') ?></div>
</div>
</div>

					<?php previous_post_link( '%link', '' . _x( '&larr;', 'Previous post link', 'twentyten' ) . ' %title' ); ?>
					<?php next_post_link( '%link', '%title ' . _x( '&rarr;', 'Next post link', 'twentyten' ) . '' ); ?>

					<h2><?php the_title(); ?></h2>

						<?php twentyten_posted_on(); ?>

						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '' . __( 'Pages:', 'twentyten' ), 'after' => '' ) ); ?>

<?php if ( get_the_author_meta( 'description' ) ) : // If a user has filled out their description, show a bio on their entries  ?>
					<div id="proavatar">
							<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'twentyten_author_bio_avatar_size', 60 ) ); ?>
							</div>
							<h2><?php printf( esc_attr__( 'Posted by %s', 'twentyten' ), get_the_author() ); ?></h2>
							<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>">
								<?php printf( __( 'View all posts by %s &rarr;', 'twentyten' ), get_the_author() ); ?>
							</a>
<?php endif; ?>

						<?php twentyten_posted_in(); ?>
						<?php edit_post_link( __( 'Edit', 'twentyten' ), '', '' ); ?>

				<?php previous_post_link( '%link', '' . _x( '&larr;', 'Previous post link', 'twentyten' ) . ' %title' ); ?>
				<?php next_post_link( '%link', '%title ' . _x( '&rarr;', 'Next post link', 'twentyten' ) . '' ); ?>

				<?php comments_template( '', true ); ?>

<?php endwhile; // end of the loop. ?>
</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>