<?php

	include("./inc/config.php");

	$ts = array(
		"App_url" => Site_url,
		"App_Author" => author,
		"App_name" => name_app,
		"App_content" => $tpl_page
	);

	echo $voice_site->genTemplate($ts, $tper.'tpl/app.html');