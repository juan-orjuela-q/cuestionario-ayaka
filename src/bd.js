var uuid = generateUUID();

function guardarRespuestas(origen, destino) {
    let origenId = "-";
    let destinoId = "-";
    if (origen !== null) origenId = origen.id;
    if (destino !== null) destinoId = destino.id;
    console.log(origenId + "==>" + destinoId);
    if (origenId === 'p_in_am1' && destinoId === 'p_in_am2') {
        if (document.getElementById('pcreativa_si').checked) postAnswer('APASIONA', 'SI');
        if (document.getElementById('pcreativa_no').checked) postAnswer('APASIONA', 'NO');
    }
    if (origenId === '-' && destinoId === 'p_in_5') {
        let temorIdeas = '';
        if (document.getElementById('temor_ideas_A').checked) temorIdeas += 'A|';
        if (document.getElementById('temor_ideas_B').checked) temorIdeas += 'B|';
        if (document.getElementById('temor_ideas_C').checked) temorIdeas += 'C|';
        if (document.getElementById('temor_ideas_D').checked) temorIdeas += 'D|';
        if (document.getElementById('temor_ideas_E').checked) temorIdeas += 'E|';
        postAnswer('TEMOR_IDEAS', temorIdeas);

        let temorAutoestima = '';
        if (document.getElementById('temor_autoestima_A').checked) temorAutoestima += 'A|';
        if (document.getElementById('temor_autoestima_B').checked) temorAutoestima += 'B|';
        if (document.getElementById('temor_autoestima_C').checked) temorAutoestima += 'C|';
        if (document.getElementById('temor_autoestima_D').checked) temorAutoestima += 'D|';
        if (document.getElementById('temor_autoestima_E').checked) temorAutoestima += 'E|';
        postAnswer('TEMOR_AUTOESTIMA', temorAutoestima);

        let temorSocial = '';
        if (document.getElementById('temor_social_A').checked) temorSocial += 'A|';
        if (document.getElementById('temor_social_B').checked) temorSocial += 'B|';
        if (document.getElementById('temor_social_C').checked) temorSocial += 'C|';
        if (document.getElementById('temor_social_D').checked) temorSocial += 'D|';
        if (document.getElementById('temor_social_E').checked) temorSocial += 'E|';
        postAnswer('TEMOR_SOCIAL', temorSocial);

        let temorTarde = '';
        if (document.getElementById('temor_tarde_A').checked) temorTarde += 'A|';
        if (document.getElementById('temor_tarde_B').checked) temorTarde += 'B|';
        if (document.getElementById('temor_tarde_C').checked) temorTarde += 'C|';
        if (document.getElementById('temor_tarde_D').checked) temorTarde += 'D|';
        if (document.getElementById('temor_tarde_E').checked) temorTarde += 'E|';
        postAnswer('TEMOR_TARDE', temorTarde);

        let temorMercado = '';
        if (document.getElementById('temor_mercado_A').checked) temorMercado += 'A|';
        if (document.getElementById('temor_mercado_B').checked) temorMercado += 'B|';
        if (document.getElementById('temor_mercado_C').checked) temorMercado += 'C|';
        if (document.getElementById('temor_mercado_D').checked) temorMercado += 'D|';
        if (document.getElementById('temor_mercado_E').checked) temorMercado += 'E|';
        postAnswer('TEMOR_MERCADO', temorMercado);

        let temorFracaso = '';
        if (document.getElementById('temor_fracaso_A').checked) temorFracaso += 'A|';
        if (document.getElementById('temor_fracaso_B').checked) temorFracaso += 'B|';
        if (document.getElementById('temor_fracaso_C').checked) temorFracaso += 'C|';
        if (document.getElementById('temor_fracaso_D').checked) temorFracaso += 'D|';
        if (document.getElementById('temor_fracaso_E').checked) temorFracaso += 'E|';
        postAnswer('TEMOR_FRACASO', temorFracaso);

        let temorRecursos = '';
        if (document.getElementById('temor_recursos_A').checked) temorRecursos += 'A|';
        if (document.getElementById('temor_recursos_B').checked) temorRecursos += 'B|';
        if (document.getElementById('temor_recursos_C').checked) temorRecursos += 'C|';
        if (document.getElementById('temor_recursos_D').checked) temorRecursos += 'D|';
        if (document.getElementById('temor_recursos_E').checked) temorRecursos += 'E|';
        postAnswer('TEMOR_RECURSOS', temorRecursos);
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
        url: 'http://vps260373.vps.ovh.ca:8082/lupa.php',
        //headers: {            'Access-Control-Allow-Origin': '*',            'Content-Type': 'application/text',          },
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
//window.addEventListener('load', function() {
//    document.getElementById('uuid').value = generateUUID();
//});