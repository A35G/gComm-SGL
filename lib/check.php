<?php

	$rep = opendir('.');

	$trovato = false;

	while ($file = readdir($rep)) {

	if ($file != '..' && $file !='.' && $file !='' && $file !='index.php') {

		if (is_dir($file) && ($file === 'install'))
			$trovato = true;

	}

}

if ($trovato)
	include("./tpl/found_install.php");
else
	include('./tpl/home.php');

closedir($rep);
clearstatcache();