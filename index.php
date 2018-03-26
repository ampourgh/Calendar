<?php
  /*
    CALENDAR APP
  */

  // Day of the week and day of the month
  // Month and year

  echo date("l jS ") . "<br>";
  echo date("F Y"). "<br>";

  // Lists the days within the week

  $daysArray = array('Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa', 'Su');

  echo '<ul class="weekdays">';
  foreach($daysArray as $day) {
    echo '<li>' . $day . '</li>';
  }

  echo '</ul>';

  // Lists the days within the current month

  echo '<ul class="days">';
  for ($i=1; $i < (cal_days_in_month(CAL_GREGORIAN, date("m"), date("Y")) + 1); $i++) {
    if($i == date("j")) {
      echo '<li><span class="active"><mark>' . $i . '</mark></span></li>';
    }
    else {
      echo '<li>' . $i . '</li>';
    }
  }
  echo '</ul>';

?>
