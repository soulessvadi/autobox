<?php 	$headParams = [		'parent'=>$parent, 		'alias'=>$alias, 		'id'=>$id, 		'item_id'=>$item_id, 		'appTable'=>$appTable	];	$data['headContent'] = $zh->getCardViewHeader($headParams, $lpx);	$pref = ($lpx ? $lpx.'_' : '');		$cardItem = $zh->getResponse($item_id, $lpx);	$rootPath = ROOT_PATH;		$cardTmp = [		'ID'						=>	['type'=>'text', 		'field'=>'id', 				'params'=>[]],		'Организация '.$lpx			=>	['type'=>'text', 		'field'=>'organization',	'params'=>[]],		'Проект'					=>	['type'=>'text', 		'field'=>'project', 		'params'=>[]],		'Проект'					=>	['type'=>'text', 		'field'=>'text', 			'params'=>[]],		'Модерация'					=>	['type'=>'text', 		'field'=>'moderation', 		'params'=>['replace'=>['0'=>'Нет', '1'=>'Да'] ] ],		'Дата создания'				=>	['type'=>'date', 		'field'=>'created', 		'params'=>[]],		'Дата редактирования'		=>	['type'=>'date', 		'field'=>'modified', 		'params'=>[]],	];	$cardViewTableParams = [		'cardItem'=>$cardItem, 		'cardTmp'=>$cardTmp, 		'rootPath'=>$rootPath, 		// 'lpx'=>$lpx, 		'headParams'=>$headParams, 		'langs'=>$zh->getAvailableLangs()	];		$cardViewTableStr = $zh->getCardViewTable($cardViewTableParams);			$data['bodyContent'] .= "		<div class='ipad-20' id='order_conteinter'>			<h3>Просмотр проекта #$item_id</h3>";		$data['bodyContent'] .= $cardViewTableStr;					$data['bodyContent'] .=	"		</div>	";?>