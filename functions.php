<?php
/**
 * Nexus theme functions.
 *
 * @package Nexus
 */

defined( 'ABSPATH' ) || exit;

define( 'NEXUS_VERSION', '1.0.0' );

/**
 * Theme setup: supports, menus, image sizes.
 */
function nexus_setup() {
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'editor-styles' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support(
		'html5',
		array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script' )
	);
	add_theme_support( 'custom-logo' );

	register_nav_menus(
		array(
			'primary' => esc_html__( 'Primary', 'nexus' ),
			'footer'  => esc_html__( 'Footer', 'nexus' ),
		)
	);
}
add_action( 'after_setup_theme', 'nexus_setup' );

/**
 * Enqueue front-end assets.
 */
function nexus_enqueue_assets() {
	// Display + body fonts.
	wp_enqueue_style(
		'nexus-fonts',
		'https://fonts.googleapis.com/css2?family=Orbitron:wght@500;700;800;900&family=Inter:wght@400;500;600;700&display=swap',
		array(),
		NEXUS_VERSION
	);

	// Compiled theme stylesheet (block styles + front-end polish).
	wp_enqueue_style( 'nexus-style', get_stylesheet_uri(), array( 'nexus-fonts' ), NEXUS_VERSION );

	// Front-end interactions.
	wp_enqueue_script(
		'nexus-theme',
		get_template_directory_uri() . '/assets/js/theme.js',
		array(),
		NEXUS_VERSION,
		true
	);
}
add_action( 'wp_enqueue_scripts', 'nexus_enqueue_assets' );

/**
 * Enqueue editor assets.
 */
function nexus_editor_assets() {
	add_editor_style( 'assets/css/editor.css' );
}
add_action( 'after_setup_theme', 'nexus_editor_assets' );

/**
 * Register a footer widget area.
 */
function nexus_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Widgets', 'nexus' ),
			'id'            => 'footer-widgets',
			'description'   => esc_html__( 'Widgets shown above the footer on every page.', 'nexus' ),
			'before_widget' => '<div class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
}
add_action( 'widgets_init', 'nexus_widgets_init' );

/**
 * Register custom block styles.
 */
function nexus_block_styles() {
	register_block_style(
		'core/button',
		array(
			'name'  => 'nexus-neon',
			'label' => esc_html__( 'Neon Shine', 'nexus' ),
		)
	);
	register_block_style(
		'core/group',
		array(
			'name'  => 'nexus-hud-card',
			'label' => esc_html__( 'HUD Card', 'nexus' ),
		)
	);
	register_block_style(
		'core/paragraph',
		array(
			'name'  => 'nexus-rank-badge',
			'label' => esc_html__( 'Rank Badge', 'nexus' ),
		)
	);
}
add_action( 'init', 'nexus_block_styles' );

/**
 * Register the theme pattern category.
 */
function nexus_pattern_category() {
	register_block_pattern_category(
		'nexus',
		array( 'label' => esc_html__( 'Nexus', 'nexus' ) )
	);
}
add_action( 'init', 'nexus_pattern_category' );

/**
 * Custom excerpt length.
 *
 * @param int $length Default length.
 * @return int
 */
function nexus_excerpt_length( $length ) {
	return 22;
}
add_filter( 'excerpt_length', 'nexus_excerpt_length' );

/**
 * SVG icon helper used by template parts.
 *
 * @param string $name Icon name.
 * @return string
 */
function nexus_icon( $name ) {
	$icons = array(
		'arrow-up' => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 19V5M5 12l7-7 7 7"/></svg>',
		'bolt'     => '<svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M13 2 3 14h7l-1 8 10-12h-7l1-8z"/></svg>',
		'trophy'   => '<svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M6 2h12v2h4v3a5 5 0 0 1-5 5h-.42A6 6 0 0 1 13 15.92V18h4v2H7v-2h4v-2.08A6 6 0 0 1 7.42 12H7a5 5 0 0 1-5-5V4h4V2zm0 4H4v1a3 3 0 0 0 3 3V6zm12 0v4a3 3 0 0 0 3-3V6h-3z"/></svg>',
		'play'     => '<svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M8 5v14l11-7z"/></svg>',
		'star'     => '<svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="m12 2 3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01z"/></svg>',
	);

	return isset( $icons[ $name ] ) ? $icons[ $name ] : '';
}

/**
 * Reading time estimate for posts.
 *
 * @return string
 */
function nexus_reading_time() {
	$content   = get_post_field( 'post_content', get_the_ID() );
	$words     = str_word_count( wp_strip_all_tags( $content ) );
	$minutes   = max( 1, (int) ceil( $words / 200 ) );
	/* translators: %d: minutes */
	return sprintf( esc_html__( '%d min read', 'nexus' ), $minutes );
}
