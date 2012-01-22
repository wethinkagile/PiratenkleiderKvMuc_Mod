<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content
 * after.  Calls sidebar-footer.php for bottom widgets.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
?>
	</div><!-- #main -->
</div><!-- #wrapper -->

<?php comments_template( '', true ); ?>

<?php // On homepage display pre_footer

if ( is_home() || is_front_page() ) {?>

<div id="pre_footer">
<div id="categories">

	<!-- Pre_footer 1 -->
	<div class="pre_area">
		<h1 style="margin-bottom:15px;">Pressemitteilungen</h1>
		<div>
			<?php query_posts('category_name=presse&posts_per_page=5'); ?>
			<?php while ( have_posts() ) : the_post(); ?>	
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<div class="entry-meta"><?php the_time('j. F, Y') ?></div><!-- .entry-meta -->
				<div class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'twentyten' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></div> <!-- .entry-title -->	
			</div><!-- #post-## -->	
			<?php endwhile;  ?>
			<div><a href="category/presse">Alle Pressemitteilungen →</a></div>			
		</div>
	</div><!-- #pm -->
	<!-- Pre_footer 1 End -->
	
	<!-- Pre_footer 2 -->
	<div class="pre_area">
		<h1 style="margin-bottom:15px;">Politblog</h1>
		<div>
			<?php query_posts('category_name=politblog&posts_per_page=5'); ?>
			<?php while ( have_posts() ) : the_post(); ?>	
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<div class="entry-meta"><?php the_time('j. F, Y') ?></div><!-- .entry-meta -->
				<div class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'twentyten' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></div>
			</div><!-- #post-## -->	
			<?php endwhile; // End the loop. Whew. ?>	
			<div><a href="category/politblog">Alle Politiposts →</a></div>			
		</div>	
	</div><!-- #blog -->
	<!-- Pre_footer 2 End -->
	
	<!-- Pre_footer 3 - Widget -->
	<div class="pre_area" class="widget-area">
		<?php if ( is_active_sidebar( 'fourth-footer-widget-area' ) ) : ?>
			<ul class="xoxo">
					<?php dynamic_sidebar( 'fourth-footer-widget-area' ); ?>
			</ul>
		<?php endif; //If active sidebar ?>
	</div>
	<!-- Pre_footer 3 End -->

</div><!-- #categories -->
</div> <!-- #pre_footer -->

<?php } //If home ?>

<div id="footer" role="contentinfo">
	<div id="colophon">
		<?php get_sidebar( 'footer' ); ?>
	</div><!-- #colophon -->

<div class="license">
	<a rel="license" href="http://www.gnu.org/licenses/gpl-3.0-standalone.html"><img alt="GNU GPLv3" style="border-width:0" src="http://www.gnu.org/graphics/gplv3-88x31.png" /></a> <a rel="license" href="http://www.gnu.org/licenses/gpl-3.0-standalone.html">GNU GPLv3</a> | Original Design by <a href="http://korbinian-polk.de">Korbinian</a> | <a href="http://wordpress.org/">Wordpress</a> theme by <a href="http://jay.lu/piratenkleider/">Jay</a> and <a href="https://github.com/nottinhill/PiratenkleiderKvMuc_Mod">nottinhill</a> | Social Media Icons by <a href="http://dryicons.com">Dryicons</a>
</div> <!-- #license -->

</div><!-- #footer -->

<?php
	/* Always have wp_footer() just before the closing </body>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to reference JavaScript files.
	 */

	wp_footer();
?>
</body>
</html>
