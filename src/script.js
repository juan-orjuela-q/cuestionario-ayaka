import './principal.scss'

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
    avanzar(origen,destino)
  }
  else if(op2 || op4){
    console.log("segunda seleccion ")
    avanzar(origen,destinoazul)
  }
  else{
    console.log("ninguno")
  }
}
