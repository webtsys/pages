<?php

load_libraries(array('i18n_fields'));

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

PhangoVar::$model['page']=new page();

PhangoVar::$model['page']->set_component('name', 'I18nField', array(new CharField(600)), 1);

PhangoVar::$model['page']->set_component('text', 'I18nField', array(new TextHTMLField()), 1);

SlugifyField::add_slugify_i18n_fields('page', 'name');

foreach(PhangoVar::$arr_i18n as $lang_i18n)
{

	PhangoVar::$model['page']->components['name_'.$lang_i18n]->type='VARCHAR(255)';
	PhangoVar::$model['page']->components['name_'.$lang_i18n]->indexed=true;

}

?>