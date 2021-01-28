<?php

include 'page_operation.php';

$routes = $_POST['routes'];
$name = $_POST['name']; //name will be use for Page title. EX: (title => Home Page, name => home_page)
$nameRemoveSpace = explode(" ",$name);
$newname = implode("_",$nameRemoveSpace);
$varname = strtolower($newname);

 switch($_GET['method'])
 {
 	// addSingleRecord ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
 	case 'addSingleRecord':
 		$page_data = $_POST['page_data'];
		createFile($name,$varname,$page_data);

		array_push($routes, array(
			'name' => $varname,
			'path' => "/".$varname."/",
			'url' => $varname.".html",
		));

		// print_r(json_encode($routes));
		$txt = '';
		foreach($routes as $result) {
		    $txt.= "{name:'".$result['name']."',path:'".$result['path']."',url:'".$result['url']."'},\n";
		}

		 $file_name='routes.js';
		 $write_text="routes = [\n";
		 $write_text.=$txt;
		 $write_text.='];';

		 $edit_file = fopen($file_name, 'w');
			
		 fwrite($edit_file, $write_text);
		 fclose($edit_file);
 	break;

 	// deleteBySingle ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
 	case 'deleteBySingle' :
		deleteFile($varname);

	 	$id = $_POST['id'];
	 	array_splice($routes,$id,1);
		// print_r(json_encode($routes));

		$txt = '';
		foreach($routes as $result) {
		    $txt.= "{name:'".$result['name']."',path:'".$result['path']."',url:'".$result['url']."'},\n";
		}

		 $file_name='routes.js';
		 $write_text="routes = [\n";
		 $write_text.=$txt;
		 $write_text.='];';

		 $edit_file = fopen($file_name, 'w');
			
		 fwrite($edit_file, $write_text);
		 fclose($edit_file);

 	break;



 	// default :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
 	default:
 		echo "default : wrong method";

 }

?>