var col;
col = prompt('Ingresa el color con que quieras pintar el fondo de la ventana (rojo, verde, azul)','');
switch (col) {
    case 'rojo': document.body.style.backgroundColor ='#ff0000';
        break;
    case 'verde': document.body.style.backgroundColor ='#00ff00';
        break;
    case 'azul':document.body.style.backgroundColor ='#0000ff';
        break;        
}