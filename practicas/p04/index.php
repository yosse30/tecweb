<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Práctica 3</title>
    <style type="text/css">
      ol { 
      list-style-type: none;
      }
    </style>
</head>
<body>
    <div>
        <h3>Ejercicio 1</h3>
        <p>Escribir programa para comprobar si un número es un múltiplo de 5 y 7.</p>
        <p>
            R:
            <?php
            if (!empty($_GET['numero'])) {
                $numero = $_GET['numero'];
                if ($numero % 7 == 0 && $numero % 5 == 0) {
                    echo "$numero es multiplo de 7 y 5.";
                  } else {
                    echo "$numero no es multiplo de 7 y 5.";
                  }
            } else {
                echo '(vacío)';
            }
            ?>
        </p>
    </div>
    <hr>
    <div>
        <h3>Ejercicio 2</h3>
        <p>
            Crea un programa para la generación repetitiva de 3 números aleatorios hasta obtener una secuencia compuesta por:
            <br><strong>impar, par, impar</strong>
        </p>
        <p>
            R:
            <?php
            $iteraciones = 0;
            $Numeros = 0;
            $matriz = array();
            
            while (true) {
              $iteraciones++;
              for ($i = 0; $i < 3; $i++) {
                $num = rand(1,100);
                $matriz[$iteraciones - 1][$i] = $num;
                $Numeros++;
              }
              if ($matriz[$iteraciones - 1][0] % 2 != 0 && $matriz[$iteraciones - 1][1] % 2 == 0 && $matriz[$iteraciones - 1][2] % 2 != 0) {
                break;
              }
            }
            
            echo "Numero de iteraciones: " . $iteraciones . "<br>";
            echo "Total de numeros generados: " . $Numeros . "<br>";
            echo "Matriz: <br>";
            
            for ($i = 0; $i < $iteraciones; $i++) {
              for ($j = 0; $j < 3; $j++) {
                echo $matriz[$i][$j] . " ";
              }
              echo "<br>";
            }
            ?>
        </p>
    </div>
    <hr>
    <div>
        <h3>Ejercicio 3</h3>
        <p>Utiliza un ciclo <strong>while</strong> para encontrar el primer número entero obtenido aleatoriamente, pero que además sea múltiplo de un número dado.</p>
        <p>
            R:
            <?php
            $iterations = 0;
            $totalNumbers = 0;
            $matrix = array();
            
            if (isset($_GET['multipleOf'])) {
              $multipleOf = (int)$_GET['multipleOf'];
            } else {
              $multipleOf = 5;
            }
            
            do {
              $iterations++;
              for ($i = 0; $i < 3; $i++) {
                $num = rand(1, 100);
                $matrix[$iterations - 1][$i] = $num;
                $totalNumbers++;
                if ($num % $multipleOf == 0) {
                  break 2;
                }
              }
            } while (true);
            print_r($matrix);
            echo "Number of iterations: " . $iterations . "\n";
            echo "Total number of generated numbers: " . $totalNumbers . "\n";
            echo "Matrix:\n";
            
            for ($i = 0; $i < $iterations; $i++) {
              for ($j = 0; $j < 3; $j++) {
                echo $matrix[$i][$j] . " ";
              }
              echo "\n";
            }
            
            ?>
        </p>
    </div>
    <hr>
    <div>
        <h3>Ejercicio 4</h3>
        <p>Crear un arreglo cuyos <strong>índices</strong> van de 97 a 122 y cuyos <strong>valores</strong> son las letras de la 'a' a la 'z'. Usa la función <strong>chr(n)</strong> que devuelve el caracter cuyo código ASCII es <strong>n</strong> para poner el valor en cada índice. Es decir:</p>
        <p>
            [97] => a <br>
            [98] => b <br>
            [99] => c <br>
            … <br>
            [122] => z
        </p>
        <p>
            R:
            <?php
            $letters = array();
            for ($i = 97; $i <= 122; $i++) {
              $letters[] = chr($i);
            }
            
            echo '<table border="1">';
            foreach ($letters as $key => $value) {
             echo '<tr><td>' . ($key + 97) . " => ".'</td><td>' . $value . '<br>';
            }
            echo '</table>';
            ?>
        </p>
    </div>
    <div>
    <h3>Ejercicio 5</h3>
        <p>
            Usar las variables <strong>$edad</strong> y <strong>$sexo</strong> en una instrucción if para identificar una persona de sexo "femenino", 
            cuya edad oscile entre los 18 y 35 años y mostrar un mensaje de bienvenida apropiado. Por ejemplo:
        </p>
        <p>
            <em>Bienvenida, usted está en el rango de edad permitido.</em>
        </p>
        <p>
            En caso contrario, deberá devolverse otro mensaje indicando el error.
        </p>
        <ul>
            <li>Los valores para $edad y $sexo se deben obtener por medio de un formulario en HTML.</li>
            <li>Utilizar el la Variable Superglobal $_POST (revisar documentación).</li>
        </ul>
        <p>
            R:
        </p>
        <form id="formulario1" action="./src/script1.php" method="post">
        <fieldset>
            <legend>Información Personal</legend>
            <ol>
            <li><label>Edad:</label> <input type="text" name="edad"></li>
            <li><label>Sexo:</label> <input type="text" name="sexo"></li>
            </ol>
        </fieldset>
        <p>
            <input type="submit" value="¡OK!">
        </p>
        </form>
    </div>
    <div>
    <h3>Ejercicio 6</h3>
        <p>
        Crea en código duro un arreglo asociativo que sirva para registrar el parque vehicular de
        una ciudad. Cada vehículo debe ser identificado por:</p>
        <ul>
            <li>Matricula</li>
            <li>Auto</li>
                <dd>o Marca</dd>
                <dd>o Modelo (año)</dd>
                <dd>o Tipo (sedan/hachback/camioneta)</dd>
            <li>Propietario</li>
                <dd>o Nombre</dd>
                <dd>o Ciudad</dd>
                <dd>o Direccion</dd>
        </ul>

        <p>La matrícula debe tener el siguiente formato LLLNNNN, donde las L pueden ser letras de
            la A-Z y las N pueden ser números de 0-9.</p>
        <p>Para hacer esto toma en cuenta las siguientes instrucciones: </p>    
        <ul>
            <li>√ Crea en código duro el registro para 15 autos</li>
            <li>√ Utiliza un único arreglo, cuya clave de cada registro sea la matricula</li>
            <li>√ Lógicamente la matricula no se puede repetir.</li>
            <li>√ Los datos del Auto deben ir dentro de un arreglo.</li>
            <li>√ Los datos del Propietario deben ir dentro de un arreglo.</li>
          </ul>
         <p>Usa print_r para mostrar la estructura general del arreglo, que luciría de forma similar al
          siguiente ejemplo:</p>
          <p><strong> Array ( [UBN6338] => Array ( [Auto] => Array ( [marca] => HONDA [modelo] => 2020
              [tipo] => camioneta ) [Propietario] => Array ( [nombre] => Alfonzo Esparza [ciudad]
              => Puebla, Pue. [direccion] => C.U., Jardines de San Manuel ) ) <br>[UBN6339] => Array
              ( [Auto] => Array ( [marca] => MAZDA [modelo] => 2019 [tipo] => sedan ) [Propietario]
              => Array ( [nombre] => Ma. del Consuelo Molina [ciudad] => Puebla, Pue. [direccion]
              => 97 oriente ) ) )</strong></p>

          <p>Escrito de forma más ordenada:</p>
          <p><strong>
            Array ( <br>
            [UBN6338] =><br>
            Array (<br>
            [Auto] => Array (<br><br>

            [marca] => HONDA [modelo] => 2020 [tipo] => camioneta<br>
            )<br>
            [Propietario] => Array (<br><br>

            [nombre] => Alfonzo Esparza [ciudad] => Puebla, Pue. [direccion]<br>
            => C.U., Jardines de San Manuel<br>
            )<br>
            )<br>
            [UBN6339] =><br>
            Array (<br>
            [Auto] => Array (<br><br>

            [marca] => MAZDA [modelo] => 2019 [tipo] => sedan<br>
            )<br>
            [Propietario] => Array (<br><br>

            [nombre] => Ma. del Consuelo Molina [ciudad] => Puebla, Pue.<br>
            [direccion] => 97 oriente<br>
            )<br>
            )<br>
            )<br>
          </strong></p>
          <p>Finalmente crea un formulario simple donde puedas consultar la información: </p>
          <ul>
            <li>Por matricula de auto.</li>
            <li>De todos los autos registrados.</li>
          </ul>
          <p>
            R: <br>
            <p>Buscar.. </p>
            <form id="formulario2" action="./src/funciones.php" method="post">
            <fieldset>
                <ol>
                <li>Matricula: <select name="matricula">
                    <option >UBN338</option>
                    <option >QPY5119</option>
                    <option >VVK9065</option>
                    <option >JZW9484</option>
                    <option >ALW1302</option>
                    <option >MXU4644</option>
                    <option >KGW0053</option>
                    <option >KTU6774</option>
                    <option >XMA1991</option>
                    <option >WPG3398</option>
                    <option >UWL3847</option>
                    <option >FJK2320</option>
                    <option >XEK6374</option>
                    <option >BMA5510</option>
                    <option >CGE1248</option>
                </select><li><br>
                </ol>
            </fieldset>
              <input type="submit" value="Consultar">
          </form>
          </p>
          </div>
</body>
</html>