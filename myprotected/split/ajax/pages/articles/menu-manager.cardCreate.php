<?php 	// Start header content	$headParams = array( 'parent'=>$parent, 'alias'=>$alias, 'id'=>$id, 'item_id'=>$item_id, 'appTable'=>$appTable );		$data['headContent'] = $zh->getCardCreateHeader($headParams);		// Start body content		$cardItem = $zh->getMenuItem($item_id);		// Get formats List		$parents = $zh->getMenuParents();		// Get Galleries List		$galleriesList = $zh->getGalleriesList();		$rootPath = ROOT_PATH;		$cardTmp = array(		'LPX'				=>	array( 'type'=>'hidden',	'field'=>'lpx', 'value'=>$lpx ),		'Publication'		=>	array( 'type'=>'block', 	'field'=>'block', 			'params'=>array( 'reverse'=>true ) ),		'clear-4'			=>	array( 'type'=>'clear' ),		'Menu name'	=>	array( 'type'=>'input', 	'field'=>'name', 	'params'=>array( 'size'=>50, 'hold'=>'Display name', 'onchange' => 'change_alias();') ),		'Alias'				=>	array( 'type'=>'input', 	'field'=>'alias', 			'params'=>array( 'size'=>50, 'hold'=>'Alias for url', 'disabled' => false ) ),		'clear-2'			=>	array( 'type'=>'clear' ),		'Nested in'			=>	array( 'type'=>'select', 	'field'=>'parent_id', 			'params'=>array( 		 																									'list'=>$parents,		 																									'first'=>array( 'name'=>'Not nested', 'id'=>0 ), 		 																									'fieldValue'=>'id', 																											'fieldTitle'=>'name',																											'currValue'=>$cardItem['parent_id'],																										) ),		'Display number'					=>	array( 'type'=>'number', 	'field'=>'order_id', 		'params'=>array( 'size'=>25, 'hold'=>'' ) ),		'clear-3'							=>	array( 'type'=>'clear' ),		'Display in header'					=>	array( 'type'=>'block', 	'field'=>'show_header', 	'params'=>array( 'reverse'=>false ) ),		'Display in footer'					=>	array( 'type'=>'block', 	'field'=>'show_footer', 	'params'=>array( 'reverse'=>false ) ),		'Display in footer submenu'			=>	array( 'type'=>'block', 	'field'=>'show_footer_2', 	'params'=>array( 'reverse'=>false ) ),		'Display only for signed in users'	=>	array( 'type'=>'block', 	'field'=>'signedin_only', 	'params'=>array( 'reverse'=>false ) ),	);	$cardEditFormParams = array( 'cardItem'=>$cardItem, 'cardTmp'=>$cardTmp, 'rootPath'=>$rootPath, 'actionName'=>"createMenuItem", 'ajaxFolder'=>'create', 'appTable'=>$appTable );		$cardEditFormStr = $zh->getCardEditForm($cardEditFormParams);		// Join content		$data['bodyContent'] .= "		<div class='ipad-20' id='order_conteinter'>			<h3 class='new-line'>Форма создания пункта меню</h3>";		$data['bodyContent'] .= $cardEditFormStr;					$data['bodyContent'] .=	"		</div>	";?>