<?php

// Filtros para colocar o textos cmb2 corretamente no frontend
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






// Cria Custom Type – Práticas
/*
function praticas() {

	$labels = array(
		'name'                  => _x( 'Práticas', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Prática', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Práticas', 'text_domain' ),
		'name_admin_bar'        => __( 'Práticas', 'text_domain' ),
		'archives'              => __( 'Arquivos de práticas', 'text_domain' ),
		'attributes'            => __( 'Atributos da prática', 'text_domain' ),
		'parent_item_colon'     => __( 'Prática:', 'text_domain' ),
		'all_items'             => __( 'Todas as práticas', 'text_domain' ),
		'add_new_item'          => __( 'Criar novo relato', 'text_domain' ),
		'add_new'               => __( 'Criar novo', 'text_domain' ),
		'new_item'              => __( 'Criar novo', 'text_domain' ),
		'edit_item'             => __( 'Editar relato', 'text_domain' ),
		'update_item'           => __( 'Atualizar relato', 'text_domain' ),
		'view_item'             => __( 'Ver relato', 'text_domain' ),
		'view_items'            => __( 'Ver relatos', 'text_domain' ),
		'search_items'          => __( 'Procurar relato', 'text_domain' ),
		'not_found'             => __( 'Não encontrado', 'text_domain' ),
		'not_found_in_trash'    => __( 'Não encontrado na lixeira', 'text_domain' ),
		'featured_image'        => __( 'Imagem destaque', 'text_domain' ),
		'set_featured_image'    => __( 'Selecionar imagem destaque', 'text_domain' ),
		'remove_featured_image' => __( 'Remover imagem destaque', 'text_domain' ),
		'use_featured_image'    => __( 'Usar imagem destaque', 'text_domain' ),
		'insert_into_item'      => __( 'Inserir intrudução', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Enviado para este item', 'text_domain' ),
		'items_list'            => __( 'Lista de itens', 'text_domain' ),
		'items_list_navigation' => __( 'Navegação da lista de itens', 'text_domain' ),
		'filter_items_list'     => __( 'Lista de itens de filtro', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Prática', 'text_domain' ),
		'description'           => __( 'Compartilhe suas práticas educativas', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'comments', 'revisions' ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'student_project',
	);
	register_post_type( 'praticas', $args );

}
add_action( 'init', 'praticas', 0 );



class praticasmetaboxMetabox {
	private $screen = array(
		'praticas',
	);
	private $meta_fields = array(
		array(
			'label' => 'Nome',
			'id' => 'nome_77624',
			'type' => 'text',
		),
		array(
			'label' => 'E-mail',
			'id' => 'email_98575',
			'type' => 'email',
		),
		array(
			'label' => 'Telefone',
			'id' => 'telefone_61262',
			'default' => 'Não esqueça de preencher o código de área no formato (xx)xxxxxxxxx',
			'type' => 'tel',
		),
		array(
			'label' => 'Instituição em que trabalha',
			'id' => 'instituioemqu_79742',
			'type' => 'select',
			'options' => array(
				'Escola pública municipal ',
				'Escola pública estadual',
				'Instituto Federal de Santa Catarina',
				'Outras',
			),
		),
		array(
			'label' => 'Tempo de experiência como docente: ',
			'id' => 'tempodeexperin_33691',
			'type' => 'select',
			'options' => array(
				'Até 2 anos',
				'3 a 6 anos',
				'7 a 10 anos',
				'11 a 14 anos ',
				'15 anos ou mais',
			),
		),
		array(
			'label' => 'Ao longo de sua carreira você já atendeu quantos alunos com deficiência (aproximadamente)? Não sabe exatamente? Fique tranquilo, você pode indicar um valor aproximado. ',
			'id' => 'aolongodesuacar_63410',
			'type' => 'select',
			'options' => array(
				'1 aluno',
				'2 a 4 alunos',
				'5 a 7 alunos',
				'8 a 10 alunos',
				'mais de 10 alunos.',
			),
		),
		array(
			'label' => 'Na sua graduação você aprendeu sobre educação inclusiva? Qual o nível de satisfação acerca do ensino dessa temática?',
			'id' => 'nasuagraduaov_19386',
			'type' => 'select',
			'options' => array(
				'Muito satisfeito/a',
				'Satisfeito/a',
				'Insatisfeito/a',
				'Muito Insatisfeito/a',
				'Não tive formação sobre inclusão durante a graduação',
			),
		),
		array(
			'label' => 'Como você age com relação à adequação da sua metodologia de ensino e/ou processo de avaliação para atender estudantes com deficiência?',
			'id' => 'comovocagecomr_95962',
			'type' => 'select',
			'options' => array(
				'Não faço adequações, trabalho da mesma maneira com todos os/as estudantes em sala de aula.',
				'Faço pequenas adequações sozinho/a, mas preciso de ajuda para realizar outras. ',
				'Adapto satisfatoriamente sozinho ',
				'Adapto com ajuda informal de colegas ',
				'Adapto com ajuda formal da escola / instituição ',
				'Outro',
			),
		),
		array(
			'label' => 'Escolha o nível de educação que a prática inclusiva ocorreu.',
			'id' => 'escolhaonvelde_97883',
			'type' => 'select',
			'options' => array(
				'Ensino Infantil',
				'Ensino Fundamental',
				'Ensino Médio ',
				'Graduação ',
				'Pós-graduação ',
			),
		),
		array(
			'label' => 'Qual área a prática está relacionada?',
			'id' => 'qualreaaprtic_41260',
			'type' => 'select',
			'options' => array(
				'FORMAÇÃO GERAL',
				'Ensino Fundamental - Componentes Curriculares:',
				'Ciências ',
				'História ',
				'Matemática ',
				'Lingua Portuguesa ',
				'Geografia ',
				'Ed. Física',
				'Artes',
				'Língua estrangeira',
				'',
				'Ensino médio - Modalidades de ensino:',
				'Educação de Jovens e Adultos',
				'Educação Especial',
				'Educação Profissional e Tecnológica',
				'Educação Básica do Campo',
				'Educação Escolar Indígena',
				'Educação Escolar Quilombola ',
				'Educação à Distância.',
				'',
				'Componentes curriculares:',
				'Biologia',
				'Química',
				'Física ',
				'História',
				'Geografia ',
				'Sociologia',
				'Filosofia',
				'Lingua Portuguesa',
				'Artes ',
				'Lingua estrangeira',
				'Matemática',
			),
		),
		array(
			'label' => 'FORMAÇÃO ESPECÍFICA - Curso Técnico em:',
			'id' => 'formaoespecf_91105',
			'type' => 'text',
		),
		array(
			'label' => 'FORMAÇÃO ESPECÍFICA - Graduação em: ',
			'id' => 'formaoespecf_99673',
			'type' => 'text',
		),
		array(
			'label' => 'Deficiência atendida (Você pode selecionar mais de uma)',
			'id' => 'deficinciaaten_89292',
			'type' => 'radio',
			'options' => array(
				'CEGUEIRA ',
				'Cego',
				'Baixa visão',
				'',
				'SURDEZ ',
				'Perda total',
				'Perda parcial',
				'',
				'SURDOCEGUEIRA',
				'',
				'DEFICIÊNCIA INTELECTUAL',
				'',
				'TRANSTORNO DO ESPECTRO AUTISTA (TEA)',
				'',
				'DEFICIÊNCIA MOTORA ',
				'Pessoas cadeirantes ',
				'Com paralisia cerebral ',
				'Outros:_______________',
				'',
				'DEFICIÊNCIAS MÚLTIPLAS',
				'',
				'ALTAS HABILIDADES',
				'',
				'OUTRA DEFICIÊNCIA',
				'especifique: __________',
				'EXPERIÊNCIA EDUCACIONAL INCLUSIVA SEM ESTUDANTES COM DEFICIÊNCIA (Entendemos como experiência educacional inclusiva aquela que  promove entre todos os que dela participam: colaboração, participação democrática, empatia, ética nas relações, solidariedade, proatividade, respeito à diversidade, cuidado com as pessoas e com o ambiente, sustentabilidade, confiança e cidadania)',
			),
		),
		array(
			'label' => 'Com que curso; turma; quantos alunos/as?',
			'id' => 'comquecursotur_62174',
			'type' => 'wysiwyg',
		),
		array(
			'label' => 'Qual foi o conteúdo abordado?',
			'id' => 'qualfoioconted_63644',
			'type' => 'wysiwyg',
		),
		array(
			'label' => 'Quantos alunos deficientes envolvidos/quais deficiências?',
			'id' => 'quantosalunosde_73237',
			'type' => 'wysiwyg',
		),
		array(
			'label' => 'Quais recursos educacionais foram utilizados?',
			'id' => 'quaisrecursosed_57818',
			'type' => 'wysiwyg',
		),
		array(
			'label' => 'Quais obstáculos você superou na prática inclusiva descrita? ',
			'id' => 'quaisobstculos_95171',
			'type' => 'wysiwyg',
		),
		array(
			'label' => 'O que você percebeu na turma após realizar esta prática?',
			'id' => 'oquevocpercebe_37389',
			'type' => 'wysiwyg',
		),
		array(
			'label' => 'Quais aprendizados você teve como professor/a?',
			'id' => 'quaisaprendizad_82443',
			'type' => 'wysiwyg',
		),
	);
	public function __construct() {
		add_action( 'add_meta_boxes', array( $this, 'add_meta_boxes' ) );
		add_action( 'save_post', array( $this, 'save_fields' ) );
	}
	public function add_meta_boxes() {
		foreach ( $this->screen as $single_screen ) {
			add_meta_box(
				'praticasmetabox',
				__( 'praticas_meta_box', 'textdomain' ),
				array( $this, 'meta_box_callback' ),
				$single_screen,
				'advanced',
				'default'
			);
		}
	}
	public function meta_box_callback( $post ) {
		wp_nonce_field( 'praticasmetabox_data', 'praticasmetabox_nonce' );
		$this->field_generator( $post );
	}
	public function field_generator( $post ) {
		$output = '';
		foreach ( $this->meta_fields as $meta_field ) {
			$label = '<label for="' . $meta_field['id'] . '">' . $meta_field['label'] . '</label>';
			$meta_value = get_post_meta( $post->ID, $meta_field['id'], true );
			if ( empty( $meta_value ) ) {
				$meta_value = $meta_field['default']; }
			switch ( $meta_field['type'] ) {
				case 'radio':
					$input = '<fieldset>';
					$input .= '<legend class="screen-reader-text">' . $meta_field['label'] . '</legend>';
					$i = 0;
					foreach ( $meta_field['options'] as $key => $value ) {
						$meta_field_value = !is_numeric( $key ) ? $key : $value;
						$input .= sprintf(
							'<label><input %s id=" % s" name="% s" type="radio" value="% s"> %s</label>%s',
							$meta_value === $meta_field_value ? 'checked' : '',
							$meta_field['id'],
							$meta_field['id'],
							$meta_field_value,
							$value,
							$i < count( $meta_field['options'] ) - 1 ? '<br>' : ''
						);
						$i++;
					}
					$input .= '</fieldset>';
					break;
				case 'select':
					$input = sprintf(
						'<select id="%s" name="%s">',
						$meta_field['id'],
						$meta_field['id']
					);
					foreach ( $meta_field['options'] as $key => $value ) {
						$meta_field_value = !is_numeric( $key ) ? $key : $value;
						$input .= sprintf(
							'<option %s value="%s">%s</option>',
							$meta_value === $meta_field_value ? 'selected' : '',
							$meta_field_value,
							$value
						);
					}
					$input .= '</select>';
					break;
				case 'wysiwyg':
					ob_start();
					wp_editor($meta_value, $meta_field['id']);
					$input = ob_get_contents();
					ob_end_clean();
					break;
				default:
					$input = sprintf(
						'<input %s id="%s" name="%s" type="%s" value="%s">',
						$meta_field['type'] !== 'color' ? 'style="width: 100%"' : '',
						$meta_field['id'],
						$meta_field['id'],
						$meta_field['type'],
						$meta_value
					);
			}
			$output .= $this->format_rows( $label, $input );
		}
		echo '<table class="form-table"><tbody>' . $output . '</tbody></table>';
	}
	public function format_rows( $label, $input ) {
		return '<tr><th>'.$label.'</th><td>'.$input.'</td></tr>';
	}
	public function save_fields( $post_id ) {
		if ( ! isset( $_POST['praticasmetabox_nonce'] ) )
			return $post_id;
		$nonce = $_POST['praticasmetabox_nonce'];
		if ( !wp_verify_nonce( $nonce, 'praticasmetabox_data' ) )
			return $post_id;
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
			return $post_id;
		foreach ( $this->meta_fields as $meta_field ) {
			if ( isset( $_POST[ $meta_field['id'] ] ) ) {
				switch ( $meta_field['type'] ) {
					case 'email':
						$_POST[ $meta_field['id'] ] = sanitize_email( $_POST[ $meta_field['id'] ] );
						break;
					case 'text':
						$_POST[ $meta_field['id'] ] = sanitize_text_field( $_POST[ $meta_field['id'] ] );
						break;
				}
				update_post_meta( $post_id, $meta_field['id'], $_POST[ $meta_field['id'] ] );
			} else if ( $meta_field['type'] === 'checkbox' ) {
				update_post_meta( $post_id, $meta_field['id'], '0' );
			}
		}
	}
}
if (class_exists('praticasmetaboxMetabox')) {
	new praticasmetaboxMetabox;
	
	
	

};