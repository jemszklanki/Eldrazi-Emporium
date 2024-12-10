const ajaxRet = document.getElementById("ajax-ret");

function getOrders() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            ajaxRet.innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET", "user_orders.php", true);
    xmlhttp.send();
}


getOrders();