<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */
?>
	<div id="sidebar">
	<?php
global $options;
foreach ($options as $value) 
	 {
	 if(isset($value['id']))
	 {
	  if (get_option( $value['id'] ) === FALSE) 
		   { $$value['id'] = $value['std']; } 
	  else { $$value['id'] = get_option( $value['id'] ); }
	 }
}
?> 
		<ul>
			<li>
			 <h2>Follow Us on</h2>			  
				<a style="margin-left:9px;" href="<?php echo $np_facebook_link;?>"><img src="<?php bloginfo('stylesheet_directory');?>/images/facebook.jpg" alt=""/></a>
				<a href="<?php echo $np_twitter_link;?>"><img src="<?php bloginfo('stylesheet_directory');?>/images/twitter.jpg" alt=""/></a>
				<a href="<?php echo $np_rss_link;?>"><img src="<?php bloginfo('stylesheet_directory');?>/images/rss.jpg" alt=""/></a>
			</li>
			
			
						
			<?php 	/* Widgetized sidebar, if you have the plugin installed. */
					if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : ?>			
		</ul>
		
		<ul>
		
			<li>
				
			</li>

			<?php endif; ?>
		</ul>
	</div>

