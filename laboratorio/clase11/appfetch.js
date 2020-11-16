const ol = document.querySelector(".ol");
const btnTraer = document.getElementById("btnTraer");
const spinner = document.getElementById("spinner");

btnTraer.addEventListener("click", (e)=>{
    spinner.appendChild(crearSpinner());
    fetch("https://jsonplaceholder.typicode.com/users")
    .then((res)=>{
        return (!res.ok)? Promise.reject(res): res.json();
    })
    .then((data)=>{
        ol.appendChild(crearItems(data))
    })
    .catch((err)=>{
        console.warn('Error');
    })
    .finally(()=>{
        spinner.innerHTML = "";
    })
});


function traerPersonas(){
    ol.innerHTML = "";
    spinner.appendChild(crearSpiner());

    fetch("http://localhost:3000/personas")
    .then(res=>{
        if(!res.ok) return Promise.reject(res);
        return res.json();
    })
    .then(data=>{
        ol.appendChild(crearItem(data));
        console.log("Persona obtenida con exito");

    })
    .catch(err=>{
        console.error(err.status);
    })
    .finally(()=>{
        spinner.innerHTML = '';
    }
    );
}


function altaPersona(){
    let nuevaPersona = {
        'nombre': "Juana",
        "apellido": "Gomez",
        "email": "jgomez@utn.com"
    }
    
    
    ol.innerHTML = "";
    spinner.appendChild(crearSpiner());

    const config = {
        method: "POST",
        headers: {
            "Content-type": "application/json;charset=utf-8"
        },
        body:JSON.stringify(nuevaPersona)
    }
    fetch("http://localhost:3000/personas", config)
    .then(res=>{
        if(!res.ok) return Promise.reject(res);
        return res.json();
    })
    .then(personaAgregada=>{
        console.log(personaAgregada);
        traerPersonas();

    })
    .catch(err=>{
        console.error(err.status);
    })
    .finally(()=>{
        spinner.innerHTML = '';
    }
    );
}


function modificarPersona(){
    let personaAModificar = {
        'id': 22,
        'nombre': "Juana",
        "apellido": "Gomez",
        "email": "jgomez@utn.com"
    }
    let id = p.id;

    delete(p.id);
    
    
    ol.innerHTML = "";
    spinner.appendChild(crearSpiner());

    const config = {
        method: "PUT",
        headers: {
            "Content-type": "application/json;charset=utf-8"
        },
        body:JSON.stringify(nuevaPersona)
    }
    fetch("http://localhost:3000/personas"+id, config)
    .then(res=>{
        if(!res.ok) return Promise.reject(res);
        return res.json();
    })
    .then(personaAgregada=>{
        console.log(personaAgregada);
        traerPersonas();

    })
    .catch(err=>{
        console.error(err.status);
    })
    .finally(()=>{
        spinner.innerHTML = '';
    }
    );
}

function bajaPersona(){
    let personaAModificar = {
        'id': 22,
        'nombre': "Juana",
        "apellido": "Gomez",
        "email": "jgomez@utn.com"
    }
 
    ol.innerHTML = "";
    spinner.appendChild(crearSpiner());

    const config = {
        method: "DELETE",
        headers: {
            "Content-type": "application/json;charset=utf-8"
        }
    }
    fetch("http://localhost:3000/personas"+p.id, config)
    .then(res=>{
        if(!res.ok) return Promise.reject(res);
        return res.json();
    })
    .then(persona=>{
        console.log(persona);
        traerPersonas();

    })
    .catch(err=>{
        console.error(err.status);
    })
    .finally(()=>{
        spinner.innerHTML = '';
    }
    );
}







    //     const xhr = new XMLHttpRequest();

//     spinner.appendChild(crearSpinner());
//     xhr.addEventListener('readystatechange', ()=>{
//         if(xhr.readyState == 4){
//             if(xhr.status >= 200 && xhr.status < 300){
//                 let datos = JSON.parse(xhr.responseText);
//                 console.log(datos);
//                 ol.appendChild(crearItems(datos));
//             }else{
//                 console.error("Error: " + xhr.status + ' - '+ xhr.statusText);
//             }
//             spinner.innerHTML = "";
//         }
//     })
//     xhr.open('GET', "https://jsonplaceholder.typicode.com/users");
//     xhr.send();
// });

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