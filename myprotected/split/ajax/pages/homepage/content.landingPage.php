<?php 	// Start header content	$headParams = array( 'parent'=>$parent, 'alias'=>$alias, 'id'=>$id, 'item_id'=>1, 'appTable'=>$appTable );		$data['headContent'] = $zh->getLandingHeader($headParams);		// Set lultilanguage FIELDS (Israel - empty, ru, en, fr)		$lang_fields = array(		'text_1',		'text_2',		'text_3',		'text_4',		'text_5',		'text_6',		'text_7',		'text_8',		'text_9',		'text_10',		'text_11',		'text_12',		'text_13',		'text_14',		'text_15',		'text_16',		'text_17',		'text_18',		'text_19',		'text_20',		'text_21',		'text_22',		'text_23',		'text_24',		'text_25',		'text_26',		'text_27',		'text_28',		'text_29',		'text_30',		'text_31',	);		ob_start();	$cardData = $zh->getPageItem($pageTable, $lpx, $lang_fields);	$sqlLog = ob_get_contents();	ob_get_clean();		$langs = $zh->getAvailableLangs();	$lpx_name = strtoupper($lpx ? $lpx : DEF_LANG);		$cardItem = $cardData['cardItem'];	$menuInfo = $cardData['menuInfo'];		// Join Content		$data['bodyContent'] = ""; // $filterFormStr;		// new block		$data['bodyContent'] .= "		<div id='landCluster' class='animatedX'>			<h3 class='new-line'>Homepage settings</b></h3>	";		$rootPath = ROOT_PATH;		$cardTmp = array(		'LPX'		=>	array( 'type'=>'hidden',	'field'=>'lpx', 'value'=>$lpx ), // multilanguage important field	    '['.$lpx_name.'] '.'Text 1'	=>	array( 'type'=>'input', 'field'=>'text_1', 'params'=>array('size'=>100, 'hold'=>'' ) ),	    '['.$lpx_name.'] '.'Text 2'	=>	array( 'type'=>'input', 'field'=>'text_2', 'params'=>array('size'=>100, 'hold'=>'' ) ),	    '['.$lpx_name.'] '.'Text 3'	=>	array( 'type'=>'area', 'field'=>'text_4', 'params'=>array('size'=>100, 'hold'=>'' ) ),	    '['.$lpx_name.'] '.'Text 4'	=>	array( 'type'=>'area', 'field'=>'text_3', 'params'=>array('size'=>100, 'hold'=>'' ) ),	    '['.$lpx_name.'] '.'Text 5'	=>	array( 'type'=>'area', 'field'=>'text_5', 'params'=>array('size'=>100, 'hold'=>'' ) ),	    '['.$lpx_name.'] '.'Text 6'	=>	array( 'type'=>'area', 'field'=>'text_6', 'params'=>array('size'=>100, 'hold'=>'' ) ),	    '['.$lpx_name.'] '.'Text 7'	=>	array( 'type'=>'input', 'field'=>'text_7', 'params'=>array('size'=>100, 'hold'=>'' ) ),	    '['.$lpx_name.'] '.'Text 8'	=>	array( 'type'=>'input', 'field'=>'text_8', 'params'=>array('size'=>100, 'hold'=>'' ) ),	    '['.$lpx_name.'] '.'Text 9'	=>	array( 'type'=>'area', 'field'=>'text_9', 'params'=>array('size'=>100, 'hold'=>'' ) ),	    '['.$lpx_name.'] '.'Text 10'	=>	array( 'type'=>'input', 'field'=>'text_10', 'params'=>array('size'=>100, 'hold'=>'' ) ),	    '['.$lpx_name.'] '.'Text 11'	=>	array( 'type'=>'input', 'field'=>'text_11', 'params'=>array('size'=>100, 'hold'=>'' ) ),	    '['.$lpx_name.'] '.'Text 12'	=>	array( 'type'=>'input', 'field'=>'text_12', 'params'=>array('size'=>100, 'hold'=>'' ) ),	    '['.$lpx_name.'] '.'Text 13'	=>	array( 'type'=>'input', 'field'=>'text_13', 'params'=>array('size'=>100, 'hold'=>'' ) ),	    '['.$lpx_name.'] '.'Text 14'	=>	array( 'type'=>'input', 'field'=>'text_14', 'params'=>array('size'=>100, 'hold'=>'' ) ),	    '['.$lpx_name.'] '.'Text 15'	=>	array( 'type'=>'input', 'field'=>'text_15', 'params'=>array('size'=>100, 'hold'=>'' ) ),	    '['.$lpx_name.'] '.'Text 16'	=>	array( 'type'=>'input', 'field'=>'text_16', 'params'=>array('size'=>100, 'hold'=>'' ) ),	    '['.$lpx_name.'] '.'Text 17'	=>	array( 'type'=>'input', 'field'=>'text_17', 'params'=>array('size'=>100, 'hold'=>'' ) ),	    '['.$lpx_name.'] '.'Text 18'	=>	array( 'type'=>'input', 'field'=>'text_18', 'params'=>array('size'=>100, 'hold'=>'' ) ),	    '['.$lpx_name.'] '.'Text 19'	=>	array( 'type'=>'input', 'field'=>'text_19', 'params'=>array('size'=>100, 'hold'=>'' ) ),	    '['.$lpx_name.'] '.'Text 20'	=>	array( 'type'=>'input', 'field'=>'text_20', 'params'=>array('size'=>100, 'hold'=>'' ) ),	    '['.$lpx_name.'] '.'Text 21'	=>	array( 'type'=>'input', 'field'=>'text_21', 'params'=>array('size'=>100, 'hold'=>'' ) ),	    '['.$lpx_name.'] '.'Text 22'	=>	array( 'type'=>'input', 'field'=>'text_22', 'params'=>array('size'=>100, 'hold'=>'' ) ),	    '['.$lpx_name.'] '.'Text 23'	=>	array( 'type'=>'input', 'field'=>'text_23', 'params'=>array('size'=>100, 'hold'=>'' ) ),	    '['.$lpx_name.'] '.'Text 24'	=>	array( 'type'=>'input', 'field'=>'text_24', 'params'=>array('size'=>100, 'hold'=>'' ) ),	    '['.$lpx_name.'] '.'Text 25'	=>	array( 'type'=>'input', 'field'=>'text_26', 'params'=>array('size'=>100, 'hold'=>'' ) ),	    '['.$lpx_name.'] '.'Text 26'	=>	array( 'type'=>'area', 'field'=>'text_27', 'params'=>array('size'=>100, 'hold'=>'' ) ),	    '['.$lpx_name.'] '.'Text 27'	=>	array( 'type'=>'area', 'field'=>'text_25', 'params'=>array('size'=>100, 'hold'=>'' ) ),	    '['.$lpx_name.'] '.'Text 28'	=>	array( 'type'=>'area', 'field'=>'text_28', 'params'=>array('size'=>100, 'hold'=>'' ) ),	    '['.$lpx_name.'] '.'Text 29'	=>	array( 'type'=>'area', 'field'=>'text_29', 'params'=>array('size'=>100, 'hold'=>'' ) ),	    '['.$lpx_name.'] '.'Text 30'	=>	array( 'type'=>'input', 'field'=>'text_30', 'params'=>array('size'=>100, 'hold'=>'' ) ),	    '['.$lpx_name.'] '.'Text 31'	=>	array( 'type'=>'input', 'field'=>'text_31', 'params'=>array('size'=>100, 'hold'=>'' ) ),		'SEO SETTINGS'		=>	array( 'type'=>'header'),		'Page indexing'		=>	array( 'type'=>'block', 	'field'=>'indexing', 			'params'=>array( 'reverse'=>false ) ),		'Clear-1'			=>	array( 'type'=>'clear' ),		'['.$lpx_name.'] '.'Page title'			=>	array( 'type'=>'input', 	'field'=>'meta_title', 'params'=>array( 'size'=>100, 'hold'=>'Meta title' ) ),		'Clear-2'								=>	array( 'type'=>'clear' ),		'['.$lpx_name.'] '.'Page keywords'		=>	array( 'type'=>'input', 	'field'=>'meta_keys', 'params'=>array( 'size'=>100, 'hold'=>'Meta Keywords' ) ),		'Clear-3'								=>	array( 'type'=>'clear' ),		'['.$lpx_name.'] '.'Page description' 	=>	array( 'type'=>'area', 		'field'=>'meta_desc', 'params'=>array( 'size'=>100, 'hold'=>'Meta Description' ) ),	     	);	$cardEditFormParams = array( 'cardItem'=>$cardItem, 'cardTmp'=>$cardTmp, 'rootPath'=>$rootPath, 'actionName'=>"editPageHome", 'ajaxFolder'=>'edit', 'appTable'=>$pageTable, 'lpx'=>$lpx, 'headParams'=>$headParams, 'langs'=>$langs, 'clickUpdate'=>'landingPage' );		$cardEditFormStr = $zh->getCardEditForm($cardEditFormParams, true);		$data['bodyContent'] .= $cardEditFormStr;		ob_start();		if($sqlLog) echo "<pre>"; print_r($sqlLog); echo "</pre>";		$data['bodyContent'] .= ob_get_contents();	ob_get_clean();		$data['bodyContent'] .= "</div><!-- landCluster --><div class='divider'></div>";		// end new block	?>