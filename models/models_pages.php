<?php

Utils::load_libraries(array('fields/i18nfield'));

class page extends Webmodel {

	function __construct()
	{

		parent::__construct("page");

	}
	
	public function insert($post)
	{
	
		$post=$this->components['name']->add_slugify_i18n_post('name', $post);
	
		return parent::insert($post);
	
	}
	
	public function update($post, $conditions="")
	{
	
		$post=$this->components['name']->add_slugify_i18n_post('name', $post);
	
		return parent::update($post, $conditions);
	
	}
	
}

Webmodel::$model['page']=new page();

Webmodel::$model['page']->register('name', 'I18nField', array(new CharField(600)), 1);

$html_field=new TextHTMLField();

$html_field->allowedtags=array();

Webmodel::$model['page']->register('text', 'I18nField', array($html_field), 1);

SlugifyField::add_slugify_i18n_fields('page', 'name');

foreach(I18n::$arr_i18n as $lang_i18n)
{

	Webmodel::$model['page']->components['name_'.$lang_i18n]->type='VARCHAR(255)';
	Webmodel::$model['page']->components['name_'.$lang_i18n]->indexed=true;

}

Webmodel::$model['config_page']=new Webmodel('config_page');

Webmodel::$model['config_page']->register('idpage', 'ForeignKeyField', array(Webmodel::$model['page']));

Webmodel::$model['config_page']->components['idpage']->name_field_to_field='name';

?>