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
		'name'    => 'Nome do curso',
		'desc'    => 'Especifique o nome do curso técnico ou do curso superior, caso você tenha selecionado esta opção acima',
		'id'      => 'curso_superior',
		'type'    => 'text',
	) );

	// Responsáveis pela prática
	$cmb->add_field( array(
		'name'    => 'Responsável(eis) pela prática',
		'desc'    => 'Informe o(s) responsável(eis) pela prática (separados por vírgula)',
		'id'      => 'responsaveis_pratica',
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
		'title'         => __( 'Público da educação especial desta prática: (Opcional)', 'cmb2' ),
		'object_types'  => array( 'praticas', ),
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true,		
	) );
	
	$cmb->add_field( array(
		'name'           => 'Públicos da educação especial ',
		'desc'           => '',
		'id'             => 'deficiencia',
		'taxonomy'       => 'deficiencia',
		'type'           => 'taxonomy_multicheck',
		'select_all_button' => false,
		'remove_default' => 'true',
		'before_row'     => '<p>Agora, gostaríamos que você indicasse os públicos da educação especial atendidas nesta prática inclusiva (Você pode selecionar mais de uma ou nenhuma):</p>',
	) );	
	
	$cmb->add_field( array(
		'name'    => 'Especifique outros públicos',
		'desc'    => 'Se por acaso o público não é da educação especial ou o público é diferente das opções acima listadas, marque o item "Outros públicos" e descreva neste campo o público atendido.',
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
		'name'           => 'Estado',
		'desc'           => 'Selecione o estado em que ocorreu esta prática inclusiva.',
		'id'             => 'estado',
		'taxonomy'       => 'estado', //Enter Taxonomy Slug
		'type'           => 'taxonomy_select',
		'remove_default' => 'true' // Removes the default metabox provided by WP core.
		// Optionally override the args sent to the WordPress get_terms function.
		//'query_args' => array(
			// 'orderby' => 'slug',
			// 'hide_empty' => true,
		//),
	) );	
	
	$cmb->add_field( array(
		'name' => 'Cidade em que ocorreu esta prática inclusiva?',
		'desc' => 'Digite o nome da cidade em que esta prática inclusiva ocorreu.',
		'default' => '',
		'id' => 'cidade',
		'type' => 'text'
	) );	

	$cmb->add_field( array(
		'name' => 'Quantos alunos participaram desta prática inclusiva?',
		'desc' => 'Informe neste campo a quantidade de alunos que participou em cada aplicação da prática inclusiva, incluindo o público-alvo atendido, se for o caso.<br />Exemplo: <br />"30 estudantes" ou<br />"Turmas de 35 estudantes" ou<br />"Turmas de 20 a 40 estudantes"<br />etc.',
		'default' => '',
		'id' => 'curso_alunos',
		'type' => 'text'
	) );

	$cmb->add_field( array(
		'name' => 'Quantos alunos da educação especial estão envolvidos?',
		'desc' => 'Se sua prática não possui alunos da educação especial, deixe este campo em branco.',
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
		'name' => 'Materiais e tecnologias utilizadas como por exemplo: papel, caneta, tablet, computadores, bengalas etc.?',
		'desc' => 'Conte-nos quais os recursos educacionais foram utilizados',
		'default' => '',
		'id' => 'quais_recursos',
		'type' => 'textarea'
	) );
	
	$cmb->add_field( array(
		'name' => 'Quais os resultados alcançados?',
		'desc' => 'Procure descrever com base nas seguintes perguntas norteadoras:<br>• Quais os benefícios percebidos aos alunos da educação especial ou ao público alvo da prática atendidos?<br>• O que você percebeu na turma após realizar esta prática?<br>• Quais aprendizados você teve como professor/a?',
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
 **  Enviar Anexos: PDF, Imagens e Links para o Youtube
 **/
add_action( 'cmb2_admin_init', 'box_imagens' );

function box_imagens() {

	$prefix = '_imagens_';
	
	$cmb = new_cmb2_box( array(
		'id'            => '_box_imagens',
		'title'         => __( 'Envie imagens e vídeos da prática:', 'cmb2' ),
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
		'query_args' => array( 'type' => array ('image/gif', 'image/jpg', 'image/png', 'image/jpeg' ) ) , // Only images attachment
		'text' => array(
			'add_upload_files_text' => 'Enviar imagens', // default: "Add or Upload Files"
			'remove_image_text' => 'Remover', // default: "Remove Image"
			'file_text' => 'Arquivo', // default: "File:"
			'file_download_text' => 'Download', // default: "Download"
			'remove_text' => 'Substituir', // default: "Remove"
		),
	) );
	
	$group_field_id = $cmb->add_field( array(
		'id'          => 'videos_group',
		'type'        => 'group',
		'description' => __( 'Caso queira incluir vídeos do Youtube nesta prática, informe os links a seguir', 'cmb2' ),
		// 'repeatable'  => false, // use false if you want non-repeatable group
		'options'     => array(
			'group_title'   => __( 'Vídeo {#}', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
			'add_button'    => __( 'Incluir novo vídeo', 'cmb2' ),
			'remove_button' => __( 'Remover vídeo', 'cmb2' ),
			'sortable'      => true, // beta
			// 'closed'     => true, // true to have the groups closed by default
		),
	) );
	
	// Id's for group's fields only need to be unique for the group. Prefix is not needed.
	$cmb->add_group_field( $group_field_id, array(
		'name' => 'Link do Youtube',
		'desc' => 'Informe o link do Youtube que deseja compartilhar.',
		'id'   => 'link_youtube',
		'type' => 'oembed',
		// 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
	) );
	
	//Adicionar outros arquivos relacionados a esta prática
	$cmb->add_field( array(
		'name'    => 'Enviar arquivos',
		'desc'    => 'Envio de arquivos relacionados a esta prática, somente PDF.',
		'id'      => 'pratica_arquivos',
		'type'    => 'file_list',
		// Optional:
		'options' => array(
			'url' => false, // Hide the text input for the url
		),
		'text'    => array(
			'add_upload_file_text' => 'Adicionar arquivos' // Change upload button text. Default: "Add or Upload File"
		),
		// query_args are passed to wp.media's library query.
		'query_args' => array(
			'type' => 'application/pdf', // Make library only display PDFs.
			// Or only allow gif, jpg, or png images
			// 'type' => array(
			// 	'image/gif',
			// 	'image/jpeg',
			// 	'image/png',
			// ),
		),
		//'preview_size' => 'large', // Image size to use when previewing in the admin.
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