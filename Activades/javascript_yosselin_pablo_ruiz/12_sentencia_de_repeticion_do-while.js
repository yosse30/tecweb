var valor;
do{
    valor = prompt('Ingresa un valor entre 0 y 999:','');
    valor = parseInt(valor);
    document.write('El valor '+valor+' tiene ');
    if (valor<10)
        document.write('Tiene 1 digito')
        else
        if (valor<100) {
            document.write('Tiene 2 digitos');
        }
        else {
            document.write('Tiene 3 digitos')
        }
        document.write('<br>');
}while (valor!=10);