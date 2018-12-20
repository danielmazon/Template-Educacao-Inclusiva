<?php

require_once( dirname( __FILE__ ) . '/inc/add-menu-relatos.php');

require_once( dirname( __FILE__ ) . '/inc/cmb2.php');

require_once( dirname( __FILE__ ) . '/inc/registro-cpt-praticas.php');

require_once( dirname( __FILE__ ) . '/inc/remove-menu-colaboradores.php');

require_once( dirname( __FILE__ ) . '/inc/tags.php');


add_action('add_meta_boxes', function() {
  add_meta_box('submitdiv', __('Publish'), 'post_submit_meta_box', 'praticas', 'normal', 'low');
});

add_action('after_setup_theme', 'remove_admin_bar');
 


// tirar a barra admin dos usuários colaboradores
function remove_admin_bar() {
    $user = wp_get_current_user();
    // lembre-se de trocar 'author' para a função(role) especifica ao seu caso.
    if (in_array('criador_praticas', $user->roles)) {
    show_admin_bar(false);
    }
}

// Redirecionando o usuário depois do login
add_filter( 'login_redirect', function( $url, $query, $user ) {
    return home_url();
}, 10, 3 );

// Redirecionando o usuário depois do logout
add_filter( 'logout_redirect', function( $url, $query, $user ) {
    return home_url();
}, 10, 3 );


// Filtros para colocar o textos cmb2 corretamente no frontend, estava dando problema com as linhas novas
add_filter( 'meta_content', 'wptexturize' );
add_filter( 'meta_content', 'convert_smilies' );
add_filter( 'meta_content', 'convert_chars' );
add_filter( 'meta_content', 'wpautop' );
add_filter( 'meta_content', 'shortcode_unautop' );
add_filter( 'meta_content', 'prepend_attachment' );

//colocar theme post-thumbnails
add_theme_support( 'post-thumbnails' );
add_image_size( 'imagem-aside', 100, 100, TRUE );

// aplicar estilos no login do wp
function custom_login_css() {
echo '<link rel="stylesheet" type="text/css" href="'.get_stylesheet_directory_uri().'/style.css"/>';
}
add_action('login_head', 'custom_login_css');


// aplicar estilos no painel admin
add_action('admin_head', 'painel_adm');

function painel_adm() {
echo '<link rel="stylesheet" type="text/css" href="'.get_stylesheet_directory_uri().'/style-adm.css"/>';

}

//Breadcrumb
function the_breadcrumb() {
    $sep = '&nbsp;>  ';
    if (!is_front_page()) {
	
	// Start the breadcrumb with a link to your homepage
        echo '<div class="breadcrumb">';
        echo '<a href="';
        echo get_option('home');
        echo '">';
        echo '<i class="fa fa-home">&nbsp;</i> ';
        echo '</a>' . $sep;
	
	// Check if the current page is a category, an archive or a single page. If so show the category or archive name.
        if (is_category() || is_single() ){
            the_category('title_li=');
        } elseif (is_archive() || is_single()){
            if ( is_day() ) {
                printf( __( '%s', 'text_domain' ), get_the_date() );
            } elseif ( is_month() ) {
                printf( __( '%s', 'text_domain' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'text_domain' ) ) );
            } elseif ( is_year() ) {
                printf( __( '%s', 'text_domain' ), get_the_date( _x( 'Y', 'yearly archives date format', 'text_domain' ) ) );
            } else {
                _e( 'Práticas inclusivas', 'text_domain' );
            }
        }
	
	// If the current page is a single post, show its title with the separator
        if (is_single()) {
            echo $sep;
            the_title();
        }
	
	// If the current page is a static page, show its title.
        if (is_page()) {
            echo the_title();
        }
	
	// if you have a static page assigned to be you posts list page. It will find the title of the static page and display it. i.e Home >> Blog
        if (is_home()){
            global $post;
            $page_for_posts_id = get_option('page_for_posts');
            if ( $page_for_posts_id ) { 
                $post = get_page($page_for_posts_id);
                setup_postdata($post);
                the_title();
                rewind_posts();
            }
        }
        echo '</div>';
    }
}