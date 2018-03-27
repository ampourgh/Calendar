function checkAll(ele) {
    var checkboxes = document.getElementsByTagName('input');
    console.log(0);
    console.log(ele.id);
    if (ele.checked) {
        for (var i = 0; i < checkboxes.length; i++) {
          if((ele.id - 1) * 8 == i) {
            let j = 0;
            while (j !=8) {
                checkboxes[i].checked = true;
                i++;
                j++;
            }
          }

        }
    } else {
        for (var i = 0; i < checkboxes.length; i++) {
            console.log(i)
            if (checkboxes[i].type == 'checkbox') {
                checkboxes[i].checked = false;
            }
        }
    }
}
