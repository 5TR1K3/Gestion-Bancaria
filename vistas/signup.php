<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registro de usuario en linea</title>
  <link rel="stylesheet" href="../assets/css/style.signup.css">
</head>

<body>
  <div class="barra">
    <div class="logo">
      <img src="../assets/media/img/Logo_BAS.png" alt="logo">
    </div>
    <div class="salir">
      <a href="../index.php">
        <p>Salir</p>
      </a>
    </div>
  </div>
  <div class="container">
    <header>Registro</header>
    <div class="progress-bar">
      <div class="step">
        <p>DATOS PERSONALES</p>
        <div class="bullet">
          <span>1</span>
        </div>
        <div class="check fas fa-check"></div>
      </div>
      <div class="step">
        <p>DOCUMENTACION</p>
        <div class="bullet">
          <span>2</span>
        </div>
        <div class="check fas fa-check"></div>
      </div>
      <div class="step">
        <p>USUARIO</p>
        <div class="bullet">
          <span>3</span>
        </div>
        <div class="check fas fa-check"></div>
      </div>
    </div>
    <div class="form-outer">
      <form action="../models/UsuarioModel.php" method="POST">
        <input type="hidden" name="op" value="registraruser"/>
        <div class="page slide-page">
          <div class="field">
            <label for="pnombre">Primer Nombre</label>
            <label for="snombre">Segundo Nombre</label>
          </div>
          <div class="field">
            <input id="pnombre" name="pnombre" type="text" required pattern="^[A-Za-zÁáÉéÍíÓóÚúÜüÑñ][A-Za-zÁáÉéÍíÓóÚúÜüÑñ .;, _-]*$" title="Ingrese su primer nombre. Solo se aceptan letras mayúsculas y minusculas." minlength="2"/>
            <input id="snombre" name="snombre" type="text" required pattern="^[A-Za-zÁáÉéÍíÓóÚúÜüÑñ][A-Za-zÁáÉéÍíÓóÚúÜüÑñ .;, _-]*$" title="Ingrese su primer nombre. Solo se aceptan letras mayúsculas y minusculas." minlength="2"/>
          </div>
          <div class="field">
            <label for="papellido">Primer Apellido</label>
            <label for="sapellido">Segundo Apellido</label>
          </div>
          <div class="field">
            <input id="papellido" name="papellido" type="text" required pattern="^[A-Za-zÁáÉéÍíÓóÚúÜüÑñ][A-Za-zÁáÉéÍíÓóÚúÜüÑñ .;, _-]*$" title="Ingrese su primer nombre. Solo se aceptan letras mayúsculas y minusculas." minlength="2"/>
            <input id="sapellido" name="sapellido" type="text" required pattern="^[A-Za-zÁáÉéÍíÓóÚúÜüÑñ][A-Za-zÁáÉéÍíÓóÚúÜüÑñ .;, _-]*$" title="Ingrese su primer nombre. Solo se aceptan letras mayúsculas y minusculas." minlength="2"/>
          </div>
          <div class="field">
            <label for="direccion">Dirección</label>
          </div>
          <div class="field">
            <input id="direccion" name="direccion" type="text" required pattern="^[A-Za-zÁáÉéÍíÓóÚúÜüÑñ][A-Za-zÁáÉéÍíÓóÚúÜüÑñ .;, _-]*$" title="Ingrese su primer nombre. Solo se aceptan letras mayúsculas y minusculas." minlength="2"/>
          </div>
          <div class="field">
            <button class="firstNext next">Continuar</button>
          </div>
        </div>

        <div class="page">
          <div class="field">
            <label for="dui">DUI (Sin guion)</label>
            <label for="sueldo">Ingreso mensual</label>
          </div>
          <div class="field">
            <input id="dui" name="dui" type="text" maxlength="9" required pattern="^[0-9]{9}$" title="Solo puede ingresar números y nueve dígitos máximo."/>
            <input id="sueldo" name="sueldo" type="number" required min="25" title="El ingreso mínimo para aperturar su cuenta es de $25"/>
          </div>
          <br>
          <div class="field btns">
            <button class="prev-1 prev">Volver</button>
            <button class="next-1 next">Continuar</button>
          </div>
        </div>

        <div class="page">
          <div class="field">
            <div class="label">Correo electrónico</div>
            <input id="correo" name="correo" type="email" required/>
          </div>
          <div class="field">
            <div class="label">Contraseña</div>
            <input id="clave" name="clave" type="password" required minlength="8" pattern="^(?=.*[A-Z])(?=.*[\W\d_])[^\s]*$" title="La contraseña debe tener mínimo 8 carácteres, una letra máyuscula, un número y un simbolo(@#$%^&+=!)"/>
          </div>
          <div class="field">
            <div class="label">Confirmar ontraseña</div>
            <input id="confirmar" name="confirmar" type="password" required minlength="8" pattern="^(?=.*[A-Z])(?=.*[\W\d_])[^\s]*$"/>
          </div>
          <br>
          <div class="field btns">
            <button class="prev-2 prev">Volver</button>
            <button class="submit">Crear Cuenta</button>
          </div>
        </div>
      </form>
    </div>
  </div>
  <script src="../assets/js/script.signup.js"></script>

</body>

</html>