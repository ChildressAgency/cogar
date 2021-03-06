<?php

function show_template() {
	global $template;
	print_r($template);
}
add_action('wp_footer', 'show_template');

add_action('wp_enqueue_scripts', 'jquery_cdn');
function jquery_cdn(){
  if(!is_admin()){
    wp_deregister_script('jquery');
    wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js', false, null, true);
    wp_enqueue_script('jquery');
  }
}

add_action('wp_enqueue_scripts', 'cogar_scripts', 100);
function cogar_scripts(){
  wp_register_script(
    'bootstrap-script', 
    '//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js', 
    array('jquery'), 
    '', 
    true
  );

  wp_register_script(
    'fontawesome',
    '//use.fontawesome.com/004c3c54fb.js',
    array('jquery'),
    '',
    false
  );

  wp_register_script(
    'bootstrap-slider',
    get_template_directory_uri() . '/js/bootstrap-slider.min.js',
    array('jquery'),
    '', 
    true
  );
  
  wp_register_script(
    'google-maps',
    '//maps.googleapis.com/maps/api/js?key=AIzaSyDsAyHKgU5GtaAEIGB3p3qy9p8kgpWrGL4',
    array('jquery'),
    '',
    false
  );

  wp_register_script(
    'cogar-scripts', 
    get_template_directory_uri() . '/js/cogar-scripts.js', 
    array('jquery'), 
    '', 
    true
  );
  
  wp_enqueue_script('bootstrap-script');
  wp_enqueue_script('fontawesome');
  if(is_page('contact')){
    wp_enqueue_script('bootstrap-slider');
  }
	wp_enqueue_script('google-maps');
  wp_enqueue_script('cogar-scripts');  
}

add_action('wp_enqueue_scripts', 'cogar_styles');
function cogar_styles(){
  wp_register_style('bootstrap-css', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css');
  wp_register_style('google-fonts', '//fonts.googleapis.com/css?family=Bree+Serif|Lato:400,400i,700');
  wp_register_style('bootstrap-slider-css', get_template_directory_uri() . '/css/bootstrap-slider.min.css');
  wp_register_style('cogar', get_template_directory_uri() . '/style.css');
  
  wp_enqueue_style('bootstrap-css');
  wp_enqueue_style('google-fonts');
  if(is_page('contact')){
  	wp_enqueue_style('bootstrap-slider-css');
  }
  wp_enqueue_style('cogar');
}

/**
 * Class Name: wp_bootstrap_navwalker
 * GitHub URI: https://github.com/twittem/wp-bootstrap-navwalker
 * Description: A custom WordPress nav walker class to implement the Bootstrap 3 navigation style in a custom theme using the WordPress built in menu manager.
 * Version: 2.0.4
 * Author: Edward McIntyre - @twittem
 * License: GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */

class wp_bootstrap_navwalker extends Walker_Nav_Menu {

	/**
	 * @see Walker::start_lvl()
	 * @since 3.0.0
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param int $depth Depth of page. Used for padding.
	 */
	public function start_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat( "\t", $depth );
		$output .= "\n$indent<ul role=\"menu\" class=\" dropdown-menu\">\n";
	}

	/**
	 * @see Walker::start_el()
	 * @since 3.0.0
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param object $item Menu item data object.
	 * @param int $depth Depth of menu item. Used for padding.
	 * @param int $current_page Menu item ID.
	 * @param object $args
	 */
	public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		/**
		 * Dividers, Headers or Disabled
		 * =============================
		 * Determine whether the item is a Divider, Header, Disabled or regular
		 * menu item. To prevent errors we use the strcasecmp() function to so a
		 * comparison that is not case sensitive. The strcasecmp() function returns
		 * a 0 if the strings are equal.
		 */
		if ( strcasecmp( $item->attr_title, 'divider' ) == 0 && $depth === 1 ) {
			$output .= $indent . '<li role="presentation" class="divider">';
		} else if ( strcasecmp( $item->title, 'divider') == 0 && $depth === 1 ) {
			$output .= $indent . '<li role="presentation" class="divider">';
		} else if ( strcasecmp( $item->attr_title, 'dropdown-header') == 0 && $depth === 1 ) {
			$output .= $indent . '<li role="presentation" class="dropdown-header">' . esc_attr( $item->title );
		} else if ( strcasecmp($item->attr_title, 'disabled' ) == 0 ) {
			$output .= $indent . '<li role="presentation" class="disabled"><a href="#">' . esc_attr( $item->title ) . '</a>';
		} else {

			$class_names = $value = '';

			$classes = empty( $item->classes ) ? array() : (array) $item->classes;
			$classes[] = 'menu-item-' . $item->ID;

			$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );

			if ( $args->has_children )
				$class_names .= ' dropdown';

			if ( in_array( 'current-menu-item', $classes ) )
				$class_names .= ' active';

			$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

			$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
			$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

			$output .= $indent . '<li' . $id . $value . $class_names .'>';

			$atts = array();
			$atts['title']  = ! empty( $item->title )	? $item->title	: '';
			$atts['target'] = ! empty( $item->target )	? $item->target	: '';
			$atts['rel']    = ! empty( $item->xfn )		? $item->xfn	: '';

			// If item has_children add atts to a.
			if ( $args->has_children && $depth === 0 ) {
				//$atts['href']   		= '#';
                                $atts['href'] = ! empty( $item->url ) ? $item->url : '';
				//$atts['data-toggle']	= 'dropdown';
				$atts['class']			= 'dropdown-toggle';
				$atts['aria-haspopup']	= 'true';
			} else {
				$atts['href'] = ! empty( $item->url ) ? $item->url : '';
			}

			$atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args );

			$attributes = '';
			foreach ( $atts as $attr => $value ) {
				if ( ! empty( $value ) ) {
					$value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
					$attributes .= ' ' . $attr . '="' . $value . '"';
				}
			}

			$item_output = $args->before;

			/*
			 * Glyphicons
			 * ===========
			 * Since the the menu item is NOT a Divider or Header we check the see
			 * if there is a value in the attr_title property. If the attr_title
			 * property is NOT null we apply it as the class name for the glyphicon.
			 */
			if ( ! empty( $item->attr_title ) )
				$item_output .= '<a'. $attributes .' class="bold"><span class="glyphicon ' . esc_attr( $item->attr_title ) . '"></span>&nbsp;';
			else
				$item_output .= '<a'. $attributes .' class="bold">';

			$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
			$item_output .= ( $args->has_children && 0 === $depth ) ? ' <span class="caret"></span></a>' : '</a>';
			$item_output .= $args->after;

			$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
		}
	}

	/**
	 * Traverse elements to create list from elements.
	 *
	 * Display one element if the element doesn't have any children otherwise,
	 * display the element and its children. Will only traverse up to the max
	 * depth and no ignore elements under that depth.
	 *
	 * This method shouldn't be called directly, use the walk() method instead.
	 *
	 * @see Walker::start_el()
	 * @since 2.5.0
	 *
	 * @param object $element Data object
	 * @param array $children_elements List of elements to continue traversing.
	 * @param int $max_depth Max depth to traverse.
	 * @param int $depth Depth of current element.
	 * @param array $args
	 * @param string $output Passed by reference. Used to append additional content.
	 * @return null Null on failure with no changes to parameters.
	 */
	public function display_element( $element, &$children_elements, $max_depth, $depth, $args, &$output ) {
        if ( ! $element )
            return;

        $id_field = $this->db_fields['id'];

        // Display this element.
        if ( is_object( $args[0] ) )
           $args[0]->has_children = ! empty( $children_elements[ $element->$id_field ] );

        parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
    }

	/**
	 * Menu Fallback
	 * =============
	 * If this function is assigned to the wp_nav_menu's fallback_cb variable
	 * and a manu has not been assigned to the theme location in the WordPress
	 * menu manager the function with display nothing to a non-logged in user,
	 * and will add a link to the WordPress menu manager if logged in as an admin.
	 *
	 * @param array $args passed from the wp_nav_menu function.
	 *
	 */
	public static function fallback( $args ) {
		if ( current_user_can( 'manage_options' ) ) {

			extract( $args );

			$fb_output = null;

			if ( $container ) {
				$fb_output = '<' . $container;

				if ( $container_id )
					$fb_output .= ' id="' . $container_id . '"';

				if ( $container_class )
					$fb_output .= ' class="' . $container_class . '"';

				$fb_output .= '>';
			}

			$fb_output .= '<ul';

			if ( $menu_id )
				$fb_output .= ' id="' . $menu_id . '"';

			if ( $menu_class )
				$fb_output .= ' class="' . $menu_class . '"';

			$fb_output .= '>';
			$fb_output .= '<li><a href="' . admin_url( 'nav-menus.php' ) . '">Add a menu</a></li>';
			$fb_output .= '</ul>';

			if ( $container )
				$fb_output .= '</' . $container . '>';

			echo $fb_output;
		}
	}
}

add_action('init', 'cogar_create_post_type');
function cogar_create_post_type(){
  $projects_labels = array(
    'name' => 'Projects',
    'singular_name' => 'Project',
    'menu_name' => 'Projects',
    'add_new_item' => 'Add Project',
    'search_items' => 'Search Projects',
    'edit_items' => 'Edit Project',
    'new_items' => 'New Project',
    'not_found' => 'No Projects Found'
  );
  $projects_args = array(
    'labels' => $projects_labels,
    'capability_type' => 'post',
    'public' => true,
    'menu_position' => 5, 
    'query_var' => 'cogar_projects',
    'supports' => array('title', 'editor', 'custom_fields', 'comments', 'revisions')
  );
  register_post_type('cogar_projects', $projects_args);

  register_taxonomy('project_types',
    'cogar_projects',
    array(
      'hierarchical' => true,
      'labels' => array(
        'name' => 'Project Types',
        'singular_name' => 'Project Type',
        'menu_name' => 'Project Types',
        'all_items' => 'All Project Types',
        'edit_item' => 'Edit Project Type',
        'view_item' => 'View Project Type',
        'update_item' => 'Update Project Type',
        'add_new_item' => 'Add New Project Type',
        'new_item_name' => 'New Project Type',
        'search_items' => 'Search Project Types',
        'not_found' => 'Project Type Not Found'
      )
    )
  );
}

if(function_exists('acf_add_options_page')){
  acf_add_options_page(array(
    'page_title' => 'General Site Settings',
    'menu_title' => 'General Settings',
    'menu_slug' => 'global-settings',
    'capability' => 'edit_posts',
    'redirect' => false
  ));
}
if(function_exists('acf_add_options_page')){
  acf_add_options_page(array(
    'page_title' => 'Customer Reviews',
    'menu_title' => 'Reviews',
    'menu_slug' => 'reviews',
    'capability' => 'edit_posts',
    'redirect' => false
  ));
}

add_action('acf/init', 'cogar_acf_init');
function cogar_acf_init(){
	acf_update_setting('google_api_key', 'AIzaSyDsAyHKgU5GtaAEIGB3p3qy9p8kgpWrGL4');
}

add_filter('next_post_link', 'cogar_next_post_link_attributes');
function cogar_next_post_link_attributes($output){
	$code = 'class="btn-main pull-right"';
	return str_replace('<a href=', '<a ' . $code . ' href=', $output);
}

add_filter('previous_post_link', 'cogar_previous_post_link_attributes');
function cogar_previous_post_link_attributes($output){
	$code = 'class="btn-main pull-left"';
	return str_replace('<a href=', '<a ' . $code . ' href=', $output);
}