function checkForm() {
    const form = document.forms["updateCity"];

    // // clear any previous warnings
    // document.getElementById("nameWarning").innerHTML = "";
    // document.getElementById("districtWarning").innerHTML = "";
    // document.getElementById("populationWarning").innerHTML = "";
    // document.getElementById("countryWarning").innerHTML = "";

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
    // check if a country is selected
    if (form.country.selectedIndex == 0) {
        document.getElementById("countryWarning").innerHTML = "<p style='color: red;'>You must select a Country</p>";
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
