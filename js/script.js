function checkAll(ele) {
    var checkboxes = document.getElementsByTagName('input');
    console.log(0);
    console.log(ele.id);
    if (ele.checked) {
        for (var i = 0; i < checkboxes.length; i++) {
          if((ele.id - 1) * 8 == i) {
            let j = 0;
            var getTime = new Date();
            var currentTime = Math.abs(getTime.getHours() - 12) + ":"
                          + getTime.getMinutes() + ":"
                          + getTime.getSeconds();

            document.getElementById('time' + ele.id).innerHTML = currentTime;

            while (j !=8) {
              checkboxes[i].checked = true;
              i++;
              j++;
            }
          }

        }
    } else {
        for (var i = 0; i < checkboxes.length; i++) {
          if((ele.id - 1) * 8 == i) {
            let j = 0;
            if(j == 0) {
              document.getElementById('time' + ele.id).innerHTML = "-";
            }
            while (j !=8) {
                checkboxes[i].checked = false;
                i++;
                j++;
            }
          }
        }
    }
}
