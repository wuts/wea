<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

get_header(); 
define("IMAGE_FILETYPE", "(bmp|gif|jpeg|jpg|png)", true);
?>

	<div id="content" class="widecolumn">

	<?php if (have_posts()) : ?>

		<h2 class="pagetitle">Search Results for "<?php echo $_REQUEST['s'];?>"</h2>


		<?php while (have_posts()) : the_post(); ?>

			<?php 			   
				$thumb = "";
				$string=$post->post_content;
   				$string = apply_filters('the_content', $string);
				$string = str_replace(']]>', ']]&gt;', $string);										
				$p = '/(http:([^"]*.)'.IMAGE_FILETYPE.')/';
				$p2 = '/(<img(.*?)>)/ie';
				preg_match($p,$string,$matches);
				if($matches)
				$thumb=$matches[0];				
				$image_width = 171;
				$image_height = 175;
				$style_width = '510px';						
	    	?>					
		<div class="post">
				<?php if(!empty($thumb)) {?>
				<div class="post_thumb"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php echo '<img src="'. get_bloginfo('template_url'). '/thumb.php?src='. $thumb .'&amp;h='.$image_height.'&amp;w='.$image_width.'&amp;zc=1&amp;q=100" alt="" width="'.$image_width.'" height="'.$image_height.'" />'; ?></a></div>
				<?php } ?>				
				<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
				<small><?php the_time('F j') ?> | Posted by <?php the_author() ?> | <?php the_category(', ') ?></small>
				<div class="entry">
					 <?php
					 $content = get_the_content();
					 $content = apply_filters('the_content', $content);
					 $content = str_replace(']]>', ']]&gt;', $content);	
					 $content = str_replace('<div>', '', $content);	
					 $content = strip_tags($content, '<div>');     							 					 
				   ?>
				<p style="padding-top:0;">
				<?php echo limit_contents($content,80).'...';?>
				<a class="read-more" href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">Read more</a>		
				</p>
									
				</div>				
			</div>

		<?php endwhile; ?>
		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
			<div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
		</div>
	<?php else : ?>
		<h2 class="center">No posts found. Try a different search?</h2>
		<?php get_search_form(); ?>
	<?php endif; ?>
	</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>