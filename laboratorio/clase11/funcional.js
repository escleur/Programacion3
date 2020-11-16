//filter

const numeros = [5,3,8,1,3];

const personas = [
    {nombre:"juan", edad: 23, sexo: 'm'},
    {nombre:"juan", edad: 23, sexo: 'm'},
    {nombre:"juan", edad: 23, sexo: 'm'},
    {nombre:"juan", edad: 23, sexo: 'm'},
    {nombre:"juan", edad: 23, sexo: 'm'},
    {nombre:"juan", edad: 23, sexo: 'm'}
]
const vec = [];
for(let i=0; i < numeros.length; i++){
    if(numeros[i] >= 4){
        vec.push(numeros[i]);
    }
}

const vec2 = numeros.filter((elemento, indice , vector)=>{
    console.log(elemento, indice, vector);

})
const vec2 = numeros.filter((elemento)=>{
    return elemento >= 4;
    
})
const vec2 = numeros.filter(elemento=>elemento >= 4);

const mujeres = personas.filter(per =>per.sexo === 'f');

const cuadrado = numeros.map(e=> e*e);

const nombres = personas.map(per=>({"nombre": per.nombre, "edad": per.edad}));

const nombresMujeres = personas.filter(p=>p.sexo === 'f').map(mujer=>mujer.nombre);

let miset = new Set(nombresMujeres);
let noRepetidos = [...miset];
Array.prototype.unique = function(){return [...new Set(this)]};


let noRepetidos = nombresMujeres.unique();



let suma = numeros.reduce((prev, actual)=>prev + actual)


let totalEdades = personas.reduce((prev, actual)=>{
    return prev + actual.edad;
},0);

let mayor = numeros.reduce((prev, actual)=>{
    return prev > actual?prev:actual;
})
