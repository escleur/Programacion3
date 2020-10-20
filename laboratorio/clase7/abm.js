
const autos = [{
    "marca": "Pontiac"
  }, {
    "marca": "Pontiac"
  }, {
    "marca": "Volkswagen"
  }, {
    "marca": "Mercedes-Benz"
  }, {
    "marca": "Honda"
  }, {
    "marca": "Lincoln"
  }, {
    "marca": "Land Rover"
  }, {
    "marca": "BMW"
  }, {
    "marca": "Bentley"
  }, {
    "marca": "Mercury"
  }, {
    "marca": "Chevrolet"
  }, {
    "marca": "Audi"
  }, {
    "marca": "Ford"
  }, {
    "marca": "Land Rover"
  }, {
    "marca": "Mercury"
  }, {
    "marca": "Ford"
  }, {
    "marca": "Aston Martin"
  }, {
    "marca": "Chevrolet"
  }, {
    "marca": "Dodge"
  }, {
    "marca": "GMC"
  }];

  const listaPersonas = [{
    "id": 1,
    "first_name": "Burnaby",
    "last_name": "Center",
    "email": "bcenter0@yandex.ru",
    "gender": "Male"
  }, {
    "id": 2,
    "first_name": "Helsa",
    "last_name": "Hembrow",
    "email": "hhembrow1@merriam-webster.com",
    "gender": "Female"
  }, {
    "id": 3,
    "first_name": "Charissa",
    "last_name": "Kalisz",
    "email": "ckalisz2@apple.com",
    "gender": "Female"
  }, {
    "id": 4,
    "first_name": "Rinaldo",
    "last_name": "Scneider",
    "email": "rscneider3@macromedia.com",
    "gender": "Male"
  }, {
    "id": 5,
    "first_name": "Howey",
    "last_name": "Obeney",
    "email": "hobeney4@livejournal.com",
    "gender": "Male"
  }, {
    "id": 6,
    "first_name": "Angie",
    "last_name": "Duncan",
    "email": "aduncan5@shop-pro.jp",
    "gender": "Male"
  }, {
    "id": 7,
    "first_name": "Marion",
    "last_name": "Jeaneau",
    "email": "mjeaneau6@earthlink.net",
    "gender": "Male"
  }, {
    "id": 8,
    "first_name": "Delilah",
    "last_name": "Goldis",
    "email": "dgoldis7@berkeley.edu",
    "gender": "Female"
  }, {
    "id": 9,
    "first_name": "Barrie",
    "last_name": "Delort",
    "email": "bdelort8@mediafire.com",
    "gender": "Female"
  }, {
    "id": 10,
    "first_name": "Lemmie",
    "last_name": "Staggs",
    "email": "lstaggs9@360.cn",
    "gender": "Male"
  }, {
    "id": 11,
    "first_name": "Miner",
    "last_name": "Toombs",
    "email": "mtoombsa@google.ru",
    "gender": "Male"
  }, {
    "id": 12,
    "first_name": "Cherianne",
    "last_name": "Caley",
    "email": "ccaleyb@yellowbook.com",
    "gender": "Female"
  }, {
    "id": 13,
    "first_name": "Neal",
    "last_name": "Spoor",
    "email": "nspoorc@amazon.co.jp",
    "gender": "Male"
  }, {
    "id": 14,
    "first_name": "Amble",
    "last_name": "Heighway",
    "email": "aheighwayd@elpais.com",
    "gender": "Male"
  }, {
    "id": 15,
    "first_name": "Gardy",
    "last_name": "Degan",
    "email": "gdegane@ebay.co.uk",
    "gender": "Male"
  }, {
    "id": 16,
    "first_name": "Sophia",
    "last_name": "Buzza",
    "email": "sbuzzaf@goo.gl",
    "gender": "Female"
  }, {
    "id": 17,
    "first_name": "Nonah",
    "last_name": "Malling",
    "email": "nmallingg@paginegialle.it",
    "gender": "Female"
  }, {
    "id": 18,
    "first_name": "Wat",
    "last_name": "Jerg",
    "email": "wjergh@parallels.com",
    "gender": "Male"
  }, {
    "id": 19,
    "first_name": "Aurthur",
    "last_name": "Tomini",
    "email": "atominii@shutterfly.com",
    "gender": "Male"
  }, {
    "id": 20,
    "first_name": "Frasier",
    "last_name": "Deinhard",
    "email": "fdeinhardj@tuttocitta.it",
    "gender": "Male"
  }];

const divInfo = document.getElementById('divInfo');

divInfo.appendChild(crearLista(autos));

function crearLista(vec){
    const lista = document.createElement('ul');
    
    vec.forEach( auto => {
        const item = document.createElement('li');
        const texto = document.createTextNode(auto.marca);
        item.appendChild(texto);
        lista.appendChild(item);
        
    });
    return lista;
}

const tablaPersona = document.getElementById('tablaPersona');

tablaPersona.appendChild(obtenerTabla(listaPersonas));

function obtenerTabla(lista){
    const tabla = document.createElement('tabla');
    const thead = document.createElement('thead');
    const tr = document.createElement('tr');
    const columnas = [];
    for (const key in lista[0]) {
        const th = document.createElement('th');
        const texto = document.createTextNode(key);
        th.appendChild(texto);
        tr.appendChild(th);
        columnas.push(key);
    }
    thead.appendChild(tr);
    //---------------------
    const tbody = document.createElement('tbody');
    lista.forEach( elemento => {
        const tr = document.createElement('tr');

        columnas.forEach(id =>{
            const td = document.createElement('td');
            const texto = document.createTextNode( elemento[id]);
            td.appendChild(texto);
            tr.appendChild(td);
        });
        tbody.appendChild(tr);
    });
    
    
    tabla.appendChild(thead);
    tabla.appendChild(tbody);
    return tabla;


}

