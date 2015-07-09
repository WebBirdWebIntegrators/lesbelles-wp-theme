<?php get_header(); ?>

<div id="body">
	<div class="wrapper">
		<div class="content post-category">

			<?php get_search_form(); ?>
			
			<h1>Archives by Month:</h1>
			<ul>
				<?php wp_get_archives('type=monthly'); ?>
			</ul>
			
			<h1>Archives by Subject:</h1>
			<ul>
				 <?php wp_list_categories(); ?>
			</ul>

		</div>
		<div id="aside">
			<?php get_sidebar(); ?>
		</div>
	</div>
</div>

<?php get_footer(); ?>