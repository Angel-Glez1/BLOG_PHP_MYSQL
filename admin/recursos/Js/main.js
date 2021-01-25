
function confirmDelete() {
    let respuesta = confirm('Estas seguro que deseas eliminar este registro');

    if (respuesta) {
        return true;
    } else {
        return false;
    }
}



