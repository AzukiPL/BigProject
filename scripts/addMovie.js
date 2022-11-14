
   function isChecked() {
        const check = document.getElementsByName('addDirector');
        const add = document.getElementsByClassName('addDirector');
        const select = document.getElementsByClassName('selectDirector');

        if(check[0].checked) {

            for(i=0; i < add.length;i++) {
                add[i].style.display="table-row";
            }
            for(i=0; i < select.length;i++) {
                select[i].style.display="none";
            }
            
            
        }
        else {
            for(i=0; i < add.length;i++) {
                add[i].style.display="none";
            }
            for(i=0; i < select.length;i++) {
                select[i].style.display="table-row";
            }
        }
    }
