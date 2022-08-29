import './principal.scss'
import $ from "jquery"

console.log($('#contenedor-maestro'))

const bd = require("./bd");



//Botones
const botones = document.querySelectorAll('.continuar, #enviar-contacto')

botones.forEach(btn => {
    btn.addEventListener('click', (event) => {
        event.preventDefault()
        const destino = document.getElementById(btn.dataset.destino)
        const origen = document.getElementById(btn.dataset.origen)

        //avanzar(origen, destino)
        //Validar requeridos
        const padre = btn.closest('.cont'),
            pantalla = btn.closest('.pantalla'),
            requeridos = padre.querySelectorAll('input:required, textarea:required'),
            radioRequeridos = padre.querySelectorAll('.radio-grupo-requerido'),
            errores = padre.querySelectorAll('.error')

        let validado = true

        if (errores) {
            errores.forEach(i => {
                i.remove()
            })
        } else {
            validado = true
        }


        //Campos requeridos
        requeridos.forEach(i => {
            if (i.value === '') {
                i.classList.add('falta')
                agregarError(i, 'Este campo es obligatorio')
                validado = false
            } else {
                i.classList.remove('falta')
            }
        })

        //Radio buttons
        if (radioRequeridos.length > 0) {
            radioRequeridos.forEach(radioGrupo => {
                let i = radioGrupo.querySelectorAll('input:checked'),
                    pq = radioGrupo.querySelector('.requerido')

                if (i.length === 0) {
                    validado = false
                    agregarError(radioGrupo, 'Elige una opción')
                }
                if (pq) {
                    if (pq.value === '') {
                        validado = false
                        agregarError(radioGrupo, 'Este campo es obligatorio')
                    }
                }
            })
        }
        //Pantallas con modales

        if (pantalla) {
            if (pantalla.classList.contains('mostrar-modal')) {
                const checksTemores = document.querySelectorAll('.input-temor')

                let checksTemoresArr = 0

                checksTemores.forEach(i => {
                    if (i.checked) {
                        checksTemoresArr++
                    }
                })

                if (checksTemoresArr === 0) {
                    validado = false
                    const opciones = padre.querySelector('.form-grupo')
                    agregarError(opciones, 'Escoge al menos 1 opción')
                }

            }
        }

        //Si se valida avanza
        if (validado) {

            bd.guardarRespuestas(origen, destino);

            if (padre.id === 'contact') {
                console.log('Es el contacto')
            } else if (btn.dataset.origen === 'p_in_7') {
                avanzarCamino()
            } else if (btn.dataset.origen === 'p_f_1') {
                const temores = document.querySelectorAll('#temores-finales input:checked')
                if (temores.length > 0) {
                    avanzar(origen, destino)
                } else {
                    agregarError(btn, 'Escoge al menos 1 opción')
                }
            } else {
                avanzar(origen, destino)
            }
            if (destino){
                if (destino.classList.contains('anim')) {
                    setTimeout(() => {
                        //Avanzar
                        avanzar(destino, document.getElementById(destino.dataset.destino))
                    }, 9000);
                }
            }
            

        } else {
            agregarError(btn, 'Falta información')
        }
    })
})

function agregarError(item, texto) {
    const msg = document.createElement('div')
    msg.classList.add('error')
    msg.append(texto)
    item.parentNode.insertBefore(msg, item.nextSibling)
}

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
//Porque
const mostrarPorque = document.querySelectorAll('.porque-mostrar'),
    ocultarPorque = document.querySelectorAll('.porque-ocultar')

mostrarPorque.forEach(item => {
    item.addEventListener('click', (event) => {
        const inputPq = item.nextElementSibling.nextElementSibling
        inputPq.classList.add('requerido')
    })
})

ocultarPorque.forEach(item => {
    item.addEventListener('click', (event) => {
        const inputPq = item.parentNode.querySelector('.porque')
        inputPq.classList.remove('requerido')
    })
})

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

};






//Almacenar temores
const temores = [],
    btnTemoresAm = document.getElementById('confirmar-temores-am'),
    btnTemoresAz = document.getElementById('confirmar-temores-az'),
    temoresFinales = document.getElementById('temores-finales')

function guardarTemores() {
    const checksTemores = document.querySelectorAll('.input-temor')
    checksTemores.forEach((i) => {
        if (i.checked) {
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
function avanzarCamino() {

    var op1 = document.getElementById('opcion1').checked;
    var op2 = document.getElementById('opcion2').checked;
    var op3 = document.getElementById('opcion3').checked;
    var op4 = document.getElementById('opcion4').checked;
    const origen = document.getElementById('p_in_7')
    const destinoAmarillo = document.getElementById('p_in_am1')
    const destinoAzul = document.getElementById('p_in_az2')

    if (op2 || op3) {
        //if (op1) postAnswer('FRASE', 'A')
        //if (op3) postAnswer('FRASE', 'C')
        avanzar(origen, destinoAmarillo)
    }
    else if (op1 || op4) {
        //if (op2) postAnswer('FRASE', 'B')
        //if (op4) postAnswer('FRASE', 'D')
        avanzar(origen, destinoAzul)
    }
    else {
        console.log("ninguno")
    }
}

//Redimensionar graf
function resizeGraf() {
    let grafs = document.querySelectorAll('.graf')

    grafs.forEach((graf) => {
        let main = graf.nextSibling
        graf.style.height = `${main.offsetHeight}px`
    })
}
//Opciones aleatorias
const opcionesAleatorias = document.querySelectorAll('.aleatorio .pieza')
opcionesAleatorias.forEach(opc => {
    let num = Math.floor(Math.random() * 11)
    opc.style.order = num
})

resizeGraf()
window.onresize = resizeGraf
//Enviar correo
$(document).ready(function () {

    $("#enviar-contacto").click(function (event) {
        console.log('pressed');
        //values
        var name = document.getElementById('cf-nombre').value;
        var email = document.getElementById('cf-email').value;
        var phone = document.getElementById('cf-tel').value;
        var message = document.getElementById('cf-mensaje').value;
        var dataString = { "name": name, "email": email, "phone": phone, "message": message }

        if (name && email && message) {
            $.ajax({
                type: "post",
                url: "./mail.php",
                data: dataString,
                success: function (html) {
                    $('#mensaje-contacto').html(html);
                }
            });
            $('#mensaje-contacto').removeClass('error')
        } else {
            $('#mensaje-contacto').html('Rellena todos los campos')
            $('#mensaje-contacto').addClass('error')
        }


        event.preventDefault();
    });
});