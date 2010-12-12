<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

get_header(); ?>

<div id="content" class="narrowcolumn">

<div class="narrowcolumn-left">
<?php
define("IMAGE_FILETYPE", "(bmp|gif|jpeg|jpg|png)", true);
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
if ($np_setting_disable == "false") 
{
$cat_news = $np_cat_news;
$cat_world = $np_cat_world;
$cat_sports = $np_cat_sports;
} 
else 
{
$cat_news = "Choose main category";
$cat_world = "Choose category#2";
$cat_sports = "Choose category#3";
}
?> 
<div id="left-upper">
<div class="news">
	<?php 
	$main_cat_id = get_cat_ID($cat_news);
	?>
	<h2><a href="<?php echo get_category_link($main_cat_id); ?>"><?php echo $cat_news;?></a></h2>
</div>

<?php query_posts('showposts=4&category_name='.$cat_news);?>
	    <?php if (have_posts()) : $i=0; $mm = 0; ?>
		
		
		<?php while (have_posts()) : the_post(); $i++; ?>
		 <?php 
		        $thumb = "";	   
				$string=$post->post_content;
   				$string = apply_filters('the_content', $string);
				$string = str_replace(']]>', ']]&gt;', $string);													
				$p = '/(http:([^"]*.)'.IMAGE_FILETYPE.')/';				
				preg_match($p,$string,$matches);
				if($matches)
				{				
				 $thumb=$matches[0];									
				}
	    	
			if($i==1)
			{
				$image_width = 171;
				$image_height = 175;
				$style_width = '300px';				
			
			?>

			<div class="post">
			<?php if(!empty($thumb)) {?>
				<div class="post_thumb"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php echo '<img src="'. get_bloginfo('template_url'). '/thumb.php?src='. $thumb .'&amp;h='.$image_height.'&amp;w='.$image_width.'&amp;zc=1&amp;q=100" alt="" width="'.$image_width.'" height="'.$image_height.'" />'; ?></a></div>
				<?php $thumb = ""; } ?>
				
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
				<p>
				<?php echo limit_contents($content,75).'...';?>
				<a class="read-more" href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">Read more</a>	
				</p>			
					
							
				</div>
				
			</div>
			
			<?php 
			}
			else
			{
				$image_width = 82;
				$image_height = 84;
				$style_width = '380px';											
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
				<p>
				<?php echo limit_contents($content,22).'...';?>
				<a class="read-more" href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">Read more</a>	
				</p>			
					
							
				</div>
				
			</div>
			
			<?php 
			}
			?>
			

		<?php endwhile; ?>

	<?php else : ?>

		<h2 class="center">Not Found</h2>
		<p class="center">Sorry, but you are looking for something that isn't here.</p>
		<?php get_search_form(); ?>

	<?php endif; ?>
	<?php wp_reset_query();?>
</div>


<div id="left-lower">
<div class="news">
	<h2 style="padding-left:10px;">Latest Stories</h2>
</div>

	<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>

			<div class="post">
				
				
				
				<h2><img style="padding: 0 0px 0 0; margin: 0 4px 2px 0;" src="<?php bloginfo('stylesheet_directory');?>/images/sidebararrow.gif" alt=""/><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
				<small><?php the_time('F j') ?> | Posted by <?php the_author() ?> | <?php the_category(', ') ?> | </small>
				<a class="read-more" href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">Read more</a>
				
			</div>

		<?php endwhile; ?>
		<div class="navigation" style="float:left;padding-top:10px;width:480px;">
			<div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
			<div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
		</div>

	<?php else : ?>

		<h2 class="center">Not Found</h2>
		<p class="center">Sorry, but you are looking for something that isn't here.</p>
		

	<?php endif; ?>
</div>
</div>



<div id="narrowcolumn-right">
<div class="right-upper">

	<div class="world">
	<?php 
	$right_top_cat_id = get_cat_ID($cat_world);
	?>
		<h3><a href="<?php echo get_category_link($right_top_cat_id); ?> "><?php echo $cat_world; ?></a></h3>
	</div>

<?php query_posts('showposts=4&category_name='.$cat_world);?> <?php $i=0;?>
	<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); $i++;?>
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
						
	    	?>
			

			<div class="post" <?php if($i==1){echo 'style="border: none;"';}?>>
				<?php if(!empty($thumb)) {?>
				<div class="post_thumb small_thumb"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php echo '<img src="'. get_bloginfo('template_url'). '/thumb.php?src='. $thumb .'&amp;h=55&amp;w=72&amp;zc=1&amp;q=100" alt="" width="72" height="55" />'; ?></a></div>
				<?php } else { ?>
				<div class="post_thumb small_thumb"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><img src="<?php bloginfo('stylesheet_directory')?>/images/pending_thumb.jpg" width="72" height="55" alt="" /></a></div>
				<?php } ?>
				<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
				<small><?php the_time('F j') ?> | Posted by <?php the_author() ?></small>

				<div class="entry">
					 <?php
					 $content = get_the_content();
					 $content = apply_filters('the_content', $content);
					 $content = str_replace(']]>', ']]&gt;', $content);	
					 $content = str_replace('<div>', '', $content);	
					 $content = strip_tags($content, '<div>');     							 					 
				   ?>
				<p>
				<?php echo limit_contents($content,12).'...';?>
				<a class="read-more" href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">Read more</a>		
				</p>			
					
							
				</div>
			
			</div>

		<?php endwhile; ?>

	<?php else : ?>

		<h2 class="center">Not Found</h2>
		<p class="center">Sorry, but you are looking for something that isn't here.</p>
		

	<?php endif; ?>
</div>

<div class="right-lower">

	<div class="world">
	<?php 
	$right_bottom_cat_id = get_cat_ID($cat_sports);
	?>
		<h3><a href="<?php echo get_category_link($right_bottom_cat_id); ?> "><?php echo $cat_sports; ?></a></h3>
	</div>
<?php query_posts('showposts=4&category_name='.$cat_sports);?> <?php $i=0;?>
	<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); $i++;?>
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
						
	    	?>
			

			<div class="post" <?php if($i==1){echo 'style="border: none;"';}?>>
				<?php if(!empty($thumb)) {?>
				<div class="post_thumb small_thumb"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php echo '<img src="'. get_bloginfo('template_url'). '/thumb.php?src='. $thumb .'&amp;h=55&amp;w=72&amp;zc=1&amp;q=100" alt="" width="72" height="55" />'; ?></a></div>
				<?php } else { ?>
				<div class="post_thumb small_thumb"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><img src="<?php bloginfo('stylesheet_directory')?>/images/pending_thumb.jpg" width="72" height="55" alt="" /></a></div>
				<?php } ?>
			
				<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
				<small><?php the_time('F j') ?> | Posted by <?php the_author() ?></small>

				<div class="entry">
					 <?php
					 $content = get_the_content();
					 $content = apply_filters('the_content', $content);
					 $content = str_replace(']]>', ']]&gt;', $content);	
					 $content = str_replace('<div>', '', $content);	
					 $content = strip_tags($content, '<div>');     							 					 
				   ?>
				<p>
				<?php echo limit_contents($content,12).'...';?>
				<a class="read-more" href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">Read more</a>
				</p>			
				
					
				</div>
			
			
			</div>

		<?php endwhile; ?>

	<?php else : ?>

		<h2 class="center">Not Found</h2>
		<p class="center">Sorry, but you are looking for something that isn't here.</p>
		

	<?php endif; ?>
</div>
</div>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>