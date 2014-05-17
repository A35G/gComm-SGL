<?php

  /*
      gComm - SimpleGuestbook - Light Version
      vers. 0.2.1 - May 2014

      Copyright © 2010 - 2014 Gianluigi 'A35G' Maurilio
      http://www.hackworld.it/ - http://www.gmcode.it/ - a35g@hackworld.it
  */

  //	Connection parameters to the database
  define("host", "localhost");
  define("user", "root");
  define("password", "");
  define("databs", "gcomm");
  define("tfix", "gsc_");

  //	URL, Parameters and Info of the site
  define("Site_url", "http://localhost/coding/gcomm-sg/");
  define("Site_Root", $_SERVER['DOCUMENT_ROOT'] . "/coding/gcomm-sg/");
  define("grap_path", "tpl/");
  define("lang", "it");

  //  Presence of other languages
  define("prs_lang", false);

  //  Name of session variable for language
  define("lng_var", "site_lang");

	//  E-mail address for automatic e-mail sent from the platform
	define("automated_mail", "no-response@gcomm-sg.tld");

	//	Carbon copy of the automatic e-mails sent from the portal
	//	Set variable to 1 to enable a 'carbon copy' option;
	//	Set variable to 0 to disable a 'carbon copy' option.
	define("carbon_copy", 0);

	//  E-mail address for the 'carbon copy' option
	//  Is mandatory to define this variable, in order to obtain the proper
	//	functioning of the 'carbon copy' option
	define("carbon_copy_mail", "\"Control Platform\" <myemail@gcomm-sg.tld>");

  //  Set to 1 if you want to check content of messages for eventual presence
  //  of unwanted words; if exists a word contained into "list of censored words",
  //  will be replaced with random alphanumeric chars.
  define("censured_post", 0);

	//	Don't Touch/Change/Modify this code

  define("name_app", "gComm - SimpleGuestbook - Light Version");
  define("mail_wm", "a35g@hackworld.it");
  define("author", "Gianluigi 'A35G' Maurilio");
  define("dpub", 2010);

  if (isset($extf) && !empty($extf) && is_numeric($extf)) {

    $tper = "";
    for ($np = 0; $np < $extf; $np++)
			$tper .= "../";

  } else
		$tper = "./";

  include_once($tper."inc/function.php");

  //  End Config Platform