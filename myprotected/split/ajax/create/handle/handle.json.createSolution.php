<?php 	//********************	//** WEB MIRACLE TECHNOLOGIES	//********************		// get post		$appTable = $_POST['appTable'];		$item_id = (isset($_POST['item_id']) ? $_POST['item_id'] : 0);		$cardUpd = array(					'user_id'			=>(int) $_POST['user_id'],					'problem_id'		=> $_POST['problem_id'],					'text'				=> $_POST['text'],					'moderation'		=> $_POST['moderation'][0],					'modified'			=> date("Y-m-d H:i:s", time()),					'created'			=> date("Y-m-d H:i:s", time()),					);			// Create main table item						$query = "INSERT INTO [pre]$appTable ";						$fieldsStr = " ( ";						$valuesStr = " ( ";						$cntUpd = 0;			foreach($cardUpd as $field => $itemUpd)			{				$cntUpd++;								$fieldsStr .= ($cntUpd==1 ? "`$field`" : ", `$field`");								$valuesStr .= ($cntUpd==1 ? "'$itemUpd'" : ", '$itemUpd'");			}						$fieldsStr .= " ) ";						$valuesStr .= " ) ";						$query .= $fieldsStr." VALUES ".$valuesStr;							$item_id = $ah->dbh->q($query,0,1,1);						if($item_id)			{				$data['item_id'] = $item_id;				$data['status'] = "success";				$data['message'] = "Новое решение успешно создано.";									$filename = "files";				if(isset($_FILES[$filename]) && count($_FILES[$filename]) > 0)				{					$file_path = "../../../../webroot/uploads/";					$files_upload = $ah->mtvc_add_files_file_miltiple(array(							'path'			=>$file_path,							'name'			=>5,							'pre'			=>"upd_",							'size'			=>10,							'rule'			=>0,							'max_w'			=>2500,							'max_h'			=>2500,							'files'			=>$filename,							'resize_path'	=>$file_path."crop/",							'resize_w'		=>600,							'resize_h'		=>600,							'resize_path_2'	=>"0",							'resize_w_2'	=>0,							'resize_h_2'	=>0						  ));					if($files_upload)					{						$now = date("Y-m-d H:i:s");						foreach($files_upload as $file_upload)						{							$extP = explode('.', $file_upload);							$ext = end($extP);							$query = "INSERT INTO [pre]problems_solutions_files (`solution_id`, `filename`, `ext`, `created`) VALUES ('$item_id', '$file_upload', '$ext', '$now')";							$ah->rs($query);						}					}				}							}else			{				$data['item_id'] = 0;			}