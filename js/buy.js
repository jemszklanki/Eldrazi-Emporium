const comboBox = document.getElementById("ship");
const street = document.getElementById("stret");
const number = document.getElementById("numb");
const siea = document.getElementById("eloKurwa");

comboBox.addEventListener("input", ()=>{
    if(comboBox.value == "3")
    {
        street.classList.add("hidden");
        number.classList.add("hidden");
        street.required = false;
        number.required = false;
    } else {
        street.classList.remove("hidden");
        number.classList.remove("hidden");
        street.required = true;
        number.required = true;
    }
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            siea.innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET", "queries/calc_delivery.php?id=" + comboBox.value, true);
    xmlhttp.send();
})