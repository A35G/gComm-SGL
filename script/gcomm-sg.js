/*
	gComm - SimpleGuestbook - Light Version
	JS Core - vers. 0.1.3 - May 2014

  Copyright © 2010 - 2014 Gianluigi 'A35G'
  Developed by Gianluigi 'A35G' with love
  ------------------------------------------------
  http://www.hackworld.it/ - http://www.gmcode.it/
  ------------------------------------------------
*/

//	Empty Control Function
function empty(mixed_var) {
	return (mixed_var === "" || mixed_var === 0 || mixed_var === "0" || mixed_var === null || mixed_var === false || mixed_var === undefined || mixed_var.length === 0);
}

//	If variable is a number
function isNum(num) {
	return (!isNaN(num) && !isNaN(parseFloat(num)));
}

function roundTo(value, decimalpositions) {
	var i = (value * Math.pow(10, decimalpositions));

	i = Math.round(i);

	return (i / Math.pow(10, decimalpositions));
}

//	E-Mail Adress Validation
function isValidEmailAddress(emailAddress) {
	var pattern = new RegExp(/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i);
	return pattern.test(emailAddress);
}

String.prototype.trim = function() {
	return this.replace(/^\s\s*/, '').replace(/\s\s*$/, '');
}
//	Not cache for jQuery
jQuery.ajaxSetup({
	cache: false
});

//	Insert string between 2 tag
function doInsert(ibTag, ibClsTag, isSingle) {

	var isClose = false;
	var obj_ta = $("#mex_tag");

	if (obj_ta.isTextEdit) {

		obj_ta.focus();

		var sel = document.selection;
		var rng = sel.createRange();

		rng.colapse;

		if ((sel.type == 'Text' || sel.type == 'None') && rng != null) {

			if (ibClsTag != '' && rng.text.length > 0)
				ibTag += rng.text+ibClsTag;
			else if (isSingle)
				isClose = true;

			rng.text = ibTag;

		}

	} else {

		if (isSingle)
			isClose = true;

		obj_ta.value += ibTag;

	}

	obj_ta.focus();

	return isClose;

}


function smile(x) {
  doInsert(x, '', false);
}

//	Check form
if ($('#tag_form').length) {

	$('#tag_form').submit(function(e)) {

		e.preventDefault();

		alert('Submit');

	}

}

$(function(){
	$('a[rel="external"]').attr('target', '_blank');
})

$(document).ready(function() {



})