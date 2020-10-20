import {crearTabla} from './tabla.js';
import Persona from "./persona.js";
import {obtenerPersona, mostrarPersona, onCambioId} from './frmcontroler.js';

// const btnTabla = document.getElementById('btnTabla');
// btnTabla.addEventListener('click', function(){
//     const divTabla = document.getElementById('divTabla');
//     divTabla.appendChild(crearTabla(listaPersonas));
// })


let listaPersonas;
let frmPersona;
let proximoId;
let divTabla;

window.addEventListener('load', inicializarManejadores);

function inicializarManejadores(){
    listaPersonas = obtenerPersonas();
    console.log(listaPersonas);
    
    divTabla = document.getElementById('divTabla');
    
    actualizarTabla();
    frmPersona = document.forms[0];
    proximoId = obtenerId();
    onCambioId(frmPersona);
    frmPersona.cancelar.addEventListener('click', e=>{
        frmPersona.id.value = '';
        onCambioId(frmPersona);
    })
    frmPersona.addEventListener('submit', e=>{
        e.preventDefault();
        // console.log(frmPersona.nombre.value);
        // console.log(document.querySelector('#apellido').value);
        // console.log(document.getElementById("email").value);
        // console.log(frmPersona.gender.value);
        console.log(e.submitter.id);
        //----------------Alta-----------------
        if(e.submitter.id == "alta"){
            const nuevaPersona = obtenerPersona(proximoId, frmPersona);
            if(nuevaPersona){
                listaPersonas.push(nuevaPersona);
                proximoId++;
                guardarDatos();
                actualizarTabla();
                frmPersona.reset();
            }

        }
        if(e.submitter.id == "modificar"){
            const nuevaPersona = obtenerPersona(Number(frmPersona.id.value), frmPersona);
            console.log(nuevaPersona);
            listaPersonas = listaPersonas.map(function(obj){
                if(obj.id == nuevaPersona.id){
                    //console.log(obj.id);
                    //console.log(nuevaPersona.id);
                    return nuevaPersona;
                }else{
                    return obj;
                }
            });
            guardarDatos();
            actualizarTabla();
            frmPersona.reset();
            frmPersona.id.value = '';
            onCambioId(frmPersona);
        }
        if(e.submitter.id == "baja"){
            const id = Number(frmPersona.id.value);
            //console.log(nuevaPersona);
            listaPersonas = listaPersonas.filter(function(obj){
                return obj.id != id;
            });
            guardarDatos();
            actualizarTabla();
            frmPersona.reset();
            frmPersona.id.value = '';
            onCambioId(frmPersona);
        }
        
    })

}



function obtenerPersonas(){
    return JSON.parse(localStorage.getItem('gente')) || [];
}

function obtenerId(){
    return JSON.parse(localStorage.getItem('nextId')) || 20000;
}



function guardarDatos(){
    localStorage.setItem('gente', JSON.stringify(listaPersonas));
    localStorage.setItem('nextId', proximoId);
}

function actualizarTabla(){
    console.log(divTabla);
    vaciarElemento(divTabla);
    insertarSpinner(divTabla);
    //    divTabla.innerHTML = "<span class='spinner'></span>";
    
    setTimeout(() => {
        
        vaciarElemento(divTabla);
        divTabla.appendChild(crearTabla(listaPersonas));
    }, 5000);
}

function vaciarElemento(elemento){
    while (elemento.firstChild) {
        elemento.removeChild(elemento.firstChild);
      }
}
function insertarSpinner(elemento){
    const span = document.createElement('span');
    span.className = 'spinner';
    elemento.appendChild(span);
}

// let listaPersonas = [{"id":1,"first_name":"Feliza","last_name":"Corser","email":"fcorser0@google.es","gender":"Female"},
// {"id":2,"first_name":"Nial","last_name":"Barnardo","email":"nbarnardo1@wisc.edu","gender":"Male"},
// {"id":3,"first_name":"Tish","last_name":"D'Costa","email":"tdcosta2@miitbeian.gov.cn","gender":"Female"},
// {"id":4,"first_name":"Kiel","last_name":"Switsur","email":"kswitsur3@php.net","gender":"Male"},
// {"id":5,"first_name":"Ashlin","last_name":"Corderoy","email":"acorderoy4@amazonaws.com","gender":"Male"},
// {"id":6,"first_name":"Carline","last_name":"Francisco","email":"cfrancisco5@loc.gov","gender":"Female"},
// {"id":7,"first_name":"Josey","last_name":"Cowl","email":"jcowl6@ycombinator.com","gender":"Female"},
// {"id":8,"first_name":"Kip","last_name":"Serrier","email":"kserrier7@huffingtonpost.com","gender":"Male"},
// {"id":9,"first_name":"Dillie","last_name":"Finnes","email":"dfinnes8@google.com.au","gender":"Male"},
// {"id":10,"first_name":"Alain","last_name":"Daykin","email":"adaykin9@weibo.com","gender":"Male"},
// {"id":11,"first_name":"Diane-marie","last_name":"Hannond","email":"dhannonda@yale.edu","gender":"Female"},
// {"id":12,"first_name":"Korey","last_name":"Tuma","email":"ktumab@macromedia.com","gender":"Male"},
// {"id":13,"first_name":"Jae","last_name":"Hendrick","email":"jhendrickc@aol.com","gender":"Male"},
// {"id":14,"first_name":"Bronnie","last_name":"Kubyszek","email":"bkubyszekd@trellian.com","gender":"Male"},
// {"id":15,"first_name":"Janaya","last_name":"Wilber","email":"jwilbere@fastcompany.com","gender":"Female"},
// {"id":16,"first_name":"Paten","last_name":"Bradburne","email":"pbradburnef@skyrock.com","gender":"Male"},
// {"id":17,"first_name":"Bartlet","last_name":"Beelby","email":"bbeelbyg@cbslocal.com","gender":"Male"},
// {"id":18,"first_name":"Leila","last_name":"Bachelor","email":"lbachelorh@elpais.com","gender":"Female"},
// {"id":19,"first_name":"Findlay","last_name":"Puller","email":"fpulleri@hc360.com","gender":"Male"},
// {"id":20,"first_name":"Worthington","last_name":"Ivanin","email":"wivaninj@techcrunch.com","gender":"Male"}]
