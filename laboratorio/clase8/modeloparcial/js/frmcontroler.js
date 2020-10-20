import Persona from "./persona.js";



function obtenerPersona(proximoId, frmPersona){
    const nuevaPersona = new Persona(proximoId, frmPersona.nombre.value, frmPersona.apellido.value, frmPersona.email.value, frmPersona.gender.value);
    return nuevaPersona;    
}


function mostrarPersona(persona){

    const frmPersona = document.forms[0];
    frmPersona.id.value = persona.id;
    frmPersona.nombre.value = persona.nombre;
    frmPersona.apellido.value = persona.apellido;
    frmPersona.email.value = persona.email;
    frmPersona.gender.value = persona.sexo;
    onCambioId(frmPersona);
}


function onCambioId(frm){
    if(frm.id.value == ''){
        frm.alta.hidden = false;
        frm.modificar.hidden = true;
        frm.baja.hidden = true;
        frm.cancelar.hidden = false;

    }else{
        console.log(frm.alta);
        frm.alta.hidden = true;
        frm.modificar.hidden = false;
        frm.baja.hidden = false;
        frm.cancelar.hidden = false;

    }
}

export {obtenerPersona, mostrarPersona, onCambioId};