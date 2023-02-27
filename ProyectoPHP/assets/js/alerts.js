function izzitoastSucces(titulo, mensaje){
    iziToast.success({
    title: titulo,
    message: mensaje,
});
}

function izzitoastWarning(titulo, mensaje){
    iziToast.warning({
        title: titulo,
        message: mensaje,
    });
  }

function izzitoastError(titulo, mensaje){
    iziToast.error({
        title: titulo,
        message: mensaje,
    });
  }

function ModalDelete(Codigo, Empleado){
     var confirmacion = confirm("¿Está seguro de eliminar este registro?\n Codigo: " + Codigo + "\n Empleado: " + Empleado);
     if (confirmacion){
        
     }else{
        
     }
}
  