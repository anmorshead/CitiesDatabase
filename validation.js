function checkForm() {
    const form = document.forms["updateCity"];

    // check if Name is empty or doesn't start with a capital letter
    if (form.Name.value.length == 0 || !checkCapitalLetter(form.Name.value)) {
        document.getElementById("nameWarning").innerHTML = "<p style='color: red;'>Cannot be blank, must start with Capital Letter</p>";
        return false;
    }
    // check if District is empty or doesn't start with a capital letter
    if (form.District.value.length == 0 || !checkCapitalLetter(form.District.value)) {
        document.getElementById("districtWarning").innerHTML = "<p style='color: red;'>Cannot be blank, must start with Capital Letter</p>";
        return false;
    }
    // check if Population is empty
    if (form.Population.value.length == 0 || !checkNumber(form.Population.value)){
        document.getElementById("populationWarning").innerHTML = "<p style='color: red;'>Cannot be blank, must be a number</p>";
        return false;
    }
    // check if a country is selected (not really necessary as you can't select 0 but..)
    if (form.country.selectedIndex == 0) {
        return false;
    }
    // validations passed
    return true;

}

function checkCapitalLetter(input) {
    const pattern = /^[A-Z]/;
    return pattern.test(input)
}

function checkNumber(input){
    const pattern = /^\d+$/;
    return pattern.test(input)
}
