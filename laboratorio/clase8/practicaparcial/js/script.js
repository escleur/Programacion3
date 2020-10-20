import Persona from "./persona.js";

const btnTabla;
const listaPersonas = [];

window.addEventListener('load', inicializarManejadores);

function inicializarManejadores(){
    listaPersonas = obtenerPersonas();
    console.log(listaPersonas);
    
    divTabla = document.getElementById('divTabla');
    
    actualizarLista();
    const frmPersona = document.form[0];
    proximoId = obtenerId();
     frmPersona.addEventListener('submit', e=>{
        e.preventDefault();
        console.log(frmPersona.nombre.value);
        console.log(document.querySelector('#apellido').value);
        console.log(document.getElementById("email").value);
        console.log(frmPersona.gender.value);


        const nuevaPersona = obtenerPersona();
        if(nuevaPersona){
            listaPersonas.push(nuevaPersona);
            proximoId++;
            guardarDatos();
            actualizarLista();
        }
    })
}


function obtenerPersona(){

}

function obtenerPersonas(lista){
    return JSON.parse(localStorage.getItem('gente')) || [];


}

function obtenerId(){
    return JSON.parse(localStorage.getItem(nextId)) || 20000;
}

function altaPersona(){
    const nuevaPersona = new Persona(proximoId, frmPersona.nombre.value  . .. .);
    listaPersonas.push(nuevaPersona);
}

function guardarDatos(){
    localStorage.setItem('gente', JSON.stringify(listaPersonas));
    localStorage.setItem('nextid', proximoId);
}

function actualizarLista(){
    divTabla.innerHTML = "";

    setTimeout(() => {
        
        divTabla.innerHTML = "";
        divTabla = appendChild(crearTabla(lestaPersonas))
    }, 5000);
}


let listaPersonas = [{"id":1,"first_name":"Feliza","last_name":"Corser","email":"fcorser0@google.es","gender":"Female"},
{"id":2,"first_name":"Nial","last_name":"Barnardo","email":"nbarnardo1@wisc.edu","gender":"Male"},
{"id":3,"first_name":"Tish","last_name":"D'Costa","email":"tdcosta2@miitbeian.gov.cn","gender":"Female"},
{"id":4,"first_name":"Kiel","last_name":"Switsur","email":"kswitsur3@php.net","gender":"Male"},
{"id":5,"first_name":"Ashlin","last_name":"Corderoy","email":"acorderoy4@amazonaws.com","gender":"Male"},
{"id":6,"first_name":"Carline","last_name":"Francisco","email":"cfrancisco5@loc.gov","gender":"Female"},
{"id":7,"first_name":"Josey","last_name":"Cowl","email":"jcowl6@ycombinator.com","gender":"Female"},
{"id":8,"first_name":"Kip","last_name":"Serrier","email":"kserrier7@huffingtonpost.com","gender":"Male"},
{"id":9,"first_name":"Dillie","last_name":"Finnes","email":"dfinnes8@google.com.au","gender":"Male"},
{"id":10,"first_name":"Alain","last_name":"Daykin","email":"adaykin9@weibo.com","gender":"Male"},
{"id":11,"first_name":"Diane-marie","last_name":"Hannond","email":"dhannonda@yale.edu","gender":"Female"},
{"id":12,"first_name":"Korey","last_name":"Tuma","email":"ktumab@macromedia.com","gender":"Male"},
{"id":13,"first_name":"Jae","last_name":"Hendrick","email":"jhendrickc@aol.com","gender":"Male"},
{"id":14,"first_name":"Bronnie","last_name":"Kubyszek","email":"bkubyszekd@trellian.com","gender":"Male"},
{"id":15,"first_name":"Janaya","last_name":"Wilber","email":"jwilbere@fastcompany.com","gender":"Female"},
{"id":16,"first_name":"Paten","last_name":"Bradburne","email":"pbradburnef@skyrock.com","gender":"Male"},
{"id":17,"first_name":"Bartlet","last_name":"Beelby","email":"bbeelbyg@cbslocal.com","gender":"Male"},
{"id":18,"first_name":"Leila","last_name":"Bachelor","email":"lbachelorh@elpais.com","gender":"Female"},
{"id":19,"first_name":"Findlay","last_name":"Puller","email":"fpulleri@hc360.com","gender":"Male"},
{"id":20,"first_name":"Worthington","last_name":"Ivanin","email":"wivaninj@techcrunch.com","gender":"Male"}]


const btnTabla = document.getElementById('btnTabla');
btnTabla.addEventListener('click', function(){
    const divTabla = document.getElementById('divTabla');
    divTabla.appendChild(crearTabla(listaPersonas));
})



function crearTabla(lista){
    const tabla = document.createElement('table');
    tabla.appendChild(crearCabecera(lista[0]));
    tabla.appendChild(crearCuerpo(lista));

    return tabla;
}

function crearCabecera(item){
    const thead = document.createElement('thead');
    const tr = document.createElement('tr');
    for(const key in item){
        const th = document.createElement('td');
        const texto = document.createTextNode(key);
        th.appendChild(texto);
        tr.appendChild(th);
    }
    thead.appendChild(tr);
    return thead;

}

function crearCuerpo(lista){
    const tbody = document.createElement('tbody');

    lista.forEach(element => {
        const tr = document.createElement('tr');
        for (const key in element) {
            const td = document.createElement('td');
            const texto = document.createTextNode(element[key]);
            td.appendChild(texto);
            tr.appendChild(td);  

        }
        if(element.hasOwnProperty('id')){
            tr.setAttribute('data-id', element['id']);
            //tr.dataset.id = element['id'];
        }
        agregarManejadorTR(tr);
        tbody.appendChild(tr);
    });
    return tbody;
}
function agregarManejadorTR(tr){
    if(tr){
        tr.addEventListener("click", function(e){
            //alert(e.target.getAttribute('data-id'));
//            alert(e.target.dataset.id);
            console.log(e.path[1].dataset.id);
            console.log(e.target.parentNode.dataset.id)
            
        })

    }
}

function agregarManejadorTD(td){
    if(td){
        td.addEventListener("click", function(e){
            //alert(e.target.getAttribute('data-id'));
//            alert(e.target.dataset.id);
            console.log(e.target);
            e.stopPropagation();
        },false)

    }
}
