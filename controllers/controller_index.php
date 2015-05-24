<?php

Webmodel::load_model('pages');

class indexSwitchController extends ControllerSwitchClass {

	public function index($id=0)
	{
		
		if($id===0)
		{
		
			$arr_config=Webmodel::$model['config_page']->select_a_row_where('', array(), 1);
			
			settype($arr_config['idpage'], 'integer');
			
			if($arr_config['idpage']>0)
			{
				
				$id=$arr_config['idpage'];
			
			}
			else
			{
			
				die;
			
			}
		
		}
	
		$arr_page=Webmodel::$model['page']->select_a_row($id);
		
		settype($arr_page['IdPage'], 'integer');
		
		if($arr_page['IdPage'])
		{
		
			$title=I18nField::show_formatted($arr_page['name']);
			
			$content=I18nField::show_formatted($arr_page['text']);
			
			$cont_index=View::loadView(array($title, $content), 'content');
			
			echo View::loadView(array(PhangoVar::$portal_name.' - '.$title, $cont_index), 'home');
		
		}
		else
		{
		
			$this->route->response404();
		
		}
	
	}

	
}