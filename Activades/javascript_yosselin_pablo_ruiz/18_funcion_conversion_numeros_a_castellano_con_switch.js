function convertirCastellano(x) {
    switch (x) {
        case 1: return "uno";
        case 2: return "dos";
        case 3: return "tres";
        case 4: return "cuatro";
        case 5: return "cinco";
        default: return "valor incorrecto";
    }
}
var valor = prompt("Ingresa un valor entre 1 y 5 ", "");
valor = parseInt(valor);
var r = convertirCastellano(valor);
document.write(r);