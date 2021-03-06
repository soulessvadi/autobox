<?php 
	// Start header content
	$headParams = array( 'parent'=>$parent, 'alias'=>$alias, 'id'=>$id, 'item_id'=>$item_id, 'appTable'=>$appTable ,'type'=>'art_land' );
	$data['headContent'] = $zh->getCardEditHeader($headParams);
	
	// Start body content
	$cardItem = $zh->getArticleItem($item_id, $lpx);
	$tags = $zh->getArticleItemTags($lpx);

	$langs = $zh->getAvailableLangs();
	$lpx_name = strtoupper($lpx ? $lpx : 'en');
	
	// Get positions List
	$imageAlts = $zh->getImageAlts($item_id, $lpx);
	$imageAlts = json_decode($imageAlts[0]['data']);
	
	$sitePositions = $zh->getPositions();
	// Get formats List
	$menuFormats = $zh->getMenuFormats();
	// Get Menu Categories
	$catsList = $zh->getCatsList();
	// Get Galleries List
	$galleriesList = $zh->getGalleriesList();
	$rootPath = ROOT_PATH;
	
	$cardTmp = array(
					 
		'LPX'		=>	array( 'type'=>'hidden',	'field'=>'lpx', 'value'=>$lpx ),
		'Category'	=>	array( 'type'=>'select', 	'field'=>'cat_id', 		'params'=>array( 'list'=>$catsList, 
																								'fieldValue'=>'id', 
																								'fieldTitle'=>'name', 
																								'currValue'=>$cardItem['cat_id'], 
																								'onChange'=>"", 
																								'first'=>array( 'name'=>'No select', 'id'=>0 ) 
																						    ) ),
					 
		'clear-123'		=>	array( 'type'=>'clear' ),
	 	'Publication'	=>	array( 'type'=>'block', 	'field'=>'block', 			'params'=>array( 'reverse'=>true ) ),
		'Display order'	=>	array( 'type'=>'input', 	'field'=>'order_id', 		'params'=>array( 'size'=>25, 'hold'=>'Позиция' ) ),
	    'clear-124'		=>	array( 'type'=>'clear' ),
	 	'['.$lpx_name.'] '.'Article name' =>	array( 'type'=>'input', 'field'=>'name', 'params'=>array( 'size'=>50, 'hold'=>'Post title', 'onchange'=>"change_alias();" ) ),
		'Alias'	=>	array( 'type'=>'input', 'field'=>'alias', 'params'=>array( 'size'=>50, 'hold'=>'alias for url', 'readonly' => ( $lpx_name=='EN' ? false : true ) ) ),
	   	'clear-0'				=>	array( 'type'=>'clear' ),
		/*'Видеоматериал?'		=>	array( 'type'=>'block', 	'field'=>'is_video', 		'params'=>array( 'reverse'=>false ) ),*/
		'clear-2'				=>	array( 'type'=>'clear' ),
		'['.$lpx_name.'] '.'Content'				=>	array( 'type'=>'redactor', 		'field'=>'content', 	'params'=>array(  ) ),
	 	'clear-33532'			=>	array( 'type'=>'clear' ),
		'clear-2'						=>	array( 'type'=>'clear' ),
		'Related tags'					=>	array( 'type'=>'select_multiple', 	'field'=>'tags', 		'params'=>array( 
																											'selected'=>$cardItem['tags'],
																											'elements'=>$tags, 
																											'name_key'=>'name', 
					 																						'value_key'=>'id', 
					 																						'selected_key'=>'id',
																										) 
		),	 	
					 
		'Images'		=>	array( 'type'=>'header'),
		'Last uploaded image gonna be used as post cover' 	=>	array( 'type'=>'image_mult', 'field'=>'images', 		'params'=>array( 'path'=>FILESROOT."/img/content/", 'appTable'=>$appTable, 'id'=>$item_id, 'field'=>'file' ) ),
		
		'SEO settings' 	=> array('type' =>  'header'),
		'['.$lpx_name.'] '.'Page title'		=>	array( 'type'=>'input', 'field'=>'meta_title', 	'params'=>array( 'size'=>100,  ) ),
		'clear-seo1'				=>	array( 'type'=>'clear' ),
		'['.$lpx_name.'] '.'Page desctription'	=>	array( 'type'=>'area', 	'field'=>'meta_desc', 	'params'=>array(  ) ),
		'clear-seo2'				=>	array( 'type'=>'clear' ),
		'['.$lpx_name.'] '.'Page keywords'		=>	array( 'type'=>'area', 	'field'=>'meta_keys', 	'params'=>array(  ) )
	 );


	$cardEditFormParams = array( 'cardItem'=>$cardItem, 'cardTmp'=>$cardTmp, 'rootPath'=>$rootPath, 'actionName'=>"editArticleItem", 'ajaxFolder'=>'edit', 'appTable'=>$appTable, 'lpx'=>$lpx, 'headParams'=>$headParams, 'langs'=>$langs  );
	
	$cardEditFormStr = $zh->getCardEditForm($cardEditFormParams);
	
	// Join content
	
	$data['bodyContent'] .= "
		<div class='ipad-20' id='order_conteinter'>
			<h3 class='new-line'>Article #$item_id edit.</h3>";
	
	$data['bodyContent'] .= $cardEditFormStr;
				
	$data['bodyContent'] .=	"
		</div>
	";

?>