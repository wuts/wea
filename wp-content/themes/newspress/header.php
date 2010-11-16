<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php if(!is_single()) { ?>
<style type="text/css">
.wp-caption-text,.wp-caption
{
 display:none;
}
</style>
<?php } ?>
<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="page">
<div id="wrapper">
<div id="header">
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
if ($np_setting_disable == "false") 
{
$contact_link = $np_contact_link;
$logo_img = $np_logo;
} 
else 
{
} 
?>

	<div id="headerimg">
		<div id="logo">
		<a href="<?php echo get_option('home'); ?>/">
		<?php if(!empty($logo_img)) 
		{ 
		?>		
		<?php echo '<img src="'. get_bloginfo('template_url'). '/thumb.php?src='.$logo_img.'&amp;h=49&amp;w=56&amp;zc=1&amp;q=100" alt="" width="56" height="49" />'; ?>
		<?php 
		}
		else
		{
		?>
		<img src="<?php bloginfo('stylesheet_directory');?>/images/logo.png" width="56" height="49" alt=""  />
		<?php 
		}
		?>
		</a>
		</div>
		<div id="headerimg_des">
			<h1><a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a></h1>
			<div class="description"><?php bloginfo('description'); ?></div>
		</div>
		<div style="float:right;width:75px;padding-top:5px;">
		<a style="color:#000000;font-size:12px;font-weight:bold;" href="<?php echo $contact_link?>">Contact Us</a>
		</div>
	<div id="header_menu">
	<?php get_search_form(); ?>
	<ul>      
		
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Header left nav') ) : ?>
		
        <li>
		  <ul>
		   <li><a href="<?php echo get_option('home'); ?>/">Home</a></li>		  
		   </ul>
		</li>   
     	    
		
		<?php endif; ?>
		
	</ul>
	</div>
	</div>
	</div>

