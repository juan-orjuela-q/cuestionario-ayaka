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