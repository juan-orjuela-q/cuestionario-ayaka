var uuid = generateUUID();

function guardarRespuestas(origen, destino) {
    let origenId = "-";
    let destinoId = "-";
    console.log(origen);
    console.log(destino);
    if (origen !== null) origenId = origen.id;
    if (destino !== null) destinoId = destino.id;
    console.log(origenId + "==>" + destinoId);

    if(origenId==='p_in_2' && destinoId==='p_in_3'){
        postAnswer('NOMBRE',document.getElementById('infoNombre').value);
        setTimeout(() => {
            if(document.getElementById('gen_hombre').checked) postAnswer('GENERO','Hombre');
            if(document.getElementById('gen_mujer').checked) postAnswer('GENERO','Mujer');
            if(document.getElementById('gen_nobinario').checked) postAnswer('GENERO','No binario');
            if(document.getElementById('gen_otro').checked) postAnswer('GENERO','Otro');
            postAnswer('PROFESION',document.getElementById('profesion').value);
            postAnswer('EMAIL',document.getElementById('email').value);
            if(document.getElementById('comp_si').checked) postAnswer('COMPARTIR','Si');
            if(document.getElementById('comp_no').checked) postAnswer('COMPARTIR','No');
        }, 2000);
    }

    if(origenId==='p_in_4' && destinoId==='p_in_5'){
        if(document.getElementById('pcreativa_si').checked) postAnswer('CREATIVA','Si');
        if (document.getElementById('pcreativa_no').checked) postAnswer('CREATIVA', 'No');
        postAnswer('CREATIVA_PORQUE', document.getElementById('creativa_porque_no').value);
    }

    if(origenId==='p_in_5' && destinoId==='p_in_6'){
        postAnswer('DEDICACION',document.getElementById('dedicacion').value);
    }

    if(origenId==='p_in_7' && destinoId==='-'){
        if (document.getElementById('opcion1').checked) postAnswer('FRASE', document.getElementById('opcion1').value);
        if (document.getElementById('opcion2').checked) postAnswer('FRASE', document.getElementById('opcion2').value);
        if (document.getElementById('opcion3').checked) postAnswer('FRASE', document.getElementById('opcion3').value);
        if (document.getElementById('opcion4').checked) postAnswer('FRASE', document.getElementById('opcion4').value);
    }

    if (origenId === 'p_in_am1' && destinoId === 'p_in_am2') {
        if (document.getElementById('apasiona_si').checked) postAnswer('APASIONA', 'SI');
        if (document.getElementById('apasiona_no').checked) postAnswer('APASIONA', 'NO');
        postAnswer('APASIONA_PORQUE', document.getElementById('apasiona_porque').value);
    }
    if ((origenId === 'p_in_am2' || origenId==='p_in_az2') && destinoId === 'p_f_1') {
        let temorIdeas = '';
        if (document.getElementById('temor_ideas_A').checked) temorIdeas += document.getElementById('temor_ideas_A').value + "|";
        if (document.getElementById('temor_ideas_B').checked) temorIdeas += document.getElementById('temor_ideas_B').value + "|";
        postAnswer('TEMOR_IDEAS', temorIdeas);

        let temorAutoestima = '';
        if (document.getElementById('temor_autoestima_A').checked) temorAutoestima += document.getElementById('temor_autoestima_A').value + "|";
        if (document.getElementById('temor_autoestima_B').checked) temorAutoestima += document.getElementById('temor_autoestima_B').value + "|";
        if (document.getElementById('temor_autoestima_C').checked) temorAutoestima += document.getElementById('temor_autoestima_C').value + "|";
        if (document.getElementById('temor_autoestima_D').checked) temorAutoestima += document.getElementById('temor_autoestima_D').value + "|";
        postAnswer('TEMOR_AUTOESTIMA', temorAutoestima);

        let temorSocial = '';
        if (document.getElementById('temor_Social_A').checked) temorSocial += document.getElementById('temor_Social_A').value + "|";
        if (document.getElementById('temor_Social_B').checked) temorSocial += document.getElementById('temor_Social_B').value + "|";
        if (document.getElementById('temor_Social_C').checked) temorSocial += document.getElementById('temor_Social_C').value + "|";
        if (document.getElementById('temor_Social_D').checked) temorSocial += document.getElementById('temor_Social_D').value + "|";
        if (document.getElementById('temor_Social_E').checked) temorSocial += document.getElementById('temor_Social_E').value + "|";
        postAnswer('TEMOR_SOCIAL', temorSocial);

        let temorTarde = '';
        if (document.getElementById('temor_tarde_A').checked) temorTarde += document.getElementById('temor_tarde_A').value + "|";
        postAnswer('TEMOR_TARDE', temorTarde);

        let temorMercado = '';
        if (document.getElementById('temor_mercado_A').checked) temorMercado += document.getElementById('temor_mercado_A').value + "|";
        if (document.getElementById('temor_mercado_B').checked) temorMercado += document.getElementById('temor_mercado_B').value + "|";
        postAnswer('TEMOR_MERCADO', temorMercado);

        let temorFracaso = '';
        if (document.getElementById('temor_fracaso_A').checked) temorFracaso += document.getElementById('temor_fracaso_A').value + "|";
        if (document.getElementById('temor_fracaso_B').checked) temorFracaso += document.getElementById('temor_fracaso_B').value + "|";
        if (document.getElementById('temor_fracaso_C').checked) temorFracaso += document.getElementById('temor_fracaso_C').value + "|";
        postAnswer('TEMOR_FRACASO', temorFracaso);

        let temorRecursos = '';
        if (document.getElementById('temor_recursos_A').checked) temorRecursos += document.getElementById('temor_recursos_A').value + "|";
        if (document.getElementById('temor_recursos_B').checked) temorRecursos += document.getElementById('temor_recursos_B').value + "|";
        postAnswer('TEMOR_RECURSOS', temorRecursos);
    }

    if (origenId === 'p_f_1' && destinoId === 'p_f_2') {
        let form = document.getElementById('temores-finales');
        let temoresStr = "";
        for(let i=0;i<form.elements.length;i++)
        {
            if(form.elements[i].checked) temoresStr+=form.elements[i].value+"|";
        }
        postAnswer('TEMORES_FINALES', temoresStr);
    }

}

function postAnswer(question, answer) {
    let axios = require('axios');
    let FormData = require('form-data');
    let data = new FormData();
    data.append('uuid', uuid);
    data.append('question', question);
    data.append('answer', answer);

    let config = {
        method: 'post',
        //url: 'https://vps260373.vps.ovh.ca:8443/lupa.php',
		url: 'https://experienciasayaka.com/estudiotemores/lupa_be/lupa.php',
        //headers: { 'Access-Control-Allow-Origin': '*', 'Content-Type': 'application/text', },
        data: data
    };

    axios(config).then(function (response) {
        console.log(response.data);
        //console.log(JSON.stringify(response.data));
    }).catch(function (error) { console.log(error); });
}

function generateUUID() { // Public Domain/MIT
    var d = new Date().getTime();//Timestamp
    var d2 = ((typeof performance !== 'undefined') && performance.now && (performance.now() * 1000)) || 0;//Time in microseconds since page-load or 0 if unsupported
    return 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function (c) {
        var r = Math.random() * 16;//random number between 0 and 16
        if (d > 0) {//Use timestamp until depleted
            r = (d + r) % 16 | 0;
            d = Math.floor(d / 16);
        } else {//Use microseconds since page-load if supported
            r = (d2 + r) % 16 | 0;
            d2 = Math.floor(d2 / 16);
        }
        return (c === 'x' ? r : (r & 0x3 | 0x8)).toString(16);
    });
}

module.exports = { guardarRespuestas };
