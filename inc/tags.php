<?php
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

// Criando a Taxonomia Área Ensino Médio
add_action( 'init', 'nivel_init' );
function nivel_init() {
	register_taxonomy(
        'nivel',
        array('praticas'),
        array(
            'label' => __( 'Nível de Ensino' ),
            'labels' =>  array(
                'name'              => esc_html( 'Nível de Ensino', 'taxonomy general name' ),
                'singular_name'     => esc_html( 'Nível de Ensino', 'taxonomy singular name' ),
                'menu_name'         => esc_html( 'Nível de Ensino' ),
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

// Criando a  Deficiência
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
