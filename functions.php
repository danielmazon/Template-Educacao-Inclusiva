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

// Tamanho das Thumbnails
add_theme_support( 'post-thumbnails' );
add_image_size( 'thumb_100', 100, 100, FALSE );
add_image_size( 'thumb_130', 130, 130, FALSE );
add_image_size( 'thumb_200', 200, 200, FALSE );
add_image_size( 'thumb_300', 300, 300, FALSE );


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

/* User: igor - Personalizar a coluna de práticas para exibir o usuário que cadastrou a prática */
function set_praticas_columns($columns) {
    return array(
        'cb' => '<input type="checkbox" />',
        'title' => __('Title'),
        'comments' => '<span class="vers comment-grey-bubble" title="' . esc_attr__( 'Comments' ) . '"><span class="screen-reader-text">' . __( 'Comments' ) . '</span></span>',
        'date' => __('Date'),
        'autor' => __('Autor', 'smashing')

    );
}
add_filter('manage_praticas_posts_columns' , 'set_praticas_columns');
add_action( 'manage_praticas_posts_custom_column', 'smashing_praticas_column', 10, 2);
function smashing_praticas_column( $column, $post_id ) {
  // Image column
  if ( 'autor' === $column ) {
    echo '<a href="users.php?s=' . get_the_author() . '">' . get_the_author() . '</a><br /><a href="mailto:' . get_the_author_email() . '">' .  get_the_author_email() . '</a>';
  }
}
