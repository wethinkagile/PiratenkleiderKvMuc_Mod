<?php
/**
 * The Sidebar containing the primary and secondary widget areas.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
?>

<?php if ( is_home() ) { ?>
	<div id="primary" class="widget-area" role="complementary" style="padding-top: 15px;border-left: 1px solid #EFEFEF;">
<?php  } else { ?>	
	<div id="primary" class="widget-area" role="complementary"> 
<?php }?>

<?php

if ( ! is_home() ) { 

	if ($post->post_parent)	{
		$ancestors=get_post_ancestors($post->ID);
		$root=count($ancestors)-1;
		$parent = $ancestors[$root];
	} else {
		$parent = $post->ID;
	}
	// If not home display subnavi in sidebar
	$children = wp_list_pages("title_li=&child_of=". $parent ."&echo=0");
	 	if ($children) 
		{ ?>
	  		<ul id="subnavi">
	 			<?php echo $children; ?>
	 		</ul>
		<?php } 
} ?>

<ul class="xoxo">
<?php if ( is_home() ) {
	/* When we call the dynamic_sidebar() function, it'll spit out
	 * the widgets for that widget area. If it instead returns false,
	 * then the sidebar simply doesn't exist, so we'll hard-code in
	 * some default sidebar stuff just in case.
	 */
	if ( ! dynamic_sidebar( 'primary-widget-area' ) ) : ?>
	<?php endif; } else { // end primary widget area  ?>
</ul>

<?php //If custom field "custom_comment" exists, post comment

$key = 'custom_comment';
$themeta = get_post_meta($post->ID, $key, TRUE);

if ($themeta != '') { ?>
	<div id="author_comment">

		<?php //Post citation if it exists
		$key2 = 'comment';
		$themeta2 = get_post_meta($post->ID, $key2, TRUE);
		
		if ($themeta2 != '') { ?>
		<div id="citation">
			<div class="qm_o">&laquo;</div> 
				<?php echo get_post_meta($post->ID, 'comment', true); ?> 
			<div class="qm_c">&raquo;</div>
		</div><!-- citation --> 
 		<?php } ?>

		<div class="ac_wrapper">
			<div id="foto"><img src="<?php echo get_post_meta($post->ID, 'photo', true); ?>"></div><!-- foto -->  
			<div id="author"><?php echo get_post_meta($post->ID, 'name', true); ?>, <?php echo get_post_meta($post->ID, 'function', true); ?><br> <?php echo get_post_meta($post->ID, 'contact', true); ?></div><!-- author -->  
		</div><!-- ac_wrapper -->
</div><!-- author_comment -->
<?php } ?>

</div><!-- #primary .widget-area -->

<?php
	// A second sidebar for widgets, just because.
	if ( is_active_sidebar( 'secondary-widget-area' ) ) : ?>

		<div id="secondary" class="widget-area" role="complementary">
			<ul class="xoxo">
				<?php dynamic_sidebar( 'secondary-widget-area' ); ?>
			</ul>
		</div><!-- #secondary .widget-area -->

<?php endif;} ?>
