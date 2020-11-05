function sumar(a, b){
    return a+b;
}
function cuadrado(a){
    return a*a;
}
function multiplicar(a, b){
    return a*b;
}

let suma = sumar(4,3);
let cuad = cuadrado(suma);
let rta = multiplicar(cuad, 10);

console.log(rta);

//callback con error
function sumar(a, b, callback){
    let suma;
    setTimeout(()=>{
        if(typeof a !== "number" || typeof b !== "number"){
            callback("Todo mal");
        }else{
            suma = a + b;
            callback(null, suma);

        }
        
    })
}

sumar(4,3,(err, suma)=>{
    if(err){
        console.log(err);
        return;
    }

    cuadrado(suma, (err, cuad)=>{
        if(err){
            console.log(err);
            return;
        }
        multiplicar(cuad, 10, )    
    }
    )
})






function sumar(a,b){
    return new Promise((resolve, reject)=>{
        let suma;
        setTimeout(()=>{
            if(typeof a !== "number" || typeof b !== "number"){
                reject({error: "Parametros no numericos"});
            }
            suma = a+b;
            resolve(suma);
        },2000
        );
    }
    )
}


sumar(4, 3)
.then(suma=>cuadrado(suma))
.then(cuad=>multiplicar(cuad, 10))
.then(prod=>{console.log(prod)})
.catch((error)=>{
    console.log(error.error);
})




//async

function sumar(a,b){
    return new Promise((resolve, reject)=>{
        let suma;
        setTimeout(()=>{
            if(typeof a !== "number" || typeof b !== "number"){
                reject({error: "Parametros no numericos"});
            }
            suma = a+b;
            resolve(suma);
        },2000
        );
    }
    )
}

async function realizarOperaciones(){
    try{
        let suma = await sumar(4,3);//promesas
        let cuad = await cuadrado(suma);
        let rta = await multiplicar(cuad, 10);
        console.log(rta);

    }catch(error){
        console.log(error.mensaje)
    }


}

realizarOperaciones();