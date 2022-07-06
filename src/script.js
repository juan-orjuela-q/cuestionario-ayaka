import './principal.scss'

const bd = require("./bd");



//Botones
const botones = document.querySelectorAll('.btn')

botones.forEach(btn => {
    btn.addEventListener('click', (event) => {
        event.preventDefault()
        const destino = document.getElementById(btn.dataset.destino)
        const origen = document.getElementById(btn.dataset.origen)
        bd.guardarRespuestas(origen,destino);
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
    var parentDiv = btnclse.closest('.modal-temor');
    parentDiv.classList.remove("mostrar")

}

var isChecked = document.getElementById('validar');
isChecked.addEventListener("click", validacion);


//Almacenar temores
const temores = [], 
btnTemoresAm = document.getElementById('confirmar-temores-am'),
btnTemoresAz = document.getElementById('confirmar-temores-az'),
temoresFinales = document.getElementById('temores-finales')

function guardarTemores() {
    const checksTemores = document.querySelectorAll('.input-temor')
    checksTemores.forEach((i) => {
        if(i.checked) {
            temores.push(i.value)
        }
    })

    temores.forEach((i) => {

        let label_tem = document.createElement("label")
        label_tem.classList.add('checkbox-cont')
        temoresFinales.append(label_tem)
        
        let input_tem = document.createElement("input")
        input_tem.classList.add('input-temor')
        input_tem.type = 'checkbox'
        input_tem.value = i

        let span_tem = document.createElement("span")
        span_tem.classList.add('span-temor')
        span_tem.append(i)

        let checkmark = document.createElement("span")
        checkmark.classList.add('checkmark')

        label_tem.append(input_tem)
        label_tem.append(span_tem)
        label_tem.append(checkmark)
    })
}

btnTemoresAm.addEventListener('click', guardarTemores)
btnTemoresAz.addEventListener('click', guardarTemores)


//Caminos
function validacion() {

    var op1 = document.getElementById('opcion1').checked;
    var op2 = document.getElementById('opcion2').checked;
    var op3 = document.getElementById('opcion3').checked;
    var op4 = document.getElementById('opcion4').checked;
    const origen = document.getElementById('p_in_7')
    const destino = document.getElementById('p_in_am1')
    const destinoazul = document.getElementById('p_in_az2')



    if (op1 || op3) {
        console.log("primera seleccion")
        //if (op1) postAnswer('FRASE', 'A')
        //if (op3) postAnswer('FRASE', 'C')
        avanzar(origen, destino)
    }
    else if (op2 || op4) {
        console.log("segunda seleccion ")
        //if (op2) postAnswer('FRASE', 'B')
        //if (op4) postAnswer('FRASE', 'D')
        avanzar(origen, destinoazul)
    }
    else {
        console.log("ninguno")
    }
}

//Redimensionar graf
function resizeGraf() {
    let grafs = document.querySelectorAll('.graf')

    grafs.forEach((graf)=> {
        let main = graf.nextSibling
        graf.style.height = `${main.offsetHeight}px`
    })
}

resizeGraf()
window.onresize = resizeGraf