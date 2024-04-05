document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('myForm');
    const checkboxes = document.querySelectorAll('input[type="checkbox"]');
    const passwordField = document.getElementById('password');
    const passwordHint = document.getElementById('password-hint');
  
    // Evento para deseleccionar otros checkboxes si uno es seleccionado
    checkboxes.forEach(function(checkbox) {
      checkbox.addEventListener('change', function() {
        if (this.checked) {
          checkboxes.forEach(function(otherCheckbox) {
            if (otherCheckbox !== checkbox) {
              otherCheckbox.checked = false;
            }
          });
        }
      });
    });
  
    form.addEventListener('submit', function(event) {
      event.preventDefault(); // Evita el envío del formulario por defecto
  
      // Obtén los valores de los campos del formulario
      const nombre = document.getElementById('nombre').value;
      const edad = document.getElementById('edad').value;
      const direccion = document.getElementById('direccion').value;
      const email = document.getElementById('email').value;
      const usuario = document.getElementById('usuario').value;
      const password = passwordField.value;
  
      // Verifica si la contraseña cumple con los requisitos
      if (!validarContraseña(password)) {
        alert('La contraseña debe tener al menos 8 caracteres, incluyendo al menos una letra mayúscula, una letra minúscula, un número y un carácter especial (@, $, !, %, *, ?, &).');
        return;
      }
  
      // Obtén el tipo de usuario seleccionado
      let tipoUsuario;
      checkboxes.forEach(function(checkbox) {
        if (checkbox.checked) {
          tipoUsuario = checkbox.id;
        }
      });
  
      // Valida que se haya seleccionado un tipo de usuario
      if (!tipoUsuario) {
        alert('Por favor, selecciona un tipo de usuario.');
        return;
      }
  
      // Aquí puedes realizar cualquier otra validación que desees
  
      // Envía los datos del formulario (aquí puedes enviarlos a un servidor o realizar otra acción)
      console.log('Nombre:', nombre);
      console.log('Edad:', edad);
      console.log('Dirección:', direccion);
      console.log('Correo Electrónico:', email);
      console.log('Crear Usuario:', usuario);
      console.log('Contraseña:', password);
      console.log('Tipo de Usuario:', tipoUsuario);
  
      // Limpia el formulario después de enviarlo
      form.reset();
    });
  
    // Función para validar la contraseña
    function validarContraseña(password) {
      const regex = /^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
      return regex.test(password);
    }
  
    // Evento para mostrar u ocultar el mensaje de contraseña según el input
    passwordField.addEventListener('input', function() {
      if (validarContraseña(this.value)) {
        passwordHint.style.display = 'none';
      } else {
        passwordHint.style.display = 'block';
      }
    });
  });
  