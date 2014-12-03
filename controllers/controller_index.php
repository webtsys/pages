<?php

load_model('pages');

class IndexSwitchClass extends ControllerSwitchClass 
{

	public function index($id=0)
	{
	
		if($id==0)
		{
		
			
		
		}
	
		$arr_page=PhangoVar::$model['page']->select_a_row($id);
		
		$title=I18nField::show_formatted($arr_page['name']);
		
		$content=I18nField::show_formatted($arr_page['text']);
		
		$cont_index=load_view(array($title, $content), 'content');
		
		echo load_view(array(PhangoVar::$portal_name.' - '.$title, $cont_index), 'home');
	
	}

	
}