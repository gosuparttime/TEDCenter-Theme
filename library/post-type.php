<?php
function person_page_menu() {
  add_menu_page( 'Personnel', 'Personnel', 'edit_posts', 'person-menu', null, '', 31 );
}
add_action('admin_menu', 'person_page_menu');
// Site Options
function home_page_menu() {
  add_menu_page( 'Site Options', 'Site Options', 'edit_posts', 'home-menu', null, '', 32 );
}
// Add Slide Options
if( function_exists('acf_set_options_page_title') )
{
    acf_set_options_page_title( __('Slide Options') );
}

//
add_action('admin_menu', 'home_page_menu');
// Program custom type
function custom_program() { 
	// creating (registering) the custom type 
	register_post_type( 'program', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
	 	// let's now add all the options for this post type
		array('labels' => array(
			'name' => __('Programs', 'program general name'), /* This is the Title of the Group */
			'singular_name' => __('Program', 'program singular name'), /* This is the individual type */
			'add_new' => __('Add New', 'program type item'), /* The add new menu item */
			'add_new_item' => __('Add New Program'), /* Add New Display Title */
			'edit' => __( 'Edit' ), /* Edit Dialog */
			'edit_item' => __('Edit Program'), /* Edit Display Title */
			'new_item' => __('New Program'), /* New Display Title */
			'view_item' => __('View Program'), /* View Display Title */
			'search_items' => __('Search Programs'), /* Search Custom Type Title */ 
			'not_found' =>  __('Nothing found in the Database.'), /* This displays if there are no entries yet */ 
			'not_found_in_trash' => __('Nothing found in Trash'), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'This is the custom post type for handling all programs administered by the TEDCenter' ), /* Custom Type Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'show_in_nav_menus' => false,
			'menu_position' => 30, /* this is what order you want it to appear in on the left hand side menu */ 
			//'menu_icon' => $plugins_url('images/folder.png'), /* the icon for the custom post type menu */
			'rewrite' => array('slug' => 'program'),
			'capability_type' => 'page',
			'hierarchical' => true,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail', 'page-attributes')
	 	) /* end of options */
	); /* end of register post type */
	
	/* this ads your post categories to your custom post type */
	register_taxonomy_for_object_type('program_cat', 'program');
	/* this ads your post tags to your custom post type */
	register_taxonomy_for_object_type('program_tag', 'program');
} 
// adding the function to the Wordpress init
add_action( 'init', 'custom_program');


/* Add Prog Options Page
if( function_exists('acf_add_options_sub_page') )
{
    acf_add_options_sub_page(array(
        'title' => 'Featured Programs',
        'parent' => 'edit.php?post_type=program',
        'capability' => 'edit_posts'
    ));
}
/*
for more information on taxonomies, go here:
http://codex.wordpress.org/Function_Reference/register_taxonomy
*/

// now let's add custom categories (these act like categories)
register_taxonomy( 'program_cat', 
   	array('program'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
   	array('hierarchical' => true,     /* if this is true it acts like categories */             
  		'labels' => array(
		'name' => __( 'Program Categories' ), /* name of the custom taxonomy */
		'singular_name' => __( 'Program Category' ), /* single taxonomy name */
		'search_items' =>  __( 'Search Program Categories' ), /* search title for taxomony */
		'all_items' => __( 'All Program Categories' ), /* all title for taxonomies */
		'parent_item' => __( 'Parent Program Category' ), /* parent title for taxonomy */
		'parent_item_colon' => __( 'Parent Program Category:' ), /* parent taxonomy title */
    	'edit_item' => __( 'Edit Program Category' ), /* edit custom taxonomy title */
    	'update_item' => __( 'Update Program Category' ), /* update title for taxonomy */
    	'add_new_item' => __( 'Add New Program Category' ), /* add new title for taxonomy */
    	'new_item_name' => __( 'New Program Category Name' ) /* name title for taxonomy */
 		),
   		'show_ui' => true,
 		'query_var' => true,
   	)
);   
    
// now let's add custom tags (these act like categories)
register_taxonomy( 'program_tag', 
   	array('program'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
   	array('hierarchical' => false,    /* if this is false, it acts like tags */                
		'labels' => array(
		'name' => __( 'Program Tags' ), /* name of the custom taxonomy */
		'singular_name' => __( 'Program Tag' ), /* single taxonomy name */
		'search_items' =>  __( 'Search Program Tags' ), /* search title for taxomony */
		'all_items' => __( 'All Program Tags' ), /* all title for taxonomies */
		'parent_item' => __( 'Parent Program Tag' ), /* parent title for taxonomy */
		'parent_item_colon' => __( 'Parent Program Tag:' ), /* parent taxonomy title */
		'edit_item' => __( 'Edit Program Tag' ), /* edit custom taxonomy title */
		'update_item' => __( 'Update Program Tag' ), /* update title for taxonomy */
		'add_new_item' => __( 'Add New Program Tag' ), /* add new title for taxonomy */
		'new_item_name' => __( 'New Program Tag Name' ) /* name title for taxonomy */
	),
   		'show_ui' => true,
   		'query_var' => true,
  	)
); 

 
// Staff Members
function custom_staff() { 
	// creating (registering) the custom type 
	register_post_type( 'staff', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
	 	// let's now add all the options for this post type
		array('labels' => array(
			'name' => __('Staff Members', 'staff general name'), /* This is the Title of the Group */
			'singular_name' => __('Staff Member', 'staff singular name'), /* This is the individual type */
			'add_new' => __('Add New', 'staff type item'), /* The add new menu item */
			'add_new_item' => __('Add New Staff Member'), /* Add New Display Title */
			'edit' => __( 'Edit' ), /* Edit Dialog */
			'edit_item' => __('Edit Staff Members'), /* Edit Display Title */
			'new_item' => __('New Staff Member'), /* New Display Title */
			'view_item' => __('View Staff Members'), /* View Display Title */
			'search_items' => __('Search Staff Members'), /* Search Custom Type Title */ 
			'not_found' =>  __('Nothing found in the Database.'), /* This displays if there are no entries yet */ 
			'not_found_in_trash' => __('Nothing found in Trash'), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'This is the custom post type for handling all TEDCenter staff members' ), /* Custom Type Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 1,
			'show_in_menu' => 'person-menu',
			'menu_icon' => '', /* the icon for the custom post type menu */
			'rewrite' => array('slug' => 'staff'),
			'capability_type' => 'post',
			'hierarchical' => false,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title')
	 	) /* end of options */
	); /* end of register post type */
	
	/* this ads your post categories to your custom post type */
	register_taxonomy_for_object_type('staff_cat', 'staff');
} 
// adding the function to the Wordpress init
add_action( 'init', 'custom_staff');

/*
for more information on taxonomies, go here:
http://codex.wordpress.org/Function_Reference/register_taxonomy
*/  	
// Instructors
function custom_instructors() { 
	// creating (registering) the custom type 
	register_post_type( 'instructor', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
	 	// let's now add all the options for this post type
		array('labels' => array(
			'name' => __('Instructors', 'instructor general name'), /* This is the Title of the Group */
			'singular_name' => __('Instructor', 'instructor singular name'), /* This is the individual type */
			'add_new' => __('Add New', 'Instructor type item'), /* The add new menu item */
			'add_new_item' => __('Add New Instructor'), /* Add New Display Title */
			'edit' => __( 'Edit' ), /* Edit Dialog */
			'edit_item' => __('Edit Instructor'), /* Edit Display Title */
			'new_item' => __('New Instructor'), /* New Display Title */
			'view_item' => __('View Instructor'), /* View Display Title */
			'search_items' => __('Search Instructors'), /* Search Custom Type Title */ 
			'not_found' =>  __('Nothing found in the Database.'), /* This displays if there are no entries yet */ 
			'not_found_in_trash' => __('Nothing found in Trash'), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'This is the custom post type for displaying instructors hired by the TEDCenter' ), /* Custom Type Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 4,
			'show_in_menu' => 'person-menu',
			'menu_icon' => '', /* the icon for the custom post type menu */
			'rewrite' => array('slug' => 'instructor'),
			'capability_type' => 'post',
			'hierarchical' => false,
			'has_archive' => true,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'editor')
	 	) /* end of options */
	); /* end of register post type */
	
	/* this ads your post categories to your custom post type */
	register_taxonomy_for_object_type('instructor_cat', 'instructor');
	/* this ads your post tags to your custom post type */
	register_taxonomy_for_object_type('instructor_cat', 'instructor');
} 
// adding the function to the Wordpress init
add_action( 'init', 'custom_instructors');

/*
for more information on taxonomies, go here:
http://codex.wordpress.org/Function_Reference/register_taxonomy
*/

// now let's add custom categories (these act like categories)
register_taxonomy( 'instructor_cat', 
   	array('instructor'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
   	array('hierarchical' => true,     /* if this is true it acts like categories */             
  		'labels' => array(
		'name' => __( 'Instructor Categories' ), /* name of the custom taxonomy */
		'singular_name' => __( 'Instructor Category' ), /* single taxonomy name */
		'search_items' =>  __( 'Search Instructor Categories' ), /* search title for taxomony */
		'all_items' => __( 'All Instructor Categories' ), /* all title for taxonomies */
		'parent_item' => __( 'Parent Instructor Category' ), /* parent title for taxonomy */
		'parent_item_colon' => __( 'Parent Instructor Category:' ), /* parent taxonomy title */
    	'edit_item' => __( 'Edit Instructor Category' ), /* edit custom taxonomy title */
    	'update_item' => __( 'Update Instructor Category' ), /* update title for taxonomy */
    	'add_new_item' => __( 'Add New Instructor Category' ), /* add new title for taxonomy */
    	'new_item_name' => __( 'New Program Instructor Name' ) /* name title for taxonomy */
 		),
   		'show_ui' => true,
 		'query_var' => true,
		
   	)
); 
add_action('admin_menu', 'register_my_custom_submenu_page');
function register_my_custom_submenu_page() {
	add_submenu_page( 'person-menu', 'Add New Staff Member', 'Add New Staff Member', 'edit_posts',' post-new.php?post_type=staff');
	add_submenu_page( 'person-menu', 'Add New Instructor', 'Add New Instructor', 'edit_posts',' post-new.php?post_type=instructor');
	add_submenu_page( 'person-menu', 'Instructor Categories', 'Instructor Categories', 'manage_options',' edit-tags.php?taxonomy=instructor_cat&post_type=instructor');
	add_submenu_page( 'person-menu', 'Instructor Tags', 'Instructor Tags', 'manage_options',' edit-tags.php?taxonomy=instructor_tag&post_type=instructor');
}
// now let's add custom tags (these act like categories)
register_taxonomy( 'instructor_tag', 
   	array('instructor'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
   	array('hierarchical' => false,    /* if this is false, it acts like tags */                
		'labels' => array(
		'name' => __( 'Instructor Tags' ), /* name of the custom taxonomy */
		'singular_name' => __( 'Instructor Tag' ), /* single taxonomy name */
		'search_items' =>  __( 'Search Instructor Tags' ), /* search title for taxomony */
		'all_items' => __( 'All Instructor Tags' ), /* all title for taxonomies */
		'parent_item' => __( 'Parent Instructor Tag' ), /* parent title for taxonomy */
		'parent_item_colon' => __( 'Parent Instructor Tag:' ), /* parent taxonomy title */
		'edit_item' => __( 'Edit Instructor Tag' ), /* edit custom taxonomy title */
		'update_item' => __( 'Update Instructor Tag' ), /* update title for taxonomy */
		'add_new_item' => __( 'Add New Instructor Tag' ), /* add new title for taxonomy */
		'new_item_name' => __( 'New Instructor Tag Name' ) /* name title for taxonomy */
	),
   		'show_ui' => true,
   		'query_var' => true,
		
  	)
); 
// Modules
function custom_modules() { 
	// creating (registering) the custom type 
	register_post_type( 'module', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
	 	// let's now add all the options for this post type
		array('labels' => array(
			'name' => __('Modules', 'module general name'), /* This is the Title of the Group */
			'singular_name' => __('Module', 'module singular name'), /* This is the individual type */
			'add_new' => __('Add New', 'module type item'), /* The add new menu item */
			'add_new_item' => __('Add New Module'), /* Add New Display Title */
			'edit' => __( 'Edit' ), /* Edit Dialog */
			'edit_item' => __('Edit Module'), /* Edit Display Title */
			'new_item' => __('New Module'), /* New Display Title */
			'view_item' => __('View Module'), /* View Display Title */
			'search_items' => __('Search Modules'), /* Search Custom Type Title */ 
			'not_found' =>  __('Nothing found in the Database.'), /* This displays if there are no entries yet */ 
			'not_found_in_trash' => __('Nothing found in Trash'), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'This is the custom post type for displaying instructors hired by the TEDCenter' ), /* Custom Type Description */
			'public' => true,
			'publicly_queryable' => false,
			'exclude_from_search' => true,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 1,
			'show_in_menu' => 'home-menu',
			'rewrite' => array('slug' => 'module'),
			'capability_type' => 'page',
			'hierarchical' => false,
			'supports' => array( 'title', 'editor')
	 	) /* end of options */
	); /* end of register post type */
	
} 
// adding the function to the Wordpress init
add_action( 'init', 'custom_modules');


// Quotes
function custom_quotes() { 
	// creating (registering) the custom type 
	register_post_type( 'quote', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
	 	// let's now add all the options for this post type
		array('labels' => array(
			'name' => __('Quotes', 'quote general name'), /* This is the Title of the Group */
			'singular_name' => __('Quote', 'quote singular name'), /* This is the individual type */
			'add_new' => __('Add New', 'quote type item'), /* The add new menu item */
			'add_new_item' => __('Add New Quote'), /* Add New Display Title */
			'edit' => __( 'Edit' ), /* Edit Dialog */
			'edit_item' => __('Edit Quote'), /* Edit Display Title */
			'new_item' => __('New Quote'), /* New Display Title */
			'view_item' => __('View Quote'), /* View Display Title */
			'search_items' => __('Search Quotes'), /* Search Custom Type Title */ 
			'not_found' =>  __('Nothing found in the Database.'), /* This displays if there are no entries yet */ 
			'not_found_in_trash' => __('Nothing found in Trash'), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'This is the custom post type for displaying quotes provided by the TEDCenter' ), /* Custom Type Description */
			'public' => true,
			'publicly_queryable' => false,
			'exclude_from_search' => true,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 3,
			'show_in_menu' => 'home-menu',
			'rewrite' => array('slug' => 'quote'),
			'capability_type' => 'page',
			'hierarchical' => false,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title')
	 	) /* end of options */
	); /* end of register post type */
	
} 
// adding the function to the Wordpress init
add_action( 'init', 'custom_quotes');
// New Stories For Site
add_action( 'init', 'create_new_story' );
function create_new_story() {
	// Add Modules
	$labels = array(
		'name' => 'Testimonials',
		 'singular_name' => 'Testimonial',
		 'menu_name' => 'Testimonials',
		 'add_new' => 'Add Testimonial',
		 'add_new_item' => 'Add New Testimonial',
		 'edit' => 'Edit',
		 'edit_item' => 'Edit Testimonial',
		 'new_item' => 'New Testimonial',
		 'view' => 'View Testimonial',
		 'view_item' => 'View Testimonialy',
		 'search_items' => 'Search Testimonials',
		 'not_found' => 'No Testimonials Found',
		 'not_found_in_trash' => 'No Testimonials Found in Trash',
		 'parent' => 'Parent Testimonial'
	);
	$args = array(
		'labels' => $labels,
		'description' => 'Create new Testimonials for TEDCenter.',
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'capability_type' => 'page',
		'map_meta_cap' => true,
		'hierarchical' => false,
		'rewrite' => array('slug' => 'about-us/testimonials'),
		'query_var' => true,
		'exclude_from_search' => true,
		'menu_position' => 4,
		'show_in_menu' => 'home-menu',
		'menu_icon' => '',  // Icon Path
		'supports' => array('title', 'editor', 'thumbnail'),
	);
	register_post_type('story', $args);
};
// FAQs
add_action( 'init', 'create_new_faq' );
function create_new_faq() {
	// Add Student Types
	$labels = array(
		'name' => 'FAQs',
		 'singular_name' => 'FAQ',
		 'menu_name' => 'FAQs',
		 'add_new' => 'Add FAQ',
		 'add_new_item' => 'Add New FAQ',
		 'edit' => 'Edit',
		 'edit_item' => 'Edit FAQ',
		 'new_item' => 'New FAQ',
		 'view' => 'View FAQ',
		 'view_item' => 'View FAQ',
		 'search_items' => 'Search FAQs',
		 'not_found' => 'No FAQs Found',
		 'not_found_in_trash' => 'No FAQs Found in Trash',
		 'parent' => 'Parent FAQ'
	);
	$args = array(
		'labels' => $labels,
		'description' => 'Create new FAQ items for SummerStart.',
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'capability_type' => 'page',
		'map_meta_cap' => true,
		'hierarchical' => false,
		'rewrite' => array('slug' => 'faq'),
		'query_var' => true,
		'exclude_from_search' => true,
		'menu_position' => 34,
		'menu_icon' => '',  // Icon Path
		'supports' => array('title', 'editor'),
	);
	register_post_type('faq', $args);
};

function add_menu_icons_styles(){
?>
 
<style>
#adminmenu #menu-posts-program div.wp-menu-image:before {
  content: '\f123';
}
#adminmenu #toplevel_page_person-menu div.wp-menu-image:before {
  content: '\f307';
}
#adminmenu #toplevel_page_home-menu div.wp-menu-image:before {
  content: '\f111';
}
#adminmenu .menu-icon-faq div.wp-menu-image:before {
  content: '\f223';
}
</style>
 
<?php
}
add_action( 'admin_head', 'add_menu_icons_styles' );

if( function_exists('acf_add_options_sub_page') )
{
    acf_add_options_sub_page(array(
        'title' => 'Homepage Slides',
        'parent' => 'home-menu',
        'capability' => 'edit_posts'
    ));
}
?>