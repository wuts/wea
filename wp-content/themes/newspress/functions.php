<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

$content_width = 450;

add_theme_support('automatic-feed-links');
if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h2 class="widgettitle">',
		'after_title' => '</h2>',
	));
}

if ( function_exists('register_sidebar') ) {
    register_sidebar(array(
        'name' => 'Header left nav',
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h2 class="widgettitle">',
        'after_title' => '</h2>',
    ));
}

function limit_contents($string, $word_limit)
{
$words = explode(" ",$string);
return implode(" ",array_splice($words,0,$word_limit));
}
function uploader_function($id,$std){    
    
	$uploader = "";
	$uploader .= '<input type="file" name="attachement_'.$id.'" class="upload_input"></input>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
    $uploader .= '<span class="submit"><input name="save" type="submit" value="Upload" class="button upload_save" /></span><br />';

    $upload = get_option($id);
    
    $uploader .= '<div class="clear"></div>';
    if (empty($upload) || $upload == $std)
    {
    $uploader .= '<br /><input size="60" class="upload-input-text" name="'.$id.'" value="'.$std.'"/>';
    }
    else
    {
    $uploader .= '<br /><input size="60" class="upload-input-text" name="'.$id.'" value="'.$upload.'"/>';
    $uploader .= '<div class="clear"></div>';
    $uploader .= '<br /><a href="'. $upload . '">';
    $uploader .= '<img src="'.get_bloginfo('template_url').'/thumb.php?src='.$upload.'&w=56&h=49&zc=1" alt="" />';
    $uploader .= '</a><br />'; 
    }
return $uploader;
}


$themename = "News Portal";
$all_uploads_path = get_bloginfo('url') . '/wp-content/uploads/';
$shortname = "np";
$theme_categories = array();  
$theme_categories_obj = get_categories('hide_empty=0');
foreach ($theme_categories_obj as $theme_cat) {
    $theme_categories[$theme_cat->cat_ID] = $theme_cat->cat_name;}
$theme_categories_tmp = array_unshift($theme_categories, "Select a category:"); 

$options = array (

	array(	"type" => "open"),
	
	array( "name" => "Upload Logo :",
 	"type" => "title"),
	
	array( "name" => "Logo Size <br /> (52px &times; 64px) : ",					
					"id" => $shortname."_logo",
					"std" => "",
					"type" => "upload"),
	array(	"type" => "close"),					
	
	
    array(	"type" => "open"),
	
	array(	"name" => "Contact Us Link : ",
			"id" => $shortname."_contact_link",
			"std" => "",
			"type" => "text"),	
	
	array(	"name" => "Sidebar Facebook Link : ",
			"id" => $shortname."_facebook_link",
			"std" => "",
			"type" => "text"),
	
	array(	"name" => "Sidebar Twitter Link : ",
			"id" => $shortname."_twitter_link",
			"std" => "",
			"type" => "text"),
	array(	"name" => "Sidebar RSS Link : ",
			"id" => $shortname."_rss_link",
			"std" => "",
			"type" => "text"),					
	array(	"name" => "Select category For Main Section : ",
			"id" => $shortname."_cat_news",
			"std" => "",
			"type" => "select",
			"options" => $theme_categories,
			),
	array(	"name" => "Select upper category of the center column : ",
			"id" => $shortname."_cat_world",
			"std" => "",
			"type" => "select",
			"options" => $theme_categories,
			),
	array(	"name" => "Select lower category of the center column : ",
			"id" => $shortname."_cat_sports",
			"std" => "",
			"type" => "select",
			"options" => $theme_categories,
			),																		
	
	array(  "name" => "Disable Settings ?",
			"desc" => "Check this box if you would like to DISABLE  Settings.",
            "id" => $shortname."_setting_disable",
            "type" => "checkbox",
            "std" => "false"			
			),
	
	array(	"type" => "close")
	
);

function mytheme_add_admin() {

    global $themename, $shortname, $options;

    if ( isset($_GET['page'])&&$_GET['page'] == basename(__FILE__) ) {
    

		
		
		if ( isset($_REQUEST['action'])&&'save' == $_REQUEST['action'] ) {

                foreach ($options as $value) {
				
		             if ( isset($value['id'])&& isset($_REQUEST[ $value['id'] ] ))   						    
                     update_option( $value['id'], $_REQUEST[ $value['id'] ] ); 
					
					}

                foreach ($options as $value) {
				
			
						
                    if ( isset($value['id'])&& isset($_REQUEST[ $value['id'] ] ))  { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } 
					else { 
					if ( isset($value['id'])) 
					delete_option( $value['id'] ); } 
					
					if( isset($value['type'])&&$value['type'] == 'upload'){
					
					        $id = $value['id']; 					
					
                            $override['test_form'] = false;
                            $overrides = array( 'action' => 'wp_handle_upload' );
							
                            
                             if(!empty( $_FILES['attachement_'.$id]['name'])){ //New upload
							 
							              
                                    
									$uploaded_file = wp_handle_upload($_FILES['attachement_' . $id ],$override); 
                                    $uploaded_file['option_name']  = $value['name'];
                                    //echo $uploaded_file['url'];
									$upload_tracking[] = $uploaded_file;
									                        
									update_option($value['id'] , $uploaded_file['url'] );
                                    }
                             
                        }
					}

                header("Location: themes.php?page=functions.php&saved=true");
                die;

        } else if(isset($_REQUEST['action'])&&'reset' == $_REQUEST['action'] ) {

            foreach ($options as $value) {
                delete_option( $value['id'] ); }

            header("Location: themes.php?page=functions.php&reset=true");
            die;

        }
    }

    add_theme_page($themename." Options", "".$themename." Options", 'edit_themes', basename(__FILE__), 'mytheme_admin');

}

function mytheme_admin() {

    global $themename, $shortname, $options;

    if (isset($_REQUEST['saved'])) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings saved.</strong></p></div>';
    if (isset($_REQUEST['reset'])) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings reset.</strong></p></div>';
    
?>
<div class="wrap">
<h2><?php echo $themename; ?> Theme Settings</h2>

<form method="post" enctype="multipart/form-data">



<?php foreach ($options as $value) { 
    
	switch ( $value['type'] ) {
	
		case "open":
		?>
        <table width="100%" border="0" style="background-color:#eef5fb; padding:10px;">
		
        
        
		<?php break;
		
		case "close":
		?>
		
        </table><br />
        
        
		<?php break;
		
		case "title":
		?>
		<table width="100%" border="0" style="background-color:#dceefc; padding:5px 10px;">
		<tr>
        	<td colspan="2"><h3 style="font-family:Georgia,'Times New Roman',Times,serif;"><?php echo $value['name']; ?></h3></td>
        </tr>
                
        
		<?php break;

		case 'text':
		?>
        
        <tr>
            <td width="20%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
            <td width="80%"><input style="width:400px;" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_option( $value['id'] ) != "") { echo get_option( $value['id'] ); } else { echo $value['std']; } ?>" /></td>
        </tr>

        <tr>
            <td><small><?php if(isset($value['desc'])){echo $value['desc'];}?></small></td>
        </tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #000000;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>

		<?php 
		break;
		
		case 'textarea':
		?>
        
        <tr>
            <td width="20%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
            <td width="80%"><textarea name="<?php echo $value['id']; ?>" style="width:400px; height:200px;" type="<?php echo $value['type']; ?>" cols="" rows=""><?php if ( get_option( $value['id'] ) != "") { echo get_option( $value['id'] ); } else { echo $value['std']; } ?></textarea></td>
            
        </tr>

        <tr>
            <td><small><?php if(isset($value['desc'])){echo $value['desc'];}?></small></td>
        </tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #000000;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>

		<?php 
		break;
		
		case 'upload':
		?>
		
        <tr>
		<td width="20%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
        <td width="80%">
		<?php echo uploader_function($value['id'],$value['std']);?>
		</td>
        </tr>
		<?php 
		break;
		
		case 'select':
		?>
        <tr>
            <td width="20%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
            <td width="80%"><select style="width:240px;" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>"><?php foreach ($value['options'] as $option) { ?><option<?php if ( get_option( $value['id'] ) == $option) { echo ' selected="selected"'; } elseif ($option == $value['std']) { echo ' selected="selected"'; } ?>><?php echo $option; ?></option><?php } ?></select></td>
       </tr>
                
       <tr>
            <td><small><?php if(isset($value['desc'])){echo $value['desc'];}?></small></td>
       </tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #000000;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>

		<?php
        break;
            
		case "checkbox":
		?>
            <tr>
            <td width="20%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
                <td width="80%"><?php if(get_option($value['id'])){ $checked = "checked=\"checked\""; }else{ $checked = ""; } ?>
                        <input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> />
                        </td>
            </tr>
                        
            <tr>
                <td><small><?php echo $value['desc']; ?></small></td>
           </tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #000000;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>
            
        <?php 		break;
	
 
} 
}
?>

<!--</table>-->

<p class="submit">
<input name="save" type="submit" value="Save changes" />    
<input type="hidden" name="action" value="save" />
</p>
</form>
<form method="post">
<p class="submit">
<input name="reset" type="submit" value="Reset" />
<input type="hidden" name="action" value="reset" />
</p>
</form>

<?php
}

add_action('admin_menu', 'mytheme_add_admin');
function caption_off() {
return true;
}


add_action('admin_menu', 'mytheme_add_admin'); 

function my_init() {
	if (!is_admin()) {
		wp_enqueue_script('jquery');
		wp_enqueue_script( 'ex-js', get_bloginfo('template_directory').'/js/ex-js.js', array( 'jquery' ) );
	}
}
add_action('init', 'my_init');
function hls_set_query() {
  $query  = esc_attr(get_search_query());

  if(strlen($query) > 0){
    echo '
      
	  <script type="text/javascript">
        var hls_query  = "'.$query.'";
      </script>
    
	';
  }
}
add_action('wp_print_scripts', 'hls_set_query');
function my_search_form( $form ) {

    $form = '<form role="search" method="get" id="searchform" action="' . home_url( '/' ) . '" >
    <div>
    <input type="text" value="' . get_search_query() . '" name="s" id="s"  />
    <input type="submit" id="searchsubmit" value="'. esc_attr__('Go!') .'" />
    </div>
    </form>';

    return $form;
}
add_filter( 'get_search_form', 'my_search_form' );
?>
