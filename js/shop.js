const ajaxRet = document.getElementById("ajax-ret");

const nameField = document.getElementById("nazwa");
const expansionField = document.getElementById("dodatek");
const languageField = document.getElementById("jezyk");
const conditionField = document.getElementById("stan");
const foilField = document.getElementById("foil");

const previewImage = document.getElementById('preview');

function doSearch(){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            ajaxRet.innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET", "queries/shop_filter.php?name=" + nameField.value + "&expansion=" + expansionField.value + "&lang=" + languageField.value  + "&condition=" + conditionField.value + "&foil=" + foilField.value, true);
    xmlhttp.send();
}


function showPreview(imageSrc, event) {
    previewImage.src = "img/"+imageSrc+".jpg";  //  JAK BEDZIE WIECEJ OBRAZKOW TO ZMIEN ROZSZERZENIE, JPG SSIE !!!!! :-}
    const cursorX = event.pageX;
    const cursorY = event.pageY;
    previewImage.style.left = `${cursorX + 10}px`;
    previewImage.style.top = `${cursorY - 210}px`;
    previewImage.style.display = 'block';
}
  
function hidePreview() {
    previewImage.style.display = 'none';
}

function previewError() {
    previewImage.src = "img/no_preview.png";
}

function addToCart(itemName, quantity) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open("GET", "queries/add_cart.php?itemName=" + itemName + "&quantity=" + quantity, true);
    xmlhttp.send();
}

function removeFromCart(itemName) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            location.reload();
        }
    };
    xmlhttp.open("GET", "queries/remove_cart.php?itemName=" + itemName, true);
    xmlhttp.send();
}