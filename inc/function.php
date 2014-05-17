<?php

	include($tper.'inc/core.class.php');
	$voice_site = new Core;
	$voice_site->connectDB();

	//	Check install folder
	if (file_exists($tper.'lib/check.php'))
		include($tper.'lib/check.php');

	//	Manage Flags & Site language
	if (file_exists($tper.'lib/locale.php'))
		include($tper.'lib/locale.php');