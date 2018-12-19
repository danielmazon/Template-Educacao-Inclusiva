<?php
// Criando a Taxonomia Critérios
add_action( 'init', 'criterios_init' );
function criterios_init() {
    register_taxonomy(
        'criterios',
        array('praticas'),
        array(
            'label' => __( 'Critérios' ),
            'labels' =>  array(
                'name'              => esc_html( 'Critérios', 'taxonomy general name' ),
                'singular_name'     => esc_html( 'Critérios', 'taxonomy singular name' ),
                'menu_name'         => esc_html( 'Critérios' ),
                'all_items'         => esc_html( 'Todas os critérios' ),
                'edit_item'         => esc_html( 'Editar critério' ),
                'view_item'         => esc_html( 'Visualizar critério' ),
                'update_item'       => esc_html( 'Alterar critério' ),
                'add_new_item'      => esc_html( 'Adicionar critério' ),
                'search_items'      => esc_html( 'Procurar critério' ),
                'not_found'         => esc_html( 'Nenhum critério encontrado' ),
               ),
			    'capabilities' => array(
					'manage_terms' => 'edit_posts',
					'edit_terms'   => 'edit_posts',
					'delete_terms' => 'edit_posts',
					'assign_terms' => 'read',
				),
            'hierarchical' => true
          )
     );
}

// remover boxe critérios
function remove_post_custom_fields() {
	remove_meta_box( 'criteriosdiv' , 'praticas' , 'side' );
}
add_action( 'admin_menu' , 'remove_post_custom_fields' );


// Criando a Taxonomia Modalidade
add_action( 'init', 'modalidade_init' );
function modalidade_init() {
    register_taxonomy(
        'modalidade',
        array('praticas'),
        array(
            'label' => __( 'Modalidade de ensino' ),
            'labels' =>  array(
                'name'              => esc_html( 'Modalidade de ensino', 'taxonomy general name' ),
                'singular_name'     => esc_html( 'Modalidade de ensino', 'taxonomy singular name' ),
                'menu_name'         => esc_html( 'Modalidade de ensino' ),
                'all_items'         => esc_html( 'Todas as modalidades' ),
                'edit_item'         => esc_html( 'Editar modalidade' ),
                'view_item'         => esc_html( 'Visualizar modalidade' ),
                'update_item'       => esc_html( 'Alterar modalidade' ),
                'add_new_item'      => esc_html( 'Adicionar modalidade' ),
                'search_items'      => esc_html( 'Procurar modalidade' ),
                'not_found'         => esc_html( 'Nenhuma modalidade encontrada' ),
               ),
			    'capabilities' => array(
					'manage_terms' => 'edit_posts',
					'edit_terms'   => 'edit_posts',
					'delete_terms' => 'edit_posts',
					'assign_terms' => 'read',
				),
            'hierarchical' => true
          )
     );
}

// Criando a Taxonomia Área Ensino Infantil
add_action( 'init', 'infantil_init' );
function infantil_init() {
    register_taxonomy(
        'infantil',
        array('praticas'),
        array(
            'label' => __( 'Ensino Infantil' ),
            'labels' =>  array(
                'name'              => esc_html( 'Ensino Infantil', 'taxonomy general name' ),
                'singular_name'     => esc_html( 'Nível Ensino Infantil', 'taxonomy singular name' ),
                'menu_name'         => esc_html( 'Ensino Infantil' ),
                'all_items'         => esc_html( 'Todas os níveis' ),
                'edit_item'         => esc_html( 'Editar nível' ),
                'view_item'         => esc_html( 'Visualizar nível' ),
                'update_item'       => esc_html( 'Alterar nível' ),
                'add_new_item'      => esc_html( 'Adicionar nível' ),
                'search_items'      => esc_html( 'Procurar nível' ),
                'not_found'         => esc_html( 'Nenhuma nível encontrado' ),
               ),
			    'capabilities' => array(
					'manage_terms' => 'edit_posts',
					'edit_terms'   => 'edit_posts',
					'delete_terms' => 'edit_posts',
					'assign_terms' => 'read',
				),
            'hierarchical' => true
          )
     );
}

// Criando a Taxonomia Área Ensino Fundamental
add_action( 'init', 'fundamental_init' );
function fundamental_init() {
    register_taxonomy(
        'fundamental',
        array('praticas'),
        array(
            'label' => __( 'Nível Ensino Fundamental' ),
            'labels' =>  array(
                'name'              => esc_html( 'Ensino Fundamental', 'taxonomy general name' ),
                'singular_name'     => esc_html( 'Nível Ensino Fundamental', 'taxonomy singular name' ),
                'menu_name'         => esc_html( 'Ensino Fundamental' ),
                'all_items'         => esc_html( 'Todas os níveis' ),
                'edit_item'         => esc_html( 'Editar nível' ),
                'view_item'         => esc_html( 'Visualizar nível' ),
                'update_item'       => esc_html( 'Alterar nível' ),
                'add_new_item'      => esc_html( 'Adicionar nível' ),
                'search_items'      => esc_html( 'Procurar nível' ),
                'not_found'         => esc_html( 'Nenhuma nível encontrado' ),
               ),
			    'capabilities' => array(
					'manage_terms' => 'edit_posts',
					'edit_terms'   => 'edit_posts',
					'delete_terms' => 'edit_posts',
					'assign_terms' => 'read',
				),
            'hierarchical' => true
          )
     );
}

// Criando a Taxonomia Área Ensino Médio
add_action( 'init', 'medio_init' );
function medio_init() {
    register_taxonomy(
        'medio',
        array('praticas'),
        array(
            'label' => __( 'Nível do Ensino Médio' ),
            'labels' =>  array(
                'name'              => esc_html( 'Ensino Médio', 'taxonomy general name' ),
                'singular_name'     => esc_html( 'Nível da Ensino Médio', 'taxonomy singular name' ),
                'menu_name'         => esc_html( 'Ensino Médio' ),
                'all_items'         => esc_html( 'Todas os níveis' ),
                'edit_item'         => esc_html( 'Editar nível' ),
                'view_item'         => esc_html( 'Visualizar nível' ),
                'update_item'       => esc_html( 'Alterar nível' ),
                'add_new_item'      => esc_html( 'Adicionar nível' ),
                'search_items'      => esc_html( 'Procurar nível' ),
                'not_found'         => esc_html( 'Nenhuma nível encontrado' ),
               ),
			    'capabilities' => array(
					'manage_terms' => 'edit_posts',
					'edit_terms'   => 'edit_posts',
					'delete_terms' => 'edit_posts',
					'assign_terms' => 'read',
				),
            'hierarchical' => true
          )
     );
}

// Criando a Taxonomia Nível educação superior
add_action( 'init', 'superior_init' );
function superior_init() {
    register_taxonomy(
        'superior',
        array('praticas'),
        array(
            'label' => __( 'Nível de educação superior' ),
            'labels' =>  array(
                'name'              => esc_html( 'Educação superior', 'taxonomy general name' ),
                'singular_name'     => esc_html( 'Nível da educação superior', 'taxonomy singular name' ),
                'menu_name'         => esc_html( 'Educação superior' ),
                'all_items'         => esc_html( 'Todas os níveis' ),
                'edit_item'         => esc_html( 'Editar nível' ),
                'view_item'         => esc_html( 'Visualizar nível' ),
                'update_item'       => esc_html( 'Alterar nível' ),
                'add_new_item'      => esc_html( 'Adicionar nível' ),
                'search_items'      => esc_html( 'Procurar nível' ),
                'not_found'         => esc_html( 'Nenhuma nível encontrado' ),
               ),
			    'capabilities' => array(
					'manage_terms' => 'edit_posts',
					'edit_terms'   => 'edit_posts',
					'delete_terms' => 'edit_posts',
					'assign_terms' => 'read',
				),
            'hierarchical' => true
          )
     );
}



// Criando a Taxonomia Deficiência
add_action( 'init', 'deficiencia_init' );
function deficiencia_init() {
    register_taxonomy(
        'deficiencia',
        array('praticas'),
        array(
            'label' => __( 'Deficiências' ),
            'labels' =>  array(
                'name'              => esc_html( 'Tipos de Deficiência', 'taxonomy general name' ),
                'singular_name'     => esc_html( 'Tipos de Deficiência', 'taxonomy singular name' ),
                'menu_name'         => esc_html( 'Deficiência' ),
                'all_items'         => esc_html( 'Todos os tipos' ),
                'edit_item'         => esc_html( 'Editar tipo' ),
                'view_item'         => esc_html( 'Visualizar tipo' ),
                'update_item'       => esc_html( 'Alterar tipo' ),
                'add_new_item'      => esc_html( 'Adicionar tipo' ),
                'search_items'      => esc_html( 'Procurar tipo' ),
                'not_found'         => esc_html( 'Nenhuma tipo encontrado' ),
               ),
			    'capabilities' => array(
					'manage_terms' => 'edit_posts',
					'edit_terms'   => 'edit_posts',
					'delete_terms' => 'edit_posts',
					'assign_terms' => 'read',
				),
            'hierarchical' => true
          )
     );
}
