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
			'rewrite' => array('slug' => 'nivel', 'hierarchical' => true),
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
            'label' => __( 'Público da educação especial' ),
			'rewrite' => array( 'slug' => 'publico-educacao-especial' ),
            'labels' =>  array(
                'name'              => esc_html( 'Público da educação especial', 'taxonomy general name' ),
                'singular_name'     => esc_html( 'Público da educação especial', 'taxonomy singular name' ),
                'menu_name'         => esc_html( 'Público da EE' ),
                'all_items'         => esc_html( 'Todos os públicos da EE' ),
                'edit_item'         => esc_html( 'Editar público da EE' ),
                'view_item'         => esc_html( 'Visualizar público da EE' ),
                'update_item'       => esc_html( 'Alterar público da EE' ),
                'add_new_item'      => esc_html( 'Adicionar público da EE' ),
                'search_items'      => esc_html( 'Procurar públicos da EE' ),
                'not_found'         => esc_html( 'Nenhuma público da EE encontrado' ),
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
