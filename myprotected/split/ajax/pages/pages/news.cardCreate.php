<?php 	// Start header content	$headParams = array( 'parent'=>$parent, 'alias'=>$alias, 'id'=>$id, 'item_id'=>$item_id, 'appTable'=>$appTable );		$data['headContent'] = $zh->getCardCreateHeader($headParams);		// Start body content		$cardItem = $zh->getPageNewsItem($item_id);	$rootPath = ROOT_PATH;		$cardTmp = array(					 'LPX'		=>	array( 'type'=>'hidden',	'field'=>'lpx', 'value'=>$lpx ), // multilanguage important field					 					 'Название '.$lpx_name		=>	array( 'type'=>'input', 	'field'=>'name', 		'params'=>array( 'size'=>100, 'hold'=>'Title', 'onchange'=>"change_alias();" ) ),					 					 'clear-0'				=>	array( 'type'=>'clear' ),					 					 'Алиас (URL)'			=>	array( 'type'=>'input', 	'field'=>'alias', 			'params'=>array( 'size'=>100, 'hold'=>'Alias' ) ),					 					 'clear-1'				=>	array( 'type'=>'clear' ),					 					 'Содержимое '.$lpx_name	=>	array( 'type'=>'redactor', 		'field'=>'text', 	'params'=>array( 'size'=>100, 'hold'=>'Details' ) ),					 					 'clear-4'				=>	array( 'type'=>'clear' ),					 																							 					 'Публикация'			=>	array( 'type'=>'block', 	'field'=>'block', 			'params'=>array( 'reverse'=>true ) ),					 					 'Порядковый номер'		=>	array( 'type'=>'number', 	'field'=>'order_id' ),					 					 'Файлы'			=>	array( 'type'=>'header'),					 'PDF документ'	=>	array( 'type'=>'image_mono','field'=>'filename', 		'params'=>array( 'path'=>"/public/files/", 'appTable'=>$appTable, 'id'=>$item_id ) ),			 		 'Галлерея'			=>	array( 'type'=>'image_mult', 'field'=>'images', 		'params'=>array( 'path'=>"/public/img/content/posts/", 'appTable'=>$appTable, 'id'=>$item_id, 'field'=>'cover' ) ),			 		 			 		 'META INFO'		=>	array( 'type'=>'header'),					 'Индексация'			=>	array( 'type'=>'block', 	'field'=>'index', 			'params'=>array( 'reverse'=>false ) ),					 'Clear-255'			=>	array( 'type'=>'clear' ),			 					 'Meta Title '.$lpx_name		=>	array( 'type'=>'input', 	'field'=>'meta_title', 'params'=>array( 'size'=>100, 'hold'=>'Meta title' ) ),					 					 'Clear-3'			=>	array( 'type'=>'clear' ),					 					 'Meta Keys '.$lpx_name			=>	array( 'type'=>'input', 	'field'=>'meta_keys', 'params'=>array( 'size'=>100, 'hold'=>'Meta Keywords' ) ),					 					 'Clear-4'			=>	array( 'type'=>'clear' ),					 					 'Meta Description '.$lpx_name	=>	array( 'type'=>'area', 		'field'=>'meta_desc', 'params'=>array( 'size'=>100, 'hold'=>'Meta Description' ) ),					 					 					 );		$cardEditFormParams = array( 'cardItem'=>$cardItem, 'cardTmp'=>$cardTmp, 'rootPath'=>$rootPath, 'actionName'=>"createPageNewsItem", 'ajaxFolder'=>'create', 'appTable'=>$appTable );		$cardEditFormStr = $zh->getCardEditForm($cardEditFormParams);		// Join content		$data['bodyContent'] .= "		<div class='ipad-20' id='order_conteinter'>			<h3 class='new-line'>Форма создания Page News Item</h3>";		$data['bodyContent'] .= $cardEditFormStr;					$data['bodyContent'] .=	"		</div>	";?>