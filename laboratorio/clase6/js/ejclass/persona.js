export class Persona{
    constructor(nombre, sexo, edad){
        this.nombre = nombre;
        this.sexo = sexo;
        this.edad = edad;

    }
    set Sexo(sexo){
        this.sexo = sexo.toLowerCase();
    }
    get Sexo(){
        return this.sexo;
    }
    saludar(){
        console.log(`Hola me llamo ${this.nombre}`);
    }
}

class Empleado extends Persona(nombre, sexo, edad, sueldo){
    constructor(nombre, sexo, edad, sueldo){
        super(nombre, sexo, edad);
        this.sueldo = sueldo;
    }
    informarSueldo(){
        console.log(`Mi sueldo es ${this.sueldo}`);
    }
    saludar(){
        console.log(`Soy un empleado y me llamo ${this.nombre}`);
    }
}


//export const x = {Persona, Empleado};