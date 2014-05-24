<?php

	class Core {

		private $host = host;
		private $user = user;
		private $password = password;
		private $databs = databs;

		var $suffix = tfix;
		var $ARurl = Site_url;
		var $dRoot = Site_Root;
		var $mailWm = mail_wm;
		var $nameApp = name_app;
		var $data_pub = dpub;
		var $graph = grap_path;
		var $defl = lang;

		var $textpl;
		var $template;
		var $dbconn;

		public function __construct() {

			$this->textpl = $this->dbconn = '';

		}

		protected function connessione() {

			if (!$this->dbconn = @mysql_connect($this->host, $this->user, $this->password))
				die($this->getErrorConn("Tagboard in Manutenzione, Ci scusiamo per il Disagio.", mysql_error()));
			else
				$this->load_db($this->databs);

		}

		protected function load_db($database) {

			if (!$this->dbloading = mysql_select_db($database, $this->dbconn)) {

				$this->textpl = $this->getErrorConn("Si &egrave; verificato un problema durante la connessione al database &quot;" . $database . "&quot;", mysql_error());
				$this->showRes();

				exit;

			}

			mysql_query("SET NAMES 'UTF-8';");

		}

		public function tp_name($field, $parcont = '') {

			if (isset($parcont) && !empty($parcont))
				$args_t = stripslashes(html_entity_decode(htmlspecialchars(str_replace ("\n", "<br />", $field), ENT_QUOTES, 'UTF-8')));
			else
				$args_t = stripslashes(html_entity_decode(htmlspecialchars($field, ENT_QUOTES, 'UTF-8')));

			return $args_t;

		}

		public function parsaText($tpword) {

			$f_step = html_entity_decode($tpword, ENT_QUOTES, 'UTF-8');
			$s_step = strip_tags($f_step);
			$t_step = strtolower($s_step);

			$inSense = Array(
			"&deg;" => "", " "=> "-", "%20" => "-", "'" => "-", "\"" => "",
			"-" => "-", "/" => "-", "!" => "", "?" => "", ":" => "", ".." => "",
			"..." => "", "." => "", "," => "", "&#39;" => "-", "&#039;" => "-",
			"&agrave;" => "a", "%C3%A0" => "a", "Ã " => "a", "à" => "a",
			"&egrave;" => "e", "%C3%A8" => "e", "Ã¨" => "e", "è" => "e",
			"&eacute;" => "e", "%C3%A9" => "e", "Ã©" => "e", "é" => "e",
			"&igrave;" => "i", "%C3%AC" => "i", "Ã¬" => "i", "ì" => "i",
			"&ograve;" => "o", "%C3%B2" => "o", "Ã²" => "o", "ò" => "o",
			"&ugrave;" => "u", "%C3%B9" => "u", "Ã¹" => "u", "ù" => "u",
			"&amp;" => "e", "&reg;" => "", "&euro;" => "", "<br />" => "-",
			"<br_>" => "-", "<br__>" => "-", "&" => "e", "*" => "", "%2A" => '',
			"À" => "a", "à" => "a", "Á" => "a", "á" => "a", "Â" => "a", "â" => "a",
			"Ã" => "a", "ã" => "a", "ä" => "a", "Ä" => "a", "Å" => "a", "å" => "a",
			"Æ" => "ae", "æ" => "ae", "Ç" => "c", "ç" => "c", "È" => "e", "è" => "e",
			"É" => "e", "é" => "e", "Ê" => "e", "ê" => "e", "Ë" => "e", "ë" => "e",
			"Ì" => "i", "ì" => "i", "Í" => "i", "í" => "i", "Î" => "i", "î" => "i",
			"Ï" => "i", "ï" => "i", "Ð" => "e", "ð" => "e", "Ñ" => "n", "ñ" => "n",
			"Ò" => "o", "ò" => "o", "Ó" => "o", "ó" => "o", "Ô" => "o", "ô" => "o",
			"Õ" => "o", "õ" => "o", "Ö" => "o", "ö" => "o", "Ø" => "o", "ø" => "o",
			"Ù" => "u", "ù" => "u", "Ú" => "u", "ú" => "u", "Û" => "u", "û" => "u",
			"Ü" => "u", "ü" => "u", "Ý" => "y", "ý" => "y", "Þ" => "t", "þ" => "t",
      "ß" => "sz", "ÿ" => "y", "Ÿ" => "y", "Œ" => "oe", "œ" => "oe", "Š" => "s",
      "š" => "s"
			);

			foreach($inSense as $w_search => $w_replace)
				$t_step = @str_replace($w_search, $w_replace, $t_step);

			return $t_step;

		}

		public function parsa_date($rich_data, $tpm = '') {

			$mesi = Array("", "Gennaio", "Febbraio", "Marzo", "Aprile", "Maggio", "Giugno", "Luglio", "Agosto", "Settembre", "Ottobre", "Novembre", "Dicembre");
			list($y, $m, $d) = explode("-", $rich_data);

			if (isset($tpm) && !empty($tpm) && is_numeric($tpm))
				$indate = $mesi[intval($tpm)];
			else
				$indate = $d . " " . $mesi[intval($m)] . " " . $y;

			return $indate;

		}

		public function numData($val_data) {

			list($year_crs, $month_crs, $day_crs) = explode('-', $val_data);
			return $day_crs.'-'.$month_crs.'-'.$year_crs;

		}

		protected function countVal($query) {

			if (isset($query) && !empty($query)) {

				$res = mysql_query($query, $this->dbconn) or die("Errore di query: " . mysql_error());
				$res_count = mysql_fetch_row($res);

				return $res_count[0];

			}

		}

		protected function simpleQuery($query, $parcont = '') {

			if (isset($query) && !empty($query)) {

				mysql_query($query, $this->dbconn) or die("Errore di query: " . mysql_error());

				if (isset($parcont) && !empty($parcont))
					return mysql_insert_id();

			}

		}

		public function mres($field) {
			return mysql_real_escape_string($field);
		}

		protected function prelText($query) {

			if (isset($query) && !empty($query)) {

				$res = mysql_query($query, $this->dbconn) or die("Errore di query: " . mysql_error());
				if (!mysql_num_rows($res)) {
					$result = "";
				} else {

					if (mysql_num_rows($res) == "1") {

						while ($row = mysql_fetch_assoc($res))
							$result = $row;

					} elseif (mysql_num_rows($res) > 1) {

						while ($row = mysql_fetch_assoc($res))
							$result[] = $row;

					}

				}

				return $result;

			}

		}


		protected function getErrorConn($t_errmex, $err ) {

			echo sprintf('<center><strong>%s</strong></center>', $t_errmex);
			@mail($this->mailWm, "Errore DB su " . $this->nameApp, "Attenzione, Impossibile collegarsi al DataBase\r\r\nErrore: " . $err . ".", "From: \"Control Platform - E2 ICT Snc\" <no-response@e2ict.it>");

		}

		protected function getCopy() {

			$year = date("Y");

			if (intval($this->data_pub) == intval($year))
				$copyd = intval($this->data_pub);
			elseif (intval($this->data_pub) < intval($year))
				$copyd = intval($this->data_pub) . " - " . intval($year);

			return $copyd;

		}

		protected function sysTemplate($ts, $tpl) {

			if (@file_exists($tpl))
				@$this->template = @file_get_contents($tpl);
			else
				die("Si &egrave; verificato un errore!<br /><br />Il file &quot;" . $tpl . "&quot; non &egrave; presente");

			$this->parserT($ts);

		}

		protected function parserT($ts) {

			if (@count($ts) > 0) {

				foreach ($ts as $t => $d) {

					$d = (@file_exists($d)) ? $this->getFile($d) : $d;

					$this->template = @str_replace("{" . $t . "}", $d, $this->template);

				}

			} else {

				die("Attenzione: impossibile eseguire il replace dei tags.");

			}

		}

		protected function getFile($doc) {

			$contenuto = '';

			@ob_start();

			if (@file_exists($doc)) {

				@include($doc);
				$contenuto = @ob_get_contents();

			}

		 @ob_end_clean();

			return $contenuto;

		}

		protected function showTemplate() {
			return $this->template;
		}

		public function parse_lang($text_l, $_LANG) {

			if (array_key_exists($text_l, $_LANG))
				return str_replace($text_l, $_LANG[$text_l], $text_l);

		}

		public function searchStr($text, $wordToSearch) {

			$bris = '';

			if (isset($text, $wordToSearch) && !empty($text) && !empty($wordToSearch)) {

				$offset = $pos = $gin = 0;

				while (is_integer($pos)) {

					$pos = strpos($text, $wordToSearch, $offset);

					if (is_integer($pos)) {
						$gin++;
						$offset = ($pos + strlen($wordToSearch));
					}

				}

				if (isset($gin) && !empty($gin))
					$bris = $gin;
				else
					$bris = false;

			} else {

				$bris = false;

			}

			return $bris;

		}

		public function generate_incode() {

			$rid = chr(rand(65, 90));
			$rif = chr(rand(97, 122));
			$phr = md5($rid . $rif);

			return substr($phr, 0, 8);

		}

    public function checkMail($mailcheck) {

			if (!preg_match("/^[a-z0-9\!\#\$\%\&\'\*\+\/\=\?\^\_\`\{\|\}\~\-]+(?:\.[a-z0-9\!\#\$\%\&\'\*\+\/\=\?\^\_\`\{\|\}\~\-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?/", $mailcheck))
				$status_mail = 'not-valid';
			else
				$status_mail = 'valid';

			return $status_mail;

    }

    private function checkTable($nome_tbl) {

      $res_t = '';
      $check_p = 0;

      $list_tbl = $this->prelText("SHOW TABLES FROM `" . $this->databs . "`;");

      if (is_array($list_tbl) && !empty($list_tbl)) {

      	if (count($list_tbl) > 1) {

	        foreach ($list_tbl as $idtbl => $nmtbl) {
	          if (in_array($nome_tbl, $nmtbl))
	            $check_p++;
	        }

	      } else {

					if (in_array($nome_tbl, $list_tbl))
	          $check_p++;

	      }

        $res_t = (!empty($check_p)) ? true : false;

      } else
        $res_t = false;

      return $res_t;

    }

    public function vSmile($txt) {

    	$m_txt = '';

    	$bs_smile = array(
    		";)" => "0", ":D" => "1", "0.0" => "2",
    		":(" => "3", "8)" => "4", ":cry" => "5",
    		":<" => "6", ":lol" => "7", "<_<" => "8",
    		":|" => "9", ":P" => "10", ":p" => "10",
    		"8|" => "11", ":)" => "12", ":o" => "13",
    		":-|" => "14", ":idea:" => "15",
    		":s" => "16", ":rosso:" => "17",
    		"?_?" => "18", "!_!" => "19",
    		"XD" => "20", ":tim" => "blush21nx", ":dj" => "dj",
    		":grrr" => "evil1", ":guitar" => "guitar", ":lamp" => "icon_idea",
    		":argh" => "out_cold", ":nite" => "sonno", ":alt" => "trampoline",
    		":vib" => "vibrate", ":first" => "winner_first_h4h", ":second" => "winner_second_h4h",
    		":third" => "winner_third_h4h", ":yuppi" => "yupi3ti"
    	);

    	foreach($bs_smile as $sm_code => $sm_img)
				$m_txt = @str_ireplace($sm_code, "<img src='".$this->ARurl.$this->graph."images/emoticons/".$sm_img.".gif'>", $txt);

			return $m_txt;

    }

		public function connectDB() {
			$this->connessione();
		}

		public function selQr($qry) {
			return $this->prelText($qry);
		}

		public function cntQr($qry) {
			return $this->countVal($qry);
		}

		public function getQr($qry, $cntrl = '') {
			return $this->simpleQuery($qry, $cntrl);
		}

		public function tablePrs($tables) {
			return $this->checkTable($tables);
		}

		public function copyrSite() {
			return $this->getCopy();
		}

		public function genTemplate($ts, $tpl) {
			$this->sysTemplate($ts, $tpl);
			return $this->showTemplate();
		}

	}
