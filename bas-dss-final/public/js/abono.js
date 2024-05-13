// Función para verificar la cuenta
function verifyAccount() {
    // Aquí puedes agregar la lógica para verificar la cuenta
    alert("Verificar cuenta");
}

// Función para realizar la operación
function performOperation() {
    // Aquí puedes agregar la lógica para realizar la operación
    alert("Realizar operación");
}

// Event listener para el campo de 9 dígitos
document.getElementById("totalDigits").addEventListener("input", function(event) {
    let value = event.target.value;
    if (!/^\d{0,9}$/.test(value)) {
        event.target.value = value.slice(0, 9); // Limita a 9 dígitos
    }
});

// Event listener para checkboxes
const checkboxes = document.querySelectorAll('.operation-options input[type="checkbox"]');
checkboxes.forEach(checkbox => {
    checkbox.addEventListener('change', function() {
        checkboxes.forEach(otherCheckbox => {
            if (otherCheckbox !== checkbox) {
                otherCheckbox.checked = false;
            }
        });
    });
});
