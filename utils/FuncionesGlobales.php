<?php
//Funciones para generar Números de Cuenta que no coincidan con los existentes.

// Función que genera un nuevo ID de cuenta bancaria único
function generarNuevaCadena($array)
{
    $nuevaCadena = generarCadenaAleatorea(); // Se llama la función para Generar un ID aleatorio inicialmente

    // Aquí recorremos el array que fue ingresado como parámetro para verificar si el ID generado ya existe en el array de ID's de cuentas bancarias
    while (in_array($nuevaCadena, $array)) {
        $nuevaCadena = generarCadenaAleatorea(); // Mientras $nuevaCadena(ID) coincida con uno de los ID del array, se llamará continuamente a la función para generar otro ID; hasta que no existe ninguna coincidencia con el array
    }

    return $nuevaCadena; //Una vez se cumpla el While, retornamos el ID nuevo
}

// Función para genera una cadena de nueve dígitos aleatoreamente
function generarCadenaAleatorea()
{
    $idNuevaCuenta = ''; // Inicializamos

    // Generar el primer dígito aleatorio entre 1 y 9 (Ninguna cuenta debe empezar en cero)
    $idNuevaCuenta .= rand(1, 9);

    // Generamos los otros ocho dígitos, empezando por el segundo dígito hasta el noveno que si pueden ser de 0 a 9
    for ($i = 0; $i < 8; $i++) {
        $idNuevaCuenta .= rand(0, 9); // Concatenamos los digitos
    }

    return $idNuevaCuenta; //Al finalizar el ciclo For retornamos la cadena de 9 dígitos.
}
?>