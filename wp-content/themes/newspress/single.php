<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

get_header();
?>

	<div id="content" class="widecolumn">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>       
		 
		<div class="post">		    			
	
			<h2><?php the_title(); ?></h2>
			<small><?php the_time('F j') ?> | Posted by <?php the_author() ?> | <?php the_category(', ') ?></small>
			<small><?php the_tags('Tags: ', ', ', '<br />'); ?></small>

			<div class="entry">
				<?php the_content('<p class="serif">Read the rest of this entry &raquo;</p>'); ?>

				<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
				<?php the_tags( '<p>Tags: ', ', ', '</p>'); ?>


			</div>
		</div>

	<div style="width:698px;padding-left:10px;float:left;">
	<?php comments_template(); ?>
	</div>

	<?php endwhile; else: ?>

		<p>Sorry, no posts matched your criteria.</p>

<?php endif; ?>
<div class="navigation">
			<div class="alignleft"><?php previous_post_link('&laquo; %link') ?></div>
			<div class="alignright"><?php next_post_link('%link &raquo;') ?></div>
		</div>
	</div>
<?php get_sidebar();?>
<?php get_footer(); ?>
