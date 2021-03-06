const ol = document.querySelector(".ol");
const btnTraer = document.getElementById("btnTraer");
const spinner = document.getElementById("spinner");

btnTraer.addEventListener("click", (e)=>{

    traerPersonas();
});



const traerPersonas = async ()=>{
    spinner.appendChild(crearSpinner());
    ol.innerHTML = "";
    try{
        let res = await fetch("https://jsonplaceholder.typicode.com/users");
        
        if(!res.ok){
            let mensaje = res.statusText || "Se produjo error";
            throw Error(mensaje);
        }
        let data = await res.json();
        ol.appendChild(crearItems(data));
    }catch(err){
        
        console.error(err);
    }
    finally(){
        spinner.innerHTML = "";
    }
}




//     spinner.appendChild(crearSpinner());
//     fetch("https://jsonplaceholder.typicode.com/users")
//     .then((res)=>{
//         return (!res.ok)? Promise.reject(res): res.json();
//     })
//     .then((data)=>{
//         ol.appendChild(crearItems(data))
//     })
//     .catch((err)=>{
//         console.warn('Error');
//     })
//     .finally(()=>{
//         spinner.innerHTML = "";
//     })
// });













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