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
	  
	  <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
 	  <?php /* If this is a category archive */ if (is_category()) { ?>
		<h2 class="pagetitle">Archive for the &#8216;<?php single_cat_title(); ?>&#8217; Category</h2>
 	  <?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
		<h2 class="pagetitle">Posts Tagged &#8216;<?php single_tag_title(); ?>&#8217;</h2>
 	  <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
		<h2 class="pagetitle">Archive for <?php the_time('F jS, Y'); ?></h2>
 	  <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
		<h2 class="pagetitle">Archive for <?php the_time('F, Y'); ?></h2>
 	  <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
		<h2 class="pagetitle">Archive for <?php the_time('Y'); ?></h2>
	  <?php /* If this is an author archive */ } elseif (is_author()) { ?>
		<h2 class="pagetitle">Author Archive</h2>
 	  <?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
		<h2 class="pagetitle">Blog Archives</h2>
 	  <?php } ?>
		<?php while (have_posts()) : the_post(); ?>
		
		 <?php 			   
				$thumb = "";
				$string=$post->post_content;				
   				$string = apply_filters('the_content', $string);
				$string = str_replace(']]>', ']]&gt;', $string);										
				$p = '/(http:([^"]*.)'.IMAGE_FILETYPE.')/';
				$p2 = '/(<img(.*?)>)/ie';
				$regular_expression1 = '~<img [^\>]*\ />~';
				preg_match($p,$string,$matches);
				if($matches)
				$thumb=$matches[0];				
				$image_width = 171;
				$image_height = 175;
				$style_width = '510px';						
	    	?>
			
		
		<div <?php post_class() ?>>
				<?php if(!empty($thumb)) {?>
				<div class="post_thumb"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php echo '<img src="'. get_bloginfo('template_url'). '/thumb.php?src='. $thumb .'&amp;h='.$image_height.'&amp;w='.$image_width.'&amp;zc=1&amp;q=100" alt="" width="'.$image_width.'" height="'.$image_height.'" />'; ?></a></div>
				<?php } ?>
				
				<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
				<small><?php the_time('F j') ?> | Posted by <?php the_author() ?> | <?php the_category(', ') ?></small>
                <small><?php the_tags('Tags: ', ', ', '<br />'); ?></small>
				<div class="entry">
				   <?php
					 $content = get_the_content();
					 $content = apply_filters('the_content', $content);
					 $content = str_replace(']]>', ']]&gt;', $content);	
					 $content = str_replace('<div>', '', $content);	
					 $content = strip_tags($content, '<div>');     							 					 
				   ?>
				<p style="padding-top:0;">
				<?php echo stripslashes(limit_contents($content,60).'...');?>				
				<a class="read-more" href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">Read more</a>		
				</p>				
							
				</div>
				
			</div>

		<?php endwhile; ?>

		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
			<div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
		</div>
	<?php else :

		if ( is_category() ) { // If this is a category archive
			printf("<h2 class='center'>Sorry, but there aren't any posts in the %s category yet.</h2>", single_cat_title('',false));
		} else if ( is_date() ) { // If this is a date archive
			echo("<h2>Sorry, but there aren't any posts with this date.</h2>");
		} else if ( is_author() ) { // If this is a category archive
			$userdata = get_userdatabylogin(get_query_var('author_name'));
			printf("<h2 class='center'>Sorry, but there aren't any posts by %s yet.</h2>", $userdata->display_name);
		} else {
			echo("<h2 class='center'>No posts found.</h2>");
		}
		get_search_form();

	endif;
?>

	</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
