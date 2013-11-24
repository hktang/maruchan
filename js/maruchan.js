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
	
	console.log(dates_obj);
});