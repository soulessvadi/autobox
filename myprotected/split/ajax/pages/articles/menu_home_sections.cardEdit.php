<?php 	// Start header content	$headParams = array( 'parent'=>$parent, 'alias'=>$alias, 'id'=>$id, 'item_id'=>$item_id, 'appTable'=>$appTable );		$data['headContent'] = $zh->getCardEditHeader($headParams);		// Start body content		$cardItem = $zh->getMenuHomeSectionsItem($item_id);	$rootPath = ROOT_PATH;		$cardTmp = array(					 'Название секции'		=>	array( 'type'=>'area', 		'field'=>'name', 		'params'=>array( 'size'=>100, 'hold'=>'Name' ) ),					  					 'clear-2'				=>	array( 'type'=>'clear' ),					 																							 					 'Публикация'			=>	array( 'type'=>'block', 	'field'=>'block', 		'params'=>array( 'reverse'=>true ) ),					 					 'Порядковый номер'		=>	array( 'type'=>'number', 	'field'=>'order_id' )					 					 );	$cardEditFormParams = array( 'cardItem'=>$cardItem, 'cardTmp'=>$cardTmp, 'rootPath'=>$rootPath, 'actionName'=>"editMenuHomeSection", 'ajaxFolder'=>'edit', 'appTable'=>$appTable );		$cardEditFormStr = $zh->getCardEditForm($cardEditFormParams);		// Join content		$data['bodyContent'] .= "		<div class='ipad-20' id='order_conteinter'>			<h3 class='new-line'>Форма редактирования Секции #$item_id</h3>";		$data['bodyContent'] .= $cardEditFormStr;					$data['bodyContent'] .=	"		</div>	";?>