<?php 	//********************	//** WEB MIRACLE TECHNOLOGIES	//********************		// get post		$appTable = $_POST['appTable'];		$item_id = 1;	$lpx = $_POST['lpx'];	$lang_prefix = ($lpx ? $lpx."_" : ""); // (Israel - empty, ru, en, fr)		$cardUpd = array(					$lang_prefix.'menu_text1' => $_POST['menu_text1'],					$lang_prefix.'menu_text2' => $_POST['menu_text2'],					$lang_prefix.'menu_text3' => $_POST['menu_text3'],					$lang_prefix.'menu_text4' => $_POST['menu_text4'],					$lang_prefix.'menu_text5' => $_POST['menu_text5'],					$lang_prefix.'menu_text6' => $_POST['menu_text6'],					$lang_prefix.'menu_text7' => $_POST['menu_text7'],					$lang_prefix.'menu_text8' => $_POST['menu_text8'],					$lang_prefix.'menu_text9' => $_POST['menu_text9'],					$lang_prefix.'menu_text10' => $_POST['menu_text10'],					$lang_prefix.'menu_text11' => $_POST['menu_text11'],					$lang_prefix.'menu_text12' => $_POST['menu_text12'],					$lang_prefix.'menu_text13' => $_POST['menu_text13'],					);						// File upload 		$filename = "filename";		if(isset($_FILES[$filename]) && $_FILES[$filename]['size'] > 0)	{		$file_path = "../../../../webroot/files/content/";				$file_update = $ah->mtvc_add_files_file(array(				'path'			=>$file_path,				'name'			=>5,				'pre'			=>"page_",				'size'			=>10,				'rule'			=>0,				'max_w'			=>2500,				'max_h'			=>2500,				'files'			=>$filename			  ));		if($file_update)		{			$cardUpd[$filename] = $file_update;						$curr_filename = $_POST['curr_filename'];						unlink($file_path.$curr_filename);		}	}		// Update main table		$query = "UPDATE `$appTable` SET ";		$cntUpd = 0;	foreach($cardUpd as $field => $itemUpd)	{		$cntUpd++;		$query .= ($cntUpd==1 ? "`$field`='$itemUpd'" : ", `$field`='$itemUpd'");	}		$query .= " WHERE `id`=$item_id LIMIT 1";				$ah->rs($query,0,1);		$data['q'] = $query;	$data['message'] = "Page saved successfully.";	