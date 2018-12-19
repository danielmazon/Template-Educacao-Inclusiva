<?php
/**
 **  BOX Modalidade de Ensino
 **/
add_action( 'cmb2_admin_init', 'box_modalidade' );

function box_modalidade() {

	$prefix = '_modalidade_';
	
	$cmb = new_cmb2_box( array(
		'id'            => 'box_modalidade',
		'title'         => __( 'Identifique a modalidade/nível de ensino:', 'cmb2' ),
		'object_types'  => array( 'praticas', ),
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true,
		
	) );

	$cmb->add_field( array(
		'name'           => 'Modalidade de Ensino',
		'id'             => 'modalidade_taxonomy_select',
		'taxonomy'       => 'modalidade',
		'type'           => 'taxonomy_select',
		'default' 		 => 'regular',
		'remove_default' => 'true',
		'before_row'     => '<p>Primeiro, identifique a modalidade e o nível do ensino em que esta prática educacional inclusiva ocorreu:</p>',
	) );
	

	$cmb->add_field( array(
		'name'           => 'Nível de Ensino',
		'desc'           => '',
		'id'             => 'nivel_taxonomy_select',
		'taxonomy'       => 'nivel',
		'type'           => 'taxonomy_radio_hierarchical',
		'remove_default' => 'true',
	) );	
	

	// Nome do Curso 	
	$cmb->add_field( array(
		'name'    => 'Nome do curso ',
		'desc'    => 'Especifique o nome do curso técnico ou do curso superior, caso você tenha selecionado esta opção acima',
		'id'      => 'curso_superior',
		'type'    => 'text',
	) );
}

/**
 **  BOX TAG Deficiências
 **/
add_action( 'cmb2_admin_init', 'box_deficiencias' );

function box_deficiencias() {

	$prefix = '_deficiencias_';

	$cmb = new_cmb2_box( array(
		'id'            => 'box_deficiencias',
		'title'         => __( 'Deficiências atendidas:', 'cmb2' ),
		'object_types'  => array( 'praticas', ),
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true,		
	) );
	
	$cmb->add_field( array(
		'name'           => 'Deficiências atendidas ',
		'desc'           => '',
		'id'             => 'deficiencia',
		'taxonomy'       => 'deficiencia',
		'type'           => 'taxonomy_multicheck',
		'select_all_button' => false,
		'remove_default' => 'true',
		'before_row'     => '<p>Agora, gostaríamos que você indicasse as deficiências atendidas nesta prática inclusiva (Você pode selecionar mais de uma):</p>',
	) );	
	
	$cmb->add_field( array(
		'name'    => 'Especifique outras deficiências',
		'desc'    => 'Se por acaso a deficiência atendida nesta prática não estiver listado acima, marque o item "Outras deficiências" e descreva neste campo',
		'id'      => 'outras_deficiencias',
		'type'    => 'text',
	) );

}


// BOX Escrita da prática
add_action( 'cmb2_admin_init', 'cmb2_sample_metaboxes' );

function cmb2_sample_metaboxes() {

	$prefix = '_escrita_';
	
	$cmb = new_cmb2_box( array(
		'id'            => 'escrita',
		'title'         => __( 'Descreva sua prática neste espaço', 'cmb2' ),
		'object_types'  => array( 'praticas', ),
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true,
	) );

	$cmb->add_field( array(
		'name' => 'Quantos alunos participaram desta prática inclusiva?',
		'desc' => '',
		'default' => '',
		'id' => 'curso_alunos',
		'type' => 'text'
	) );

	$cmb->add_field( array(
		'name' => 'Quantos alunos deficientes envolvidos?',
		'desc' => 'Se sua prática não aborda alunos com deficência, este campo não é obrigatório.',
		'default' => '',
		'id' => 'quantos',
		'type' => 'text'
	) );
	
	$cmb->add_field( array(
		'name' => 'Qual a série/ano/fase em que a prática inclusiva ocorreu?',
		'desc' => 'Exemplo:<br>1º ao 9º ao do Ensino Fundamental.<br>1º fase do ensino técnico.',
		'default' => '',
		'id' => 'ano',
		'type' => 'text'
	) );	
	
	$cmb->add_field( array(
		'name' => 'Qual foi o conteúdo abordado?',
		'desc' => '',
		'default' => '',
		'id' => 'conteudo_abordado',
		'type' => 'textarea'
	) );
	
	$cmb->add_field( array(
		'name'    => 'Descreva os procedimentos metodológicos.',
		'desc'    => 'Como ocorreu a prática inclusiva?',
		'id'      => 'metodologia_pratica',
		'type'    => 'textarea',
		'options' => array(),
	) );
	
	$cmb->add_field( array(
		'name' => 'Quais recursos educacionais foram utilizados?',
		'desc' => 'Conte-nos quais os recursos educacionais foram utilizados',
		'default' => '',
		'id' => 'quais_recursos',
		'type' => 'textarea'
	) );
	
	$cmb->add_field( array(
		'name' => 'Quais os resultados alcançados?',
		'desc' => 'Procure descrever com base nas seguintes perguntas norteadoras:<br>• Quais os benefícios percebidos aos alunos deficientes atendidos?<br>• O que você percebeu na turma após realizar esta prática?<br>• Quais aprendizados você teve como professor/a?',
		'default' => '',
		'id' => 'realizar_pratica',
		'type' => 'textarea'
	) );

	$cmb->add_field( array(
		'name'    => 'Se desejar nos informar mais algum detalhe sobre a sua prática inclusiva',
		'desc'    => 'Fique a vontade, este espaço é seu!',
		'id'      => 'detalhe_pratica',
		'type'    => 'textarea',
		'options' => array(),
	) );
	/*
	$cmb->add_field( array(
		'name'    => 'Detalhe a sua prática',
		'desc'    => 'Se você desejar acresentar mais alguma informação sobre sua pratica, fique a vontade. Este espaço é seu!',
		'id'      => 'detalhes',
		'type'    => 'wysiwyg',
		'options' => array(
			'wpautop' => true,				//usar o wpautop?
			'media_buttons' => false,		// mostrar botão (s) de inserção / upload
			'textarea_name' => $editor_id,	// defina o nome da área de texto para algo diferente, colchetes [] podem ser usados aqui
			'textarea_rows' => get_option('default_post_edit_rows', 10), // linhas="..."
			'tabindex' => '',
			'editor_css' => '', 			//destinado a estilos extras para botões de editores visuais e HTML, precisa incluir as tags `<style>`, pode usar "scoped".
			'editor_class' => '', 			// adicionar classe (s) extra ao editor textarea
			'teeny' => false, 				// gera a configuração mínima do editor usada em Press This
			'dfw' => false,					// substituir a tela inteira padrão por DFW (precisa de css específico)
			'tinymce' => true,				// carregar o TinyMCE, pode ser usado para passar as configurações diretamente para o TinyMCE usando um array ()
			'quicktags' => true				// carregue Quicktags, pode ser usado para passar configurações diretamente para Quicktags usando um array ()
		),
	) );
	*/
}

	
/**
 **  Enviar Imagens
 **/
add_action( 'cmb2_admin_init', 'box_imagens' );

function box_imagens() {

	$prefix = '_imagens_';
	
	$cmb = new_cmb2_box( array(
		'id'            => '_box_imagens',
		'title'         => __( 'Envie imagens da prática:', 'cmb2' ),
		'object_types'  => array( 'praticas', ),
		'context'       => 'normal',
		'priority'      => 'default',
		'show_names'    => true,
	) );
	/*
	$cmb->add_field( array(
		'name' => 'oEmbed',
		'desc' => 'Enter a youtube, twitter, or instagram URL. Supports services listed at <a href="http://codex.wordpress.org/Embeds">http://codex.wordpress.org/Embeds</a>.',
		'id'   => 'wiki_test_embed',
		'type' => 'oembed',
	) );
	*/
	$cmb->add_field( array(
		'name' => 'Enviar imagens',
		'desc' => '',
		'id'   => 'imagens',
		'type' => 'file_list',
		'preview_size' => array( 50, 50 ), // Default: array( 50, 50 )
		'query_args' => array( 'type' => 'image' ), // Only images attachment
		'text' => array(
			'add_upload_files_text' => 'Enviar imagens', // default: "Add or Upload Files"
			'remove_image_text' => 'Remover', // default: "Remove Image"
			'file_text' => 'Arquivo', // default: "File:"
			'file_download_text' => 'Download', // default: "Download"
			'remove_text' => 'Substituir', // default: "Remove"
		),
	) );
	
}

/**
 **  BOX Aceitar Condições / Regras do site
 **/
add_action( 'cmb2_admin_init', 'box_condicoes' );

function box_condicoes() {

	$prefix = '_condicoes_';
	
	$cmb = new_cmb2_box( array(
		'id'            => 'box_condicoes',
		'title'         => __( 'Antes de enviar sua prática confira se ela está aderente a nossa pesquisa conforme a definição a seguir:', 'cmb2' ),
		'object_types'  => array( 'praticas', ),
		'priority'      => 'normal',
		'show_names'    => true,
	) );
	
	$cmb->add_field( array(
		'name' => 'Regras do site:',
		'desc' => 'Eu aceito as regras do site e declaro que li os documentos.',
		'id'   => 'wiki_test_checkbox',
		'type' => 'checkbox',
		'before_row'     => '<p>Esta pesquisa considera uma prática educacional inclusiva aquela que permite o acesso ao processo de ensino/aprendizagem, bem como, aquisição de conhecimento a todos os/as estudantes que dela participam, ou seja, não deixa ninguém de fora. Para que uma prática seja inclusiva o professor precisa planejá-la e executá-la “entendendo que as diferenças estão sendo constantemente feitas e refeitas e estão em todos e em cada um”. Assim sendo, a deficiência é mais uma diferença entre tantas outras que compões as individualidades dos seres humanos, conforme destaca a convenção das pessoas com deficiência incorporada à legislação brasileira em 2008, “[...] a deficiência é apenas mais uma característica da condição humana” (BRASIL, 2011, p. 13). A prática educacional inclusiva “contribui para transformar a realidade histórica de segregação escolar das pessoas com deficiência, tornando efetivo o direito de todos à educação” (ALVES; BARBOSA, 2006, p. 15). Uma prática educacional inclusiva também ocorre quando promove entre todos os que dela participam: colaboração, participação democrática, empatia, ética nas relações, solidariedade, proatividade, respeito à diversidade, cuidado com as pessoas e com o ambiente, sustentabilidade, confiança e cidadania.</p><a href="http://educacaoinclusiva.org/wp-content/uploads/2018/10/termos-de-consentimento.pdf" target="_blank">Leia o Termo de consentimento livre e esclarecido</a>',
		'attributes'  => array(
			'required'    => 'required',
		),
	) );
}