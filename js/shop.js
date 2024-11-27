const ajaxRet = document.getElementById("ajax-ret");
const nameField = document.getElementById("nazwa");

function doSearch(){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            ajaxRet.innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET", "queries/shop_filter.php?name=" + nameField.value, true);
    xmlhttp.send();
}
