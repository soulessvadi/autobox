<?php 	$headParams = array( 'parent'=>$parent, 'alias'=>$alias, 'id'=>$id, 'appTable'=>$appTable, 'item_id'=>1 );	$data['headContent'] = $zh->getLandingHeader($headParams);	$lang_fields = array(		'text_1','text_2','text_3','text_4','text_5','text_6','text_7','text_8','text_9',		'text_10','text_11','text_12','text_13','text_14','text_15','text_16','text_17','text_18','text_19','text_20',		'text_21','text_22','text_23','text_24','text_25','text_26','text_27','text_28','text_29','text_30','text_31',	);	$sqlLog = "";	ob_start();	$cardData = $zh->getPageItem($pageTable, $lpx, $lang_fields);	$sqlLog = ob_get_contents();	ob_get_clean();	$langs = $zh->getAvailableLangs();	$lpx_name = strtoupper($lpx ? $lpx : DEF_LANG);	$cardItem = $cardData['cardItem'];	$menuInfo = $cardData['menuInfo'];	/* items list */	if(isset($_COOKIE['filter-1']) && $_COOKIE['filter-1']) $data['filter']['f1'] = 1;	if(isset($_COOKIE['filter-2']) && $_COOKIE['filter-2']) $data['filter']['f2'] = 1;	if(isset($_COOKIE['filter-3']) && $_COOKIE['filter-3']) $data['filter']['f3'] = 1;	$filter1_options = array( 'By ID'=>'M.id', 'By Name'=>'M.name' );	$filter2_options = array( 		'Публикация'	=> array( 'fieldName'=>'M.block', 'params' => array('Yes'=>'0', 'No'=>'1') )	);	$filter3_options = array( 		'sort' => array( 'ID'=>'id', 'Порядковому номеру'=>'order_id' ),		'order' => array( 'По возрастанию'=>'', 'По убыванию'=>' DESC' ) 	);	$filterFormParams = array(			'params'=>$params, 		'headParams'=>$headParams, 		'filter1_options'=>$filter1_options, 		'filter2_options'=>$filter2_options, 		'filter3_options'=>$filter3_options, 		'on_page'=>$on_page 	 );	$filterFormStr = $zh->getLandingFilterForm($filterFormParams);	$data['bodyContent'] = $filterFormStr;	/* items list */	$data['bodyContent'] .= "		<div id='landCluster' class='animatedX'>			<h3 class='new-line'>PAGE SETTINGS <b>".$cardItem['name']."</b></h3>	";	$rootPath = ROOT_PATH;	$cardTmp = array(		 'LPX'		=>	array( 'type'=>'hidden',	'field'=>'lpx', 'value'=>$lpx ), // multilanguage important field	     '['.$lpx_name.'] '.'Text 1'	=>	array( 'type'=>'input', 'field'=>'text_1', 'params'=>array('size'=>100, 'hold'=>'' ) ),	     '['.$lpx_name.'] '.'Text 2'	=>	array( 'type'=>'input', 'field'=>'text_2', 'params'=>array('size'=>100, 'hold'=>'' ) ),	     '['.$lpx_name.'] '.'Text 3'	=>	array( 'type'=>'redactor', 'field'=>'text_3', 'params'=>array('size'=>100, 'hold'=>'' ) ),		'SEO SETTINGS'		=>	array( 'type'=>'header'),		'Page indexing'		=>	array( 'type'=>'block', 	'field'=>'indexing', 			'params'=>array( 'reverse'=>false ) ),		'Clear-1'			=>	array( 'type'=>'clear' ),		'['.$lpx_name.'] '.'Page title'			=>	array( 'type'=>'input', 	'field'=>'meta_title', 'params'=>array( 'size'=>100, 'hold'=>'Meta title' ) ),		'Clear-2'								=>	array( 'type'=>'clear' ),		'['.$lpx_name.'] '.'Page keywords'		=>	array( 'type'=>'area', 	'field'=>'meta_keys', 'params'=>array( 'size'=>100, 'hold'=>'Meta Keywords' ) ),		'Clear-3'								=>	array( 'type'=>'clear' ),		'['.$lpx_name.'] '.'Page description' 	=>	array( 'type'=>'area', 	'field'=>'meta_desc', 'params'=>array( 'size'=>100, 'hold'=>'Meta Description' ) ),	   																										  	);		$cardEditFormParams = array( 'cardItem'=>$cardItem, 'cardTmp'=>$cardTmp, 'rootPath'=>$rootPath, 'actionName'=>"editPageAbout", 'ajaxFolder'=>'edit', 'appTable'=>$pageTable, 'lpx'=>$lpx, 'headParams'=>$headParams, 'langs'=>$langs, 'clickUpdate'=>'landingPage' );	$cardEditFormStr = $zh->getCardEditForm($cardEditFormParams, true);	$data['bodyContent'] .= $cardEditFormStr;	ob_start();	if($sqlLog) echo "<pre>"; print_r($sqlLog); echo "</pre>";	$data['bodyContent'] .= ob_get_contents();	ob_get_clean();		$data['bodyContent'] .= "</div><!-- landCluster --><div class='divider'></div>";	/* items list */	$headParams = array( 'parent'=>$parent, 'alias'=>$alias, 'id'=>$id, 'appTable'=>$appTable );	$itemsList = $zh->getSitemapCategories($params);	$totalItems = $zh->getSitemapCategories($params,true);	$on_page = (isset($_COOKIE['global_on_page']) ? $_COOKIE['global_on_page'] : GLOBAL_ON_PAGE);	$pages = ceil($totalItems/$on_page);	$start_page = (isset($params['start']) ? $params['start'] : 1);		$frst_page = 1;	$prev_page = 1;	$next_page = $pages;	$last_page = $pages;					if($start_page < $pages) $next_page = $start_page+1;	if($start_page > 1) $prev_page = $start_page-1;	$tableColumns = array(		'Checkbox'			=>	array('type'=>'checkbox',		'field'=>''),		'[EN] Name'			=>	array('type'=>'text',			'field'=>'name'),		'[DE] Name'			=>	array('type'=>'text',			'field'=>'de_name'),		'[RU] Name'			=>	array('type'=>'text',			'field'=>'ru_name'),		'[CZ] Name'			=>	array('type'=>'text',			'field'=>'cz_name'),		'[SK] Name'			=>	array('type'=>'text',			'field'=>'sk_name'),		'[TR] Name'			=>	array('type'=>'text',			'field'=>'tr_name'),		'[ES] Name'			=>	array('type'=>'text',			'field'=>'es_name'),		'[AR] Name'			=>	array('type'=>'text',			'field'=>'ar_name'),		'Publish'			=>	array('type'=>'block',			'field'=>'block'),		'Edit'				=>	array('type'=>'cardEdit',		'field'=>'edit'),		'ID'				=>	array('type'=>'text',			'field'=>'id')	);	$tableParams = array( 'itemsList'=>$itemsList, 'tableColumns'=>$tableColumns, 'headParams'=>$headParams );	$tableStr = $zh->getItemsTable($tableParams);	$pagiParams = array( 'headParams'=>$headParams, 'start_page'=>$start_page, 'pages'=>$pages, 'on_page'=>$on_page );	$pagiStr = $zh->getLandingPagination($pagiParams);	$data['bodyContent'] .= "<h2 class='tableCaption'>SITEMAP CATEGORIES:</h2>";	$data['bodyContent'] .= $tableStr;	$data['bodyContent'] .= $pagiStr;	/* items list */ 	?>