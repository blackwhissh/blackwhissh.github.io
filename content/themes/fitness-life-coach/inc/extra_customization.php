<?php 

$fitness_insight_custom_style= "";

 // slider content alignment

$fitness_insight_slider_content_alignment = get_theme_mod( 'fitness_insight_slider_content_alignment','LEFT-ALIGN');

if($fitness_insight_slider_content_alignment == 'LEFT-ALIGN'){

$fitness_insight_custom_style .='#slider .carousel-caption{';

	$fitness_insight_custom_style .='text-align:left; right: 40%; left: 15%;';

$fitness_insight_custom_style .='}';


}else if($fitness_insight_slider_content_alignment == 'CENTER-ALIGN'){

$fitness_insight_custom_style .='#slider .carousel-caption{';

	$fitness_insight_custom_style .='text-align:center; right: 15%; left: 15%;';

$fitness_insight_custom_style .='}';


}else if($fitness_insight_slider_content_alignment == 'RIGHT-ALIGN'){

$fitness_insight_custom_style .='#slider .carousel-caption{';

	$fitness_insight_custom_style .='text-align:right; right: 15%; left: 40%;';

$fitness_insight_custom_style .='}';

}

//sticky-header
if (false === get_option('fitness_insight_sticky_header')) {
    add_option('fitness_insight_sticky_header', 'off');
}

// Define the custom CSS based on the 'fitness_insight_sticky_header' option

if (get_option('fitness_insight_sticky_header', 'off') !== 'on') {
    $fitness_insight_custom_style .= '.fixed_header.fixed {';
    $fitness_insight_custom_style .= 'position: static;';
    $fitness_insight_custom_style .= '}';
}

if (get_option('fitness_insight_sticky_header', 'off') !== 'off') {
    $fitness_insight_custom_style .= '.fixed_header.fixed {';
    $fitness_insight_custom_style .= 'position: fixed; background: #fc3c2a!important; padding: 1rem;';
    $fitness_insight_custom_style .= '}';

    $fitness_insight_custom_style .= '.admin-bar .fixed {';
    $fitness_insight_custom_style .= ' margin-top: 32px;';
    $fitness_insight_custom_style .= '}';

    $fitness_insight_custom_style .= '.page-template-custom-home-page .fixed .gb_nav_menu ul li a:hover {';
    $fitness_insight_custom_style .= ' color:#222222';
    $fitness_insight_custom_style .= '}';
}

// slider button
$mobile_button_setting = get_option('fitness_insight_slider_button_mobile_show_hide', '1');
$main_button_setting = get_option('fitness_insight_slider_button_show_hide', '1');

$fitness_insight_custom_style .= '#slider .slider-btn {';

if ($main_button_setting == 'off') {
    $fitness_insight_custom_style .= 'display: none;';
}

$fitness_insight_custom_style .= '}';

// Add media query for mobile devices
$fitness_insight_custom_style .= '@media screen and (max-width: 600px) {';
if ($main_button_setting == 'off' || $mobile_button_setting == 'off') {
    $fitness_insight_custom_style .= '#slider .slider-btn { display: none; }';
}
$fitness_insight_custom_style .= '}';