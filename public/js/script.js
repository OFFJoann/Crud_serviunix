// Script para confirmación antes de eliminar
document.addEventListener('DOMContentLoaded', () => {
    const deleteButtons = document.querySelectorAll('.btn-delete');
    deleteButtons.forEach(button => {
        button.addEventListener('click', (event) => {
            if (!confirm("¿Estás seguro de que deseas eliminar este empleado?")) {
                event.preventDefault();
            }
        });
    });
});
