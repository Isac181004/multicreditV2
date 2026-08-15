document.addEventListener('DOMContentLoaded', () => {
    const btn = document.getElementById('requisitosBtn');
    const panel = document.getElementById('panelRequisitos');
    const cerrar = document.getElementById('cerrarPanel');
    btn.addEventListener('click', () => {
        panel.classList.remove('hidden');
    });
    cerrar.addEventListener('click', () => {
        panel.classList.add('hidden');
    })
    // Inputs Numéricos (Digitar)
})