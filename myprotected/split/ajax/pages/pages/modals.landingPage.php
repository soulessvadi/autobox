<?php 	// Start header content	$headParams = array( 'parent'=>$parent, 'alias'=>$alias, 'id'=>$id, 'item_id'=>1, 'appTable'=>$appTable );		$data['headContent'] = $zh->getLandingHeader($headParams);		// Set lultilanguage FIELDS (Israel - empty, ru, en, fr)		$lang_fields = array(		'auth_text1',		'auth_text2',		'auth_text3',		'auth_text4',		'auth_text5',		'auth_text6',		'auth_text7',		'auth_text8',		'reg_text1',		'reg_text2',		'reg_text3',		'reg_text4',		'reg_text5',		'reg_text6',		'reg_text7',		'reg_text8',		'reg_text9',		'reg_text10',		'reg_text11',		'reg_text12',		'reg_text13',		'reg_text14',		'reg_text15',		'reg_text16',		'reg_text17',		'reg_text18',		'reg_text19',		'reg_text20',		'reg_text21',		'rec_text1',		'rec_text2',		'rec_text3',		'rec_text4',		'rec_text5',	);		$sqlLog = "";		ob_start();				// GET PAGE DATA		$cardData = $zh->getPageItem($pageTable, $lpx, $lang_fields);		$sqlLog = ob_get_contents();	ob_get_clean();		$langs = $zh->getAvailableLangs();	$lpx_name = strtoupper($lpx ? $lpx : DEF_LANG);		$cardItem = $cardData['cardItem'];	$menuInfo = $cardData['menuInfo'];		// Join Content		$data['bodyContent'] = ""; // $filterFormStr;		// new block		$data['bodyContent'] .= "		<div id='landCluster' class='animatedX'>			<h3 class='new-line'>PAGE SETTINGS <b>".$menuInfo['name']."</b></h3>	";			$rootPath = ROOT_PATH;				$cardTmp = array(			 			 'LPX'		=>	array( 'type'=>'hidden',	'field'=>'lpx', 'value'=>$lpx ), // multilanguage important field			 			 'Авторизация'	=>	array( 'type'=>'header' ),			 			 'Вход текст 1 '.$lpx_name	=>	array( 'type'=>'input', 	'field'=>'auth_text1', 	'params'=>array( 'size'=>100, 'hold'=>'Page caption' ) ),			 'Вход текст 2 '.$lpx_name	=>	array( 'type'=>'input', 	'field'=>'auth_text2', 	'params'=>array( 'size'=>100, 'hold'=>'Page caption' ) ),			 'Вход текст 3 '.$lpx_name	=>	array( 'type'=>'input', 	'field'=>'auth_text3', 	'params'=>array( 'size'=>100, 'hold'=>'Page caption' ) ),			 'Вход текст 4 '.$lpx_name	=>	array( 'type'=>'input', 	'field'=>'auth_text4', 	'params'=>array( 'size'=>100, 'hold'=>'Page caption' ) ),			 'Вход текст 5 '.$lpx_name	=>	array( 'type'=>'input', 	'field'=>'auth_text5', 	'params'=>array( 'size'=>100, 'hold'=>'Page caption' ) ),			 'Вход текст 6 '.$lpx_name	=>	array( 'type'=>'input', 	'field'=>'auth_text6', 	'params'=>array( 'size'=>100, 'hold'=>'Page caption' ) ),			 'Вход текст 7 '.$lpx_name	=>	array( 'type'=>'input', 	'field'=>'auth_text7', 	'params'=>array( 'size'=>100, 'hold'=>'Page caption' ) ),			 'Вход текст 8 '.$lpx_name	=>	array( 'type'=>'input', 	'field'=>'auth_text8', 	'params'=>array( 'size'=>100, 'hold'=>'Page caption' ) ),			 			 'Регистрация'	=>	array( 'type'=>'header' ),			 'Регистрация текст 1 '.$lpx_name	=>	array( 'type'=>'input', 	'field'=>'reg_text1', 	'params'=>array( 'size'=>100, 'hold'=>'Page caption' ) ),			 'Регистрация текст 2 '.$lpx_name	=>	array( 'type'=>'input', 	'field'=>'reg_text2', 	'params'=>array( 'size'=>100, 'hold'=>'Page caption' ) ),			 'Регистрация текст 3 '.$lpx_name	=>	array( 'type'=>'input', 	'field'=>'reg_text3', 	'params'=>array( 'size'=>100, 'hold'=>'Page caption' ) ),			 'Регистрация текст 4 '.$lpx_name	=>	array( 'type'=>'input', 	'field'=>'reg_text4', 	'params'=>array( 'size'=>100, 'hold'=>'Page caption' ) ),			 'Регистрация текст 5 '.$lpx_name	=>	array( 'type'=>'input', 	'field'=>'reg_text5', 	'params'=>array( 'size'=>100, 'hold'=>'Page caption' ) ),			 'Регистрация текст 6 '.$lpx_name	=>	array( 'type'=>'input', 	'field'=>'reg_text6', 	'params'=>array( 'size'=>100, 'hold'=>'Page caption' ) ),			 'Регистрация текст 7 '.$lpx_name	=>	array( 'type'=>'input', 	'field'=>'reg_text7', 	'params'=>array( 'size'=>100, 'hold'=>'Page caption' ) ),			 'Регистрация текст 8 '.$lpx_name	=>	array( 'type'=>'input', 	'field'=>'reg_text8', 	'params'=>array( 'size'=>100, 'hold'=>'Page caption' ) ),			 'Регистрация текст 9 '.$lpx_name	=>	array( 'type'=>'input', 	'field'=>'reg_text9', 	'params'=>array( 'size'=>100, 'hold'=>'Page caption' ) ),			 'Регистрация текст 10 '.$lpx_name	=>	array( 'type'=>'input', 	'field'=>'reg_text10', 	'params'=>array( 'size'=>100, 'hold'=>'Page caption' ) ),			 'Регистрация текст 11 '.$lpx_name	=>	array( 'type'=>'input', 	'field'=>'reg_text11', 	'params'=>array( 'size'=>100, 'hold'=>'Page caption' ) ),			 'Регистрация текст 12 '.$lpx_name	=>	array( 'type'=>'input', 	'field'=>'reg_text12', 	'params'=>array( 'size'=>100, 'hold'=>'Page caption' ) ),			 'Регистрация текст 13 '.$lpx_name	=>	array( 'type'=>'input', 	'field'=>'reg_text13', 	'params'=>array( 'size'=>100, 'hold'=>'Page caption' ) ),			 'Регистрация текст 14 '.$lpx_name	=>	array( 'type'=>'input', 	'field'=>'reg_text14', 	'params'=>array( 'size'=>100, 'hold'=>'Page caption' ) ),			 'Регистрация текст 15 '.$lpx_name	=>	array( 'type'=>'input', 	'field'=>'reg_text15', 	'params'=>array( 'size'=>100, 'hold'=>'Page caption' ) ),			 'Регистрация текст 16 '.$lpx_name	=>	array( 'type'=>'input', 	'field'=>'reg_text16', 	'params'=>array( 'size'=>100, 'hold'=>'Page caption' ) ),			 'Регистрация текст 17 '.$lpx_name	=>	array( 'type'=>'input', 	'field'=>'reg_text17', 	'params'=>array( 'size'=>100, 'hold'=>'Page caption' ) ),			 'Регистрация текст 18 '.$lpx_name	=>	array( 'type'=>'input', 	'field'=>'reg_text18', 	'params'=>array( 'size'=>100, 'hold'=>'Page caption' ) ),			 'Регистрация текст 19 '.$lpx_name	=>	array( 'type'=>'input', 	'field'=>'reg_text19', 	'params'=>array( 'size'=>100, 'hold'=>'Page caption' ) ),			 'Регистрация текст 20 '.$lpx_name	=>	array( 'type'=>'input', 	'field'=>'reg_text20', 	'params'=>array( 'size'=>100, 'hold'=>'Page caption' ) ),			 'Регистрация текст 21 '.$lpx_name	=>	array( 'type'=>'input', 	'field'=>'reg_text21', 	'params'=>array( 'size'=>100, 'hold'=>'Page caption' ) ),			 'Восстановление'	=>	array( 'type'=>'header' ),			 'Восстановление текст 1 '.$lpx_name	=>	array( 'type'=>'input', 	'field'=>'rec_text1', 	'params'=>array( 'size'=>100, 'hold'=>'Page caption' ) ),			 'Восстановление текст 2 '.$lpx_name	=>	array( 'type'=>'input', 	'field'=>'rec_text2', 	'params'=>array( 'size'=>100, 'hold'=>'Page caption' ) ),			 'Восстановление текст 3 '.$lpx_name	=>	array( 'type'=>'input', 	'field'=>'rec_text3', 	'params'=>array( 'size'=>100, 'hold'=>'Page caption' ) ),			 'Восстановление текст 4 '.$lpx_name	=>	array( 'type'=>'input', 	'field'=>'rec_text4', 	'params'=>array( 'size'=>100, 'hold'=>'Page caption' ) ),			 'Восстановление текст 5 '.$lpx_name	=>	array( 'type'=>'input', 	'field'=>'rec_text5', 	'params'=>array( 'size'=>100, 'hold'=>'Page caption' ) ),																										 			 );			$cardEditFormParams = array( 'cardItem'=>$cardItem, 'cardTmp'=>$cardTmp, 'rootPath'=>$rootPath, 'actionName'=>"editPageModals", 'ajaxFolder'=>'edit', 'appTable'=>$pageTable, 'lpx'=>$lpx, 'headParams'=>$headParams, 'langs'=>$langs, 'clickUpdate'=>'landingPage' );				$cardEditFormStr = $zh->getCardEditForm($cardEditFormParams, true);				$data['bodyContent'] .= $cardEditFormStr;				ob_start();				if($sqlLog) echo "<pre>"; print_r($sqlLog); echo "</pre>";				$data['bodyContent'] .= ob_get_contents();		ob_get_clean();		$data['bodyContent'] .= "</div><!-- landCluster --><div class='divider'></div>";		// end new block	?>