document.addEventListener('DOMContentLoaded',function(){
    
    const mapEZero = 14.07, //X-axis
    mapNZero = 54.90, //Y-axis
    mapEFull = 24.27,//X-axis
    mapNFull = 49.00 //Y-axis

    const degN = 950/Math.abs(mapNZero - mapNFull),
    degE = 1000/Math.abs(mapEZero - mapEFull);


    console.log(voivodeships.length)

    const pointRadius = 5;
    const textXModifier = 10;
    const textYModifier = 40;

    const mapSize = document.querySelector(".mapSize");
    const mapSizeValue = document.querySelector(".mapSizeValue");

    mapSize.value = 100;
    mapSizeValue.innerText = "600 px";

    mapSize.addEventListener("change",function() {
        document.querySelector(".mapContainer").style.width = Math.round(mapSize.value/100 * 600) +"px";
        document.querySelector(".mapContainer").style.height = Math.round(mapSize.value/100 * 600) +"px";
        mapSizeValue.innerText = Math.round(mapSize.value/100 * 600) +"px";
    });

    search.addEventListener("keyup",function(){
        checkboxArray = voivodeships.filter(function(e){
            if (e.name.toLowerCase().indexOf(search.value.toLowerCase()) >= 0) {
                return e;
            }
        });
        if (checkboxArray.length === 0 && search.value === "") {
            checkboxArray = voivodeships;
            console.log(checkboxArray)
        }
        populateCheckboxes(checkboxArray);
    })

    function populateCheckboxes(array){
        selectvoivodeships.innerHTML = "";
        array.forEach(function(element) {
            let newCheckbox = document.createElement("input");
            let newLabel = document.createElement("label");
            newLabel.innerText = element.name
            newCheckbox.setAttribute("value",element.name);
            newCheckbox.setAttribute("type","checkbox");
            newCheckbox.checked = element.active;
            newLabel.appendChild(newCheckbox)
            selectvoivodeships.appendChild(newLabel);
        });
    }
    
    selectvoivodeships.addEventListener("click", function(e){
        if (e.target.localName === "input") {
            voivodeships.forEach( function(element) { 
                if (element.name === e.target.value){ 
                    element.active = e.target.checked;
                } 

            })
            generatevoivodeships();
        }
    })

    function generatevoivodeships() {
        document.querySelector(".circles").innerHTML = "";
        voivodeships.forEach(function(element) {
            if (element.active) {
                let x = Math.round((Math.abs(element.E - mapEZero) * degE)*100)/100;
                let y = Math.round((Math.abs(element.N - mapNZero) * degN)*100)/100;
                let newCircle = document.createElementNS("http://www.w3.org/2000/svg", "circle");
                newCircle.setAttribute("class","city"); //Its for IE...
                newCircle.setAttribute("name",element.name);
                newCircle.setAttribute("cx",x);
                newCircle.setAttribute("cy",y);
                newCircle.setAttribute("r",pointRadius);

                let newText = document.createElementNS("http://www.w3.org/2000/svg", "text");
                newText.textContent = element.name;
                newText.setAttribute("x",x - textXModifier);
                newText.setAttribute("y",y + textYModifier);

                document.querySelector(".circles").appendChild(newCircle);
                document.querySelector(".circles").appendChild(newText);
            }
        });
    }
    populateCheckboxes(voivodeships);
});