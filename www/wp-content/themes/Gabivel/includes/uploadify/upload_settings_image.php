<?php
$absolute_path = __FILE__;
$path_to_file = explode( 'wp-content', $absolute_path );
$path_to_wp = $path_to_file[0];

//Access WordPress
require_once( $path_to_wp.'/wp-load.php' );

// JQuery File Upload Plugin v1.4.1 by RonnieSan - (C)2009 Ronnie Garcia
if (!empty($_FILES)) {
	$tempFile = $_FILES['Filedata']['tmp_name'];
	$orginalName = $_FILES['Filedata']['name'];
	$imageName = strtolower($orginalName); //createSettingsImageName();
	$targetFile = $settingsimages.'/'.$imageName;
	if(@move_uploaded_file($tempFile,$targetFile))
	{
		$html = createItemForImageList($imageName, $settingsimagesUrl.'/'.$imageName);
		$ret = array('status'=>'OK', 'imageID'=>str_replace('.', '', $imageName), 'imageName'=>$imageName, 'html'=>$html);
		echo json_encode($ret);
		
	}else{
		echo '{"status":"NOK", "ERR":"Have got an error when moving to upload directory."}';
	}
}else{
	echo '{"status":"NOK", "ERR":"This file is incorect"}';
}

?>