const ajaxRet = document.getElementById("ajax-ret");

function getForm(n){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            ajaxRet.innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET", "universal_admin_form.php?n=" + n, true);
    xmlhttp.send();
}

function getForm(n, index){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            ajaxRet.innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET", "universal_admin_form.php?n=" + n + "&index=" + index, true);
    xmlhttp.send();
}

//  Jesli chcemy zrobic **WSZYSTKO** ajaxem, trzeba dodac do tego overload ale I can't be fucked to do that rn
//  Alternatywnie trzymać to w sesji
function doQuery(n, index){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open("GET", "universal_query_switch.php?n=" + n + "&index=" + index, true);
    xmlhttp.send();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var xmlhttp2 = new XMLHttpRequest();
            xmlhttp2.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    ajaxRet.innerHTML = this.responseText;
                }
            };
            red = (n-(n%10))/10;
            xmlhttp2.open("GET", "universal_admin_form.php?n=" + red + "&index=" + index, true);
            xmlhttp2.send();
        }
    };
    xmlhttp.open("GET", "universal_query_switch.php?n=" + n + "&index=" + index, true);
    xmlhttp.send();
}

function formToSession(n){
    switch(n){
        //  Ambitny pomysł żeby cały panel był AJAXem, wtedy potrzebny jest ten wariat żeby ustawiać
        //  w sesji wartości z formów, jak coś to skrypty od tego rób w folderze 'misc'
    }
}

getForm(1); //  Default to form z kartami
