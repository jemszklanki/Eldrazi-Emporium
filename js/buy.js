const comboBox = document.getElementById("ship");
const street = document.getElementById("stret");
const number = document.getElementById("numb");
const submut = document.getElementById("but");

comboBox.addEventListener("input", ()=>{
    if(comboBox.value == "3")
    {
        street.classList.add("hidden");
        number.classList.add("hidden");
    } else {
        street.classList.remove("hidden");
        number.classList.remove("hidden");
    }
})