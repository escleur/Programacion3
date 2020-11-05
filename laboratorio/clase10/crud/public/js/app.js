//json-server -d 1000--watch db.json


const ol = document.querySelector(".ol");
const btnTraer = document.getElementById("btnTraer");
const spinner = document.getElementById("spinner");

btnTraer.addEventListener("click", (e)=>{
    traerPersonas();
    altaPersona();
});

function crearSpinner(){
    const img = document.createElement('img');
    img.setAttribute("src", "./../imagenes/833.gif");
    img.setAttribute("alt", "Spinner");
}

const crearItems = (data)=>{
    const fragmento = document.createDocumentFragment();
    data.foreach(element =>{
        const item = document.createElement('li');
        item.textContent = `${element.nombre} ${element.email}`;
    })
    fragmento.appendChild(item);
}

function traerPersonas(){
    const xhr = new XMLHttpRequest();

    spinner.appendChild(crearSpinner());
    xhr.addEventListener('readystatechange', ()=>{
        if(xhr.readyState == 4){
            if(xhr.status >= 200 && xhr.status < 300){
                let datos = JSON.parse(xhr.responseText);
                console.log(datos);
                ol.appendChild(crearItems(datos));
            }else{
                console.error("Error: " + xhr.status + ' - '+ xhr.statusText);
            }
            spinner.innerHTML = "";
        }
    })
    xhr.open('GET', "http://localhost:3000/personas");
    xhr.send();
}

function altaPersona(){
    let nuevaPersona = {
        "nombre":"Juan",
        "apellido":"Perez",
        "email":"jperez@utn.com"
    }
    const xhr = new XMLHttpRequest();

    spinner.appendChild(crearSpinner());
    xhr.addEventListener('readystatechange', ()=>{
        if(xhr.readyState == 4){
            if(xhr.status >= 200 && xhr.status < 300){
                let datos = JSON.parse(xhr.responseText);
                console.log(datos);
                //ol.appendChild(crearItems(datos));
            }else{
                console.error("Error: " + xhr.status + ' - '+ xhr.statusText);
            }
            spinner.innerHTML = "";
        }
    })
    xhr.open('POST', "http://localhost:3000/personas");
    xhr.setRequestHeader("Content-type","application/json;charset=utf-8");
    xhr.send(JSON.stringify(nuevaPersona));
}


function modificarPersona(){
    let personaAModificar = {
        "nombre":"Jose",
        "apellido":"Perez",
        "email":"jperez@utn.com"
    }
    const xhr = new XMLHttpRequest();

    spinner.appendChild(crearSpinner());
    xhr.addEventListener('readystatechange', ()=>{
        if(xhr.readyState == 4){
            if(xhr.status >= 200 && xhr.status < 300){
                let datos = JSON.parse(xhr.responseText);
                console.log(datos);
                //ol.appendChild(crearItems(datos));
            }else{
                console.error("Error: " + xhr.status + ' - '+ xhr.statusText);
            }
            spinner.innerHTML = "";
        }
    })
    xhr.open('PUT', "http://localhost:3000/personas/" + 21);
    xhr.setRequestHeader("Content-type","application/json;charset=utf-8");
    xhr.send(JSON.stringify(personaAModificar));
}


function bajaPersona(){
    const xhr = new XMLHttpRequest();

    spinner.appendChild(crearSpinner());
    xhr.addEventListener('readystatechange', ()=>{
        if(xhr.readyState == 4){
            if(xhr.status >= 200 && xhr.status < 300){
                let datos = JSON.parse(xhr.responseText);
                console.log(datos);
                //ol.appendChild(crearItems(datos));
            }else{
                console.error("Error: " + xhr.status + ' - '+ xhr.statusText);
            }
            spinner.innerHTML = "";
        }
    })
    xhr.open('DELETE', "http://localhost:3000/personas/" + 21);
    xhr.setRequestHeader("Content-type","application/json;charset=utf-8");
    xhr.send();
}