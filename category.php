<?php get_header(); ?>

<div id="body">
	<div class="b1">
		<div class="cntr">
			<h1><?php single_cat_title(); ?></h1>
			<?php if ( category_description() ) : // Show an optional category description ?>
				<div class="description">
					<?php echo category_description(); ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
	<div class="b2">
		<div class="cntr category">
			<div class="content with-sidebar">
				<?php if ( have_posts() ) : ?>
					<?php while ( have_posts() ) : the_post(); ?>
						<div <?php post_class() ?>>
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
									<?php the_time('l d F Y') ?> / <?php the_author_posts_link(); ?>
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
				<?php endif; ?>
			</div>
			<div class="sidebar">
				<div class="sidebar-default categories">
					<?php 
						$cat_ID = get_query_var('cat');
						$args = array(
							'show_option_all'    => '',
							'orderby'            => 'name',
							'order'              => 'ASC',
							'style'              => 'list',
							'show_count'         => 0,
							'hide_empty'         => 1,
							'use_desc_for_title' => 1,
							'child_of'           => $cat_ID,
							'feed'               => '',
							'feed_type'          => '',
							'feed_image'         => '',
							'exclude'            => '',
							'exclude_tree'       => '',
							'include'            => '',
							'hierarchical'       => 1,
							'title_li'           => '',
							'show_option_none'   => '',
							'number'             => null,
							'echo'               => 1,
							'depth'              => 0,
							'current_category'   => 0,
							'pad_counts'         => 0,
							'taxonomy'           => 'category',
							'walker'             => null
						 );
						
						echo '<h2>Categories</h2>';
						echo '<ul>';
						if ( wp_list_categories ( $args ) ) {
							wp_list_categories ( $args );
						}
						echo '</ul>';						
					?>
				</div>
				<?php dynamic_sidebar( 'sidebar1' ); ?>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>