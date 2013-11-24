<link rel='stylesheet' id='maruchan-style-css'  href='http://dengxiaojun.com/wp-content/themes/maruchan/style.css?ver=3.7.1' type='text/css' media='all' />

<div id="home-cal-div">

<?php
	date_default_timezone_set('Asia/Tokyo');
	$today = date("Y-m-d");
	$ds = array( 0 => "Sun", 1 => "Mon",  2 => "Tue", 3 => "Wed", 4 => "Thu", 5 => "Fri", 6 => "Sat" );
	$dow = jddayofweek ( cal_to_jd(CAL_GREGORIAN, substr($today, 5, 2), substr($today, 8,2), substr($today, 0, 4)) , 0 ); 
	$i = 365;

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
		
		if ($i == 365 ){ ?>
			<div id="cal-week-1" class="cal-week">
		<?php } else if ($new_dow == 0 ){ ?>
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