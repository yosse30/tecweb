
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
    $b = 'MYSQL';
    $c = &$a;

    echo 'Contenido de $a: '.$a.'<br>';  
    echo 'Contenido de $b: '.$b.'<br>';
    echo 'Contenido de $c: '.$c.'<br>';
    
    $a = "PHP server";
    $b = &$a;

    echo 'Contenido de $a: '.$a.'<br>';  
    echo 'Contenido de $b: '.$b.'<br>';
    echo 'Contenido de $c: '.$c.'<br>';
    ?>

    <p>En el segunda asignacion de variables, la variable $a se le asigna el texto PHP server</p>
    <p>Por lo cual a partir de esa linea solo mostrara el nuevo texto o sea PHP server</p>
    <p>A la variable $b se le hace una asignacion de tipo apuntador a la variable $a, por lo que</p>
    <p>Todo lo que muestre $a mostrara $b. Y finalmente $c no tiene ningun cambio pero</p>
    <p>ya que era apuntador de $a desde el inicio mostrara tambien lo que tenga $a</p>
    
    <h1>Inciso 3</h1>
    <p>3. Muestra el contenido de cada variable inmediatamente despues de cada asignacion, para verificar la evolucion del tipo de estas variables (imprime todos los componentes de los arreglos):</p>
    <p>$a = “PHP5”;<br>
    $z[] = &$a;<br>
    $b = “5a version de PHP”;<br>
    $c = $b*10;<br>
    $a .= $b;<br>
    $b *= $c;<br>
    $z[0] = “MySQL”;</p>

    <?php  
    $a ="PHP5";
    echo 'Contenido de $a: '.$a.'<br>';
    $z[] = &$a;
    echo 'Contenido de $z[]¨: '; print_r($z);
    $b = "5a version de PHP";
    echo 'Contenido de $b: '.$b.'<br>';
    $c = $b*10;
    echo 'Contenido de $c: '.$c.'<br>';
    $a .= $b;
    echo 'Contenido de $a: '.$a.'<br>';
    $b *= $c;
    echo 'Contenido de $b: '.$b.'<br>';
    $z[0] = "MySQL";
    echo 'Contenido de $z[]: '; print_r($z);
?>

<h1>Inciso 4</h1>
    <p>4. Lee y muestra los valores de las variables del ejercicio anterior, pero ahora con la ayuda de
la matriz $GLOBALS o del modificador global de PHP.</p>

<?php 
echo 'Contenido de $a en el ambito global: '.$GLOBALS['a'].'<br>';
echo 'Contenido de $b en el ambito global: '.$GLOBALS['b'].'<br>';
echo 'Contenido de $a en el ambito global: '.$GLOBALS['c'].'<br>';
echo 'Contenido de $z en el ambito global:. no puede ser posible leerlo con la super variable $GLOBALS ya que no esta disponible a partir de la version PHP 8.1.0 '.'<br>'; 

?>

<h1>Inciso 5</h1>
    <p>5. Dar el valor de las variables $a, $b, $c al final del siguiente script:</p>
    <p>$a = “7 personas”;<br>
    $b = (integer) $a;<br>
    $a = “9E3”;<br>
    $c = (double) $a;</p>

<?php
$a = "7 personas";
echo 'Contenido de $a: '.$a.'<br>';
$b = (integer) $a;
echo 'Contenido de $b: '.$b.'<br>';
$a = "9E3";
echo 'Contenido de $a:  '.$a.'<br>';
$c = (double) $a;
echo 'Contenido de $c: '.$c.'<br>'
?>

<h1>Inciso 6</h1>
    <p>Dar y comprobar el valor booleano de las variables $a, $b, $c, $d, $e y $f y muéstralas
usando la función var_dump(<datos>).<br></p>
<p>Después investiga una función de PHP que permita transformar el valor booleano de $c y $e
en uno que se pueda mostrar con un echo:<br>
$a = “0”;<br>
$b = “TRUE”;<br>
$c = FALSE;<br>
$d = ($a OR $b);<br>
$e = ($a AND $c);<br>
$f = ($a XOR $b);</p>

<?php

$a = "0";
var_dump ($a);
$b = "TRUE";
var_dump ($b);
$c = FALSE;
var_dump ($c);
$d =  ($a OR $b);
var_dump ($d);
$e = ($a AND $c);
var_dump($e);
$f = ($a XOR $b);
var_dump($f);

function CambioValores()
{
    global $c,$e;
    $c = "FALSE";
    $e = "TRUE";
} 
CambioValores();
echo "<br>El nuevo valor de c:$c y de c:$e";
?>

<h1>Inciso 7</h1>
    <p>7. Usando la variable predefinida $_SERVER, determina lo siguiente:</p>
<p>a. La versión de Apache y PHP,<br>
b. El nombre del sistema operativo (servidor),<br>
c. El idioma del navegador (cliente).</p>

<?php

echo 'a. La version de Apache y PHP:'.$_SERVER['SERVER_SIGNATURE'].'<br>';
echo 'b. El nombre del sistema operativo (servidor):'.$_SERVER['SERVER_SOFTWARE'].'<br>';
echo 'c. El idioma del navegador (cliente):'.$_SERVER['HTTP_ACCEPT_LANGUAGE'].'<br>';

?>
</body>
</html>