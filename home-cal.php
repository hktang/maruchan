<div id="home-cal-div">

<?php
	date_default_timezone_set('Asia/Tokyo');
	$today = date("Y-m-d");
	$ds = array( 0 => "Sun", 1 => "Mon",  2 => "Tue", 3 => "Wed", 4 => "Thu", 5 => "Fri", 6 => "Sat" );
	$dow = jddayofweek ( cal_to_jd(CAL_GREGORIAN, substr($today, 5, 2), substr($today, 8,2), substr($today, 0, 4)) , 0 ); 
	$days_back = 365;
 	$i = $days_back; 

	while ($i > 0)
 	{
		$new_dow = intval($dow) - $i; 
		if ($new_dow % 7 < 0) 
		  {
			$new_dow = 7 - (abs($new_dow) % 7);
		  }else if ($new_dow % 7 == 0)
		  {
			$new_dow = 0;
		  }

        if ($new_dow == 0 || $i == $days_back ){ ?>
			<div class="cal-week">
		<?php } ?>
			<div class="cal-day-box <?php echo "cal-" . $ds[$new_dow]; ?>" id="<?php echo date( 'Y-m-d', strtotime( $today . "-{$i} day" ) ); $i--; ?>"></div>
		<?php if ($new_dow == 6){ ?>
			</div><!-- .cal-week -->
		<?php } 
	} ?>
	<?php if ($dow == 0){ ?>
		<div class="cal-week">
	<?php } ?>
		<div class="cal-day-box <?php echo "cal-" . $ds[$dow]; ?>" id="<?php echo $today; ?> cal-day-today"></div>
	  </div><!-- .cal-week -->
	</div><!-- #home-cal-div -- >