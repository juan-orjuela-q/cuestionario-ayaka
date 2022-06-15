import './principal.scss'

//Botones
const botones = document.querySelectorAll('.btn')

botones.forEach(btn => {
    btn.addEventListener('click', (event) => {
        event.preventDefault()
        const destino = document.getElementById(btn.dataset.destino)
        const origen = document.getElementById(btn.dataset.origen)
        
        origen.classList.add('saliendo')
        destino.classList.add('entrando')

        setTimeout(() => {
            origen.classList.remove('saliendo')
            origen.classList.remove('activo')
            destino.classList.remove('entrando')
            destino.classList.add('activo')
        }, 4000);

    })
})

//Temores
const temores = []