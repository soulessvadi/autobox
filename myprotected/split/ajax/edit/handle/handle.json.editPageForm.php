<?php 	//********************	//** WEB MIRACLE TECHNOLOGIES	//********************		// get post		$appTable = $_POST['appTable'];		$item_id = 1;	$lpx = $_POST['lpx'];	$lang_prefix = ($lpx ? $lpx."_" : ""); // (Israel - empty, ru, en, fr)		$cardUpd = array(					$lang_prefix.'form_text1' => $_POST['form_text1'],					$lang_prefix.'form_text2' => $_POST['form_text2'],					$lang_prefix.'form_text3' => $_POST['form_text3'],					$lang_prefix.'form_text4' => $_POST['form_text4'],					$lang_prefix.'form_text5' => $_POST['form_text5'],					$lang_prefix.'form_text6' => $_POST['form_text6'],					$lang_prefix.'form_text7' => $_POST['form_text7'],					$lang_prefix.'form_text8' => $_POST['form_text8'],					$lang_prefix.'form_text9' => $_POST['form_text9'],					$lang_prefix.'form_text10' => $_POST['form_text10'],					$lang_prefix.'form_text11' => $_POST['form_text11'],					$lang_prefix.'form_text12' => $_POST['form_text12'],					$lang_prefix.'form_text13' => $_POST['form_text13'],					$lang_prefix.'form_text14' => $_POST['form_text14'],					$lang_prefix.'form_text15' => $_POST['form_text15'],					$lang_prefix.'form_text16' => $_POST['form_text16'],					$lang_prefix.'form_text17' => $_POST['form_text17'],					$lang_prefix.'form_text18' => $_POST['form_text18'],					$lang_prefix.'form_text19' => $_POST['form_text19'],					$lang_prefix.'form_text20' => $_POST['form_text20'],					$lang_prefix.'form_text21' => $_POST['form_text21'],					$lang_prefix.'form_text22' => $_POST['form_text22'],					);							// Update main table		$query = "UPDATE `$appTable` SET ";		$cntUpd = 0;	foreach($cardUpd as $field => $itemUpd)	{		$cntUpd++;		$query .= ($cntUpd==1 ? "`$field`='$itemUpd'" : ", `$field`='$itemUpd'");	}		$query .= " WHERE `id`=$item_id LIMIT 1";				$ah->rs($query,0,1);		$data['q'] = $query;	$data['message'] = "Форма сохранена.";	