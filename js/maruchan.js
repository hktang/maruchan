/*
 * Created with love and passion by Maruchan's papachan
*/

jQuery(function($) {
	var dates = [];
	
	$("article").each(function(){
		dates.push($(this).attr('data'));
	});
	
	var dates_obj = { };
	for(i = 0; i < dates.length; ++i) {
	    if(!dates_obj[dates[i]])
	        dates_obj[dates[i]] = 0;
	    ++dates_obj[dates[i]];
	}
	
	for (key in dates_obj)
	{
		$("div#"+key).addClass("pics-" + dates_obj[key]);
		console.log(key);
	}
	
	$("#2013-11-01").data("num-of-pics", '99');
});