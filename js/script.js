// function singleCheck(ele) {
//   if (ele.checked) {
//     var otherText = document.getElementById(30);
//     otherText.style.visibility = 'visible';
//   }
// }
//
// var checkboxes = document.getElementsByTagName'input');
checkTheBoxes = (eleId, i, checkboxes) => {
  var getTime = new Date();
  var currentTime = Math.abs(getTime.getHours() - 12) + ":"
                + getTime.getMinutes() + ":"
                + getTime.getSeconds();

  document.getElementById('time' + eleId).innerHTML = currentTime;
  let j = 0;
  if (eleId == 1) {
    j += 1;
  }
  while (j != 8) {
    var otherText = document.getElementById(eleId);
    checkboxes[i].checked = true;
    i++;
    j++;
  }
  return i;
}

checkAll = (ele) => {
    var checkboxes = document.getElementsByClassName('checkBox');
    console.log(0);
    console.log(ele.id);
    if (ele.checked) {
        for (var i = 1; i < checkboxes.length; i ++) {
          if((ele.id - 1) * 8 == i) {
            checkTheBoxes(ele.id, i, checkboxes);
          } else if (i == 1 && ele.id == 1) {
            checkTheBoxes(ele.id, i, checkboxes);
          }

        }
    } else {
        for (var i = 0; i < checkboxes.length; i++) {
          if((ele.id - 1) * 8 == i) {
            let j = 0;
            if (j == 0) {
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
