<?php 
	//********************
	//** WEB MIRACLE TECHNOLOGIES
	//********************
	
	// get post
	
	$appTable = $_POST['appTable'];
	
	$item_id = (isset($_POST['item_id']) ? $_POST['item_id'] : 0);
	
	$cardUpd = array(
		'name'				=> strip_tags(trim($_POST['name'])),
		'title'				=> strip_tags(trim($_POST['title'])),
		'description'		=> str_replace('div>', 'p>', $_POST['description']),
		'production_id'		=> (int)$_POST['production_id'],
		'type_id'			=> (int)$_POST['type_id'],
		'block'				=> $_POST['block'][0],
		'created'			=> date("Y-m-d H:i:s", time()),
		'modified'			=> date("Y-m-d H:i:s", time())
	);
				
	
	// Upload files
	
	$filename = "image";
	
	if(isset($_FILES[$filename]) && count($_FILES[$filename]) > 0)
	{
		$file_path = "../../../../webroot/img/content/";
		$files_upload = $ah->mtvc_add_files_file(array(
				'path'			=>$file_path,
				'name'			=>5,
				'pre'			=>"upd_",
				'size'			=>10,
				'rule'			=>0,
				'max_w'			=>2500,
				'max_h'			=>2500,
				'files'			=>$filename,
				'resize_path'	=>$file_path."crop/",
				'resize_w'		=>600,
				'resize_h'		=>600,
				'resize_path_2'	=>"0",
				'resize_w_2'	=>0,
				'resize_h_2'	=>0
			  ));
		if($files_upload) {
			$cardUpd[$filename] = $files_upload;
		}
	}

	$query = "INSERT INTO [pre]$appTable ";
	
	$fieldsStr = " ( ";
	
	$valuesStr = " ( ";
	
	$cntUpd = 0;
	foreach($cardUpd as $field => $itemUpd)
	{
		$cntUpd++;
		
		$fieldsStr .= ($cntUpd==1 ? "`$field`" : ", `$field`");
		
		$valuesStr .= ($cntUpd==1 ? "'$itemUpd'" : ", '$itemUpd'");
	}
	
	$fieldsStr .= " ) ";
	
	$valuesStr .= " ) ";
	
	$query .= $fieldsStr." VALUES ".$valuesStr;
		
	$item_id = $ah->dbh->q($query,0,1,1);
	
	if($item_id)
	{
		$data['item_id'] = $item_id;
		$data['status'] = "success";
		$data['message'] = "Новый ингредиент создан.";

		/* SAVE INGREDIENT CHARACTERISTICS */ 
		$tableName = 'osc_ingredients_characteristics';
		$cname	= $_POST['characteristics_name'];
		$cvalue = $_POST['characteristics_value'];
		$ah->rs("DELETE FROM $tableName WHERE `ing_id` = $item_id");
		foreach($cname as $idx => $val):
			$name = $cname[$idx];
			$value = $cvalue[$idx];
			$order = $idx + 1;
			$ah->rs("INSERT INTO $tableName (`ing_id`, `name`, `value`, `order_id`) VALUES ('$item_id', '$name','$value', '$order')");
		endforeach;
		/* SAVE INGREDIENT CHARACTERISTICS */ 

		/* SAVE INGREDIENT PROCESS */ 
		$tableName = 'osc_ingredients_process';
		$cname	= $_POST['process_name'];
		$cvalue = $_POST['process_value'];
		$ah->rs("DELETE FROM $tableName WHERE `ing_id` = $item_id");
		foreach($cname as $idx => $val):
			$name = $cname[$idx];
			$value = $cvalue[$idx];
			$order = $idx + 1;
			$ah->rs("INSERT INTO $tableName (`ing_id`, `name`, `value`, `order_id`) VALUES ('$item_id', '$name','$value', '$order')");
		endforeach;
		/* SAVE INGREDIENT PROCESS */ 

		/* SAVE INGREDIENT RECIPES */ 
		$tableName 	= 'osc_ingredients_recipes';
		$values1	= isset($_POST['recipes_value1']) ? $_POST['recipes_value1'] : [];
		$values2	= isset($_POST['recipes_value2']) ? $_POST['recipes_value2'] : [];
		$values3	= isset($_POST['recipes_value3']) ? $_POST['recipes_value3'] : [];
		$values4	= isset($_POST['recipes_value4']) ? $_POST['recipes_value4'] : [];
		$values5	= isset($_POST['recipes_value5']) ? $_POST['recipes_value5'] : [];
		$values6	= isset($_POST['recipes_value6']) ? $_POST['recipes_value6'] : [];
		$values7	= isset($_POST['recipes_value7']) ? $_POST['recipes_value7'] : [];
		$values8	= isset($_POST['recipes_value8']) ? $_POST['recipes_value8'] : [];
		$values9	= isset($_POST['recipes_value9']) ? $_POST['recipes_value9'] : [];
		$values10	= isset($_POST['recipes_value10']) ? $_POST['recipes_value10'] : [];
		$ah->rs("DELETE FROM $tableName WHERE `ing_id` = $item_id");
		foreach($values1 as $idx => $val):
			$val1 	= isset($values1[$idx]) ? $values1[$idx] : '0';
			$val2 	= isset($values2[$idx]) ? $values2[$idx] : '0';
			$val3 	= isset($values3[$idx]) ? $values3[$idx] : '0';
			$val4 	= isset($values4[$idx]) ? $values4[$idx] : '0';
			$val5 	= isset($values5[$idx]) ? $values5[$idx] : '0';
			$val6 	= isset($values6[$idx]) ? $values6[$idx] : '0';
			$val7 	= isset($values7[$idx]) ? $values7[$idx] : '0';
			$val8 	= isset($values8[$idx]) ? $values8[$idx] : '0';
			$val9 	= isset($values9[$idx]) ? $values9[$idx] : '0';
			$val10 	= isset($values10[$idx]) ? $values10[$idx] : '0';
			$order = $idx + 1;
			$ah->rs("INSERT INTO $tableName 
				(`ing_id`, `value1`, `value2`, `value3`, `value4`, `value5`, `value6`, `value7`, `value8`, `value9`, `value10`, `order_id`) 
				VALUES 
				('$item_id','$val1','$val2','$val3','$val4','$val5','$val6','$val7','$val8','$val9','$val10','$order')");
		endforeach;
		/* SAVE INGREDIENT RECIPES */ 		
		
	}
		
		
	