export default class Persona{
    constructor(id, nombre, apellido, email, sexo){
        this.id = id;
        this.nombre = nombre;
        this.apellido = apellido;
        this.email = email;
        this.sexo = sexo;
    }
    set Id(id){
        this.id = id;
    }
    get Id(){
        return this.id;
    }
    set Nombre(nombre){
        this.nombre = nombre;
    }
    get Nombre(){
        return this.nombre;
    }
    set Apellido(apellido){
        this.apellido = apellido;
    }
    get Apellido(){
        return this.apellido;
    }
    set Email(email){
        this.email = email;
    }
    get Email(){
        return this.email;
    }
    set Sexo(sexo){
        this.sexo = sexo;
    }
    get Sexo(){
        return this.sexo;
    }

}