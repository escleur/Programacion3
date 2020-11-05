const ol = document.querySelector(".ol");
const btnTraer = document.getElementById("btnTraer");
const spinner = document.getElementById("spinner");

btnTraer.addEventListener("click", (e)=>{
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
    xhr.open('GET', "https://jsonplaceholder.typicode.com/users");
    xhr.send();
});

function crearSpinner{
    const img = document.createElement('img');
    img.setAttribute("src", "./../imagenes/833.gif");
    img.setAttribute("alt", "Spinner");
}

const crearItems = (data)=>{
    const fragmento = document.createDocumentFragment();
    data.foreach(element =>{
        const item = document.createElement('li');
        item.textContent = `${element.name} ${element.email}`;
    })
    fragmento.appendChild(item);
}