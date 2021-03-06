<?php 
	// Start header content
	$headParams = array( 'parent'=>$parent, 'alias'=>$alias, 'id'=>$id, 'item_id'=>1, 'appTable'=>$appTable );
	
	$data['headContent'] = $zh->getLandingHeader($headParams);
	
	// Set lultilanguage FIELDS (Israel - empty, ru, en, fr)
	
	$lang_fields = array(
		'text_1',
		'text_2',
		'text_3',
		'text_4',
		'text_5',
		'text_6',
		'text_7',
		'text_8',
		'text_9',
		'text_10',
		'text_11',
		'text_12',
		'text_13',
		'text_14',
		'text_15',
		'text_16',
		'text_17',
		'text_18',
		'text_19',
		'text_20',
		'text_21',
		'text_22',
		'text_23',
		'text_24',
		'text_25',
		'text_26',
		'text_27',
		'text_28',
		'text_29',
		'text_30',
		'text_31',
	);
	
	$sqlLog = "";
	
	ob_start();
		
		// GET PAGE DATA
		$cardData = $zh->getPageItem($pageTable, $lpx, $lang_fields);
	
	$sqlLog = ob_get_contents();
	ob_get_clean();
	
	$langs = $zh->getAvailableLangs();
	$lpx_name = strtoupper($lpx ? $lpx : DEF_LANG);
	
	$cardItem = $cardData['cardItem'];
	$menuInfo = $cardData['menuInfo'];
	
	// Join Content
	
	$data['bodyContent'] = ""; // $filterFormStr;
	
	// new block
	
	$data['bodyContent'] .= "
		<div id='landCluster' class='animatedX'>
			<h3 class='new-line'>PAGE SETTINGS <b>".$menuInfo['name']."</b></h3>
	";
	
	$rootPath = ROOT_PATH;
		
	$cardTmp = array(

		'LPX'		=>	array( 'type'=>'hidden',	'field'=>'lpx', 'value'=>$lpx ), // multilanguage important field
	    '['.$lpx_name.'] '.'Text 1'		=>	array( 'type'=>'input', 'field'=>'text_1', 'params'=>array('size'=>100, 'hold'=>'' ) ),
	    '['.$lpx_name.'] '.'Text 2'		=>	array( 'type'=>'redactor', 'field'=>'text_2', 'params'=>array('size'=>100, 'hold'=>'' ) ),
		
		 'Image'			=>	array( 'type'=>'header'),
		 'Image file'		=>	array( 'type'=>'image_mono','field'=>'file', 			'params'=>array( 'path'=>FILESROOT."/img/content/", 'appTable'=>$appTable, 'id'=>$item_id ) ),
		 'Image name curr'	=>	array( 'type'=>'hidden',	'field'=>'curr_filename', 	'params'=>array( 'field'=>"file" ) ),
		 'Image name'		=>	array( 'type'=>'input', 	'field'=>'file_name', 		'params'=>array( 'size'=>50, 'hold'=>'Image name' ) ),
		 'Title'			=>	array( 'type'=>'input', 	'field'=>'title', 			'params'=>array( 'size'=>50, 'hold'=>'Title' ) ),
		 'Alt'				=>	array( 'type'=>'input', 	'field'=>'alt', 			'params'=>array( 'size'=>50, 'hold'=>'Alt' ) ),
		 
		'SEO SETTINGS'		=>	array( 'type'=>'header'),
		'Page indexing'		=>	array( 'type'=>'block', 	'field'=>'indexing', 			'params'=>array( 'reverse'=>false ) ),
		'Clear-1'			=>	array( 'type'=>'clear' ),
		'['.$lpx_name.'] '.'Page title'			=>	array( 'type'=>'input', 	'field'=>'meta_title', 'params'=>array( 'size'=>100, 'hold'=>'Meta title' ) ),
		'Clear-2'								=>	array( 'type'=>'clear' ),
		'['.$lpx_name.'] '.'Page keywords'		=>	array( 'type'=>'input', 	'field'=>'meta_keys', 'params'=>array( 'size'=>100, 'hold'=>'Meta Keywords' ) ),
		'Clear-3'								=>	array( 'type'=>'clear' ),
		'['.$lpx_name.'] '.'Page description' 	=>	array( 'type'=>'area', 		'field'=>'meta_desc', 'params'=>array( 'size'=>100, 'hold'=>'Meta Description' ) ),	  
																										 
 	);
	
		$cardEditFormParams = array( 'cardItem'=>$cardItem, 'cardTmp'=>$cardTmp, 'rootPath'=>$rootPath, 'actionName'=>"editPageAbout", 'ajaxFolder'=>'edit', 'appTable'=>$pageTable, 'lpx'=>$lpx, 'headParams'=>$headParams, 'langs'=>$langs, 'clickUpdate'=>'landingPage' );
		
		$cardEditFormStr = $zh->getCardEditForm($cardEditFormParams, true);
		
		$data['bodyContent'] .= $cardEditFormStr;
		
		ob_start();
		
		if($sqlLog) echo "<pre>"; print_r($sqlLog); echo "</pre>";
		
		$data['bodyContent'] .= ob_get_contents();
		ob_get_clean();
	
	$data['bodyContent'] .= "</div><!-- landCluster --><div class='divider'></div>";
	
	// end new block
	
?>