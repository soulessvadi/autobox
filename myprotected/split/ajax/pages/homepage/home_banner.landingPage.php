<?php 	// Start header content	$headParams = array( 'parent'=>$parent, 'alias'=>$alias, 'id'=>$id, 'appTable'=>$appTable );		$data['headContent'] = $zh->getLandingHeader($headParams);		// GET PAGE DATA	$cardData = $zh->getHomeSectionItem($pageTable);		$cardItem = $cardData['cardItem'];	$menuInfo = $cardData['menuInfo'];		// Join Content		$data['bodyContent'] = ""; // $filterFormStr;		// new block		$data['bodyContent'] .= "		<div id='landCluster' class='animatedX'>			<h3 class='new-line'>Редактирование секции <b>".$menuInfo['name']."</b></h3>	";			$rootPath = ROOT_PATH;				$cardTmp = array(			 			 // 'Основная информация'	=>	array( 'type'=>'header' ),			 			 'Title'			=>	array( 'type'=>'input', 	'field'=>'title', 	'params'=>array( 'size'=>100, 'hold'=>'Banner title' ) ),			 			 'Clear-1'			=>	array( 'type'=>'clear' ),			 			 'Caption'			=>	array( 'type'=>'input', 	'field'=>'caption', 'params'=>array( 'size'=>100, 'hold'=>'Banner Caption' ) ),			 			 			 'Файлы'			=>	array( 'type'=>'header'),			 'Изображение'		=>	array( 'type'=>'image_mono', 'field'=>'filename', 		'params'=>array( 'path'=>RSF."/split/files/content/", 'appTable'=>$pageTable, 'id'=>1 ) ),			 			 'Имя изображения'	=>	array( 'type'=>'hidden',	'field'=>'curr_filename', 	'params'=>array( 'field'=>"filename" ) )																										 			 //'Публикация'		=>	array( 'type'=>'block', 	'field'=>'block', 		'params'=>array( 'reverse'=>true ) )			 );			$cardEditFormParams = array( 'cardItem'=>$cardItem, 'cardTmp'=>$cardTmp, 'rootPath'=>$rootPath, 'actionName'=>"editHomeBanner", 'ajaxFolder'=>'edit', 'appTable'=>$pageTable );				$cardEditFormStr = $zh->getCardEditForm($cardEditFormParams, true);				$data['bodyContent'] .= $cardEditFormStr;		$data['bodyContent'] .= "</div><!-- landCluster --><div class='divider'></div>";		// end new block	?>