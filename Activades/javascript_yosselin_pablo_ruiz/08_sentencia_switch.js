var valor;
valor = prompt('Ingresa un valor comprendido entre 1 y 5:','');
//Convertimos a entero
valor = parseInt(valor);
switch (valor) {
    case 1: document.write('uno');
            break;
    case 2: document.write('dos');
            break;
    case 3: document.write('tres');
            break;
    case 4: document.write('cuatro');
            break;
    case 5: document.write('cinco');
            break;
    default: document.write('debe ingresar un valor comprendido entre 1 y 5.');
}