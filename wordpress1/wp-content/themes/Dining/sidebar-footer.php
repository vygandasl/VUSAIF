<?php
global $theme_sidebars;
$places = array();
foreach ($theme_sidebars as $sidebar){
    if ($sidebar['group'] !== 'footer')
        continue;
    $widgets = theme_get_dynamic_sidebar_data($sidebar['id']);
    if (!is_array($widgets) || count($widgets) < 1)
        continue;
    $places[$sidebar['id']] = $widgets;
}
$place_count = count($places);
$needLayout = ($place_count > 1);
if (theme_get_option('theme_override_default_footer_content')) {
    if ($place_count > 0) {
        $centred_begin = '<div class="art-center-wrapper"><div class="art-center-inner">';
        $centred_end = '</div></div><div class="clearfix"> </div>';
        if ($needLayout) { ?>
<div class="art-content-layout">
    <div class="art-content-layout-row">
        <?php 
        }
        foreach ($places as $widgets) { 
            if ($needLayout) { ?>
            <div class="art-layout-cell art-layout-cell-size<?php echo $place_count; ?>">
            <?php 
            }
            $centred = false;
            foreach ($widgets as $widget) {
                 $is_simple = ('simple' == $widget['style']);
                 if ($is_simple) {
                     $widget['class'] = implode(' ', array_merge(explode(' ', theme_get_array_value($widget, 'class', '')), array('art-footer-text')));
                 }
                 if (false === $centred && $is_simple) {
                     $centred = true;
                     echo $centred_begin;
                 }
                 if (true === $centred && !$is_simple) {
                     $centred = false;
                     echo $centred_end;
                 }
                 theme_print_widget($widget);
            } 
            if (true === $centred) {
                echo $centred_end;
            }
            if ($needLayout) {
           ?>
            </div>
        <?php 
            }
        } 
        if ($needLayout) { ?>
    </div>
</div>
        <?php 
        }
    }
?>
<div class="art-footer-text">
<?php
global $theme_default_options;
echo do_shortcode(theme_get_option('theme_override_default_footer_content') ? theme_get_option('theme_footer_content') : theme_get_array_value($theme_default_options, 'theme_footer_content'));
} else { 
?>
<div class="art-footer-text">

<div class="art-content-layout">
    <div class="art-content-layout-row">
    <div class="art-layout-cell layout-item-0" style="width: 33%"><?php if (false === theme_print_sidebar('footer-1-widget-area')) { ?>
        <p style="font-weight: bold; font-size: 16px;">Categories</p>
        <p><a href="#">OUR TEAM</a></p>
        <p><a href="#">TRY US</a></p>
        <p><a href="#">TESTIMONIALS</a></p>
        <p><a href="#">PERSONAL TRAINING</a></p>
        <p><a href="#">CLUB DEVELOPMENT</a></p>
        <p><a href="#">FUNDING AND GRANTS</a></p>
    <?php } ?></div><div class="art-layout-cell layout-item-0" style="width: 34%"><?php if (false === theme_print_sidebar('footer-2-widget-area')) { ?>
        <p style="font-weight:bold; font-size:16px;">Our Services</p>
        <p><a href="#">SPECIAL PROGRAMS</a></p>
        <p><a href="#">PERSONAL TRAINING</a></p>
        <p><a href="#">GROUP TRAINING</a></p>
        <p><a href="#">ON-LINE TRAINING</a></p>
        <p><a href="#">CHILDREN PROGRAMS</a></p>
        <p><a href="#">OTHER</a></p>
    <?php } ?></div><div class="art-layout-cell layout-item-0" style="width: 33%"><?php if (false === theme_print_sidebar('footer-3-widget-area')) { ?>
        <p><img width="128" height="128" alt="" src="<?php echo get_template_directory_uri() ?>/images/1304518875_rss2_5-07.png" class=""></p>
        <p>Icon by <a href="http://www.webdesignerdepot.com/">Webdesigner Depot</a></p>
    <?php } ?></div>
    </div>
</div>

    
  
<?php } ?>
<p class="art-page-footer">
        <span id="art-footnote-links">Powered by <a href="http://wordpress.org/" target="_blank">WordPress</a> and <a href="http://www.artisteer.com/?p=wordpress_themes" target="_blank">WordPress Theme</a> created with Artisteer.</span>
    </p>
</div>
