import './principal.scss'

var uuid = generateUUID();

//Botones
const botones = document.querySelectorAll('.btn')

botones.forEach(btn => {
    btn.addEventListener('click', (event) => {
        event.preventDefault()
        const destino = document.getElementById(btn.dataset.destino)
        const origen = document.getElementById(btn.dataset.origen)
        avanzar(origen,destino)

        if(destino.classList.contains('anim')) {
            setTimeout(() => {
                //Avanzar
                avanzar(destino, document.getElementById(destino.dataset.destino))
            }, 9000);
        }

    })
})

function avanzar(origen, destino) {
    origen.classList.add('saliendo')
    destino.classList.add('entrando')

    setTimeout(() => {
        origen.classList.remove('saliendo')
        origen.classList.remove('activo')
        destino.classList.remove('entrando')
        destino.classList.add('activo')
    }, 3000);
}
//Temores
const temores = []
const pops = document.querySelectorAll('.pieza')
pops.forEach(i => {
    i.addEventListener('click', (event) => {
        event.preventDefault()
        const destino = i.dataset.modal
        console.log(destino)
        const modal = document.getElementById(destino)
        modal.classList.add("mostrar")
        
    })
})


const btncerrar = document.querySelectorAll('.cerrar')
btncerrar.forEach(a => {
        
    a.addEventListener('click', (event) => {
        event.preventDefault()
        cerrarpop(a)

              
    })
})
const aceptar = document.querySelectorAll('.aceptar')
aceptar.forEach(a => {
        
        a.addEventListener('click', (event) => {
            event.preventDefault()
            cerrarpop(a)
    
                  
        })
    })
function cerrarpop(btnclse) {
    
            var parentDiv = btnclse.closest('.overlay');
            parentDiv.classList.remove("mostrar")
        
        }
    

// const validador = document.getElementsByClassName("validar");
// validador.addEventListener("click", validacion);
// const collection = document.getElementsByClassName("opcion1");
var isChecked = document.getElementById('validar');
isChecked.addEventListener("click", validacion);
//     if(collection) {
//           alert('checkbox esta seleccionado');
//     }



    

function validacion(){
    
    var op1 = document.getElementById('opcion1').checked;
    var op2 = document.getElementById('opcion2').checked;
    var op3 = document.getElementById('opcion3').checked;
    var op4 = document.getElementById('opcion4').checked;
    const origen = document.getElementById('p_in_7')
    const destino = document.getElementById('p_in_am1')
    const destinoazul = document.getElementById('p_in_az2')



  if(op1 || op3) {
    console.log("primera seleccion")
    if(op1) postAnswer('FRASE','A')
    if(op3) postAnswer('FRASE','C')
    avanzar(origen,destino)
  }
  else if(op2 || op4){
    console.log("segunda seleccion ")
    if(op2) postAnswer('FRASE','B')
    if(op4) postAnswer('FRASE','D')
    avanzar(origen,destinoazul)
  }
  else{
    console.log("ninguno")
  }
}

function postAnswer(question,answer){
    let axios = require('axios');
    let FormData = require('form-data');
    let data = new FormData();
    data.append('uuid', uuid);
    data.append('question', question);
    data.append('answer', answer);

    let config = {
        method: 'post',
        url: 'http://vps260373.vps.ovh.ca:8082/lupa.php',
        //headers: {            'Access-Control-Allow-Origin': '*',            'Content-Type': 'application/text',          },
        data : data
        };

    axios(config).then(function (response) {
        console.log(response.data);
        //console.log(JSON.stringify(response.data));
    }).catch(function (error) { console.log(error); });
}

function generateUUID() { // Public Domain/MIT
    var d = new Date().getTime();//Timestamp
    var d2 = ((typeof performance !== 'undefined') && performance.now && (performance.now()*1000)) || 0;//Time in microseconds since page-load or 0 if unsupported
    return 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function(c) {
        var r = Math.random() * 16;//random number between 0 and 16
        if(d > 0){//Use timestamp until depleted
            r = (d + r)%16 | 0;
            d = Math.floor(d/16);
        } else {//Use microseconds since page-load if supported
            r = (d2 + r)%16 | 0;
            d2 = Math.floor(d2/16);
        }
        return (c === 'x' ? r : (r & 0x3 | 0x8)).toString(16);
    });
}
//window.addEventListener('load', function() {
//    document.getElementById('uuid').value = generateUUID();
//});