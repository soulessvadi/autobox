<?php 	// Start header content	$headParams = array( 'parent'=>$parent, 'alias'=>$alias, 'id'=>$id, 'item_id'=>$item_id, 'appTable'=>$appTable, 'type'=>'gall_h' );		$data['headContent'] = $zh->getCardCreateHeader($headParams);		// Start body content		$cardItem = $zh->getTableItem($item_id);		// Get positions List		$sitePositions = $zh->getPositions();		// Get categories List		$catsList = $zh->getCatsList();	$rootPath = ROOT_PATH;		$cardTmp = array(					 'Название в Админпанели'	=>	array( 'type'=>'input', 	'field'=>'name', 		'params'=>array( 'size'=>50, 'hold'=>'Name', 'onchange'=>"" ) ),					 					 'Columns'				=>	array( 'type'=>'input', 	'field'=>'columns', 	'params'=>array( 'size'=>25, 'hold'=>'Table columns', 'onchange'=>"" ) ),					 					 'clear-1'				=>	array( 'type'=>'clear' ),					 					 'Публикация'			=>	array( 'type'=>'block', 	'field'=>'block', 			'params'=>array( 'reverse'=>true ) )					 					 );	$cardEditFormParams = array( 'cardItem'=>$cardItem, 'cardTmp'=>$cardTmp, 'rootPath'=>$rootPath, 'actionName'=>"createTable", 'ajaxFolder'=>'create', 'appTable'=>$appTable );		$cardEditFormStr = $zh->getCardEditForm($cardEditFormParams);		// Join content		$data['bodyContent'] .= "		<div class='ipad-20' id='order_conteinter'>			<h3 class='new-line'>Форма создания Галереи</h3>";		$data['bodyContent'] .= $cardEditFormStr;					$data['bodyContent'] .=	"		</div>	";?>