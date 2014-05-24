<?php

	$tpl_page = "<center>
	<form name=\"gComm_form\" id='tag_form' method=\"POST\" action=\"".Site_url."pages/write.php\" onsubmit=\"return controlla_form();\">
	<img src=\"".Site_url."images/one.gif\" border=\"0\" alt=\"\" onload=\"primary_settings()\" />
		<div id=\"general-box\">
			<table cellpadding=\"3\" cellspacing=\"0\" id=\"first-form\">
				<tr align=\"left\">
					<td align=\"left\" id=\"first-form-nick\">
						<input type=\"text\" size=\"60\" name=\"nick_tag\" id=\"nick_tag\" placeholder=\"Nome\" value=\"\">
					</td>
					<td align=\"left\" id=\"first-form-smail\">
						<input type=\"text\" size=\"60\" name=\"smail_tag\" id=\"smail_tag\" placeholder=\"Sito Web/E-Mail\" value=\"\">
					</td>
				</tr>
			</table>
			<table cellpadding=\"3\" cellspacing=\"0\" id=\"second-form\">
				<tr align=\"left\">
					<td align=\"left\" id=\"second-form-mex\">
						<input type=\"text\" size=\"100\" name=\"mex_tag\" id=\"mex_tag\" placeholder=\"Lascia un Messaggio\" value=\"\">
						&nbsp;
						<input type=\"submit\" value=\"Tagga\" id=\"submit\" name=\"submit\">
					</td>
					<td align=\"center\" class=\"second-form-mini\">
						<a onclick=\"refresh_tag()\" title=\"Aggiorna Messaggi\"><img src=\"".Site_url."images/16/reload.png\" alt=\"Aggiorna Messaggi\" border=\"0\" /></a>
					</td>
					<td align=\"center\" class=\"second-form-mini\">
						<a onclick=\"visual_smile()\" title=\"Inserisci Emoticons\"><img src=\"".Site_url."images/emoticons/0.gif\" alt=\"Inserisci Emoticons\" border=\"0\" /></a>
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
				Copyright &copy; " .$voice_site->copyrSite(). " Gianluigi &quot;A35G&quot; in collaborazione con <a href=\"http://www.hackworld.it/\" title=\"HackWorld - My world, your world\" rel=\"external\">HackWorld</a> &amp; <a href=\"http://www.gmcode.it/\" title=\"GMCode - Gianluigi 'A35G' in the net\" rel=\"external\">GMCode.it</a>
			</span>
		</div>
	</form>
	</center>";