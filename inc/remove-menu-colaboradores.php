<?php

/* Desativa drag box
function disable_drag_metabox() {
	if ( current_user_can('criador_praticas') ) { 
		wp_deregister_script('postbox');
	}
}
add_action( 'admin_init', 'disable_drag_metabox' );
*/

// Remove SLUG 
function remove_custom_taxonomy() {
	if ( current_user_can('criador_praticas') ) { 
		remove_meta_box( 'slugdiv', 'praticas', 'side' );
		remove_meta_box( 'submitdiv', 'praticas', 'side' );
		remove_meta_box( 'infantildiv', 'praticas', 'side' );
		remove_meta_box( 'fundamentaldiv', 'praticas', 'side' );
		remove_meta_box( 'mediodiv', 'praticas', 'side' );
		remove_meta_box( 'superiordiv', 'praticas', 'side' );
		remove_meta_box( 'deficienciasdiv', 'praticas', 'side' );
		remove_meta_box( 'praticas_foobox_exclude', 'praticas', 'side' );
	}
}
add_action( 'admin_menu', 'remove_custom_taxonomy' );

add_action('add_meta_boxes', 'yoast_is_toast', 1000);
		function yoast_is_toast(){
			//capability of 'manage_plugins' equals admin, therefore if NOT administrator
			//hide the meta box from all other roles on the following 'post_type' 
			//such as post, page, custom_post_type, etc
			if (current_user_can('criador_praticas')) {
				remove_meta_box('wpseo_meta', 'praticas', 'normal');
			}
		}
		

// Remove Box Imagem destaque 
add_action('do_meta_boxes', 'remove_thumbnail_box');
function remove_thumbnail_box() {
	if ( current_user_can('criador_praticas') ) { 
    remove_meta_box( 'postimagediv','praticas','side' );
	}
}

/* User: igor - Remover o box que permite a configuração de comentários nas práticas para os usuários criadores de práticas */
// Remove Box de Discussão
add_action('do_meta_boxes', 'remove_discussion_box');
function remove_discussion_box() {
	if ( current_user_can('criador_praticas') ) { 
    remove_meta_box( 'commentstatusdiv','praticas','normal' );
	}
}


/* insere balões
add_action( 'admin_enqueue_scripts', 'my_admin_enqueue_scripts' );
function my_admin_enqueue_scripts() {
	if ( current_user_can('criador_praticas') ) { 
		wp_enqueue_style( 'wp-pointer' );
		wp_enqueue_script( 'wp-pointer' );
		add_action( 'admin_print_footer_scripts', 'my_admin_print_footer_scripts' );
	}
}
*/

function my_admin_print_footer_scripts() {
	if ( current_user_can('criador_praticas') ) { 

		$pointer_content = '<h3>Enviar para revisão</h3>';
		$pointer_content .= '<p>Depois de preencher o formulário, clique em Enviar para revisão.</p>';
	?>
	   <script type="text/javascript">
	   //<![CDATA[
	   jQuery(document).ready( function($) {
		$('#publishing-action').pointer({
			content: '<?php echo $pointer_content; ?>',
			position: 'top',
			close: function() {
			}
		  }).pointer('open');
	   });
	   //]]>
	   </script>
	<?php
	}
}



/**
 * Remove menus dos colaboradores
 */
function remove_menus(){
  if ( current_user_can('criador_praticas') ) { 
  remove_menu_page( 'index.php' );                  //Dashboard
  remove_menu_page( 'jetpack' );                    //Jetpack* 
  remove_menu_page( 'edit.php' );                   //Posts
  remove_menu_page( 'edit.php' );                   //Posts
  remove_menu_page( 'upload.php' );                 //Media
  remove_menu_page( 'users.php' );                  //Users
  remove_menu_page( 'profile.php' );                  //Users
  }
}
add_action( 'admin_menu', 'remove_menus' );
add_action( 'admin_bar_menu', 'remove_wp_logo', 999 );

function remove_wp_logo( $wp_admin_bar ) {
	if ( current_user_can('criador_praticas') ) { 
		$wp_admin_bar->remove_node( 'wp-admin-bar-my-account' );

		$wp_admin_bar->remove_node( 'wp-logo' );
		$wp_admin_bar->remove_node( 'new-content' );
		$wp_admin_bar->remove_node( 'new-media' );
		$wp_admin_bar->remove_node( 'archive' );
		$wp_admin_bar->remove_node( 'screen-meta' );
		$wp_admin_bar->remove_node( 'praticas' );
		$wp_admin_bar->remove_node( 'preview' );
		$wp_admin_bar->remove_node( 'wpadminbar' );
		$wp_admin_bar->add_node( 'new-media' );

		function remover_screen_options(){
			return false;
		}
		add_filter('screen_options_show_screen', 'remover_screen_options');	
	}
}