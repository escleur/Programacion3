//Document Object Model

// console.log(document.documentElement);

// console.log(document.title);
// console.log(document.charset);
// console.log(document.documentElement.lang);
// console.log(document.forms);
// console.log(document.links);
// console.log(document.styleSheets);
// console.log(document.scripts);

// console.log(document.getElementById('linkGoogle'));
// console.log(document.getElementsByTagName('a'));
// console.log(document.getElementsByName('nombre'));
// console.log(document.getElementsByClassName('enlace'));

// console.log(document.querySelector('#btn1'));

const titulo = document.getElementById("titulo");
console.log(titulo.getAttribute('id'));
titulo.setAttribute('id', 'pepe');

console.log(titulo.hasAttribute('id'));

titulo.className;
titulo.className;

titulo.className.add('letrasVerdes');
const boton = document.getElementById('btn1');
boton.addEventListener('click' , e=>{
    linkGoogle.classList.toggle('link')
})

const $info = document.getElementById("info");
$info.innerText = "Hola mundo";
$info.innerHTML = "<h1> hola </h1>"

$info.textContent = "no inserta html";



const unH2 = document.createElement('h2');
let text = document.createTextNode('Esto es un titulo h2');
unH2.appendChild(text);
unH2.classList.add('rojo');

$info.appendChild(unH2);

titulo.dataset.descripcion = "esto es un data attribute";


console.log(titulo.dataset.descripcion);

// dom traversing

const $parrafos = document.getElementById('parrafos');

console.log($parrafos.childNodes);

console.log($parrafos.children);
const hijos = $parrafos.children;
console.log(hijos['p1']); //asociativo por id

const listaParrafos = [...hijos]; // lo propaga a un array

listaParrafos.forEach(e1=>{console.log(e1)});

console.log($parrafos.firstChild); //es el nodo texto
console.log($parrafos.firstElementChild); //es el elemento

console.log($parrafos.lastChild.nodeType); //3
console.log($parrafos.lastElementChild.nodeType); //1
$parrafos.removeChild($parrafos.firstElementChild);


JSON.stringify(1234);
JSON.parse("1234");


const p1 = {
    nombre: "Juan",
    edad: 34,
    nada: true
}

localStorage.setItem("unaPersona", JSON.stringify(p1));
const otraPersona = JSON.parse( localStorage.getItem("unaPersona"));


const persona = JSON.parse(localStorage.getItem("unaPersona")) || [];


