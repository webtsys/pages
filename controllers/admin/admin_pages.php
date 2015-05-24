<?php

function PagesAdmin()
{

	settype($_GET['op'], 'integer');
	settype($_GET['IdPage'], 'integer');

	Utils::load_libraries(array('generate_admin_ng', 'forms/textareabb', 'admin/generate_admin_class'));
	Webmodel::load_model('pages');
	I18n::loadLang('pages');

	switch($_GET['op'])
	{

		default:
		
			?>
			<p><a href="<?php echo set_admin_link('pages', array('op' => 1)); ?>"><?php echo I18n::$lang['pages']['config_home_page']; ?></a></p>
			<?php

			Webmodel::$model['page']->create_form();

			Webmodel::$model['page']->label=I18n::$lang['pages']['pages'];
			
			Webmodel::$model['page']->forms['name']->label=I18n::$lang['common']['title'];
			Webmodel::$model['page']->forms['text']->label=I18n::$lang['common']['text'];
			
			Webmodel::$model['page']->forms['text']->set_parameter(3, 'TextAreaBBForm');
			
			$arr_fields=array('name');
			$arr_fields_edit=array('name', 'text');
			$url_options=set_admin_link( 'pages', array());

			$admin=new GenerateAdminClass('page');
			
			$admin->set_url_post($url_options);
			$admin->arr_fields=$arr_fields;
			$admin->arr_fields_edit=$arr_fields_edit;
			
			$admin->show();
			
		break;
		
		case 1:
		
			Webmodel::$model['config_page']->create_form();

			Webmodel::$model['config_page']->forms['idpage']->label=I18n::$lang['pages']['page_index'];
			
			
			?>
			<h3><?php echo I18n::$lang['pages']['config_home_page']; ?></h3>
			<?php
		
			$url_options=set_admin_link( 'pages', array('op' => 1));
			
			$admin=new GenerateAdminClass('config_page');
			
			$admin->set_url_post($url_options);
			
			$admin->set_url_back( set_admin_link( 'pages', array()) );		
			
			$admin->show_config_mode();
		
		break;
	}

}

?>