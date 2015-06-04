<?php
/**
 * @package facebook_embedded_videos
*/
/*
Plugin Name: Facebook Embedded Videos
Plugin URI: http://bigbluegroup.net/
Description: With the Embedded Video Player you can easily add Facebook Videos to your website. You can use any public video post by a page or a person as video source.
Version: 0.1
Author: Big Blue Group
Author URI: http://bigbluegroup.net/
*/

class FacebookEmbeddedVideos extends WP_Widget{
    
    public function __construct() {
        $params = array(
            'description' => 'With the Embedded Video Player you can easily add Facebook Videos to your website. You can use any public video post by a page or a person as video source.',
            'name' => 'Facebook Embedded Videos '
        );
        parent::__construct('FacebookEmbeddedVideos','',$params);
    }
    
    public function form($instance) {
        extract($instance);
        
        ?>
                   <!-- Color Picker Script Start -->

<script type='text/javascript'>
    jQuery(document).ready(function($) {
        $('.my-color-picker').wpColorPicker();
    });
</script>

<!-- Color Picker Script End -->

<!-- here will put all widget configuration -->
<p>
    <label for="<?php echo $this->get_field_id('title');?>">Title : </label>
    <input
	class="widefat"
	id="<?php echo $this->get_field_id('title');?>"
	name="<?php echo $this->get_field_name('title');?>"
        value="<?php echo !empty($title) ? $title : "Facebook Embedded Posts"; ?>" />
</p>
<p>
    <label for="<?php echo $this->get_field_id('moduleclass_sfx');?>">Module Suffix : </label>
    <input
	class="widefat"
	id="<?php echo $this->get_field_id('moduleclass_sfx');?>"
	name="<?php echo $this->get_field_name('moduleclass_sfx');?>"
        value="<?php echo !empty($moduleclass_sfx) ? $moduleclass_sfx : " "; ?>" />
</p>
<p>
    <label for="<?php echo $this->get_field_id('fb_url');?>">URL of post : </label>
    <input
	class="widefat"
	id="<?php echo $this->get_field_id('fb_url');?>"
	name="<?php echo $this->get_field_name('fb_url');?>"
        value="<?php echo !empty($fb_url) ? $fb_url : "https://www.facebook.com/video.php?v=10152454700553553"; ?>" />
</p>
<p>
    <label for="<?php echo $this->get_field_id('width');?>">Width : </label>
    <input
	class="widefat"
	id="<?php echo $this->get_field_id('width');?>"
	name="<?php echo $this->get_field_name('width');?>"
        value="<?php echo !empty($width) ? $width : "300"; ?>" />
</p>

<p>
    <label for="<?php echo $this->get_field_id('background');?>">Background Color: </label><br>
    <input
    class="my-color-picker"
    id="<?php echo $this->get_field_id('background');?>"
    name="<?php echo $this->get_field_name('background');?>"
        value="<?php echo !empty($background) ? $background : "#FDFDFD"; ?>" />
</p>
<p>
    <label for="<?php echo $this->get_field_id('border');?>">Border Color: </label><br>
    <input
    class="my-color-picker"
    id="<?php echo $this->get_field_id('border');?>"
    name="<?php echo $this->get_field_name('border');?>"
        value="<?php echo !empty($border) ? $border : "#F5E6E6"; ?>" />
</p>
<p>
    <label for="<?php echo $this->get_field_id('outline');?>">Outline Color: </label><br>
    <input
    class="my-color-picker"
    id="<?php echo $this->get_field_id('outline');?>"
    name="<?php echo $this->get_field_name('outline');?>"
        value="<?php echo !empty($outline) ? $outline : "#FFFDFD"; ?>" />
</p>
<p>
    <label for="<?php echo $this->get_field_id('radius');?>">Border Radius : </label>
    <input
    class="widefat"
    id="<?php echo $this->get_field_id('radius');?>"
    name="<?php echo $this->get_field_name('radius');?>"
        value="<?php echo !empty($radius) ? $radius : "5"; ?>" />
</p>

<?php
    }
    
    public function widget($args, $instance) {
        extract($args);
        extract($instance);
        $title = apply_filters('widget_title', $title);
        $description = apply_filters('widget_description', $description);
	    if(empty($title)) $title = "Facebook Embedded Posts ";
	    if(empty($moduleclass_sfx)) $moduleclass_sfx = "  ";
        if(empty($fb_url)) $fb_url = "https://www.facebook.com/video.php?v=10152454700553553";
        if(empty($width)) $width = "300";
        if(empty($background)) $background = "#FDFDFD";
        if(empty($outline)) $outline = "#FFFDFD";
        if(empty($radius)) $radius = "5px";
        if(empty($border)) $border = "#F5E6E6";
        echo $before_widget;
            echo $before_title . $title . $after_title;
            
            ?>
   <style type="text/css">
    #fb-root {
        display: none;
    }

    .fb_iframe_widget, .fb_iframe_widget span, .fb_iframe_widget span iframe[style] {
        width: 100% !important;
    }   
    .pluginSkinLight.pluginFontHelvetica > div >* {
      width: 100% !important;
    }

    .facebook_embedded_videos{
        padding:5px;
        border: 1px solid <?php echo $border;?>;
        outline: 5px solid <?php echo $outline;?>;
        background: <?php echo $background;?>;
        border-radius: <?php echo $radius;?>px;
    }

</style>      

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=262562957268319&version=v2.3";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

 <div class="facebook_embedded_videos <?php echo $moduleclass_sfx;?>" style="max-width: <?php echo $wideth; ?>px;">
           <div class="fb-video"
              data-href="<?php echo $fb_url;?>"
              data-width="<?php echo $width;?>">
            </div>
			<div style="text-align: right; font-size: 9px; color: #808080; font-weight: normal; font-family: tahoma,verdana,arial,sans-serif; line-height: 1.28; direction: ltr; position:relative; top:-10px;"><a href="http://sparxstudios.com/" target="_blank" style="color: #808080;" title="Visit the website">SparxStudios</a></div>
 </div>
<?php
        echo $after_widget;
    }
}

//registering the color picker
add_action( 'load-widgets.php', 'my_custom_load_video' );

function my_custom_load_video() {    
    wp_enqueue_style( 'wp-color-picker' );        
    wp_enqueue_script( 'wp-color-picker' );    
}


add_action('widgets_init','register_FacebookEmbeddedVideos');
function register_FacebookEmbeddedVideos(){
    register_widget('FacebookEmbeddedVideos');
}