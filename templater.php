<?php

// Page Only
function pageOnly($title,$varname,$page_data)
{
// $page_type = $page_data['page_type'];
$title_header_type = $page_data['title_header_type']; // yes|no
$menu_types = $page_data['menu_types']; //nav-bar | swipeout | no-menu

// // test template (output in file mismo)
// $template = 
// $title_header_type.'
// '.$menu_types;


$page_nav ='
<div class="page no-toolbar no-navbar no-swipeback">'; //default (no nav)
if($title_header_type == "true")
{
	switch ($menu_types) {
		case 'nav-bar':
			# code...
			$page_nav ='
<div class="page page-'.$varname.' no-swipeback">
    <div class="navbar navbar-large navbar-transparent">
      <div class="navbar-bg"></div>
      <div class="navbar-inner">
        <div class="left">
          <a href="#" class="link icon-only panel-open" data-panel="left">
              <i class="icon f7-icons if-not-md">menu</i>
              <i class="icon material-icons md-only">menu</i>
          </a>
        </div>
        <div class="title">'.$title.'</div>
        <div class="title-large">
          <div class="title-large-text">'.$title.'</div>
        </div>
      </div>
    </div>
			';
			break;

		case 'swipeout':
			# code...
			$page_nav ='
<div class="page page-'.$varname.'">
    <div class="navbar navbar-large navbar-transparent">
      <div class="navbar-bg"></div>
      <div class="navbar-inner sliding">
        <div class="left">
          <a href="#" class="link back">
	        <i class="icon icon-back"></i>
	        <span class="if-not-md">Back</span>
	      </a>
        </div>
        <div class="title">'.$title.'</div>
        <div class="title-large">
          <div class="title-large-text">'.$title.'</div>
        </div>
      </div>
    </div>
			';
			break;

		case 'no-menu':
			# code...
			$page_nav ='
<div class="page page-'.$varname.' no-swipeback">
  <div class="navbar">
    <div class="navbar-bg"></div>
    <div class="navbar-inner sliding">
      <div class="title">'.$title.'</div>
    </div>
  </div>
			';
			break;
		
		
	}
}

	$template = '
'.$page_nav.'
  <div class="page-content">
    <!-- CONTENT HERE -->

    <!-- END CONTENT HERE -->
  </div>
</div>
';

return $template;

}


// Page With JS
function pageWithJS($title)
{
	$template = '

';

return $template;
}








?>