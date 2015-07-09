<?php get_header(); ?>

<div id="body">
	<div class="b1">
		<div class="cntr">
			<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
			<?php if (is_category()) { ?>
				<h1>Archive for the '<?php single_cat_title(); ?>' Category</h1>
			<?php } elseif( is_post_type_archive() ) { ?>
				<h1><?php post_type_archive_title(); ?></h1>
			<?php } elseif( is_tag() ) { ?>
				<h1>
					<span>Tag</span><div class="divider">/</div><?php single_tag_title(); ?>
				</h1>
				<div class="description">
					<?php 
						$description = tag_description();
						echo $description; 
					?>
				</div>
			<?php } elseif( is_archive() ) { ?>
				<?php
					$customPostType = get_post_type();
					$postTypeObject = get_post_type_object( $customPostType );
					$taxonomyTitle = get_taxonomy( get_query_var( 'taxonomy' ) );
					$taxonomy = $wp_query->get_queried_object();
					echo '<h1>';
					echo '<span>';
					echo $postTypeObject->labels->singular_name;
					echo '</span>';
					//echo $taxonomyTitle->labels->name;
					echo '<div class="divider">/</div>';
					echo $taxonomy->name;
					echo '</h1>'; 
					echo '<div class="description">' . $taxonomy->description . '</div>';
				?>		
			<?php } elseif (is_day()) { ?>
				<h1>Archive for <?php the_time('F jS, Y'); ?></h1>
			<?php } elseif (is_month()) { ?>
				<h1>Archive for <?php the_time('F, Y'); ?></h1>
			<?php  } elseif (is_year()) { ?>
				<h1>Archive for <?php the_time('Y'); ?></h1>
			<?php } elseif (is_author()) { ?>
				<h1>Author Archive</h1>
			<?php } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
				<h1>Blog Archives</h1>
			<?php } ?>
			
		</div>
	</div>
	<div class="b2">
		<div class="cntr archive">
			<div class="content with-sidebar">

			<?php if (have_posts()) : ?>
		
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
		
			<?php else :
		
				if ( is_category() ) { // If this is a category archive
					printf("<h2>Sorry, but there aren't any posts in the %s category yet.</h2>", single_cat_title('',false));
				} else if ( is_date() ) { // If this is a date archive
					echo("<h2>Sorry, but there aren't any posts with this date.</h2>");
				} else if ( is_author() ) { // If this is a category archive
					$userdata = get_userdatabylogin(get_query_var('author_name'));
					printf("<h2>Sorry, but there aren't any posts by %s yet.</h2>", $userdata->display_name);
				} else {
					echo("<h2>No posts found.</h2>");
				}
		
			endif;
		?>

		</div>
			<div class="sidebar">
				<?php if ( is_tag() ) { ?>
					
				<?php } else { ?>
					<?php if ( ! get_post_type( array('page', 'attachment', 'post') ) ) { ?>
						<div class="sidebar-default taxonomy-terms">
							Oeps ...
							<p><strong>Remark:</strong> For the moment we can't seem to get the taxonomy names / labels.</p>
							<?php
								$customPostType = get_post_type();
								$customPostTaxonomies = get_object_taxonomies($customPostType);
								if(count($customPostTaxonomies) > 0) {
									foreach($customPostTaxonomies as $tax) {
										$args = array(
							         	  'orderby' => 'name',
								          'show_count' => 0,
							        	  'pad_counts' => 0,
								          'hierarchical' => 1,
							        	  'title_li' => '',
							        	  'current_category' => 1,
							        	  'taxonomy' => $tax,
							        	);
										
										echo '<h2>';
											$taxonomyTitle = get_taxonomy( get_query_var( 'taxonomy' ) );
											echo $taxonomyTitle->labels->name;
										echo '</h2>';
										echo '<ul>';
											wp_list_categories( $args );
										echo '</ul>';
										}
								}
							?>
						</div>
					<?php } ?>
				<?php } ?>
				<?php dynamic_sidebar( 'sidebar1' ); ?>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>