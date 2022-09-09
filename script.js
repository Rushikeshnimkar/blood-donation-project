let data = [];

for(let i = 0; i < states.length; i++) {
    data.push({
        "state": states[i],
        "city": cities[i],
        "area": areas[i]
    })
}




let stateInput = document.getElementById("inputState")
let cityInput = document.getElementById("inputCity");
let areaInput = document.getElementById("inputArea");

if (stateInput) {
    stateInput.addEventListener("change", (event) => {
        displayCities(event.target.value);
    })

}

if(cityInput) {
    cityInput.addEventListener("change", (event) => {
        displayAreas(event.target.value);
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
    cities.forEach(element => {

        let node = document.createElement("option");
        node.value = element;
        node.innerHTML = element;

        cityInput.appendChild(node);

    })

}


const displayAreas= (city) => {
    let areas = [];
    data.forEach(element => {
        if (element.city === city) {
            areas.push(element.area);
        }
    });

    areas = [...new Set(areas)];
    areas.forEach(element => {

        let node = document.createElement("option");
        node.value = element;
        node.innerHTML = element;

        areaInput.appendChild(node);

    })

}   