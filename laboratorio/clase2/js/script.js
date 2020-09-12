window.addEventListener("load", inicio);


function inicio(){

    let etiquetaNombre = document.getElementById("lblNombre");
    etiquetaNombre.addEventListener("click", avisarClick);

    let formulario = document.getElementById("frm1");
    formulario.addEventListener("submit", (e)=>{ 
        e.preventDefault();
        alert("no vamos a ningun lado");
    })
}


function avisarClick(){
    alert("Hiciste click");
}