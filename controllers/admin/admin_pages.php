<?php

function PagesAdmin()
{

	settype($_GET['op'], 'integer');
	settype($_GET['IdPage'], 'integer');

	load_libraries(array('generate_admin_ng', 'forms/textareabb', 'admin/generate_admin_class'));
	load_model('pages');
	load_lang('pages');

	switch($_GET['op'])
	{

		default:

			PhangoVar::$model['page']->create_form();

			PhangoVar::$model['page']->label=PhangoVar::$lang['pages']['pages'];
			
			PhangoVar::$model['page']->forms['name']->label=PhangoVar::$lang['common']['title'];
			PhangoVar::$model['page']->forms['text']->label=PhangoVar::$lang['common']['text'];
		
			
			//PhangoVar::$model['page']->forms['text']->parameters=array('text', $class='', '');
			//PhangoVar::$model['page']->forms['text']->form='TextAreaBBForm';
			
			PhangoVar::$model['page']->forms['text']->set_parameter(3, 'TextAreaBBForm');
			
			$arr_fields=array('name');
			$arr_fields_edit=array('name', 'text');
			$url_options=set_admin_link( 'pages', array());

			//generate_admin_model_ng('page', $arr_fields, $arr_fields_edit, $url_options, $options_func='PagesOptions', $where_sql='', $arr_fields_form=array(), $type_list='Basic');

			$admin=new GenerateAdminClass('page');
			
			$admin->url_options=$url_options;
			$admin->arr_fields=$arr_fields;
			$admin->arr_fields_edit=$arr_fields_edit;
			
			$admin->show();
			
		break;
	}

}

?>