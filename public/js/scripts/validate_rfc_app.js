
const { createApp, ref } = Vue;

const app = createApp ({
    setup() {
        const rfc_validated = ref(false);

        const validate_rfc = (event) => {
            //function rfcValido(rfc, aceptarGenerico = true) {
            event.preventDefault();
            const regular_expression = /^([A-ZÑ&]{3,4}) ?(?:- ?)?(\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])) ?(?:- ?)?([A-Z\d]{2})([A\d])$/;
            var is_validated = rfc_validated.value.match(regular_expression);
        
            if (!is_validated)  //Coincide con el formato general del regex?
                return false;
        
            //Separar el dígito verificador del resto del RFC
            const digitoVerificador = is_validated.pop();
            const rfcSinDigito = is_validated.slice(1).join('');
            const len = rfcSinDigito.length;
        
            //Obtener el digito esperado
            const diccionario = "0123456789ABCDEFGHIJKLMN&OPQRSTUVWXYZ Ñ";
            const indice = len + 1;
            var suma, digitoEsperado;
        
            suma = (len == 12) ? 0 : 481; //Ajuste para persona moral
        
            for( var i = 0; i < len; i++ ) {
                suma += diccionario.indexOf(rfcSinDigito.charAt(i)) * (indice - i);
            }
            
            digitoEsperado = 11 - suma % 11;
            
            if (digitoEsperado == 11) digitoEsperado = 0;
            else if (digitoEsperado == 10) digitoEsperado = "A";
        
            //El dígito verificador coincide con el esperado?
            // o es un RFC Genérico (ventas a público general)?
            if ((digitoVerificador != digitoEsperado) && (!aceptarGenerico || rfcSinDigito + digitoVerificador != "XAXX010101000"))
                console.log(false);
            else if (!aceptarGenerico && rfcSinDigito + digitoVerificador == "XEXX010101000")
                console.log(false);
            console.log(rfcSinDigito + digitoVerificador);
        };

        return {
            // variable
            rfc_validated,
            // functions
            validate_rfc,
        }

    }
});

app.mount('#validate_rfc_module');