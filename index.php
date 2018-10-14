<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="utf-8">
      <title>Calendar</title>
      <link rel="stylesheet" href="css/styles.css?14324244437">
  </head>
  <body>

    <?php

      if (isset($_POST['SAVE'])) {
          echo '<div class="modal-wrapper">
                  <div class="modal">
                    <div class="head">
                      <a class="btn-close trigger" href="javascript:;"></a>
                    </div>
                    <div class="content">
                      <p style="padding-left: 12%;">Your posts on the Calendar has been submitted!</p>
                    </div>
                  </div>
                </div>';
      }



      echo '<div class="navbar" id="navbar">
            <a href="#home">start date:</a>
            <select>';

      for ($options=1; $options < (cal_days_in_month(CAL_GREGORIAN, date("m"), date("Y")) + 1); $options++) {
        echo '<option value="' . $options . '">' . date("F") . '/' . $options . '/' . date("Y") . '</option>';
      }

      echo '</select>'
           . ' - '
           . '<a href="#home">end date:</a>'
           . '<select>';

     for ($options=1; $options < (cal_days_in_month(CAL_GREGORIAN, date("m"), date("Y")) + 1); $options++) {
       echo '<option value="' . $options . '">' . date("F") . '/' . $options . '/' . date("Y") . '</option>';
     }

     echo '</select>'
          . '</div>';

      /*
        CALENDAR APP
      */

      date_default_timezone_set('America/Chicago');

      function timeExplain($hour, $meridiem) {
        if($meridiem == 'AM') {
          return 'Good morning!';
        }
        else {
          if($hour < '4') {
            return 'good afternoon';
          }
          else {
            return 'good evening';
          }
        }
      }
      $goodDay = timeExplain(date('h'), date('A'));

      // Day of the week and day of the month
      // Month and year
      echo '<div class="month">
              <ul>
                <li class="prev">&#10094;</li>
                <li class="next">&#10095;</li>
                <li>' . $goodDay . ', Emerson!
                <br>
                <span style="font-size:18px; background: rgba(217, 67, 86, 1);">'
                . date("l F jS Y") . '<br></span>
                </li>
             </ul>
           </div>';

      // Lists the days within the week

      $daysArray = array('Mon', 'Tue', 'Wen', 'Thu', 'Fri', 'Sat', 'Sun');

      echo '<ul class="weekdays" style="margin: 0 4%;">';
      foreach($daysArray as $day) {
        echo '<li>' . $day . '</li>';
      }
      echo '</ul>';

      echo '<form action="./index.php">';

      $timestamp = strtotime(date('Y-m-01'));

      $firstDay = date('D', $timestamp);

        // Lists the days within the current month
        echo '<ul class="days" style="text-align: center;">';
        $j = 0;
        $h = 10;
        for ($i=1; $i < (cal_days_in_month(CAL_GREGORIAN, date("m"), date("Y")) + 1); $i++) {
          if($firstDay != $daysArray[$j]) {
            echo '<li></li>';
            $i--;
            $j++;

          }
          else {

            echo '<li ';

            if ($i == (cal_days_in_month(CAL_GREGORIAN, date("m"), date("Y")))
                || $i % 7 == 0) {
              echo 'class="day-border"';
            }

            echo ' style="text-align: left;"><div class="';

            if($i == date("j")) {
                echo 'active" style="margin-left: 10px;">';
            } else {
                echo 'not-active" style="margin-left: 10px;">';
            }

            echo $i . '</div><br><br>'
                  . '<div class="not-center"><th><INPUT type="checkbox" class="checkBox not-center" id="' . $i . '" onchange="checkAll(this)" name="chk[]" /> </th>
                  <b>ALL</b>
                  <p id="time' . $i . '"> - </p></div><br>
                  <div style="margin-left: 10px;background: #dedfe0;"><input id="' . ($h + '0') . '" onchange="showTextBox(this)" class="checkBox" type="checkbox"><input type="text" placeholder="Task #1" style="visibility: hidden;" class="textBox"><br></div>
                  <div style="margin-left: 10px;"><input id="' . ($h + '1') . '" onchange="showTextBox(this)" class="checkBox" type="checkbox"><input type="text" placeholder="Task #2" style="visibility: hidden;" class="textBox"><br></div>
                  <div style="margin-left: 10px;background: #dedfe0;"><input id="' . ($h + '2') . '" onchange="showTextBox(this)" class="checkBox" type="checkbox"><input type="text" placeholder="Task #3" style="visibility: hidden;" class="textBox"><br></div>
                  <div style="margin-left: 10px;"><input id="' . ($h + '3') . '" onchange="showTextBox(this)" class="checkBox" type="checkbox"><input type="text" placeholder="Task #4" style="visibility: hidden;" class="textBox"><br></div>
                  <div style="margin-left: 10px;background: #dedfe0;"><input id="' . ($h + '4') . '" onchange="showTextBox(this)" class="checkBox" type="checkbox"><input type="text" placeholder="Task #5" style="visibility: hidden;" class="textBox"><br></div>
                  <div style="margin-left: 10px;"><input id="' . ($h + '5') . '" onchange="showTextBox(this)" class="checkBox" type="checkbox"><input type="text" placeholder="Task #6" style="visibility: hidden;" class="textBox"><br></div>
                  <div style="margin-left: 10px;background: #dedfe0;"><input id="' . ($h + '6') . '" onchange="showTextBox(this)" class="checkBox" type="checkbox"><input type="text" placeholder="Task #7" style="visibility: hidden;" class="textBox"><br></div>
                  </li>';

              if ($i % 7 == 0) {
                echo '<br><hr><br>';
              }

              $h = $h + 10;

          }
        }

        echo '</ul>
          <div class="page-wrapper">
            <input type="submit" value="SAVE" class="btn trigger">
          </div>
        </form>';

    ?>
  </body>
<script src="./js/jquery-3.3.1.js"></script>
<script src="./js/script.js"></script>
<script src="./js/navbar-scroll.js"></script>
<script src="./js/modal.js"></script>
</html>
