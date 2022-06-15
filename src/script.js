import './principal.scss'

//Botones
const botones = document.querySelectorAll('.btn')

botones.forEach(btn => {
    btn.addEventListener('click', (event) => {
        event.preventDefault()
        const destino = btn.dataset.destino
        console.log(destino)
    })
})

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


 var parentDiv = btncerrar.parentNode;



btncerrar.forEach(a => {
    a.addEventListener('click', (event) => {
        event.preventDefault()
        var parentDiv = a.closest('.overlay');
        parentDiv.classList.remove("mostrar")
        console.log(parentDiv) 

              
    })
})