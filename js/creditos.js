document.addEventListener('DOMContentLoaded', () => {
    
    // 1. LÓGICA DEL MODAL DE REQUISITOS
    const btn = document.getElementById('requisitosBtn');
    const panel = document.getElementById('panelRequisitos');
    const cerrar = document.getElementById('cerrarPanel');
    
    if (btn && panel && cerrar) {
        btn.addEventListener('click', () => panel.classList.remove('hidden'));
        cerrar.addEventListener('click', () => panel.classList.add('hidden'));
    }

    // 2. VARIABLES DEL SIMULADOR
    const montoInput = document.getElementById('monto-input');
    const plazoInput = document.getElementById('plazo-input');
    const tasaInput = document.getElementById('tasa-input'); 

    const montoSlider = document.getElementById('monto-slider');
    const plazoSlider = document.getElementById('plazo-slider');
    const tasaSlider = document.getElementById('tasa-slider');
    
    const cuotaDisplay = document.getElementById('cuota-display');
    const capitalDisplay = document.getElementById('capital-display');
    const interesDisplay = document.getElementById('interes-display');
    const totalDisplay = document.getElementById('total-display');
    const waMonto = document.getElementById('wa-monto');

    // Formateador de moneda para pintar el resultado de forma bonita
    const formatoSoles = new Intl.NumberFormat('es-PE', {
        style: 'currency',
        currency: 'PEN',
        minimumFractionDigits: 2
    });

    // 3. FUNCIÓN DE CÁLCULO FINANCIERO (FÓRMULA)
    function calcularCredito() {
        if (!montoInput) return; // Abortar si no estamos en la página correcta

        let capital = parseFloat(montoInput.value) || 0;
        let meses = parseInt(plazoInput.value) || 1;
        let tasaMensualPorcentaje = parseFloat(tasaInput.value) || 3.6;
        let tasaMensualDecimal = tasaMensualPorcentaje / 100;

        let cuota;
        if (tasaMensualDecimal === 0) {
            cuota = capital / meses;
        } else {
            // Fórmula Francesa de Cuota Constante
            const factor = Math.pow(1 + tasaMensualDecimal, meses);
            cuota = capital * (tasaMensualDecimal * factor) / (factor - 1);
        }

        const totalAPagar = cuota * meses;
        const interesTotal = totalAPagar - capital;

        // Imprimir los resultados en las etiquetas del panel verde
        cuotaDisplay.textContent = formatoSoles.format(cuota);
        capitalDisplay.textContent = formatoSoles.format(capital);
        interesDisplay.textContent = formatoSoles.format(interesTotal);
        totalDisplay.textContent = formatoSoles.format(totalAPagar);
        
        // Bloquear y mostrar el monto en el mini-formulario de WhatsApp
        if (waMonto) {
            waMonto.value = 'S/ ' + capital.toLocaleString('es-PE');
        }

        // Pintar la barrita de verde progresivo
        actualizarFondoSlider(montoSlider);
        actualizarFondoSlider(plazoSlider);
        actualizarFondoSlider(tasaSlider);
    }

    // 4. FUNCIÓN PARA PINTAR LAS BARRAS (Slider)
    function actualizarFondoSlider(slider) {
        if (!slider) return;
        const min = parseFloat(slider.min) || 0;
        const max = parseFloat(slider.max) || 100;
        const val = parseFloat(slider.value) || 0;
        const percentage = ((val - min) / (max - min)) * 100;
        
        // Verde CEPRODEMIC (#8CC63F)
        slider.style.background = `linear-gradient(to right, #8CC63F 0%, #8CC63F ${percentage}%, #e2e8f0 ${percentage}%, #e2e8f0 100%)`;
    }

    // 5. VINCULAR LA BARRA CON LA CAJITA DE TEXTO
    function vincularControles(inputEl, sliderEl) {
        if (!inputEl || !sliderEl) return;
        
        // Cuando tipean un número
        inputEl.addEventListener('input', () => {
            sliderEl.value = inputEl.value;
            calcularCredito();
        });
        
        // Cuando arrastran la barra
        sliderEl.addEventListener('input', () => {
            inputEl.value = sliderEl.value;
            calcularCredito();
        });
    }

    vincularControles(montoInput, montoSlider);
    vincularControles(plazoInput, plazoSlider);
    vincularControles(tasaInput, tasaSlider);

    // Arrancar el cálculo apenas cargue la página
    calcularCredito();

    // 6. LÓGICA DEL FORMULARIO WHATSAPP
    const waForm = document.getElementById('wa-form');
    if (waForm) {
        waForm.addEventListener('submit', function(e) {
            e.preventDefault(); 
            
            const nombre = document.getElementById('wa-nombre').value.trim();
            const negocio = document.getElementById('wa-negocio').value.trim();
            const montoRequerido = montoInput.value; 
            const oficina = document.getElementById('wa-oficina').value; 

            // Base de datos de números de asesores (actualiza con los reales)
            const telefonosPorOficina = {
                "Cajamarca": "51968782473",
                "Huamachuco": "51976737240",
                "Cajabamba": "51949069914",
                "San Marcos": "51976782829"
            };

            const telefonoAsignado = telefonosPorOficina[oficina] || "51968782473"; 

            const mensaje = `Hola Multicredit CEPRODEMIC, me gustaría solicitar una evaluación.%0A%0A`
                          + `*Mis Datos:*%0A`
                          + `- Nombre: ${nombre}%0A`
                          + `- Mi Negocio/Ocupación: ${negocio}%0A`
                          + `- Monto requerido: S/ ${montoRequerido}%0A`
                          + `- Oficina más cercana: ${oficina}%0A%0A`
                          + `Quedo atento a su respuesta. ¡Gracias!`;

            window.open(`https://wa.me/${telefonoAsignado}?text=${mensaje}`, '_blank');
        });
    }
});