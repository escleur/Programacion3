$(document).ready(function() {

	//CSS selector
	var result = $('#animals > div');
	console.log(result);

	//DOM traversing
	result = $('#animals').children('div');
	console.log(result);
});