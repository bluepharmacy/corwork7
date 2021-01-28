<?php
// writing files for pages
include 'templater.php';
	
	function createFile($title,$varname,$page_data)
	{

		$txt = pageOnly($title,$varname,$page_data);


		$create_file = fopen("files/".$varname.".html", 'w');
 		 fwrite($create_file, $txt);
		 fclose($create_file);
	}

	function deleteFile($varname)
	{
		unlink("files/".$varname.".html");
	}

?>