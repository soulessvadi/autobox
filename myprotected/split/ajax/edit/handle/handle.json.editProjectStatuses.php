<?php 	//********************	//** WEB MIRACLE TECHNOLOGIES	//********************		// get post		$appTable 	= $_POST['appTable'];		$name		= $_POST['name'];	$ru_name	= $_POST['ru_name'];	$name_s		= $_POST['name_short'];	$ru_name_s	= $_POST['ru_name_short'];	// Update main table	$ah->rs("TRUNCATE TABLE [pre]$appTable");	foreach($name as $idx => $value)	{		$ua_n = $value;		$ru_n = $ru_name[$idx];		$ns = $name_s[$idx];		$ru_ns = $ru_name_s[$idx];		$query = "INSERT INTO [pre]$appTable (`name`, `ru_name`,`name_short`,`ru_name_short`) VALUES ('$ua_n','$ru_n','$ns','$ru_ns')";		$ah->rs($query);	}		$data['message'] = "Статусы сохранены";	$data['status'] = "success";	