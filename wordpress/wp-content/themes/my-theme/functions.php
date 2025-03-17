<?php

if (!defined('_S_VERSION')) {
    // Replace the version number of the theme on each release.
    define('_S_VERSION', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function reform_theme_setup()
{
    /*
     * Make theme available for translation.
     */
    load_theme_textdomain('reform-theme', get_template_directory() . '/languages');

    // Add default posts and comments RSS feed links to head.
    add_theme_support('automatic-feed-links');

    /*
     * Let WordPress manage the document title.
     */
    add_theme_support('title-tag');

    /*
     * サムネイル追加
     */
    add_theme_support('post-thumbnails');
    add_image_size('work-thumbnail', 600, 400, true);

    // メニュー機能
    register_nav_menus(
        array(
            'header-menu' => 'ヘッダー',
            'footer-menu' => 'フッター',
        )
    );

    /*
     * Switch default core markup for search form, comment form, and comments
     * to output valid HTML5.
     */
    add_theme_support(
        'html5',
        array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
            'script',
        )
    );

    // Set up the WordPress core custom background feature.
    add_theme_support(
        'custom-background',
        apply_filters(
            'reform_theme_custom_background_args',
            array(
                'default-color' => 'ffffff',
                'default-image' => '',
            )
        )
    );

    // Add theme support for selective refresh for widgets.
    add_theme_support('customize-selective-refresh-widgets');

    /**
     * Add support for core custom logo.
     */
    add_theme_support(
        'custom-logo',
        array(
            'height'      => 250,
            'width'       => 250,
            'flex-width'  => true,
            'flex-height' => true,
        )
    );
}
add_action('after_setup_theme', 'reform_theme_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function reform_theme_content_width()
{
    $GLOBALS['content_width'] = apply_filters('reform_theme_content_width', 1200);
}
add_action('after_setup_theme', 'reform_theme_content_width', 0);

/**
 * Register widget area.
 */
function reform_theme_widgets_init()
{
    register_sidebar(
        array(
            'name'          => esc_html__('Sidebar', 'reform-theme'),
            'id'            => 'sidebar-1',
            'description'   => esc_html__('Add widgets here.', 'reform-theme'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );
}
add_action('widgets_init', 'reform_theme_widgets_init');

/**
 * CSS、JavaScriptファイルの読み込み
 */
function reform_theme_scripts()
{
    // Google Fonts
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@300;400;500;700&display=swap', array(), null);
    // Theme stylesheet
    wp_enqueue_style('reform-theme-style', get_stylesheet_uri(), array(), _S_VERSION);
    // CSSファイル
    wp_enqueue_style(
        'my-theme-style',                      // ハンドル名（一意の識別子）
        get_template_directory_uri() . '/assets/css/style.css',
        array(),                               // 依存関係
        filemtime(get_template_directory() . '/assets/css/style.css'), // バージョン（キャッシュ対策）
        'all'                                  // メディア
    );

    // Theme main JavaScript
    wp_enqueue_script('reform-theme-navigation', get_template_directory_uri() . '/js/main.js', array('jquery'), _S_VERSION, true);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'reform_theme_scripts');

/**
 * Register custom post types.
 */
function reform_theme_register_post_types()
{
    // Register Works Custom Post Type
    $labels = array(
        'name'                  => _x('Works', 'Post type general name', 'reform-theme'),
        'singular_name'         => _x('Work', 'Post type singular name', 'reform-theme'),
        'menu_name'             => _x('Works', 'Admin Menu text', 'reform-theme'),
        'name_admin_bar'        => _x('Work', 'Add New on Toolbar', 'reform-theme'),
        'add_new'               => __('Add New', 'reform-theme'),
        'add_new_item'          => __('Add New Work', 'reform-theme'),
        'new_item'              => __('New Work', 'reform-theme'),
        'edit_item'             => __('Edit Work', 'reform-theme'),
        'view_item'             => __('View Work', 'reform-theme'),
        'all_items'             => __('All Works', 'reform-theme'),
        'search_items'          => __('Search Works', 'reform-theme'),
        'parent_item_colon'     => __('Parent Works:', 'reform-theme'),
        'not_found'             => __('No works found.', 'reform-theme'),
        'not_found_in_trash'    => __('No works found in Trash.', 'reform-theme'),
        'featured_image'        => _x('Work Cover Image', 'Overrides the "Featured Image" phrase', 'reform-theme'),
        'set_featured_image'    => _x('Set cover image', 'Overrides the "Set featured image" phrase', 'reform-theme'),
        'remove_featured_image' => _x('Remove cover image', 'Overrides the "Remove featured image" phrase', 'reform-theme'),
        'use_featured_image'    => _x('Use as cover image', 'Overrides the "Use as featured image" phrase', 'reform-theme'),
        'archives'              => _x('Work archives', 'The post type archive label used in nav menus', 'reform-theme'),
        'insert_into_item'      => _x('Insert into work', 'Overrides the "Insert into post" phrase', 'reform-theme'),
        'uploaded_to_this_item' => _x('Uploaded to this work', 'Overrides the "Uploaded to this post" phrase', 'reform-theme'),
        'filter_items_list'     => _x('Filter works list', 'Screen reader text for the filter links', 'reform-theme'),
        'items_list_navigation' => _x('Works list navigation', 'Screen reader text for the pagination', 'reform-theme'),
        'items_list'            => _x('Works list', 'Screen reader text for the items list', 'reform-theme'),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'works'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-hammer',
        'supports'           => array('title', 'editor', 'thumbnail', 'excerpt'),
    );

    register_post_type('works', $args);
}
add_action('init', 'reform_theme_register_post_types');

/**
 * Register custom taxonomies.
 */
function reform_theme_register_taxonomies()
{
    // Register Work Category Taxonomy
    $labels = array(
        'name'                       => _x('Work Categories', 'taxonomy general name', 'reform-theme'),
        'singular_name'              => _x('Work Category', 'taxonomy singular name', 'reform-theme'),
        'search_items'               => __('Search Work Categories', 'reform-theme'),
        'popular_items'              => __('Popular Work Categories', 'reform-theme'),
        'all_items'                  => __('All Work Categories', 'reform-theme'),
        'parent_item'                => __('Parent Work Category', 'reform-theme'),
        'parent_item_colon'          => __('Parent Work Category:', 'reform-theme'),
        'edit_item'                  => __('Edit Work Category', 'reform-theme'),
        'update_item'                => __('Update Work Category', 'reform-theme'),
        'add_new_item'               => __('Add New Work Category', 'reform-theme'),
        'new_item_name'              => __('New Work Category Name', 'reform-theme'),
        'separate_items_with_commas' => __('Separate work categories with commas', 'reform-theme'),
        'add_or_remove_items'        => __('Add or remove work categories', 'reform-theme'),
        'choose_from_most_used'      => __('Choose from the most used work categories', 'reform-theme'),
        'not_found'                  => __('No work categories found.', 'reform-theme'),
        'menu_name'                  => __('Work Categories', 'reform-theme'),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'work-category'),
    );

    register_taxonomy('work-category', array('works'), $args);
}
add_action('init', 'reform_theme_register_taxonomies');

/**
 * Customizer additions.
 */
function my_theme_customizer_settings($wp_customize)
{
    // フッター情報
    $wp_customize->add_section('footer_info', array(
        'title'    => 'フッター情報',
        'priority' => 120,              // 優先度
    ));
    $wp_customize->add_setting('footer_address', array(
        'default'   => '〒100-0000 東京都千代田区千代田1-1-1',
        'transport' => 'postMessage',          // 設定が変更された時の反映方法(リアルタイム反映)
    ));
    $wp_customize->add_control('footer_address', array(
        'label'    => '住所',
        'section'  => 'footer_info',
        'type'     => 'text',
    ));
    $wp_customize->add_setting('footer_phone', array(
        'default'   => '090-1111-2222',
        'transport' => 'postMessage',          // 設定が変更された時の反映方法(リアルタイム反映)
    ));
    $wp_customize->add_control('footer_phone', array(
        'label'    => '電話番号',
        'section'  => 'footer_info',
        'type'     => 'text',
    ));
    $wp_customize->add_setting('footer_hours', array(
        'default'   => '9:00〜18:00',
        'transport' => 'postMessage',          // 設定が変更された時の反映方法(リアルタイム反映)
    ));
    $wp_customize->add_control('footer_hours', array(
        'label'    => '営業時間',
        'section'  => 'footer_info',
        'type'     => 'text',
    ));
}
add_action('customize_register', 'my_theme_customizer_settings');

/**
 * 指定したタグの最新更新記事を1件取得する関数
 *
 * @param string $tag_slug タグのスラッグ
 * @return WP_Post|null 投稿オブジェクトまたはnull
 */
function get_latest_post_by_tag($tag_slug)
{
    $args = array(
        'tag' => $tag_slug,
        'orderby' => 'modified',
        'order' => 'DESC',
        'posts_per_page' => 1,
        'post_type' => 'post',
        'post_status' => 'publish',
    );

    $query = new WP_Query($args);

    if ($query->have_posts()) {
        return $query->posts[0];
    }

    return null;
}
