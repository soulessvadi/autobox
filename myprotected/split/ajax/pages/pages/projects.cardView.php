<?php 	// Start header content	$headParams = array( 'parent'=>$parent, 'alias'=>$alias, 'id'=>$id, 'item_id'=>$item_id, 'appTable'=>$appTable );		$data['headContent'] = $zh->getCardViewHeader($headParams);		// Start body content		$lang_fields = array(		'name',		'text',		'location',		'theme',	);		$cardItem = $zh->getPagePostItem($item_id, $lpx, $lang_fields);	$rootPath = ROOT_PATH;		$langs = $zh->getAvailableLangs();	$lpx_name = strtoupper($lpx ? $lpx."_" : DEF_LANG);		$cardTmp = array(					 'ID'						=>	array( 'type'=>'text', 		'field'=>'id', 				'params'=>array() ),					 'Alias'					=>	array( 'type'=>'text', 		'field'=>'alias', 			'params'=>array() ),					 'Название '.$lpx_name			=>	array( 'type'=>'text', 		'field'=>'name', 			'params'=>array() ),					 'Тема '.$lpx_name			=>	array( 'type'=>'text', 		'field'=>'theme', 			'params'=>array() ),					 'Текст '.$lpx_name		=>	array( 'type'=>'text', 		'field'=>'details', 		'params'=>array() ),					 'Изображение'				=>	array( 'type'=>'image',		'field'=>'cover',			'params'=>array( 'path'=>'/delice.cake/img/posts/' ) ),					 'Порядковый номер'			=>	array( 'type'=>'text', 		'field'=>'order_id', 		'params'=>array() ),					 'Публикация'				=>	array( 'type'=>'text', 		'field'=>'block', 			'params'=>array( 'replace'=>array('0'=>'Да', '1'=>'Нет') ) ),					 'Дата создания'			=>	array( 'type'=>'date', 		'field'=>'created', 		'params'=>array() ),					 'Дата редактирования'		=>	array( 'type'=>'date', 		'field'=>'modified', 		'params'=>array() )					 );	$cardViewTableParams = array( 'cardItem'=>$cardItem, 'cardTmp'=>$cardTmp, 'rootPath'=>$rootPath, 'lpx'=>$lpx, 'headParams'=>$headParams, 'langs'=>$langs );		$cardViewTableStr = $zh->getCardViewTable($cardViewTableParams);		// Join content		$data['bodyContent'] .= "		<div class='ipad-20' id='order_conteinter'>			<h3>Детальный просмотр Page News Item #$item_id</h3>";		$data['bodyContent'] .= $cardViewTableStr;					$data['bodyContent'] .=	"		</div>	";?>