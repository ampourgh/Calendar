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

      echo '<div class="month">'
        . '<ul>'
        . '<li class="prev">&#10094;</li>'
        .  '<li class="next">&#10095;</li>'
        .  '<li>' . date("F Y")
        .  '<br>'
        .  '<span style="font-size:18px">'
        . date("l jS ") . "<br>" . '</span></li>'
        . '</ul>'
        . '</div>';

      // Lists the days within the week

      $daysArray = array('Mon', 'Tue', 'Wen', 'Thu', 'Fri', 'Sat', 'Sun');

      echo '<ul class="weekdays">';
      foreach($daysArray as $day) {
        echo '<li>' . $day . '</li>';
      }

      echo '</ul>';

      $timestamp = strtotime(date('Y-m-01'));

      $firstDay = date('D', $timestamp);

      // Lists the days within the current month
      echo '<form action="" method="POST">';
        echo '<ul class="days">';
        $j = 0;
        for ($i=1; $i < (cal_days_in_month(CAL_GREGORIAN, date("m"), date("Y")) + 1); $i++) {
          if($firstDay != $daysArray[$j]) {
            echo '<li></li>';
            $i--;
            $j++;

          }
          else {
            if($i == date("j")) {
              echo '<li><span class="active">'
              . $i. '</span>' . '<br>'
              . '<input id="checkBox" type="checkbox">' . '<br>'
              . '<input id="checkBox" type="checkbox">' . '<br>'
              . '<input id="checkBox" type="checkbox">' . '<br>'
              . '<input id="checkBox" type="checkbox">' . '<br>'
              . '<input id="checkBox" type="checkbox">' . '<br>'
              . '<input id="checkBox" type="checkbox">' . '<br>'
              . '<input id="checkBox" type="checkbox">' . '<br>'
              . '</li>';
            }
            else {
              echo '<li>'
                    . $i . '<br>'
                    . '<input id="checkBox" type="checkbox">' . '<br>'
                    . '<input id="checkBox" type="checkbox">' . '<br>'
                    . '<input id="checkBox" type="checkbox">' . '<br>'
                    . '<input id="checkBox" type="checkbox">' . '<br>'
                    . '<input id="checkBox" type="checkbox">' . '<br>'
                    . '<input id="checkBox" type="checkbox">' . '<br>'
                    . '<input id="checkBox" type="checkbox">' . '<br>'
                    .'</li>';
            }
          }
        }
        echo '</ul>';
        echo '<input type="submit" value="Submit">';
      echo '</form>';

      if(isset($_POST['click']))
      {
          $date_clicked = date('Y-m-d H:i:s');;
          echo "Time the button was clicked: " . $date_clicked . "<br>";
      }
    ?>
  </body>
</body>
