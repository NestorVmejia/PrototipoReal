function alerta_eliminar(codigo) {
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            mandar_php(codigo)
        }
    })
}
function mandar_php(codigo){

    paremetros ={id:codigo };
    $.ajax({
        data:parametros,
        url: "../sets/eliminar.php",
        type:"POST",
        beforeSend: function (){},
        success: function (){
            Swal.fire("Deleted!", "El archivo a sido eliminado.", "Listo").then ((result) =>{
                window.location.href = "../pantallas/Inicio.php"
            });
        },
    });
}