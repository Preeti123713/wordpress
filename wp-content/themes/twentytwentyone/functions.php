<?php

/**
 * Functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

// This theme requires WordPress 5.3 or later.
if (version_compare($GLOBALS['wp_version'], '5.3', '<')) {
	require get_template_directory() . '/inc/back-compat.php';
}

if (!function_exists('twenty_twenty_one_setup')) {
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 *
	 * @since Twenty Twenty-One 1.0
	 *
	 * @return void
	 */
	function twenty_twenty_one_setup()
	{

		// Add default posts and comments RSS feed links to head.
		add_theme_support('automatic-feed-links');

		/*
		 * Let WordPress manage the document title.
		 * This theme does not use a hard-coded <title> tag in the document head,
		 * WordPress will provide it for us.
		 */
		add_theme_support('title-tag');

		/**
		 * Add post-formats support.
		 */
		add_theme_support(
			'post-formats',
			array(
				'link',
				'aside',
				'gallery',
				'image',
				'quote',
				'status',
				'video',
				'audio',
				'chat',
			)
		);

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support('post-thumbnails');
		set_post_thumbnail_size(1568, 9999);

		register_nav_menus(
			array(
				'primary' => esc_html__('Primary menu', 'twentytwentyone'),
				'footer'  => esc_html__('Secondary menu', 'twentytwentyone'),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
				'navigation-widgets',
			)
		);

		/*
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		$logo_width  = 300;
		$logo_height = 100;

		add_theme_support(
			'custom-logo',
			array(
				'height'               => $logo_height,
				'width'                => $logo_width,
				'flex-width'           => true,
				'flex-height'          => true,
				'unlink-homepage-logo' => true,
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support('customize-selective-refresh-widgets');

		// Add support for Block Styles.
		add_theme_support('wp-block-styles');

		// Add support for full and wide align images.
		add_theme_support('align-wide');

		// Add support for editor styles.
		add_theme_support('editor-styles');
		$background_color = get_theme_mod('background_color', 'D1E4DD');
		if (127 > Twenty_Twenty_One_Custom_Colors::get_relative_luminance_from_hex($background_color)) {
			add_theme_support('dark-editor-style');
		}

		$editor_stylesheet_path = './assets/css/style-editor.css';

		// Note, the is_IE global variable is defined by WordPress and is used
		// to detect if the current browser is internet explorer.
		global $is_IE;
		if ($is_IE) {
			$editor_stylesheet_path = './assets/css/ie-editor.css';
		}

		// Enqueue editor styles.
		add_editor_style($editor_stylesheet_path);

		// Add custom editor font sizes.
		add_theme_support(
			'editor-font-sizes',
			array(
				array(
					'name'      => esc_html__('Extra small', 'twentytwentyone'),
					'shortName' => esc_html_x('XS', 'Font size', 'twentytwentyone'),
					'size'      => 16,
					'slug'      => 'extra-small',
				),
				array(
					'name'      => esc_html__('Small', 'twentytwentyone'),
					'shortName' => esc_html_x('S', 'Font size', 'twentytwentyone'),
					'size'      => 18,
					'slug'      => 'small',
				),
				array(
					'name'      => esc_html__('Normal', 'twentytwentyone'),
					'shortName' => esc_html_x('M', 'Font size', 'twentytwentyone'),
					'size'      => 20,
					'slug'      => 'normal',
				),
				array(
					'name'      => esc_html__('Large', 'twentytwentyone'),
					'shortName' => esc_html_x('L', 'Font size', 'twentytwentyone'),
					'size'      => 24,
					'slug'      => 'large',
				),
				array(
					'name'      => esc_html__('Extra large', 'twentytwentyone'),
					'shortName' => esc_html_x('XL', 'Font size', 'twentytwentyone'),
					'size'      => 40,
					'slug'      => 'extra-large',
				),
				array(
					'name'      => esc_html__('Huge', 'twentytwentyone'),
					'shortName' => esc_html_x('XXL', 'Font size', 'twentytwentyone'),
					'size'      => 96,
					'slug'      => 'huge',
				),
				array(
					'name'      => esc_html__('Gigantic', 'twentytwentyone'),
					'shortName' => esc_html_x('XXXL', 'Font size', 'twentytwentyone'),
					'size'      => 144,
					'slug'      => 'gigantic',
				),
			)
		);

		// Custom background color.
		add_theme_support(
			'custom-background',
			array(
				'default-color' => 'd1e4dd',
			)
		);

		// Editor color palette.
		$black     = '#000000';
		$dark_gray = '#28303D';
		$gray      = '#39414D';
		$green     = '#D1E4DD';
		$blue      = '#D1DFE4';
		$purple    = '#D1D1E4';
		$red       = '#E4D1D1';
		$orange    = '#E4DAD1';
		$yellow    = '#EEEADD';
		$white     = '#FFFFFF';

		add_theme_support(
			'editor-color-palette',
			array(
				array(
					'name'  => esc_html__('Black', 'twentytwentyone'),
					'slug'  => 'black',
					'color' => $black,
				),
				array(
					'name'  => esc_html__('Dark gray', 'twentytwentyone'),
					'slug'  => 'dark-gray',
					'color' => $dark_gray,
				),
				array(
					'name'  => esc_html__('Gray', 'twentytwentyone'),
					'slug'  => 'gray',
					'color' => $gray,
				),
				array(
					'name'  => esc_html__('Green', 'twentytwentyone'),
					'slug'  => 'green',
					'color' => $green,
				),
				array(
					'name'  => esc_html__('Blue', 'twentytwentyone'),
					'slug'  => 'blue',
					'color' => $blue,
				),
				array(
					'name'  => esc_html__('Purple', 'twentytwentyone'),
					'slug'  => 'purple',
					'color' => $purple,
				),
				array(
					'name'  => esc_html__('Red', 'twentytwentyone'),
					'slug'  => 'red',
					'color' => $red,
				),
				array(
					'name'  => esc_html__('Orange', 'twentytwentyone'),
					'slug'  => 'orange',
					'color' => $orange,
				),
				array(
					'name'  => esc_html__('Yellow', 'twentytwentyone'),
					'slug'  => 'yellow',
					'color' => $yellow,
				),
				array(
					'name'  => esc_html__('White', 'twentytwentyone'),
					'slug'  => 'white',
					'color' => $white,
				),
			)
		);

		add_theme_support(
			'editor-gradient-presets',
			array(
				array(
					'name'     => esc_html__('Purple to yellow', 'twentytwentyone'),
					'gradient' => 'linear-gradient(160deg, ' . $purple . ' 0%, ' . $yellow . ' 100%)',
					'slug'     => 'purple-to-yellow',
				),
				array(
					'name'     => esc_html__('Yellow to purple', 'twentytwentyone'),
					'gradient' => 'linear-gradient(160deg, ' . $yellow . ' 0%, ' . $purple . ' 100%)',
					'slug'     => 'yellow-to-purple',
				),
				array(
					'name'     => esc_html__('Green to yellow', 'twentytwentyone'),
					'gradient' => 'linear-gradient(160deg, ' . $green . ' 0%, ' . $yellow . ' 100%)',
					'slug'     => 'green-to-yellow',
				),
				array(
					'name'     => esc_html__('Yellow to green', 'twentytwentyone'),
					'gradient' => 'linear-gradient(160deg, ' . $yellow . ' 0%, ' . $green . ' 100%)',
					'slug'     => 'yellow-to-green',
				),
				array(
					'name'     => esc_html__('Red to yellow', 'twentytwentyone'),
					'gradient' => 'linear-gradient(160deg, ' . $red . ' 0%, ' . $yellow . ' 100%)',
					'slug'     => 'red-to-yellow',
				),
				array(
					'name'     => esc_html__('Yellow to red', 'twentytwentyone'),
					'gradient' => 'linear-gradient(160deg, ' . $yellow . ' 0%, ' . $red . ' 100%)',
					'slug'     => 'yellow-to-red',
				),
				array(
					'name'     => esc_html__('Purple to red', 'twentytwentyone'),
					'gradient' => 'linear-gradient(160deg, ' . $purple . ' 0%, ' . $red . ' 100%)',
					'slug'     => 'purple-to-red',
				),
				array(
					'name'     => esc_html__('Red to purple', 'twentytwentyone'),
					'gradient' => 'linear-gradient(160deg, ' . $red . ' 0%, ' . $purple . ' 100%)',
					'slug'     => 'red-to-purple',
				),
			)
		);

		/*
		* Adds starter content to highlight the theme on fresh sites.
		* This is done conditionally to avoid loading the starter content on every
		* page load, as it is a one-off operation only needed once in the customizer.
		*/
		if (is_customize_preview()) {
			require get_template_directory() . '/inc/starter-content.php';
			add_theme_support('starter-content', twenty_twenty_one_get_starter_content());
		}

		// Add support for responsive embedded content.
		add_theme_support('responsive-embeds');

		// Add support for custom line height controls.
		add_theme_support('custom-line-height');

		// Add support for link color control.
		add_theme_support('link-color');

		// Add support for experimental cover block spacing.
		add_theme_support('custom-spacing');

		// Add support for custom units.
		// This was removed in WordPress 5.6 but is still required to properly support WP 5.5.
		add_theme_support('custom-units');

		// Remove feed icon link from legacy RSS widget.
		add_filter('rss_widget_feed_link', '__return_empty_string');
	}
}
add_action('after_setup_theme', 'twenty_twenty_one_setup');

/**
 * Registers widget area.
 *
 * @since Twenty Twenty-One 1.0
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 *
 * @return void
 */
function twenty_twenty_one_widgets_init()
{

	register_sidebar(
		array(
			'name'          => esc_html__('Footer', 'twentytwentyone'),
			'id'            => 'sidebar-1',
			'description'   => esc_html__('Add widgets here to appear in your footer.', 'twentytwentyone'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action('widgets_init', 'twenty_twenty_one_widgets_init');

/**
 * Sets the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @since Twenty Twenty-One 1.0
 *
 * @global int $content_width Content width.
 *
 * @return void
 */
function twenty_twenty_one_content_width()
{
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters('twenty_twenty_one_content_width', 750);
}
add_action('after_setup_theme', 'twenty_twenty_one_content_width', 0);

/**
 * Enqueues scripts and styles.
 *
 * @since Twenty Twenty-One 1.0
 *
 * @global bool       $is_IE
 * @global WP_Scripts $wp_scripts
 *
 * @return void
 */
function twenty_twenty_one_scripts()
{
	// Note, the is_IE global variable is defined by WordPress and is used
	// to detect if the current browser is internet explorer.
	global $is_IE, $wp_scripts;
	if ($is_IE) {
		// If IE 11 or below, use a flattened stylesheet with static values replacing CSS Variables.
		wp_enqueue_style('twenty-twenty-one-style', get_template_directory_uri() . '/assets/css/ie.css', array(), wp_get_theme()->get('Version'));
	} else {
		// If not IE, use the standard stylesheet.
		wp_enqueue_style('twenty-twenty-one-style', get_template_directory_uri() . '/style.css', array(), wp_get_theme()->get('Version'));
	}

	// RTL styles.
	wp_style_add_data('twenty-twenty-one-style', 'rtl', 'replace');

	// Print styles.
	wp_enqueue_style('twenty-twenty-one-print-style', get_template_directory_uri() . '/assets/css/print.css', array(), wp_get_theme()->get('Version'), 'print');

	// Threaded comment reply styles.
	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}

	// Register the IE11 polyfill file.
	wp_register_script(
		'twenty-twenty-one-ie11-polyfills-asset',
		get_template_directory_uri() . '/assets/js/polyfills.js',
		array(),
		wp_get_theme()->get('Version'),
		true
	);

	// Register the IE11 polyfill loader.
	wp_register_script(
		'twenty-twenty-one-ie11-polyfills',
		null,
		array(),
		wp_get_theme()->get('Version'),
		true
	);
	wp_add_inline_script(
		'twenty-twenty-one-ie11-polyfills',
		wp_get_script_polyfill(
			$wp_scripts,
			array(
				'Element.prototype.matches && Element.prototype.closest && window.NodeList && NodeList.prototype.forEach' => 'twenty-twenty-one-ie11-polyfills-asset',
			)
		)
	);

	// Main navigation scripts.
	if (has_nav_menu('primary')) {
		wp_enqueue_script(
			'twenty-twenty-one-primary-navigation-script',
			get_template_directory_uri() . '/assets/js/primary-navigation.js',
			array('twenty-twenty-one-ie11-polyfills'),
			wp_get_theme()->get('Version'),
			true
		);
	}

	// Responsive embeds script.
	wp_enqueue_script(
		'twenty-twenty-one-responsive-embeds-script',
		get_template_directory_uri() . '/assets/js/responsive-embeds.js',
		array('twenty-twenty-one-ie11-polyfills'),
		wp_get_theme()->get('Version'),
		true
	);
}
add_action('wp_enqueue_scripts', 'twenty_twenty_one_scripts');

/**
 * Enqueues block editor script.
 *
 * @since Twenty Twenty-One 1.0
 *
 * @return void
 */
function twentytwentyone_block_editor_script()
{

	wp_enqueue_script('twentytwentyone-editor', get_theme_file_uri('/assets/js/editor.js'), array('wp-blocks', 'wp-dom'), wp_get_theme()->get('Version'), true);
}

add_action('enqueue_block_editor_assets', 'twentytwentyone_block_editor_script');

/**
 * Fixes skip link focus in IE11.
 *
 * This does not enqueue the script because it is tiny and because it is only for IE11,
 * thus it does not warrant having an entire dedicated blocking script being loaded.
 *
 * @since Twenty Twenty-One 1.0
 * @deprecated Twenty Twenty-One 1.9 Removed from wp_print_footer_scripts action.
 *
 * @link https://git.io/vWdr2
 */
function twenty_twenty_one_skip_link_focus_fix()
{

	// If SCRIPT_DEBUG is defined and true, print the unminified file.
	if (defined('SCRIPT_DEBUG') && SCRIPT_DEBUG) {
		echo '<script>';
		include get_template_directory() . '/assets/js/skip-link-focus-fix.js';
		echo '</script>';
	} else {
		// The following is minified via `npx terser --compress --mangle -- assets/js/skip-link-focus-fix.js`.
?>
		<script>
			/(trident|msie)/i.test(navigator.userAgent) && document.getElementById && window.addEventListener && window.addEventListener("hashchange", (function() {
				var t, e = location.hash.substring(1);
				/^[A-z0-9_-]+$/.test(e) && (t = document.getElementById(e)) && (/^(?:a|select|input|button|textarea)$/i.test(t.tagName) || (t.tabIndex = -1), t.focus())
			}), !1);
		</script>
	<?php
	}
}

/**
 * Enqueues non-latin language styles.
 *
 * @since Twenty Twenty-One 1.0
 *
 * @return void
 */
function twenty_twenty_one_non_latin_languages()
{
	$custom_css = twenty_twenty_one_get_non_latin_css('front-end');

	if ($custom_css) {
		wp_add_inline_style('twenty-twenty-one-style', $custom_css);
	}
}
add_action('wp_enqueue_scripts', 'twenty_twenty_one_non_latin_languages');

// SVG Icons class.
require get_template_directory() . '/classes/class-twenty-twenty-one-svg-icons.php';

// Custom color classes.
require get_template_directory() . '/classes/class-twenty-twenty-one-custom-colors.php';
new Twenty_Twenty_One_Custom_Colors();

// Enhance the theme by hooking into WordPress.
require get_template_directory() . '/inc/template-functions.php';

// Menu functions and filters.
require get_template_directory() . '/inc/menu-functions.php';

// Custom template tags for the theme.
require get_template_directory() . '/inc/template-tags.php';

// Customizer additions.
require get_template_directory() . '/classes/class-twenty-twenty-one-customize.php';
new Twenty_Twenty_One_Customize();

// Block Patterns.
require get_template_directory() . '/inc/block-patterns.php';

// Block Styles.
require get_template_directory() . '/inc/block-styles.php';

// Dark Mode.
require_once get_template_directory() . '/classes/class-twenty-twenty-one-dark-mode.php';
new Twenty_Twenty_One_Dark_Mode();

/**
 * Enqueues scripts for the customizer preview.
 *
 * @since Twenty Twenty-One 1.0
 *
 * @return void
 */
function twentytwentyone_customize_preview_init()
{
	wp_enqueue_script(
		'twentytwentyone-customize-helpers',
		get_theme_file_uri('/assets/js/customize-helpers.js'),
		array(),
		wp_get_theme()->get('Version'),
		true
	);

	wp_enqueue_script(
		'twentytwentyone-customize-preview',
		get_theme_file_uri('/assets/js/customize-preview.js'),
		array('customize-preview', 'customize-selective-refresh', 'jquery', 'twentytwentyone-customize-helpers'),
		wp_get_theme()->get('Version'),
		true
	);
}
add_action('customize_preview_init', 'twentytwentyone_customize_preview_init');

/**
 * Enqueues scripts for the customizer.
 *
 * @since Twenty Twenty-One 1.0
 *
 * @return void
 */
function twentytwentyone_customize_controls_enqueue_scripts()
{

	wp_enqueue_script(
		'twentytwentyone-customize-helpers',
		get_theme_file_uri('/assets/js/customize-helpers.js'),
		array(),
		wp_get_theme()->get('Version'),
		true
	);
}
add_action('customize_controls_enqueue_scripts', 'twentytwentyone_customize_controls_enqueue_scripts');

/**
 * Calculates classes for the main <html> element.
 *
 * @since Twenty Twenty-One 1.0
 *
 * @return void
 */
function twentytwentyone_the_html_classes()
{
	/**
	 * Filters the classes for the main <html> element.
	 *
	 * @since Twenty Twenty-One 1.0
	 *
	 * @param string The list of classes. Default empty string.
	 */
	$classes = apply_filters('twentytwentyone_html_classes', '');
	if (!$classes) {
		return;
	}
	echo 'class="' . esc_attr($classes) . '"';
}

/**
 * Adds "is-IE" class to body if the user is on Internet Explorer.
 *
 * @since Twenty Twenty-One 1.0
 *
 * @return void
 */
function twentytwentyone_add_ie_class()
{
	?>
	<script>
		if (-1 !== navigator.userAgent.indexOf('MSIE') || -1 !== navigator.appVersion.indexOf('Trident/')) {
			document.body.classList.add('is-IE');
		}
	</script>
<?php
}
add_action('wp_footer', 'twentytwentyone_add_ie_class');

if (!function_exists('wp_get_list_item_separator')) :
	/**
	 * Retrieves the list item separator based on the locale.
	 *
	 * Added for backward compatibility to support pre-6.0.0 WordPress versions.
	 *
	 * @since 6.0.0
	 */
	function wp_get_list_item_separator()
	{
		/* translators: Used between list items, there is a space after the comma. */
		return __(', ', 'twentytwentyone');
	}
endif;

//  custom modifications

function teacher_init()
{
	// set up product labels
	$labels = array(
		'name' => 'teacher',
		'singular_name' => 'teacher',
		'add_new' => 'Add New Teacher',
		'add_new_item' => 'Add New Teacher',
		'edit_item' => 'Edit Teacher',
		'new_item' => 'New Teacher',
		'all_items' => 'All Teachers',
		'view_item' => 'View Teacher',
		'search_items' => 'Search Teachers',
		'not_found' =>  'No Teachers Found',
		'not_found_in_trash' => 'No Teachers found in Trash',
		'parent_item_colon' => '',
		'menu_name' => 'Teachers',
	);

	// register post type
	$args = array(
		'labels' => $labels,
		'public' => true,
		'has_archive' => true,
		'show_ui' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'rewrite' => array('slug' => 'Teacher'),
		'query_var' => true,
		'menu_icon' => 'dashicons-randomize',
		'supports' => array(
			'title',
			'editor',
			'excerpt',
			'trackbacks',
			'custom-fields',
			'comments',
			'revisions',
			'thumbnail',
			'author',
			'page-attributes'
		)
	);
	register_post_type('teacher', $args);

	// register taxonomy
	register_taxonomy('teacher_category', 'teacher', array('hierarchical' => true, 'label' => 'Category', 'query_var' => true, 'rewrite' => array('slug' => 'product-category')));
}
add_action('init', 'teacher_init');

function enqueue_custom_styles()
{
	wp_enqueue_style('custom', get_template_directory_uri() . './assets/css/custom.css', array(), '1.0', 'all');
	wp_enqueue_style('new-css', get_template_directory_uri() . './assets/css/studentdash.css', array(), '1.0', 'all');
	// wp_enqueue_style('new-css', get_template_directory_uri() . './assets/css/style.css', array(), '1.0', 'all');
	// wp_enqueue_style('zone', get_template_directory_uri() . './assets/css/zone.css', array(), '1.0', 'all');
	wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css', array(), '1.0', 'all');
	wp_enqueue_style('jquery-ui-css', 'https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css', array(), '1.0', 'all');
	wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css', array(), '1.0', 'all');
	wp_enqueue_style('animate', 'https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css', array(), '1.0', 'all');
}
add_action('wp_enqueue_scripts', 'enqueue_custom_styles');

function enqueue_custom_js()
{
	wp_enqueue_script('jqueryxv', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js', array(), '1.0', true);
	wp_enqueue_script('stripe', 'https://js.stripe.com/v3/', array(), null, false);
	wp_enqueue_script('script', get_template_directory_uri() . '/assets/js/script.js', array('jquery'), '1.0', true);
	wp_enqueue_script('jquery-ui-js', 'https://code.jquery.com/ui/1.12.1/jquery-ui.js', array('jquery'), '1.0', true);
	wp_enqueue_script('popper', "https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js", array('jquery'), '1.0', true);
	wp_enqueue_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js', array('jquery'), '1.0', true);
	wp_enqueue_script('creditCardValidator', 'https://cdnjs.cloudflare.com/ajax/libs/jquery-creditcardvalidator/1.0.0/jquery.creditCardValidator.js', array('jquery'), '1.0', true);
	wp_enqueue_script('bootstrap.bundle.min.js', 'https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js', array('jquery'), '1.0', true);
	// wp_enqueue_script('kit-fontawesome', 'https://kit.fontawesome.com/7a4b62b0a4.js', array('jquery'), '1.0',false);

	$ajax_data = array(
		'ajax_url' => admin_url('admin-ajax.php'),
		'ajax_nonce' => wp_create_nonce('script-nonce'),
	);
	// Localize the script with the passed data
	wp_localize_script('script', 'ajax_object', $ajax_data);

	// Pass PHP variables to JavaScript
	wp_localize_script('script', 'custom_vars', array(
		'is_login_page' => is_page_template('commonLogin.php'), // Check if it's a login page
	));
}
add_action('wp_enqueue_scripts', 'enqueue_custom_js');

remove_role('subscriber');
add_role('teacher', 'Teacher', array(
	'read' => true,
	'create_posts' => true,
	'edit_posts' => true,
	'edit_others_posts' => true,
	'publish_posts' => true,
	'manage_categories' => true,
));
add_role('student', 'Student', array(
	'read' => true,
	'create_posts' => true,
	'edit_posts' => true,
));

add_action('wp_ajax_nopriv_ajax_login', 'ajax_login');
add_action('wp_ajax_register_user', 'register_user');
add_action('wp_ajax_nopriv_register_user', 'register_user');

// Login Function
function ajax_login()
{
	$email = $_POST['email'];
	$user = get_user_by('email', $email);
	$userId = $user->ID;
	$account_activated = get_user_meta($userId, 'account_activated');
	if ($account_activated == 1) {
		$creds = array(
			'user_login' => $email,
			'user_password' => $_POST['password'],
			'remember' => true
		);
		$user = wp_signon($creds);
		if (is_wp_error($user)) {
			echo $user->get_error_message();
			exit();
		} else {
			echo "login successful";
		}
		exit;
	} else {
		echo "Verify your Email Id by clicking the link In your mailbox";
		exit();
	}
}
function register_user()
{
	// create code to verify later
	$activation_code = md5(uniqid());
	$email = sanitize_email($_POST['email']);
	$username = sanitize_text_field($_POST['username']);
	$password = sanitize_text_field($_POST['password']);
	// echo $password . "   ";
	$confirm_password = sanitize_text_field($_POST['confirm-password']);
	// Check if email is valid
	if (!is_email($email)) {
		echo "Invalid email address";
		exit;
	}
	// Check if email is already registered
	if (email_exists($email)) {
		echo "This email address is already registered";
		exit;
	}

	// Check password match
	if ($password !== $confirm_password) {
		echo "Your passwords did not match";
		exit;
	}
	// Check password strength if needed

	// Hash the password securely
	// $hashed_password = wp_hash_password($password);

	$user_data = array(
		'user_login' => $username,
		'user_email' => $email,
		'user_pass' => $password,
		'username' => $username,
		'role' => 'student', // Assign the role 'student' to the user
	);

	// Create the user but don't activate it yet
	$user_id = wp_insert_user($user_data);

	if (is_wp_error($user_id)) {
		echo $user_id->get_error_message();
		exit;
	}

	// Send verification email
	$activation_link = get_site_url() . '/loginform/?code=' . $activation_code . '_' . $user_id; // Change 'verify-email' to your verification endpoint
	$email_subject = 'Please verify your email';
	$email_message = 'Hello' . '  ' . $username . '<br><br>' . 'You registered an account on TeachingPlatform, before being able to use your account you need to verify that this is your email address by clicking here: <a href="' . $activation_link . '">' . $activation_link . '</a>'
		. '<br><br>' .
		'Best Regards,' . '<br>' .
		' Powered by TeachingPlatform';
	$data = array(
		"sender" => array(
			"email" => 'preetir@graycelltech.com',
			"name" => 'TeachingPlatform'
		),
		"to" => array(
			array(
				"email" => $email,
				"name" => $username // You can use the username here if you want
			)
		),
		"subject" => $email_subject,
		"htmlContent" => '<html><head></head><body><p>' . $email_message . '</p></body></html>'
	);
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, 'https://api.sendinblue.com/v3/smtp/email');
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
	$headers = array(
		'Accept: application/json',
		'Api-Key: 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',
		'Content-Type: application/json'
	);
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	$result = curl_exec($ch);
	if (curl_errno($ch)) {
		echo 'Error:' . curl_error($ch);
		exit;
	}
	curl_close($ch);

	// Notify user of successful registration
	echo "Registration successful, please verify in the registered Email-Id";

	// Store activation code and status
	update_user_meta($user_id, 'account_activated', 0);
	update_user_meta($user_id, 'activation_code', $activation_code);
	exit;
}

// Add AJAX action for verify_token
add_action('wp_ajax_verify_token', 'verify_token');
add_action('wp_ajax_nopriv_verify_token', 'verify_token');

function verify_token()
{
	$token = $_POST['token']; // Change from $_GET to $_POST
	// echo $token;
	$results = explode('_', $token);
	$token_id = $results[0];
	$user_id = $results[1];
	$data_token = get_user_meta($user_id, 'activation_code', true);
	if ($token_id == $data_token) {
		// change activation status
		update_user_meta($user_id, 'account_activated', 1);
		echo "Your account is activated";
	} else {
		echo "Wrong activation code.";
	}
	exit;
}
add_action('custom_sort', 'custom_sort');
function custom_sort($arr)
{
	$level = strtolower($_GET['level-select']);
	$country = strtolower($_GET['country-select']);
	$language = strtolower($_GET['language-select']);
	$params = [$level, $country, $language];
	$three = $two = $one = [];
	foreach ($arr as $ar) {
		$ar_level = strtolower(get_post_meta($ar, 'level', true));
		$ar_country = strtolower(get_post_meta($ar, 'country', true));
		$ar_language = strtolower(get_post_meta($ar, 'language', true));
		$techpar = [$ar_level, $ar_country, $ar_language];
		$result = array_intersect($params, $techpar);
		$count = count($result);
		if ($count == 3) {
			$three[] = $ar;
		} elseif ($count == 2) {
			$two[] = $ar;
		} elseif ($count == 1) {
			$one[] = $ar;
		}
	}

	$new_result = array_merge($three, $two, $one);
	return $new_result;
}
// Add AJAX action for creating payment intent
add_action('wp_ajax_create_payment_intent_callback', 'create_payment_intent_callback');
add_action('wp_ajax_nopriv_create_payment_intent_callback', 'create_payment_intent_callback');

// insert data into database using  $wpdb->insert()
function create_payment_intent_callback()
{
	global $wpdb;
	// Custom table names
	$table_name = 'payment';
	$second_table_name = 'booking';

	$amount = $_POST['amount'];
	$encodedData = $_POST['data'];

	// Generate a random transaction ID
	$trans_id = substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 16);

	// Get current user ID
	$user_id = get_current_user_id();
	date_default_timezone_set('Asia/Kolkata');
	$currentDateTime = date("d-m-Y h:i:sa");
	$timestamp = strtotime($currentDateTime);
	// Payment status
	$payment_status = "SUCCESS";

	// Insert data into the payment table using $wpdb->insert()
	$result =  $wpdb->insert(
		$table_name,
		array(
			'tran_id' => $trans_id,
			'user_id' => $user_id,
			'payment_date_time' => $timestamp,
			'payment_status' => $payment_status,
			'totalamount' => $amount
		)
	);

	$success_message = ''; // Initialize the success message

	if ($result) {
		// Get the last inserted ID
		$last_inserted_id = $wpdb->insert_id;

		$success_message = "Record inserted into the database successfully";

		// Decode and process booking data
		$decodedData = json_decode(base64_decode($encodedData), true);
		$purpose = $decodedData[2];
		$timeperiod = $decodedData[1];
		$json_purpose = json_encode($purpose);
		$email = $message = "";

		foreach ($decodedData[0] as $teacherid => $subArray) {
			$plans = $subArray[0];
			$booking_date = $subArray[1];
			$booking_time = $subArray[2];
			$booking_date_time = $booking_date  . " " . $booking_time;
			$plan_price = $subArray[3];
			$teacher_name = get_the_title($teacherid);
			$insert = $wpdb->insert(
				$second_table_name,
				array(
					'payment_id' => $last_inserted_id,
					'teacherid' => $teacherid,
					'plans' => $plans,
					'plan_price' => $plan_price,
					'purpose' => $json_purpose,
					'timeperiod' => $timeperiod,
					'booking_date_time' => strtotime($booking_date_time)
				)
			);
		}

		if ($insert) {
			$user_email = wp_get_current_user()->user_email;
			$admin_email = get_option('admin_email');

			if ($email == $user_email) {
				$message .= 'Teacher Name: ' . " " . $teacher_name . "\r\n" . 'Booking Date: ' . " " . $booking_date . "\r\n" . 'Booking Time: ' . " " . $booking_time . "\r\n" . 'Thank you for the payment';
			} else {
				$message .= 'Teacher Name: ' . " " . $teacher_name . "\r\n" . 'Booking Date: ' . " " . $booking_date . "\r\n" . 'Booking Time: ' . " " . $booking_time . "\r\n" . 'Your booking is confirmed';
			}

			$subject = "Your Booking is done";
			$data = array(
				"sender" => array(
					"email" => 'preetir@graycelltech.com',
					"name" => 'Preeti Rawat'
				),
				"to" => array(
					array(
						"email" => $user_email,
						"name" => 'User'
					),
					array(
						"email" => $admin_email,
						"name" => 'Admin'
					)
				),
				"subject" => $subject,
				"htmlContent" => '<html><head></head><body><p>' . $message . '</p></p></body></html>'
			);

			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, 'https://api.sendinblue.com/v3/smtp/email');
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
			$headers = array();
			$headers[] = 'Accept: application/json';
			$headers[] = 'Api-Key: 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';
			$headers[] = 'Content-Type: application/json';
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			$result = curl_exec($ch);

			// curl_close($ch);

			if (curl_errno($ch)) {
				echo 'Error:' . curl_error($ch);
				exit();
			}
			curl_close($ch);
			// print_r($result);
			$success_message = "success";
		}
	}

	echo $success_message;
}
// To Add Teacher in database
add_action('wp_ajax_CreateTeachers', 'CreateTeachers');
add_action('wp_ajax_nopriv_CreateTeachers', 'CreateTeachers');

function CreateTeachers()
{
	$array = [];
	$my_post = array(
		'post_title'    => wp_strip_all_tags($_POST['name']),
		'post_content'  => $_POST['selfDescription'],
		'post_status'   => 'publish',
		'post_author'   => 1,
		'post_type' => 'teacher',
	);

	// 	// Insert the post into the database
	$post_id = wp_insert_post($my_post);
	$username = $_POST['name'];
	$teachingExperience = $_POST['teachingExperience'];
	$email = $_POST['email'];
	$password = $_POST['pwd'];
	if ($post_id) {
		echo "Post Inserted Successfully .  Post ID: " . $post_id;
		// Update custom field on the new post
		update_post_meta($post_id, 'language', strtolower($_POST["language"]));
		update_post_meta($post_id, 'country', strtolower($_POST["country"]));
		update_post_meta($post_id, 'level', strtolower($_POST["level"]));
		update_post_meta($post_id, 'teaching_experience', strtolower($teachingExperience));


		// WordPress environmet
		require(dirname(__FILE__) . '/../../../wp-load.php');

		// it allows us to use wp_handle_upload() function
		require_once(ABSPATH . 'wp-admin/includes/file.php');

		// you can add some kind of validation here
		if (empty($_FILES['qualifications'])) {
			wp_die('No files selected.');
		}

		// for multiple file upload.
		$upload_overrides = array('test_form' => false);

		$files = $_FILES['qualifications'];
		foreach ($files['name'] as $key => $name) {

			$file = array(
				'name' => $files['name'][$key],
				'type' => $files['type'][$key],
				'tmp_name' => $files['tmp_name'][$key],
				'error' => $files['error'][$key],
				'size' => $files['size'][$key]
			);

			$upload = wp_handle_upload($file, $upload_overrides);

			if (!empty($upload['error'])) {
				wp_die($upload['error']);
			}

			// it is time to add our uploaded image into WordPress media library
			$attachment_id = wp_insert_attachment(
				array(
					'guid'           => $upload['url'],
					'post_mime_type' => $upload['type'],
					'post_title'     => basename($upload['file']),
					'post_content'   => '',
					'post_status'    => 'inherit',
				),
				$upload['file']
			);

			if (is_wp_error($attachment_id) || !$attachment_id) {
				wp_die('Upload error.');
			}

			// update medatata, regenerate image sizes
			require_once(ABSPATH . 'wp-admin/includes/image.php');

			wp_update_attachment_metadata(
				$attachment_id,
				wp_generate_attachment_metadata($attachment_id, $upload['file'])
			);
			$array[] = $attachment_id;
		}

		$result	= update_post_meta($post_id, 'post_attachment', $array);
		if ($result) {
			echo 'Post meta updated successfully.';
		} else {
			echo 'Failed to update post meta.';
		}
	}
	// Create user as teacher
	$user_id = wp_create_user($username, $password, $email);

	// Check if user creation was successful
	if (!is_wp_error($user_id)) {
		// Set the user role
		$user = new WP_User($user_id);
		$user->set_role('teacher'); // Change 'subscriber' to the desired role
		// Update user meta with teacher post ID
		$res = update_user_meta($user_id, 'teacher_post_id', $post_id);
		if (is_wp_error($res)) {
			$error = $res->get_error_message();
			echo $error;
		} else {
			echo "Teacher user created successfully.";
		}
	} else {
		$error = $user_id->get_error_message();
		echo $error;
	}
	exit();
}
// common Login
add_action('wp_ajax_commonLogin', 'commonLogin');
add_action('wp_ajax_nopriv_commonLogin', 'commonLogin');

function commonLogin() {
    if( isset($_POST['email'], $_POST['password']) ) {
        $email = sanitize_email($_POST['email']);
        $user = get_user_by('email', $email);

        if ($user) {
            $userId = $user->ID;
            $account_activated = get_user_meta($userId, 'account_activated', true);
            
            if ($account_activated == 1) {
                $response = [];
                $login_data = array(
                    'user_login'    => $email,
                    'user_password' => $_POST['password'],
                    'remember'      => true,
                );

                $user_verify = wp_signon($login_data, false);

                if (is_wp_error($user_verify)) {
                    $response['status'] = 0;
                    $response['message'] = "ERROR: Invalid username or password. Please try again.";
                } else {
                    $id = $user_verify->ID;
                    $user_info = get_userdata($id);

                    if (in_array('teacher', (array) $user_info->roles)) {
                        $response['url'] = get_the_permalink(394);
                    } elseif (in_array('student', (array) $user_info->roles)) {
                        $response['url'] = get_the_permalink(644);
                    }
                    $response['status'] = 1;
                    $response['message'] = "Login Successful";
                }
            } else {
                $response['status'] = 0;
                $response['message'] = "ERROR: Verify your Email Id by clicking the link in your mailbox";
            }
        } else {
            $response['status'] = 0;
            $response['message'] = "ERROR: User not found.";
        }
    } else {
        $response['status'] = 0;
        $response['message'] = "ERROR: Email and password are required.";
    }
    echo json_encode($response);
    exit();
}

// To update Teacher in database
add_action('wp_ajax_updateTeachers', 'updateTeachers');
add_action('wp_ajax_nopriv_updateTeachers', 'updateTeachers');

function updateTeachers()
{
	$array = [];
	$merge_attachmentid = [];
	$user_id = get_current_user_id();
	$userdata = get_user_meta($user_id, 'teacher_post_id');
	$post_id = $userdata[0];
	$images = $_POST['removeId'];
	$username = $_POST['name'];
	$teachingExperience = $_POST['teachingExperience'];
	$email = $_POST['email'];
	// Define the updated post data
	$updated_post = array(
		'ID'            => $post_id,
		'post_title'    => wp_strip_all_tags($_POST['name']),
		'post_content'  => $_POST['selfDescription'],
	);

	// Update the post
	wp_update_post($updated_post);

	if ($post_id) {
		echo "Post updated Successfully .  Post ID: " . $post_id;
		// Update custom field on the new post
		update_post_meta($post_id, 'language', strtolower($_POST["language"]));
		update_post_meta($post_id, 'country', strtolower($_POST["country"]));
		update_post_meta($post_id, 'level', strtolower($_POST["level"]));
		update_post_meta($post_id, 'teaching_experience', strtolower($teachingExperience));

		// WordPress environmet
		require(dirname(__FILE__) . '/../../../wp-load.php');

		// it allows us to use wp_handle_upload() function
		require_once(ABSPATH . 'wp-admin/includes/file.php');

		// for multiple file upload.
		$upload_overrides = array('test_form' => false);

		$files = $_FILES['qualifications'];
		if (!empty($files['name'][0])) {
			foreach ($files['name'] as $key => $name) {

				$file = array(
					'name' => $files['name'][$key],
					'type' => $files['type'][$key],
					'tmp_name' => $files['tmp_name'][$key],
					'error' => $files['error'][$key],
					'size' => $files['size'][$key]
				);

				$upload = wp_handle_upload($file, $upload_overrides);

				if (!empty($upload['error'])) {
					wp_die($upload['error']);
				}

				// it is time to add our uploaded image into WordPress media library
				$attachment_id = wp_insert_attachment(
					array(
						'guid'           => $upload['url'],
						'post_mime_type' => $upload['type'],
						'post_title'     => basename($upload['file']),
						'post_content'   => '',
						'post_status'    => 'inherit',
					),
					$upload['file']
				);

				if (is_wp_error($attachment_id) || !$attachment_id) {
					wp_die('Upload error.');
				}

				// update medatata, regenerate image sizes
				require_once(ABSPATH . 'wp-admin/includes/image.php');

				wp_update_attachment_metadata(
					$attachment_id,
					wp_generate_attachment_metadata($attachment_id, $upload['file'])
				);
				$array[] = $attachment_id;
			}
		}
		// print_r($images);
		$merge_attachmentid = array_merge($images, $array);
		// print_r($merge_attachmentid);
		$result	= update_post_meta($post_id, 'post_attachment', $merge_attachmentid);
		if ($result) {
			echo 'Post meta updated successfully.';
		} else {
			echo 'Failed to update post meta.';
		}
	}
	// Get the current user's information
	$current_user = wp_get_current_user();
	// Prepare data for updating the user
	$user_id = $current_user->ID;
	$user_data = array(
		'ID' => $user_id,
		'user_login' => $username,
		'user_email' => $email
	);

	// Update the user's information
	$updated = wp_update_user($user_data);

	// Check if the update was successful
	if (is_wp_error($updated)) {
		echo "An error occurred while updating the user information.";
	} else {
		echo "User information updated successfully.";
	}
	exit;
}
// To remove the images from database
add_action('wp_ajax_removeImages', 'removeImages');
add_action('wp_ajax_nopriv_removeImages', 'removeImages');
function removeImages()
{
	$image_id = $_POST['image_id'];
	$resImg = wp_delete_attachment($image_id);  // delete an image;
	exit;
}
// To reset the password
add_action('wp_ajax_ForgetPassword', 'ForgetPassword');
add_action('wp_ajax_nopriv_ForgetPassword', 'ForgetPassword');
function ForgetPassword()
{
	global $current_user;
	$currentpassword = $_POST['pwd'];
	$confirmpassword = $_POST['confirmpassword'];
	$newpassword = $_POST['newpassword'];
	// Check if new password and confirm password match
	if ($newpassword !== $confirmpassword) {
		echo "New password and confirm password do not match.";
		exit;
	}

	// Get the current user's information
	$current_user = wp_get_current_user();

	// Check if the entered current password matches the user's actual password
	if (wp_check_password($currentpassword, $current_user->user_pass, $current_user->ID)) {
		// Prepare data for updating the user
		$user_id = $current_user->ID;
		$user_data = array(
			'ID' => $user_id,
			'user_pass' => $newpassword
		);

		// Update the user's information
		$updated = wp_update_user($user_data);


		// Check if the update was successful
		if ($updated) {
			$user_email = wp_get_current_user()->user_email;
			$subject = "Your password has been changed";

			// Simple HTML content for the email
			$htmlContent = "
				<html>
				<body>
					<p>Your password has been changed successfully.</p>
					<p><a href='#'>Back to Login</a></p>
				</body>
				</html>";

			// Build the email data
			$data = array(
				"sender" => array(
					"email" => 'preetir@graycelltech.com',
					"name" => 'Preeti Rawat'
				),
				"to" => array(
					array(
						"email" => $user_email,
						"name" => 'User'
					)
				),
				"subject" => $subject,
				"htmlContent" => $htmlContent
			);

			// Send email using Sendinblue API
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, 'https://api.sendinblue.com/v3/smtp/email');
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
			$headers = array(
				'Accept: application/json',
				'Api-Key: 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',
				'Content-Type: application/json'
			);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			$result = curl_exec($ch);
			// print_r($result);
			if (curl_errno($ch)) {
				echo 'Error:' . curl_error($ch);
				exit();
			}
			curl_close($ch);

			echo "success";
			exit;
		} else {
			echo "Failed to update user's password.";
		}
	} else {
		echo "Current password is incorrect.";
		exit();
	}
}
// To update the students
add_action('wp_ajax_updateStudent', 'updateStudent');
add_action('wp_ajax_nopriv_updateStudent', 'updateStudent');

function updateStudent()
{
	$username = $_POST['name'];
	$email = $_POST['email'];
	$bio = isset($_POST['bio']) ? $_POST['bio'] : '👩‍🎓 Ambitious student balancing a full-time job with a strong desire to master French and German. 🌐📚 Committed to personal growth and embracing new linguistic challenges. #LanguageEnthusiast #CareerDriven #BilingualGoals';
	$image = $_FILES['profile-img'];
	$current_user = wp_get_current_user();
	// Prepare data for updating the user
	$user_id = $current_user->ID;

	$userdata = array(
		'ID'        => $user_id,
		'user_email' => $email,
		'user_login' => $username,
		'display_name' => $username
	);
	$updated = wp_update_user($userdata);
	// Check if the update was successful
	if (is_wp_error($updated)) {
		echo "An error occurred while updating the user information.";
	} else {
		echo "User information updated successfully" . " " . $user_id;
	}
	if (!empty($image)) {
		$file = array(
			'name' => $image['name'],
			'type' => $image['type'],
			'tmp_name' => $image['tmp_name'],
			'error' => $image['error'],
			'size' => $image['size']
		);
		// for multiple file upload.
		$upload_overrides = array('test_form' => false);
		$upload = wp_handle_upload($file, $upload_overrides);

		if (!empty($upload['error'])) {
			wp_die($upload['error']);
		}

		// it is time to add our uploaded image into WordPress media library
		$attachment_id = wp_insert_attachment(
			array(
				'guid'           => $upload['url'],
				'post_mime_type' => $upload['type'],
				'post_title'     => basename($upload['file']),
				'post_content'   => '',
				'post_status'    => 'inherit',
			),
			$upload['file']
		);

		if (is_wp_error($attachment_id) || !$attachment_id) {
			wp_die('Upload error.');
		}

		// update medatata, regenerate image sizes
		require_once(ABSPATH . 'wp-admin/includes/image.php');

		wp_update_attachment_metadata(
			$attachment_id,
			wp_generate_attachment_metadata($attachment_id, $upload['file'])
		);
		update_user_meta($user_id, 'student_description', strtolower($bio));
		$result	= update_user_meta($user_id, 'user_profile_image', $attachment_id);
		if ($result) {
			echo 'User meta updated successfully.';
		} else {
			echo 'Failed to update post meta.';
		}
	}
	exit;
}
// To proremove profile image from database
add_action('wp_ajax_proremoveImages', 'proremoveImages');
add_action('wp_ajax_nopriv_proremoveImages', 'proremoveImages');
function proremoveImages()
{
	$user_id = get_current_user_id();
	$image_id = $_POST['image_id'];
	$resImg = wp_delete_attachment($image_id);  // delete an image;
	// update the meta in case of student profile image
	update_user_meta($user_id, 'user_profile_image', '');
	exit;
}
