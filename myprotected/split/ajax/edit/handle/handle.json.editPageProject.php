<?php 	//********************	//** WEB MIRACLE TECHNOLOGIES	//********************		// get post		$appTable = $_POST['appTable'];		$item_id = 1;	$lpx = $_POST['lpx'];	$lang_prefix = ($lpx ? $lpx."_" : ""); // (Israel - empty, ru, en, fr)		$cardUpd = array(					$lang_prefix.'page_text1' 	=> $_POST['page_text1'],					$lang_prefix.'page_text2' 	=> $_POST['page_text2'],					$lang_prefix.'page_text3' 	=> $_POST['page_text3'],					$lang_prefix.'page_text4' 	=> $_POST['page_text4'],					$lang_prefix.'page_text5' 	=> $_POST['page_text5'],					$lang_prefix.'page_text6' 	=> $_POST['page_text6'],					'index' 	=> (int)$_POST['index'][0],										$lang_prefix.'meta_title'	=> $_POST['meta_title'],					$lang_prefix.'meta_keys' 	=> $_POST['meta_keys'],					$lang_prefix.'meta_desc' 	=> $_POST['meta_desc'],										);						// File upload 		$filename = "filename";		if(isset($_FILES[$filename]) && $_FILES[$filename]['size'] > 0)	{		$file_path = "../../../../public/img/content/";				$file_update = $ah->mtvc_add_files_file(array(				'path'			=>$file_path,				'name'			=>5,				'pre'			=>"page_",				'size'			=>10,				'rule'			=>0,				'max_w'			=>2500,				'max_h'			=>2500,				'files'			=>$filename			  ));		if($file_update)		{			$cardUpd[$filename] = $file_update;						$curr_filename = $_POST['curr_filename'];						unlink($file_path.$curr_filename);		}	}		// Update main table		$query = "UPDATE `$appTable` SET ";		$cntUpd = 0;	foreach($cardUpd as $field => $itemUpd)	{		$cntUpd++;		$query .= ($cntUpd==1 ? "`$field`='$itemUpd'" : ", `$field`='$itemUpd'");	}		$query .= " WHERE `id`=$item_id LIMIT 1";				$ah->rs($query,0,1);		$data['q'] = $query;	$data['message'] = "Page project saved successfully.";	