<div id="home-cal-div">
<?php
	date_default_timezone_set('Asia/Tokyo');
	$ds = array( 0 => "Sun", 1 => "Mon",  2 => "Tue", 3 => "Wed", 4 => "Thu", 5 => "Fri", 6 => "Sat" );
	$ms = array( 0 => "Feb", 1 => "Mar",  2 => "Apr", 3 => "May", 4 => "Jun", 5 => "Jul", 6 => "Aug", 7 => "Sep", 8 => "Oct", 9=> "Nov", 10 => "Dec" );
	$i = 380;

	function get_cal_extra ($no_of_days_before)
	{
		$today = date("Y-m-d"); 
		$dow = jddayofweek ( cal_to_jd(CAL_GREGORIAN, substr($today, 5, 2), substr($today, 8,2), substr($today, 0, 4)) , 0 ); 
		$new_date = date( 'Y-m-d', strtotime( $today . "-{$no_of_days_before} day" ));
		$new_dow = intval($dow) - $no_of_days_before; 
		
		if ($new_dow % 7 < 0) 
		{
			$new_dow = 7 - (abs($new_dow) % 7);
		}else if ($new_dow % 7 == 0)
		{
			$new_dow = 0;
		}
		
		return array
		(
			"today" 	=> $today, 
			"dow"   	=> $dow,
			"then_date"	=> $new_date,
			"then_dow"	=> $new_dow
		);
	}
	
	
	$cal_i_extra = get_cal_extra($i);
	
	//make the first day to start at Sunday
	while ( $cal_i_extra['then_dow'] != 0 ) {
		$cal_i_extra = get_cal_extra($i-1);
		$i--; 
	}
	
	//create the cal belt
	while ($i > 0){
		
		$new_i_extra = get_cal_extra($i);
		
		//wrap week
		if($new_i_extra['then_dow'] == 0 ){ ?>
			<div class="cal-week">
		<?php } ?>
			<div data-toggle="tooltip" title="<?php echo $new_i_extra['then_date']; ?>" class="cal-day-box <?php echo "cal-" . $ds[$new_i_extra['then_dow']]; ?>" id="<?php echo $new_i_extra['then_date']; $i--; ?>"></div>
		<?php
			//add month label, and for Jan, add year label
			if (substr($new_i_extra['then_date'], 8) == '01' && substr($new_i_extra['then_date'], 5) == '01-01'){ ?>
				<span class="cal-month-label cal-year-label" id="cal-year-<?php echo $the_year = substr($new_i_extra['then_date'], 0, 4); ?>"><p><?php echo $the_year; ?></p></span>
			<?php }else if (substr($new_i_extra['then_date'], 8) == '01' )
				  { 
					$the_m = substr($new_i_extra['then_date'], 5, 2);
			?>
				<span class="cal-month-label" id="cal-month-<?php echo $the_month = $ms[intval($the_m)-2]; ?>"><p><?php echo $the_month; ?></p></span>
		<?php } 
	 	if ($new_i_extra['then_dow'] == 6){ ?>
			</div>
		<?php } 
	} ?>
	<?php if ($new_i_extra['dow'] == 0): ?>
		<div class="cal-week">
	<?php endif; ?>
		<div data-toggle="tooltip" title="<?php echo $new_i_extra['today']; ?>" class="cal-day-box <?php echo "cal-" . $ds[$new_i_extra['dow']]; ?> cal-day-today" id="<?php echo $new_i_extra['today']; ?>"></div>
	  </div>
</div><!-- #home-cal-div -->