<?php

PhangoVar::$urls['page']['index']=array('pattern' => '/^page\/([0-9]+)$/', 'url' => '/page', 'module' => 'pages', 'controller' => 'index', 'action' => 'index', 'parameters' => array('$1' => 'integer'));

PhangoVar::$urls['page']['home']=array('pattern' => '/^page$/', 'url' => '/page', 'module' => 'pages', 'controller' => 'index', 'action' => 'index', 'parameters' => array());

?>