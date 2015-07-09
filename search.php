<?php get_header(); ?>

<div id="body">
	<div class="b1">
		<div class="cntr">
			<h1><?php printf( __( 'Search Results for: \'%s\'', 'eagle' ), get_search_query() ); ?></h1>
		</div>
	</div>
	<div class="b2">
		<div class="cntr archive">
			<div class="content with-aside">
				<?php if ( have_posts() ) : ?>
					<?php while ( have_posts() ) : the_post(); ?>
						<div <?php post_class( 'post' ) ?>>
							<?php if ( has_post_thumbnail() ) : ?>
								<div class="img">
									<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
										<div class="mask">
											<div class="mask-container">
												<div class="mask-content">
													<i class="fa fa-link"></i>
												</div>
											</div>
										</div>
										<?php the_post_thumbnail('medium-square'); ?>
									</a>
								</div>
							<?php endif ?>	
							<div class="content">
								<h2>
									<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
										<?php the_title() ?>
									</a>
								</h2>
								<div class="date-author">
									<?php the_time('l d F Y') ?> &bull; <?php the_author_posts_link(); ?>
								</div>
								<?php the_excerpt() ?>
								<?php the_tags('<div class="tags"><span>' . __('Tags', 'eagle') . ': </span>', ', ', '</div>'); ?>
								<!--
	<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>" class="read-more">
									<?php _e( 'Read more', 'eagle' ); ?>
								</a>
	-->
							</div>
						</div>
					<?php endwhile; ?>
				<?php else : ?>
					<h2><?php _e('No posts found. Try a different search?', 'eagle'); ?></h2>
					<?php get_search_form(); ?>
				<?php endif; ?>
			</div>
			<div class="sidebar">
				<?php dynamic_sidebar( 'sidebar1' ); ?>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>