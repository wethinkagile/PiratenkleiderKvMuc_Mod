<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title>
<?php

	/*
	 * Print the <title> tag based on what is being viewed.
	 */

	global $page, $paged;
	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";
	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
	echo ' | ' . sprintf( __( 'Page %s', 'twentyten' ), max( $paged, $page ) );
?>
</title>

<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Monofett' >

<script src="http://code.jquery.com/jquery-latest.js"></script>


<?php

	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).

	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	
	wp_head();
?>
</head>

<body <?php body_class(); ?>>

<div id="wrapper" class="hfeed">
	<div id="header">
		<div id="masthead">
			<div id="sub">
				<ul>
				<?php wp_list_bookmarks('title_li=&categorize=0'); ?>
				<li>	
				<!-- #search form -->
					<form method="get" id="searchform" action="<?php bloginfo('home'); ?>/">
					<div>
						<input type="text" size="put_a_size_here" name="s" id="s" value="Search" onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;"/>
						<input type="submit" id="searchsubmit" value="Search" class="btn" />
					</div>
					</form>
				<!-- #search form -->
				</li>
				</ul>
			</div><!-- #sub -->
		
			<div id="logo" style="margin: 5px 0 25px 13px">
				<a href="/"><img src="<?php bloginfo('template_directory'); ?>/images/Logo_KVMuc_classic.png"></a><br />
			<div style="margin: -2px 0 0px 3px; font-family: 'Monofett', serif; font-size: 20px; color:black; font-weight:normal">
				Kreisverband München
			</div>
			</div><!-- #logo -->
			<!--
			<div id="member">
				<a href="/mitglied-werden">Werde Pirat!</a>
			</div>-->
			<div id="menu_wrapper">
				<div id="access" role="navigation">
			  	
				<?php /*  Allow screen readers / text browsers to skip the navigation menu and get right to the good stuff */ ?>
				<div class="skip-link screen-reader-text">
					<a href="#content" title="<?php esc_attr_e( 'Skip to content', 'twentyten' ); ?>"><?php _e( 'Skip to content', 'twentyten' ); ?></a>
				</div>

				<?php /* Our navigation menu.*/ ?>
				<?php wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'primary' ) ); ?>

				<script> // Add arrows if navi element has children
					if ($('ul').is('.children')) {
  						$("li").has("ul").addClass("full");
					}
				</script>

				<?php
				// On home page display "home" logo instead of text				
				if ( is_home() ) { ?>
					<script>
						$('a[title="Home"]').parent().addClass("homelink").removeClass('current_page_item');
					</script>
				<?php } else { ?>
					<script>
						$('a[title="Home"]').parent().addClass("homelink2").removeClass('current_page_item');
					</script>
				<?php }?>

				</div><!-- #access -->
			</div><!-- #menu_wrapper -->
		</div><!-- #masthead -->
	</div><!-- #header -->

<?php // On homepage display slider

if ( is_home() ) { ?>

<div id="slider">
	<div id="slider_wrapper">

		<!-- Picture Slider -->
		<div id="slider_pic">
			<?php if(function_exists('wp_content_slider')) { wp_content_slider(); } //Slider plugin ?>
		</div><!-- slider_pic -->
		
		<!-- Text -->
		<div id="slider_menu">
			<ul class="slider_list">			
			<li>
				<a href="/themen" class="slider_link">
					<div class="slider_pic"><img src="<?php bloginfo('template_directory'); ?>/images/bulb.png"></div>
					<div class="slider_text">Informier Dich!</div>
					über unsere Themen und Ziele
				</a>
			</li>
			<li>
				<a href="/spenden" class="slider_link">
					<div class="slider_pic"><img src="<?php bloginfo('template_directory'); ?>/images/support.png"></div>	
					<div class="slider_text">Unterstütz uns!</div>
					mit einer Spende
				</a>
			</li>
			<li>
				<a href="/mitglied-werden" class="slider_link">
					<div class="slider_pic"><img src="<?php bloginfo('template_directory'); ?>/images/user.png"></div>
					<div class="slider_text">Werde Pirat!</div>
					hier Mitglied werden
				</a>
			</li>
			<ul>
		</div><!-- #slider_menu -->

	</div><!-- #slider_wrapper -->
</div> <!-- #slider -->

<?php } else { //If not homepage display breadcrumbs ?>

<div class="breadcrumb"> 
	<div class="breadcrumb_center">
		<?php if ( function_exists('yoast_breadcrumb') ) {
			yoast_breadcrumb('<p id="breadcrumbs">','</p>');
		} // breadcrumb plugin ?>
	</div><!-- #breadcrumb_center -->
  </div><!-- #breadcrumb -->
<?php }  ?>

<div id="main">
