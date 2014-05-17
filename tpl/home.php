<?php

	$tpl_page = "
	<center>
	<form name=\"EcoBoard\" method=\"post\" action=\"" . TAG_url . "pages/write.php\" onsubmit=\"return controlla_form();\">
	<img src=\"" . TAG_url . "images/one.gif\" border=\"0\" alt=\"\" onload=\"primary_settings()\" />
		<div id=\"general-box\">
			<table cellpadding=\"3\" cellspacing=\"0\" id=\"first-form\">
				<tr align=\"left\">
					<td align=\"left\" id=\"first-form-nick\">
						<input type=\"text\" size=\"60\" name=\"nick_tag\" id=\"nick_tag\" value=\"Nickname\" onclick=\"svuota('nick_tag');\" onfocus=\"svuota('nick_tag');\" onblur=\"cont_camp('nick_tag');\">
					</td>
					<td align=\"left\" id=\"first-form-smail\">
						<input type=\"text\" size=\"60\" name=\"smail_tag\" id=\"smail_tag\" value=\"Sito Web/E-Mail\" onclick=\"svuota('smail_tag');\" onfocus=\"svuota('smail_tag');\" onblur=\"cont_camp('smail_tag');\">
					</td>
				</tr>
			</table>
			<table cellpadding=\"3\" cellspacing=\"0\" id=\"second-form\">
				<tr align=\"left\">
					<td align=\"left\" id=\"second-form-mex\">
						<input type=\"text\" size=\"100\" name=\"mex_tag\" id=\"mex_tag\" value=\"Lascia un Messaggio\" onclick=\"svuota('mex_tag');\" onblur=\"cont_camp('mex_tag');\">
						&nbsp;
						<input type=\"submit\" value=\"Tagga\" id=\"submit\" name=\"submit\">
					</td>
					<td align=\"center\" class=\"second-form-mini\">
						<a onclick=\"refresh_tag()\" title=\"Aggiorna Messaggi\"><img src=\"" . TAG_url . "images/16/reload.png\" alt=\"Aggiorna Messaggi\" border=\"0\" /></a>
					</td>
					<td align=\"center\" class=\"second-form-mini\">
						<a onclick=\"visual_smile()\" title=\"Inserisci Emoticons\"><img src=\"" . TAG_url . "images/emoticons/0.gif\" alt=\"Inserisci Emoticons\" border=\"0\" /></a>
						<input type=\"hidden\" name=\"smile-control\" id=\"smile-control\" value=\"\" />
					</td>
				</tr>
			</table>
		<div id=\"smile-box\">
		</div>
		<div id=\"mexage-box\">
		</div>
			<span id=\"credits\">
				<span id=\"num-mex\"></span> Messaggi nella TagBoard &nbsp;|&nbsp; <a onclick=\"visual_all()\" title=\"Vedi tutti i Messaggi\">Vedi tutti i Messaggi</a>
				<br />
				Copyright &copy; 2004 - " . date("Y") . " <a href=\"http://www.ecoquadro.com/\" title=\"Realizzazione Siti Web  - Web Solution - IT Services, a Lecce\" target=\"_blank\">Ecoquadro Soc. Coop. a r.l.</a>
			</span>
		</div>
	</form>
	</center>
	";