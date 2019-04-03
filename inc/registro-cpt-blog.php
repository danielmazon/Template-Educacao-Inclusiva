<?php

/* Criando o Blog custom post type */
function blog_post_type(){

	// definir um array de rótulos
	$post_type_labels = array(
		//User: Igor - Renomear os itens para exibir Notícia no site e área administrativa
		'name'                  => _x( 'Notícias', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Notícia', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Notícias', 'text_domain' ),
		'name_admin_bar'        => __( 'Notícias', 'text_domain' ),
		'archives'              => __( 'Posts de Notícias', 'text_domain' ),
		'attributes'            => __( 'Atributos da Notícia', 'text_domain' ),
		'parent_item_colon'     => __( 'Notícia:', 'text_domain' ),
		'all_items'             => __( 'Todas as notícias', 'text_domain' ),
		'add_new_item'          => __( 'Escrever nova notícia', 'text_domain' ),
		'add_new'               => __( 'Escrever nova notícia', 'text_domain' ),
		'new_item'              => __( 'Nova notícia', 'text_domain' ),
		'edit_item'             => __( 'Editar esta notícia', 'text_domain' ),
		'update_item'           => __( 'Atualizar notícia', 'text_domain' ),
		'view_item'             => __( 'Ver esta notícia', 'text_domain' ),
		'view_items'            => __( 'Ver as notícias no site', 'text_domain' ),
		'search_items'          => __( 'Procurar notícia', 'text_domain' ),
		'not_found'             => __( 'Não encontrado', 'text_domain' ),
		'not_found_in_trash'    => __( 'Não encontrado na lixeira', 'text_domain' ),
		'featured_image'        => __( 'Imagem destaque', 'text_domain' ),
		'set_featured_image'    => __( 'Selecionar imagem destaque', 'text_domain' ),
		'remove_featured_image' => __( 'Remover imagem destaque', 'text_domain' ),
		'use_featured_image'    => __( 'Usar imagem destaque', 'text_domain' ),
		'insert_into_item'      => __( 'Inserir introdução', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Enviado para este item', 'text_domain' ),
		'items_list'            => __( 'Lista de itens', 'text_domain' ),
		'items_list_navigation' => __( 'Navegação da lista de itens', 'text_domain' ),
		'filter_items_list'     => __( 'Lista de itens de filtro', 'text_domain' ),
		);

	// definir um array de argumentos
	$post_type_args = array(
		'labels' 			=> $post_type_labels,
		'public' 			=> true,
		'menu_position' 	=> 2,
		'menu_icon' 		=> 'dashicons-media-document',
		'capability_type' 	=> 'blog',
		//User: Igor - Criar slug diferente para o BLOG
		'rewrite'          	=> array( 'slug' => 'noticias' ),
		/*'capabilities' => array(
			'read_post'					=> 'read_blog',
			'read_private_posts' 		=> 'read_private_blog',
			'edit_post'					=> 'edit_blog',
			'edit_posts'				=> 'edit_blogs',
			'edit_others_posts'			=> 'edit_others_blogs',
			'edit_published_posts'		=> 'edit_published_blogs',
			'edit_private_posts'		=> 'edit_private_blogs',
			'delete_post'				=> 'delete_blog',
			'delete_posts'				=> 'delete_blogs',
			'delete_others_posts'		=> 'delete_others_blogs',
			'delete_published_posts'	=> 'delete_published_blogs',
			'delete_private_posts'		=> 'delete_private_blogs',
			'publish_posts'				=> 'publish_blogs',
			'moderate_comments'			=> 'moderate_blog_comments',
			),*/
		'map_meta_cap' => true,
		'hierarchical' => false,
		'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
		'has_archive' => true,
		);

	register_post_type( 'blog', $post_type_args );
	
}
add_action( 'init', 'blog_post_type' );
