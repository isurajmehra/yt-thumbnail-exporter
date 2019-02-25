<?php

if(isset($_GET["url"])){
	$url = $_GET["url"];
	$qs = parse_url($url);

	parse_str($qs["query"],$query);
	$video = $query["v"];
}else if(isset($_GET["id"])){
	$video = $_GET["id"];
}else{
	die();
}
	$resolutions = ["/maxresdefault.jpg","/0.jpg","/mqdefault.jpg","/3.jpg","/2.jpg","/1.jpg"];
	header("image/jpeg");

	for($i=0; $i<count($resolutions); ++$i){
		$img_url = "https://img.youtube.com/vi/" . $video . $resolutions[$i];
		try{
			$img = file_get_contents($img_url);
			$file = fopen("img.jpg","w");
			fwrite($file,$img);
			fclose($file);

			readfile("img.jpg");
			break;
		}catch(Exception $e){

		}
	}
	exit(0);
?>