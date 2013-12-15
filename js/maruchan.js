jQuery(function($) {
	/*
	 * Home grid
	*/
	
	$("div.entry-thumb").each(function(){
		var ranInt = 1000+Math.random()*4000;
		$(this).fadeIn(ranInt);
	});
	
	$(window).load(function(){
		showCalBelt();
	});
	
	/*
	 * Calendar belt
	*/
	function showCalBelt() 
	{
		var dates = [];
		var maxNumOfPics = 0;
		var rgbMin = 80;
	
		$("article").each(function(){
			dates.push($(this).attr('data'));
		});
	
		//get dates of posts as an array
		var dates_obj = { };
		for(i = 0; i < dates.length; ++i) {
		    if(!dates_obj[dates[i]])
		        dates_obj[dates[i]] = 0;
		    ++dates_obj[dates[i]];
		}
	
		//get highest number of daily pics
		for (key in dates_obj)
		{	
			var numOfPics = dates_obj[key];
			if (numOfPics > maxNumOfPics)
				maxNumOfPics = numOfPics;
		}
	
		//add style to cal box with pics
		for (key in dates_obj)
		{	
			var numOfPics = dates_obj[key];
			if (numOfPics == maxNumOfPics)
				rgbVal = 255;
			else if (numOfPics == 1)
				rgbVal = rgbMin;
	 		else 
				rgbVal = rgbMin + Math.floor( (255 - rgbMin) / (maxNumOfPics - 1) ) * numOfPics;
		
			$("#"+key).css("background-color", "rgb(" + rgbVal + ", " + rgbVal + ", " + rgbVal + ")");
		}
		
		$("#home-cal-div").fadeIn(1000);
	}		
});