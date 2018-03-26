<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="utf-8">
      <title>Calendar</title>
      <link rel="stylesheet" href="css/styles.css">
  </head>
  <body>
    <?php
      /*
        CALENDAR APP
      */

      // Day of the week and day of the month
      // Month and year
      echo date("l jS ") . "<br>";
      echo date("F Y") . "<br>";

      // Lists the days within the week

      $daysArray = array('Mon', 'Tue', 'Wen', 'Thu', 'Fri', 'Sat', 'Su');

      echo '<ul class="weekdays">';
      foreach($daysArray as $day) {
        echo '<li>' . $day . '</li>';
      }

      echo '</ul>';

      $timestamp = strtotime(date('Y-m-01'));

      $firstDay = date('D', $timestamp);

      // Lists the days within the current month

      echo '<ul class="days">';
      $j = 0;
      for ($i=1; $i < (cal_days_in_month(CAL_GREGORIAN, date("m"), date("Y")) + 1); $i++) {
        if($firstDay != $daysArray[$j]) {
          echo '<li><input id="checkBox" type="checkbox"></li>';
          $i--;
          $j++;

        }
        else {
          if($i == date("j")) {
            echo '<li><span class="active">' . $i . '<input id="checkBox" type="checkbox"></span></li>';
          }
          else {
            echo '<li>' . $i . '<input id="checkBox" type="checkbox"></li>';
          }
        }
      }
      echo '</ul>';
    ?>
  </body>
</body>
