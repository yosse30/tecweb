var x = 1;
var suma = 0;
var valor;
while (x<=5){
    valor = prompt('Ingresa el valor:','');
    valor = parseInt(valor);
    suma = suma+valor;
    x = x+1;
}
document.write("La suma de los valores es: "+suma+"<br>");