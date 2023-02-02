
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd"&gt;
<html>
<head>
    <title>Práctica 2</title>
</head>
<body>
    <h2>Inciso 1</h2>
    <p>Determina cuál de las siguientes variables son válidas y explica por qué:</p>
    <p>$_myvar, $_7var, myvar, $myvar, $var7, $_element1, $house*5</p>
    <?php
        $_myvar = 'hola';
        echo '$_myvar es correcta <br>';

        $_7var = 11;
        echo '$_7var es correcta <br>' ;

        //myvar = 3.141516;
        echo 'myvar es incorrecta <br>';

        $myvar = 'pruebas';
        echo '$myvar es correcta <br>';
        
        $var7 = 45;
        echo '$var7 es correcta <br>';

        $_element1 = 'primer elemnto';
        echo '$_element1 es correcto <br>';

        //$house*5 = 37561;
    echo '$house*5 es incorrecta ya que tiene un caracter no valido "*"<br><br>';

    ?>

    <h1>Inciso 2</h1>
    <p>2. Proporcionar los valores de $a, $b, $c como sigue: </p>
    <p>$a = “ManejadorSQL”;<br> $b = 'MySQL’;<br> $c = &$a;<br> </p>

    <?php

    $a = "Manejador SQL";
    $B = 'MYSQL';
    $c = &$a;

    echo 'Contenido de $a: '.$a.'<br>';  
    echo 'Contenido de $b: '.$b.'<br>';
    echo 'Contenido de $c: '.$c.'<br>';
    
    $a = "PHP server";
    $b = &$a;

    echo 'Contenido de $a: '.$a.'<br>';  
   echo 'Contenido de $b: '.$b.'<br>';
    echo 'Contenido de $c: ' .$c.'<br>';
   
    ?>

    <p>En el segunda asignacion de variables, la variable $a se le asigna el texto PHP server</p>
    <p>Por lo cual a partir de esa linea solo mostrara el nuevo texto o sea PHP server</p>
    <p>A la variable $b se le hace una asignacion de tipo apuntador a la variable $a, por lo que</p>
    <p>Todo lo que muestre $a mostrara $b. Y finalmente $c no tiene ningun cambio pero</p>
    <p>ya que era apuntador de $a desde el inicio mostrara tambien lo que tenga $a</p>
</body>
</html>