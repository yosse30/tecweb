var nota1, nota2, nota3;

nota1 = prompt('Ingresa 1era. nota:','');
nota2 = prompt('Ingresa 2da. nota:','');
nota3 = prompt('Ingresa 3era. nota:','');

//Convertimos los 3 string en enteros
nota1 = parseInt(nota1);
nota2 = parseInt(nota2);
nota3 = parseInt(nota3);

var pro
pro = (nota1+nota2+nota3)/3;

if (pro>=7) {
    document.write('aprobado');
}
else {
    if (pro>=4) {
        document.write('regular');
    }
    else {
        document.write('reprobado');
    }
}