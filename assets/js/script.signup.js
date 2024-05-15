const slidePage = document.querySelector(".slide-page");
const nextBtnFirst = document.querySelector(".firstNext");
const prevBtnSec = document.querySelector(".prev-1");
const nextBtnSec = document.querySelector(".next-1");
const prevBtnThird = document.querySelector(".prev-2");
const submitBtn = document.querySelector(".submit");
const progressText = document.querySelectorAll(".step p");
const progressCheck = document.querySelectorAll(".step .check");
const bullet = document.querySelectorAll(".step .bullet");

const claveInput = document.getElementById("clave");
const confirmarInput = document.getElementById("confirmar");

let current = 1;

// Función para validar si todos los campos en una sección están completos
function areFieldsComplete(page) {
  const inputs = page.querySelectorAll("input[type='text'], input[type='password'], input[type='email'], input[type='number']");
  return Array.from(inputs).every(input => input.value.trim() !== "");
}

// Función para habilitar o deshabilitar un botón según el estado de los campos
function toggleButton(button, page) {
  if (areFieldsComplete(page)) {
    button.disabled = false;
  } else {
    button.disabled = true;
  }
}

// Función para habilitar o deshabilitar el botón de envío según el estado de todos los campos y la coincidencia de las contraseñas
function toggleSubmitButton() {
  const allInputs = document.querySelectorAll("input[type='text'], input[type='password'], input[type='email'], input[type='number']");
  const allInputsComplete = Array.from(allInputs).every(input => input.value.trim() !== "");
  const claveValor = claveInput.value.trim();
  const confirmarValor = confirmarInput.value.trim();
  
  // Verificar si todas las contraseñas coinciden y todos los campos tienen información
  const passwordsMatch = claveValor === confirmarValor;
  
  submitBtn.disabled = !allInputsComplete || !passwordsMatch;
}

// Habilitar o deshabilitar botones al cargar la página
toggleButton(nextBtnFirst, slidePage);
toggleButton(nextBtnSec, document.querySelectorAll(".page")[1]);
toggleSubmitButton();

// Agregar listeners a los campos de entrada para validar en tiempo real en la primera página
slidePage.querySelectorAll("input[type='text'], input[type='password'], input[type='email'], input[type='number']").forEach(input => {
  input.addEventListener("input", function() {
    toggleButton(nextBtnFirst, slidePage);
    toggleSubmitButton();
  });
});

// Agregar listeners a los campos de entrada para validar en tiempo real en la segunda página
document.querySelectorAll(".page")[1].querySelectorAll("input[type='text'], input[type='password'], input[type='email'], input[type='number']").forEach(input => {
  input.addEventListener("input", function() {
    toggleButton(nextBtnSec, document.querySelectorAll(".page")[1]);
    toggleSubmitButton();
  });
});

// Agregar listeners a los campos de entrada para validar en tiempo real en la tercera página
document.querySelectorAll(".page")[2].querySelectorAll("input[type='text'], input[type='password'], input[type='email'], input[type='number']").forEach(input => {
  input.addEventListener("input", function() {
    toggleSubmitButton();
  });
});

nextBtnFirst.addEventListener("click", function(event){
  event.preventDefault();
  slidePage.style.marginLeft = "-25%";
  bullet[current - 1].classList.add("active");
  progressCheck[current - 1].classList.add("active");
  progressText[current - 1].classList.add("active");
  current += 1;
});

nextBtnSec.addEventListener("click", function(event){
  event.preventDefault();
  slidePage.style.marginLeft = "-50%";
  bullet[current - 1].classList.add("active");
  progressCheck[current - 1].classList.add("active");
  progressText[current - 1].classList.add("active");
  current += 1;
});

submitBtn.addEventListener("click", function(){
  bullet[current - 1].classList.add("active");
  progressCheck[current - 1].classList.add("active");
  progressText[current - 1].classList.add("active");
  current += 1;
});

prevBtnSec.addEventListener("click", function(event){
  event.preventDefault();
  slidePage.style.marginLeft = "0%";
  bullet[current - 2].classList.remove("active");
  progressCheck[current - 2].classList.remove("active");
  progressText[current - 2].classList.remove("active");
  current -= 1;
});

prevBtnThird.addEventListener("click", function(event){
  event.preventDefault();
  slidePage.style.marginLeft = "-25%";
  bullet[current - 2].classList.remove("active");
  progressCheck[current - 2].classList.remove("active");
  progressText[current - 2].classList.remove("active");
  current -= 1;
});

//Para coincidencia de contraseña
function verificarCoincidencia() {
  const claveValor = claveInput.value.trim();
  const confirmarValor = confirmarInput.value.trim();

  // Verificar si las contraseñas coinciden
  if (claveValor === confirmarValor) {
    // Si coinciden, quita el borde rojo y ocultar el tooltip
    claveInput.style.borderColor = "";
    confirmarInput.style.borderColor = "";
    // Ocultar el tooltip
    claveInput.removeAttribute("title");
  } else {
    // Si no coinciden, resaltar los campos con borde rojo y mostrar el tooltip
    claveInput.style.borderColor = "red";
    confirmarInput.style.borderColor = "red";
    // Mostrar el tooltip con el mensaje de error
    claveInput.title = "Las contraseñas no son iguales.";
  }
}

claveInput.addEventListener("input", verificarCoincidencia);
confirmarInput.addEventListener("input", verificarCoincidencia);
/* Versión final v.2*/