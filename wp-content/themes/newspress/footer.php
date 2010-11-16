<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */
?>

<div id="back">
	<ul>
	  <?php wp_list_pages('title_li=&depth=1');?>
	  <li><a href="#page">Back to Top</a></li>
	</ul>
	
</div>

<div id="footer">
<!-- If you'd like to support WordPress, having the "powered by" link somewhere on your blog is the best way; it's our only promotion or advertising. -->
	<p>Copyright 2010 <?php bloginfo('name'); ?> | Designed by <a href="http://www.zoarra.com/wordpress-themes/">Zoarra WP Themes</a> | Powered by <a href="http://www.wordpress.org/">WordPress.</a></p>
</div>
</div>
</div>
<!-- Gorgeous design by Michael Heilemann - http://binarybonsai.com/kubrick/ -->
<?php /* "Just what do you think you're doing Dave?" */ ?>

		<?php wp_footer(); ?>
</body>
</html>
