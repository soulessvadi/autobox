<?php 	// Start header content	$headParams = array( 'parent'=>$parent, 'alias'=>$alias, 'id'=>$id, 'item_id'=>1, 'appTable'=>$appTable );		$data['headContent'] = $zh->getLandingHeader($headParams);		// Set lultilanguage FIELDS (Israel - empty, ru, en, fr)			$lang_fields = array(        'page_text1',        'page_text2',        'page_text3',        'page_text4',        'page_text5',        'page_text6',        'page_text7',        'page_text8',        'page_text9',        'page_text10',        'meta_title',		'meta_keys',		'meta_desc',	);		$sqlLog = "";		ob_start();				// GET PAGE DATA		$cardData = $zh->getPageItem($pageTable, $lpx, $lang_fields);		$sqlLog = ob_get_contents();	ob_get_clean();		$langs = $zh->getAvailableLangs();	$lpx_name = strtoupper($lpx ? $lpx : DEF_LANG);		$cardItem = $cardData['cardItem'];	$menuInfo = $cardData['menuInfo'];		// Join Content		$data['bodyContent'] = ""; // $filterFormStr;		// new block		$data['bodyContent'] .= "		<div id='landCluster' class='animatedX'>			<h3 class='new-line'>Редактирование страницы <b>".$menuInfo['name']."</b></h3>	";			$rootPath = ROOT_PATH;				$cardTmp = array(						 'LPX'		=>	array( 'type'=>'hidden',	'field'=>'lpx', 'value'=>$lpx ), // multilanguage important field            'Текст 1 '.$lpx_name	=>	array( 'type'=>'input', 'field'=>'page_text1', 'params'=>array('size'=>100, 'hold'=>'Header text' ) ),            'Текст 2 '.$lpx_name	=>	array( 'type'=>'input', 'field'=>'page_text2', 'params'=>array('size'=>100, 'hold'=>'Header text' ) ),            'Текст 3 '.$lpx_name	=>	array( 'type'=>'redactor', 'field'=>'page_text3', 'params'=>array('size'=>100, 'hold'=>'Header text' ) ),            'Текст 4 '.$lpx_name	=>	array( 'type'=>'input', 'field'=>'page_text4', 'params'=>array('size'=>100, 'hold'=>'Header text' ) ),            'Текст 5 '.$lpx_name	=>	array( 'type'=>'input', 'field'=>'page_text5', 'params'=>array('size'=>100, 'hold'=>'Header text' ) ),            'Карта' => ['type'=>'header'],            'Текст 6 '.$lpx_name	=>	array( 'type'=>'input', 'field'=>'page_text6', 'params'=>array('size'=>65, 'hold'=>'Header text' ) ),            'Текст 7 '.$lpx_name	=>	array( 'type'=>'input', 'field'=>'page_text7', 'params'=>array('size'=>65, 'hold'=>'Header text' ) ),            'Текст 8 '.$lpx_name	=>	array( 'type'=>'input', 'field'=>'page_text8', 'params'=>array('size'=>65, 'hold'=>'Header text' ) ),            'Latitude'	=>	array( 'type'=>'input', 'field'=>'lat', 'params'=>array('size'=>50, 'hold'=>'Header text' ) ),            'Longtitude'	=>	array( 'type'=>'input', 'field'=>'lng', 'params'=>array('size'=>50, 'hold'=>'Header text' ) ),			 'META INFO'		=>	array( 'type'=>'header'),			'Индексация'			=>	array( 'type'=>'block', 	'field'=>'index', 			'params'=>array( 'reverse'=>false ) ),			 'Clear-255'			=>	array( 'type'=>'clear' ),			 'Meta Title '.$lpx_name		=>	array( 'type'=>'input', 	'field'=>'meta_title', 'params'=>array( 'size'=>100, 'hold'=>'Meta title' ) ),			 'Clear-3'			=>	array( 'type'=>'clear' ),			 'Meta Keys '.$lpx_name			=>	array( 'type'=>'input', 	'field'=>'meta_keys', 'params'=>array( 'size'=>100, 'hold'=>'Meta Keywords' ) ),			 'Clear-4'			=>	array( 'type'=>'clear' ),			 'Meta Description '.$lpx_name	=>	array( 'type'=>'area', 		'field'=>'meta_desc', 'params'=>array( 'size'=>100, 'hold'=>'Meta Description' ) ),			 );			$cardEditFormParams = array( 'cardItem'=>$cardItem, 'cardTmp'=>$cardTmp, 'rootPath'=>$rootPath, 'actionName'=>"editPageHome", 'ajaxFolder'=>'edit', 'appTable'=>$pageTable, 'lpx'=>$lpx, 'headParams'=>$headParams, 'langs'=>$langs, 'clickUpdate'=>'landingPage' );				$cardEditFormStr = $zh->getCardEditForm($cardEditFormParams, true);				$data['bodyContent'] .= $cardEditFormStr;				ob_start();				if($sqlLog) echo "<pre>"; print_r($sqlLog); echo "</pre>";				$data['bodyContent'] .= ob_get_contents();		ob_get_clean();		// end new block	// Mews prepare start	// $params['nolimit'] = true;	// $itemsList = $zh->getReviews($params);		// $tableColumns = [	// 	' '						=>	['type'=>'text',		'field'=>'&nbsp'],	// 	'Изображение'			=>	['type'=>'image',		'field'=>'company_logo','params'=>['path'=>'/delice.cake/img/content/']],	// 	'Автор'					=>	['type'=>'text',		'field'=>'company_name'],	// 	'Отзыв'					=>	['type'=>'text',		'field'=>'text'],	// 	'Отображать на главной'	=>	['type'=>'text',		'field'=>'show_home',                           										// 														'params'=>[ //              													'type'=>'ajaxColumn', //              													'alias'=>'Ostatus', //              													'form'=>'trigger', //              													'data'=>['0'=>'Нет','1'=>'Да'], //              													'active'=>'show_home', //              													'clickFunction'=>'NewsShowHomeUpdate' //          													]],	// 	'ID'					=>	['type'=>'text',		'field'=>'id'],	// ];		// $headParams = [	// 	'parent'	=>	$parent, 	// 	'alias'		=>	'news',	// 	'id'		=>	55, 	// 	'item_id'	=>	1, 	// 	'appTable'	=>	'osc_reviews'	// ];	// $tableParams = [	// 	'itemsList'		=>	$itemsList, 	// 	'tableColumns'	=>	$tableColumns, 	// 	'headParams'	=>	$headParams	// ];		// $tableStr = $zh->getItemsTable($tableParams);	// $data['bodyContent'] .= "</div><!-- landCluster --><div class='divider'></div>";	// $data['bodyContent'] .= "<h2 class='tableCaption'>Отзывы на главной:</h2>";	// $data['bodyContent'] .= $tableStr;	?>