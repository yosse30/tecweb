var num1,num2;
num1 = prompt('Ingresa el primer numero:','');
num2 = prompt('Ingresa en segundo numero:','');
num1 = parseInt(num1);
num2 = parseInt(num2);
if (num1>num2) {
    document.write('el mayor es'+num1);
}
else {
    document.write('el mayor es'+num2);
}