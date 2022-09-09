let data = [
    {
        "address_id": "1",
        "area": "Chinchwad",
        "city": "Pune",
        "state": "Maharashtra"
    },
    {
        "address_id": "2",
        "area": "Pimpri",
        "city": "Pune",
        "state": "Maharashtra"
    },
    {
        "address_id": "3",
        "area": "Wakad",
        "city": "Pune",
        "state": "Maharashtra"
    },
    {
        "address_id": "4",
        "area": "Andheri",
        "city": "Mumbai",
        "state": "Maharashtra"
    },
    {
        "address_id": "5",
        "area": "Bandra",
        "city": "Mumbai",
        "state": "Maharashtra"
    },
    {
        "address_id": "6",
        "area": "Colaba",
        "city": "Mumbai",
        "state": "Maharashtra"
    },
    {
        "address_id": "7",
        "area": "Air Force Area",
        "city": "Jodhpur",
        "state": "Rajasthan"
    },
    {
        "address_id": "8",
        "area": "Adarsh Nagar",
        "city": "Jodhpur",
        "state": "Rajasthan"
    },
    {
        "address_id": "9",
        "area": "Ajit Colony",
        "city": "Jodhpur",
        "state": "Rajasthan"
    }
]


let stateInput = document.getElementById("inputState")
let cityInput = document.getElementById("inputCity");
let areaInput = document.getElementById("inputArea");

if (stateInput) {
    stateInput.addEventListener("change", (event) => {
        console.log(event.target.value);
        displayCities(event.target.value);
    })

}

if(cityInput) {
    cityInput.addEventListener("change", (event) => {
        console.log(event.target.value);
        displayAreas(event.target.value);
    })
}

const displayCities = (state) => {
    console.log("displaycities", state)
    let cities = [];
    data.forEach(element => {
        if (element.state === state) {
            cities.push(element.city);
        }
    });

    cities = [...new Set(cities)];
    console.log(cities)
    cities.forEach(element => {

        let node = document.createElement("option");
        node.value = element;
        node.innerHTML = element;

        cityInput.appendChild(node);

    })

}


const displayAreas= (city) => {
    console.log("displayareas", city)
    let areas = [];
    data.forEach(element => {
        if (element.city === city) {
            areas.push(element.area);
        }
    });

    areas = [...new Set(areas)];
    console.log(areas)
    areas.forEach(element => {

        let node = document.createElement("option");
        node.value = element;
        node.innerHTML = element;

        areaInput.appendChild(node);

    })

}
