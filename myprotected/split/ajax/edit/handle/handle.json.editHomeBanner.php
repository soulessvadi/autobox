<?php 	//********************	//** WEB MIRACLE TECHNOLOGIES	//********************		// get post		$appTable = $_POST['appTable'];		$item_id = 1;		$cardUpd = array(					'title'		=> $_POST['title'],					'caption'	=> $_POST['caption'],										'dateModify'	=> date("Y-m-d H:i:s", time())					);						// File upload 		$filename = "filename";		if(isset($_FILES[$filename]) && $_FILES[$filename]['size'] > 0)	{		$file_path = "../../../../split/files/content/";				$file_update = $ah->mtvc_add_files_file(array(				'path'			=>$file_path,				'name'			=>5,				'pre'			=>"page_",				'size'			=>10,				'rule'			=>0,				'max_w'			=>2500,				'max_h'			=>2500,				'files'			=>$filename			  ));		if($file_update)		{			$cardUpd[$filename] = $file_update;						$curr_filename = $_POST['curr_filename'];						unlink($file_path.$curr_filename);		}	}		// Update main table		$query = "UPDATE `$appTable` SET ";		$cntUpd = 0;	foreach($cardUpd as $field => $itemUpd)	{		$cntUpd++;		$query .= ($cntUpd==1 ? "`$field`='$itemUpd'" : ", `$field`='$itemUpd'");	}		$query .= " WHERE `id`=$item_id LIMIT 1";				$ah->rs($query,0,1);		$data['message'] = "Home Banner saved successfully.";	