<?php 	//********************	//** WEB MIRACLE TECHNOLOGIES	//********************		// get post		$appTable = $_POST['appTable'];		$item_id = 1;	$lpx = $_POST['lpx'];	$lang_prefix = ($lpx ? $lpx."_" : ""); // (Israel - empty, ru, en, fr)		$cardUpd = array(		$lang_prefix.'text_1' 	=> $_POST['text_1'],		$lang_prefix.'text_2' 	=> $_POST['text_2'],		$lang_prefix.'text_3' 	=> $_POST['text_3'],		$lang_prefix.'text_4' 	=> $_POST['text_4'],		$lang_prefix.'text_5' 	=> $_POST['text_5'],		$lang_prefix.'text_6' 	=> $_POST['text_6'],		$lang_prefix.'text_7' 	=> $_POST['text_7'],		$lang_prefix.'text_8' 	=> $_POST['text_8'],		$lang_prefix.'text_9' 	=> $_POST['text_9'],		$lang_prefix.'text_10' 	=> $_POST['text_10'],		$lang_prefix.'text_11' 	=> $_POST['text_11'],		$lang_prefix.'text_12' 	=> $_POST['text_12'],		$lang_prefix.'text_13' 	=> $_POST['text_13'],		$lang_prefix.'text_14' 	=> $_POST['text_14'],		$lang_prefix.'text_15' 	=> $_POST['text_15'],		$lang_prefix.'text_16' 	=> $_POST['text_16'],		$lang_prefix.'text_17' 	=> $_POST['text_17'],		$lang_prefix.'text_18' 	=> $_POST['text_18'],		$lang_prefix.'text_19' 	=> $_POST['text_19'],	);						// File upload 		$filename = "filename";		if(isset($_FILES[$filename]) && $_FILES[$filename]['size'] > 0)	{		$file_path = "../../../../webroot/files/content/";				$file_update = $ah->mtvc_add_files_file(array(				'path'			=>$file_path,				'name'			=>5,				'pre'			=>"page_",				'size'			=>10,				'rule'			=>0,				'max_w'			=>2500,				'max_h'			=>2500,				'files'			=>$filename			  ));		if($file_update)		{			$cardUpd[$filename] = $file_update;						$curr_filename = $_POST['curr_filename'];						unlink($file_path.$curr_filename);		}	}		// Update main table		$query = "UPDATE `$appTable` SET ";		$cntUpd = 0;	foreach($cardUpd as $field => $itemUpd)	{		$cntUpd++;		$query .= ($cntUpd==1 ? "`$field`='$itemUpd'" : ", `$field`='$itemUpd'");	}		$query .= " WHERE `id`=$item_id LIMIT 1";				$ah->rs($query,0,1);		$data['q'] = $query;	$data['message'] = "Footer saved.";	