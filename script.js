let data = [];

for (let i = 0; i < states.length; i++) {
    data.push({
        "state": states[i],
        "city": cities[i],
        "area": areas[i]
    })
}


const stateInput = document.getElementById("inputState")
const cityInput = document.getElementById("inputCity");
const areaInput = document.getElementById("inputArea");
const submitButton = document.getElementById("submitButton");
const nameInput = document.getElementById("inputName4");
const emailInput = document.getElementById("inputEmail4");
const userInput = document.getElementById("inputUsername4");
const pwdInput = document.getElementById("inputPassword4");

submitButton.disabled = true;

if (stateInput) {
    stateInput.addEventListener("change", (event) => {
        displayCities(event.target.value);
        if (areaInput.value == 'NULL') {
            submitButton.disabled = true;
        }
    })

}

if (cityInput) {
    cityInput.addEventListener("change", (event) => {
        displayAreas(event.target.value);
        if (areaInput.value == 'NULL') {
            submitButton.disabled = true;
        }
    })

}

if (areaInput) {
    areaInput.addEventListener("change", (event) => {
        if (areaInput.value == 'NULL') {
            submitButton.disabled = true;
        }
    })
}

const displayCities = (state) => {
    let cities = [];

    data.forEach(element => {
        if (element.state === state) {
            cities.push(element.city);
        }
    });

    cities = [...new Set(cities)];

    cityInput.innerHTML = "<option value='NULL' selected disabled>Choose...</option>";

    cities.forEach(element => {

        let node = document.createElement("option");
        node.value = element;
        node.innerHTML = element;

        cityInput.appendChild(node);

    })

}

const displayAreas = (city) => {
    let areas = [];
    data.forEach(element => {
        if (element.city === city) {
            areas.push(element.area);
        }
    });

    areaInput.innerHTML = "<option value='NULL' selected disabled>Choose...</option>";
    areas = [...new Set(areas)];
    areas.forEach(element => {

        let node = document.createElement("option");
        node.value = element;
        node.innerHTML = element;

        areaInput.appendChild(node);

    })
}

if (areaInput) {
    areaInput.addEventListener("change", (event) => {
        submitButton.disabled = false;
    })
}







