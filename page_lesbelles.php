<?php
	//Template Name: Les Belles
?>

<?php get_header(); ?>

<div id="body">
	<a name="home"></a>
	<div class="b1">
		<div class="cntr">
			<div class="info">
				<h3><?php echo get_field('field_5508398645803'); ?></h3>
				<p><?php echo get_field('field_5508399945804'); ?></p>
			</div>
			<div class="img">
				<img src="<?php echo get_template_directory_uri(); ?>/img/home.jpg">
			</div>
			<div class="content-container">
				<div class="content">
					<div class="logo"><img src="<?php echo get_template_directory_uri(); ?>/img/logo-les-belles-black.png"></div>
					<h1><?php echo get_field('field_54eb564600dab'); ?></h1>
					<div class="arrow">
						<a href="#aanbod">
							<img src="<?php echo get_template_directory_uri(); ?>/img/arrow-bottom.png">
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		jQuery(document).ready(function() {
	  function setHeight() {
	    windowHeight = jQuery(window).innerHeight();
	    jQuery('.b1').css('min-height', windowHeight);
	  };
	  setHeight();

	  jQuery(window).resize(function() {
	    setHeight();
	  });
	});
	</script>
	<div class="b2">
		<div class="cntr">
			<?php get_template_part( 'templates-parts/main-navigation' ) ?>
		</div>
	</div>
	<div class="navigation <?php if( is_user_logged_in() ): echo 'logged-in'; endif; ?>" id="navigation">
		<div class="cntr">
			<?php get_template_part( 'templates-parts/main-navigation' ) ?>
		</div>
	</div>
	<script type="text/javascript">
		jQuery(function() {

		    // grab the initial top offset of the navigation
		    var sticky_navigation_offset_top = jQuery('.b2').offset().top;

		    // our function that decides weather the navigation bar should have "fixed" css position or not.
		    var sticky_navigation = function(){
		        var scroll_top = jQuery(window).scrollTop(); // our current vertical position from the top

		        // if we've scrolled more than the navigation, change its position to fixed to stick to top,
		        // otherwise change it back to relative
		        if (scroll_top > sticky_navigation_offset_top) {
		            jQuery('#navigation').css({ 'position': 'fixed', 'display': 'block', 'top':0 , 'left':0 });
		        } else {
		            jQuery('#navigation').css({ 'display': 'none', 'position': 'relative' });
		        }
		    };

		    // run our function on load
		    sticky_navigation();

		    // and run it again every time you scroll
		    jQuery(window).scroll(function() {
		         sticky_navigation();
		    });

		});
	</script>
	<a name="aanbod" class="jump"></a>
	<div class="b3">
		<div class="cntr">
			<div class="images" id="slider-aanbod">
				<?php
				if( have_rows('field_54eb5690fc255') ):
					echo '<ul>';
					while ( have_rows('field_54eb5690fc255') ) : the_row();
						echo '<li>';
							$image = get_sub_field('field_54eb56aafc256');
							if( !empty($image) ) :
								echo wp_get_attachment_image( $image, 'aanbod' );
							endif;
						echo '</li>';
				    endwhile;
				    echo '</ul>';
				else :
				endif;
				?>
			</div>
			<script type="text/javascript">
				jQuery(window).load(function() {
					jQuery('#slider-aanbod').flexslider( {
						selector: 'ul > li',
						animation: "slide",
						animationSpeed: 1000,
						slideshowSpeed: 3000,
						direction: "horizontal",
						animationLoop: true,
						controlNav: false,
						directionNav: true,
						touch: true,
						useCSS: true,
						prevText: '',
						nextText: '',
						slideshow: false,
					} );
				} );
			</script>
			<div class="percentage-sold">
				<div class="percentage-sold-container">
					<div class="percentage-sold-container-content">
						Reeds
						<h3><?php echo get_field('field_54eb56ecfc257'); ?>%</h3>
						verkocht
					</div>
				</div>
			</div>
			<div class="content-container">
				<div class="arrow">
					<img src="<?php echo get_template_directory_uri(); ?>/img/arrow-content-white-top.png">
				</div>
				<div class="content">
					<h2><?php echo get_field('field_54eb5722fc258'); ?></h2>
					<div class="excerpt">
						<?php echo get_field('field_54eb5743fc259'); ?>
					</div>
					<?php echo get_field('field_54eb575bfc25a'); ?>
				</div>
			</div>
		</div>
	</div>
	<a name="afwerking" class="jump"></a>
	<div class="b4">
		<div class="cntr">
			<div class="images" id="slider-afwerking">
				<?php
				if( have_rows('field_54eb57a9e0854') ):
					echo '<ul>';
					while ( have_rows('field_54eb57a9e0854') ) : the_row();
						echo '<li>';
							$image = get_sub_field('field_54eb57a9e4ced');
							if( !empty($image) ) :
								echo wp_get_attachment_image( $image, 'afwerking' );
							endif;
						echo '</li>';
				    endwhile;
				    echo '</ul>';
				else :
				endif;
				?>
			</div>
			<script type="text/javascript">
				jQuery(window).load(function() {
					jQuery('#slider-afwerking').flexslider( {
						selector: 'ul > li',
						animation: "fade",
						animationSpeed: 1000,
						slideshowSpeed: 3000,
						//direction: "horizontal",
						animationLoop: false,
						controlNav: false,
						directionNav: true,
						touch: true,
						useCSS: false,
						prevText: '',
						nextText: '',
						slideshow: false,
					} );
				} );
			</script>
			<div class="content-container">
				<div class="arrow">
						<img src="<?php echo get_template_directory_uri(); ?>/img/arrow-content-white-top.png">
					</div>
				<div class="content">
					<h2><?php echo get_field('field_54eb57a9e09ab'); ?></h2>
					<?php echo get_field('field_54eb57a9e0b04'); ?>
					<div class="excerpt">
						<p>Download hieronder enkele typeplannen:</p>
					</div>
					<?php
					if( have_rows('field_54ef299557012') ):
						echo '<ul>';
						while ( have_rows('field_54ef299557012') ) : the_row();
							echo '<li>';
								echo '<a href="' . get_sub_field('field_54ef29df57014') . '" target="_blank">' . get_sub_field('field_54ef29c857013') . '</a>';
							echo '</li>';
					    endwhile;
					    echo '</ul>';
					else :
					endif;
					?>
				</div>
			</div>
		</div>
	</div>
	<a name="debuurt" class="jump"></a>
	<div class="b5">
		<div class="cntr">
			<h2><?php echo get_field('field_54eb581723ee4'); ?></h2>
			<div class="content-container">
				<div class="map">
					<img src="<?php echo get_template_directory_uri(); ?>/img/map.png">
				</div>
				<div class="arrow">
						<img src="<?php echo get_template_directory_uri(); ?>/img/arrow-content-white-top.png">
					</div>
				<div class="content">
					<?php echo get_field('field_54eb582c23ee5'); ?>
					<ul>
						<li>
							<h3>Winkelen</h3>
							<?php
							if( have_rows('field_54eb5853eb165') ):
								echo '<ul>';
								while ( have_rows('field_54eb5853eb165') ) : the_row();
									echo '<li>';
										echo '<div class="number">';
											echo '<div class="number-container">';
												echo '<div class="number-container-content">' . get_sub_field('field_54eb586beb166') . '</div>';
											echo '</div>';
										echo '</div>';
										echo '<div class="info">' . get_sub_field('field_54eb587ceb167') . '</div>';
									echo '</li>';
							    endwhile;
							    echo '</ul>';
							else :
							endif;
							?>
						</li>
						<li>
							<h3>Eten & drinken</h3>
							<?php
							if( have_rows('field_54eb5893eb168') ):
								echo '<ul>';
								while ( have_rows('field_54eb5893eb168') ) : the_row();
									echo '<li>';
										echo '<div class="number">';
											echo '<div class="number-container">';
												echo '<div class="number-container-content">' . get_sub_field('field_54eb5893eb169') . '</div>';
											echo '</div>';
										echo '</div>';
										echo '<div class="info">' . get_sub_field('field_54eb5893eb16a') . '</div>';
									echo '</li>';
							    endwhile;
							    echo '</ul>';
							else :
							endif;
							?>
						</li>
						<li>
							<h3>Ontspannen</h3>
							<?php
							if( have_rows('field_54eb58bfeb16b') ):
								echo '<ul>';
								while ( have_rows('field_54eb58bfeb16b') ) : the_row();
									echo '<li>';
										echo '<div class="number">';
											echo '<div class="number-container">';
												echo '<div class="number-container-content">' . get_sub_field('field_54eb58bfeb16c') . '</div>';
											echo '</div>';
										echo '</div>';
										echo '<div class="info">' . get_sub_field('field_54eb58bfeb16d') . '</div>';
									echo '</li>';
							    endwhile;
							    echo '</ul>';
							else :
							endif;
							?>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<a name="contact" class="jump"></a>
	<div class="b6">
		<div class="cntr">
			<div class="arrow">
				<img src="<?php echo get_template_directory_uri(); ?>/img/arrow-content-black-top.png">
			</div>
			<div class="content-container">
				<div class="content">
					<h2>Voor info & verkoop</h2>
					<div class="content-container">
						<div class="arrow">
								<img src="<?php echo get_template_directory_uri(); ?>/img/arrow-content-white-top.png">
							</div>
						<div class="content">
							<ul>
								<li>
									<h3>Berno Beveren</h3>
									<p>
										<a href="tel:+32489122444">03 775 03 30</a><br/>
										<a href="mailto:beveren@berno.be?subject=Reactie via lesbelles.be" target="_blank">beveren@berno.be</a><br/>
										<a href="http://www.berno.be" target="_blank">www.berno.be</a>
									</p>
									<img src="<?php echo get_template_directory_uri(); ?>/img/logo-berno.jpg" style="width: auto; height: auto;">
								</li>
								<li>
									<h3>Urbis Group</h3>
									<p>
										<a href="tel:+3292331530">03 284 04 04</a><br/>
										<a href="mailto:info@urbis.be?subject=Reactie via lesbelles.be" target="_blank">info@urbis.be</a><br/>
										<a href="http://www.urbis.be" target="_blank">www.urbis.be</a>
									</p>
									<p style="margin-top: 1em">
										<span style="text-transform:uppercase">Urbis Waasland</span><br/>
										Plezantstraat 24/1<br>
										9100 Sint-Niklaas<br/>
										van ma-vr, van 9u-12u of op afspraak
									</p>
									<img src="<?php echo get_template_directory_uri(); ?>/img/logo-urbis-group.jpg">
								</li>
							</ul>
						</div>
					</div>
					<div class="form">
						<?php gravity_form(
							1,
							$display_title = false,
							$display_description = false,
							$display_inactive = false,
							$field_values = null,
							$ajax = true
						);
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>
