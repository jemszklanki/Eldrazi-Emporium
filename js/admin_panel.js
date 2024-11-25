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
