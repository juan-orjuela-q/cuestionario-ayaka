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
    
  





