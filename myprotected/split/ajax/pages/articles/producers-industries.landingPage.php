<?php 
	// Start header content

	$headParams = array( 'parent'=>$parent, 'alias'=>$alias, 'id'=>$id, 'appTable'=>$appTable );
	
	$data['headContent'] = $zh->getLandingHeader($headParams);
	
	// Get page items
	
	$itemsList = $zh->getProducerIndustriesList($params);

	$totalItems = $zh->getProducerIndustriesList($params,true);
	
	// Pagination operations
	
	$on_page = (isset($_COOKIE['global_on_page']) ? $_COOKIE['global_on_page'] : GLOBAL_ON_PAGE);
	
	$pages = ceil($totalItems/$on_page);
	
	$start_page = (isset($params['start']) ? $params['start'] : 1);
	
	$frst_page = 1;
	$prev_page = 1;
	$next_page = $pages;
	$last_page = $pages;
				
	if($start_page < $pages) $next_page = $start_page+1;
	if($start_page > 1) $prev_page = $start_page-1;
	
	// Filter JS open
	
	if(isset($_COOKIE['filter-1']) && $_COOKIE['filter-1']) $data['filter']['f1'] = 1;
	if(isset($_COOKIE['filter-2']) && $_COOKIE['filter-2']) $data['filter']['f2'] = 1;
	if(isset($_COOKIE['filter-3']) && $_COOKIE['filter-3']) $data['filter']['f3'] = 1;
	
	// Filter arrays

	$filter1_options = array( 'By ID'=>'M.id', 'By Name'=>'M.name' );
	
	$filter2_options = array( 
							'Публикация'	=> array( 'fieldName'=>'M.block', 'params' => array('Yes'=>'0', 'No'=>'1') )
							);
							
	$filter3_options = array( 
							'sort' => array( 'ID'=>'id', 'Вопросу'=>'question', 'Порядковому номеру'=>'order_id' ),
							'order' => array( 'По возрастанию'=>'', 'По убыванию'=>' DESC' ) 
							);
	// Start data content
	
	$filterFormParams = array(	'params'=>$params, 
								'headParams'=>$headParams, 
								'filter1_options'=>$filter1_options, 
								'filter2_options'=>$filter2_options, 
								'filter3_options'=>$filter3_options, 
								'on_page'=>$on_page 
							  );
	
	$filterFormStr = $zh->getLandingFilterForm($filterFormParams);
	
	// Table structure
	
	$tableColumns = array(
		'Checkbox'				=>	array('type'=>'checkbox',		'field'=>''),
		'[EN] Name'				=>	array('type'=>'text',			'field'=>'name'),
		'[DE] Name'				=>	array('type'=>'text',			'field'=>'de_name'),
		'[RU] Name'				=>	array('type'=>'text',			'field'=>'ru_name'),
		'[SK] Name'				=>	array('type'=>'text',			'field'=>'sk_name'),
		'[CZ] Name'				=>	array('type'=>'text',			'field'=>'cz_name'),
		'[TR] Name'				=>	array('type'=>'text',			'field'=>'tr_name'),
		'[ES] Name'				=>	array('type'=>'text',			'field'=>'es_name'),
		'[AR] Name'				=>	array('type'=>'text',			'field'=>'ar_name'),
		'Publication'			=>	array('type'=>'block',			'field'=>'block'),
		'View'					=>	array('type'=>'cardView',		'field'=>'view'),
		'Edit'					=>	array('type'=>'cardEdit',		'field'=>'edit'),
	);
	
	$tableParams = array( 'itemsList'=>$itemsList, 'tableColumns'=>$tableColumns, 'headParams'=>$headParams );
	
	$tableStr = $zh->getItemsTable($tableParams);
	
	// START PAGINATION
	
	$pagiParams = array( 'headParams'=>$headParams, 'start_page'=>$start_page, 'pages'=>$pages, 'on_page'=>$on_page );
	
	$pagiStr = $zh->getLandingPagination($pagiParams);
	
	// Join Content
	
	$data['bodyContent'] = $filterFormStr;
	
	$data['bodyContent'] .= $tableStr;
	
	$data['bodyContent'] .= $pagiStr;

?>