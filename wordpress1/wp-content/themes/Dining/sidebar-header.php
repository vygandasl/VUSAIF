<?php theme_print_sidebar('header-widget-area'); ?>



    <div class="art-shapes">
<div class="art-object1833868466" data-left="0%"></div>
<div class="art-object993932453" data-left="73.65%"></div>

            </div>
<?php if(theme_get_option('theme_header_show_headline')): ?>
	<?php $headline = theme_get_option('theme_'.(is_home()?'posts':'single').'_headline_tag'); ?>
	<<?php echo $headline; ?> class="art-headline" data-left="6.19%">
    <a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a>
</<?php echo $headline; ?>>
<?php endif; ?>
<?php if(theme_get_option('theme_header_show_slogan')): ?>
	<?php $slogan = theme_get_option('theme_'.(is_home()?'posts':'single').'_slogan_tag'); ?>
	<<?php echo $slogan; ?> class="art-slogan" data-left="6.19%"><?php bloginfo('description'); ?></<?php echo $slogan; ?>>
<?php endif; ?>




                        
                    
