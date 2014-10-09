$(function(){
// setup select fields
// selectFields();
// dropdownFields()
// // setup minicolors
 setColorPicker();


});

/*
*	BASIC SELESCT FIELDS
*	--------------------
*
*	Compile all select options and output markup needed
*	for Premise's select functionality. This is intended
*	for basic select fields (no more than 5 options).
*/
function selectFields() {
	var div 	= $('.field .select'),
		select 	= div.find('select'),
		option 	= select.find('option'),
		ul = div.find('ul.options');
	// prepare our markup
	option.each(function(){
		var value 	 = $(this).val(),
			name 	 = $(this).text(),
			selected = $(this).attr('selected'), markup;
		// Clean up non selected options
		if(selected == null){
			selected = '';
		}
		// Our markup
		markup = '<li class="option block '+selected+'"><a href="javascript:void(0);" onclick="updateSelectField(this);" data-value="'+value+'" class="block transition">'+name+'</a></li>';
		// Insert our markup
		ul.append(markup);
	});
	// Hide select tag and call it a day
	select.hide();
}

/*
*	UPDATE BASIC SELECT FIELDS
*	--------------------------
*	
*	Update select field selection. This will update the
*	select field value.
*/
var updateselectfield;
function updateSelectField(el) {
	var ul 	= $(el).parents('.options'),
		li 	= ul.find('.option');

	if(updateselectfield == null){
		li.addClass('update').show('fast');

		updateselectfield = true;

		return false;
	}
	else{
		var value = $(el).attr('data-value'),
			newli = $(el).parent();

		li.removeClass('selected update');

		newli.addClass('selected');

		li.each(function(){
			if(!$(this).is('.selected')){
                $(this).hide('fast');
            }
            else{
                $(this).show();
            }
		});

		newli.val(value);

		updateselectfield = null;

		return false;
	}
return false;
}

function setColorPicker() {
	// Initiate minicolors plugin
	$('.color-picker').minicolors();
}

/*
*	DROPDOWN SELESCT FIELDS
*	--------------------
*
*	Desc
*/
pageload = 1;
function dropdownFields() {
	var div 	= $('.field .dropdown');
		
	div.each(function(){
		var select 	= $(this).find('select'),
			option 	= select.find('option'),
			ul = $(this).find('ul.options');
		//alert(ul.html());
		$(window).load(function(){
			// prepare our markup
			option.each(function(){
				var value 	 = $(this).val(),
					name 	 = $(this).text(),
					selected = $(this).attr('selected'), markup;
				// Clean up non selected options
				if(selected == null){
					selected = '';
				}
				// Our markup
				markup = '<li class="option block '+selected+'"><a href="javascript:void(0);" onclick="updatedropdownField(this);" data-value="'+value+'" class="block transition">'+name+'</a></li>';
				// Insert our markup
				ul.append(markup);
			});
		});

		// Hide select tag and call it a day
		select.hide();			
	});

	return false;		
}

/*
*	UPLOAD FILES
*	------------
*
*	Desc
*/
var fileHTML;
function uploadFile(el) {
	var file = $(el).siblings('input[type="file"]'),
		name = $(el).siblings('input[type="text"]'),
		parent = $(el).parents('#upload-file'),
		div = parent.find('.insert-file');

	file.trigger('click');

	file.on('change', function(){
		var f = $(this).val();

		if(f !== ''){
			name.val(f);
		}
		return false;
	});	
}

/*
*	REMOVE FILES
*	------------
*
*	Desc
*/
function removeFile(el) {
	var file = $(el).siblings('input[type="file"]'),
		name = $(el).siblings('input[type="text"]'),
		parent = $(el).parents('#upload-file'),
		div = $(el).parents('#upload-file').find('.insert-file');

	file.val('');
	name.val('');

	if(div.size() > 1){
		$(el).parents('.insert-file').remove();
	}
}

var dropdownfields;
function updatedropdownField(el) {
	var a = $(el).parents('.options').find('li'),
		v = $(el).attr('data-value');

	if(dropdownfields == null){
		a.each(function(){
			$(this).show('fast');
		});

		dropdownfields = true;

		return false;
	}	
	else{
		a.removeClass('selected');
		$(el).parent().addClass('selected');

		a.each(function(){
			if(!$(this).is('.selected')){
				$(this).hide('fast');
			}
			else{
				$(this).show();
			}
		});

		$(el).parents('.dropdown').find('select').val(v);

		dropdownfields = null;
		return false;
	}

	return false;
}

var duplicateelement, duplicateelementHTML;
function duplicateElement(el) {
	var a = $(el).attr('data-duplicate'),
		b = $(a);

	if('#timeline' == a){
		var i = b.find('.field').size() + 1;
			//html = '<div class="field"><div class="text"><input type="text" name="timeline[]" placeholder="Name"></div></div><div class="field"><div class="textarea"><textarea name="timeline_desc[]" placeholder="Explain it to your client here..."></textarea></div></div><div class="span3 float-left"><div class="field"><div class="number"><input type="number" name="timeline_number[]" placeholder="10"></div></div></div><div class="span3 float-left"><div class="field"><div class="dropdown"><ul class="options"></ul><select name="timeline_time[]"><option value="Minute(s)">Minute(s)</option><option value="Hour(s)">Hour(s)</option><option value="Day(s)" selected="selected">Day(s)</option><option value="Week(s)">Week(s)</option><option value="Month(s)">Month(s)</option><option value="Year(s)">Year(s)</option></select></div></div></div><div class="clear"></div>';

		if(duplicateelement == null){
			duplicateelementHTML = b.html();
			b.append(duplicateelementHTML);
			duplicateelement = true;
		}
		else {
			b.append(duplicateelementHTML);
		}

		return false;
	}

	return false;
}