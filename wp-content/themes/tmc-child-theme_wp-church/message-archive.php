<?php
/**
 * The template for displaying Category Archive pages.
 *
 * @package Netstudio
 * @subpackage One point oh
 * @since Netstudio 1.0
 */
 
 /**
Template Name: Message Archive
 */

get_header(); ?>


<div class="lastmess">
	<div class="container">
		<div class="grid10 first">
			<h1 class="entry-title"><?php the_title(); ?></h1>
		</div>
		<div class="grid2 dirr">
			<?php if (get_option('nets_reassdir')){ ?>
			<a href="<?php echo get_option('nets_reassdir'); ?>"><span><?php echo get_option('nets_sptdir'); ?></span></a>
			<?php } else { ?>
				<a class="vmp" href="#"><span><?php echo get_option('nets_sptdir'); ?></span></a>
			<?php } ?>
		</div>
	</div>
</div>

<div class="bodymid">
	<div class="stripetop">
		<div class="stripebot">
			<div class="container">
				<div class="mapdiv"></div>
				<div class="clear"></div>
				<div id="main">
					<div class="grid8 first">	
						<div id="content" role="main">
							<?php $args = array( 'post_type' => 'messages', 'posts_per_page' => 10 );
							$loop = new WP_Query( $args );
							while ( $loop->have_posts() ) : $loop->the_post(); ?>
							<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>	
								<div class="fwrapper">
									<div class="finfo">
										<h4><?php the_title(); ?></h4>
										<?php 
										$past = get_post_meta(get_the_ID(), 'netlabs_preacher' , true); 
										$evnt = get_post_meta(get_the_ID(), 'netlabs_messevent' , true);
										$dte = get_post_meta(get_the_ID(), 'netlabs_messagedate' , true);
										$pssg = get_post_meta(get_the_ID(), 'netlabs_passage' , true);
										$yout = get_post_meta(get_the_ID(), 'netlabs_messyoutube' , true);  
										$vimeo = get_post_meta(get_the_ID(), 'netlabs_messvimeo' , true); 
										$mplink = get_post_meta(get_the_ID(), 'netlabs_uploadlink' , true);        
										?>
										<?php if ($past || $evnt || $dte) { ?>
										<p><?php echo $past; ?>
											<?php if ($evnt) {?>
					 						at  <?php echo $evnt; ?>
											<?php } ?>
											<?php if ($dte) {?>
					 						- <?php echo $dte; ?>
					 						<?php } ?>
					 					</p>
					 					<?php } ?>
										<span> <?php echo book_replace($pssg); ?></span>
									</div>
									<div class="ftd">
										<?php if ($yout) {?>	
										<div class="fvid" rel="<?php the_ID(); ?>">
											<a class="vid" href="http://www.youtube.com/watch?v=<?php echo $yout; ?>"><?php _e( 'video', 'wp-church' ); ?></a>
										</div>
										<?php } ?>
										<?php if ($vimeo) {?>	
										<div class="fvid" rel="<?php the_ID(); ?>">
											<a class="vim" href="http://vimeo.com/<?php echo $vimeo; ?>"><?php _e( 'video', 'wp-church' ); ?></a>
										</div>
										<?php } 
										 if ($mplink) {
											echo '<div rel="' . $mplink . '" class="fmp"></div>';
										} else {											
										 get_mpt(get_the_ID());
										}
										 
										?>
										<div class="finf" rel="<?php the_ID(); ?>">
											<a href="<?php the_permalink(); ?>"><?php _e( 'more', 'wp-church' ); ?></a>
										</div>										
									</div>
									<div class="clear"></div>
									<div class="infoholder" style="margin-top: 10px;"></div>
								</div>
							</div><!-- #post-## -->
							<?php endwhile; ?>
							<?php adminace_paging(); ?>
						</div><!-- #content -->
					</div><!-- #container -->

					<?php get_footer(); ?>