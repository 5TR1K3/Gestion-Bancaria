<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error Desconocido</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap");

        :root {
            --black: #000;
            --blue: #056aff;
            --white: #fff;
            --green: #2ccf6d;
            --red: #e66353;
            --lg: rgb(253, 253, 253);
        }

        * {
            color: black;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        html,
        body {
            height: 100%;
        }

        body {
            background-color: var(--lg);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--black);
            font-size: 1em;
        }

        h1 {
            font-size: 7.5em;
            margin: 15px 0px;
            font-weight: bold;
        }

        h2 {
            font-weight: bold;
        }

        .btn {
            z-index: 1;
            overflow: hidden;
            background: transparent;
            position: relative;
            padding: 8px 50px;
            border-radius: 30px;
            cursor: pointer;
            font-size: 1em;
            letter-spacing: 2px;
            transition: 0.2s ease;
            font-weight: bold;
            margin: 5px 0px;

            &.green {
                border: 4px solid var(--red);
                color: var(--red);

                &:before {
                    content: "";
                    position: absolute;
                    left: 0;
                    top: 0;
                    width: 0%;
                    height: 100%;
                    background: var(--red);
                    z-index: -1;
                    transition: 0.2s ease;
                }

                &:hover {
                    color: var(--white);
                    background: var(--red);
                    transition: 0.2s ease;

                    &:before {
                        width: 100%;
                    }
                }
            }
        }

        img {
            width: 100%;
            height: 100%;
        }

        @media screen and (max-width:768px) {
            body {
                display: block;
            }

            .container {
                margin-top: 70px;
                margin-bottom: 70px;
            }
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-6 align-self-center">
                <img src="https://cdn-icons-png.flaticon.com/512/5986/5986327.png">
            </div>
            <div class="col-md-6 align-self-center">
                <h2>¡OH UH! El proceso no se completo correctamente.</h2>
                <p>Estamos verificando el problema y solucionarlo lo mas pronto posible...</p>
                <a href="../../index.php">
                    <button class="btn green">Inicio</button>
                </a>
            </div>
        </div>
    </div>

</body>

</html>