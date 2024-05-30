


  
/*=============================================
Editar rol
=============================================*/
$(".tableRol").on("click", ".btnEditRol", function() {
    var idRol = $(this).attr("idRol");
    console.log("ID de rol seleccionado:", idRol);
    var datos = new FormData();
    datos.append("idRol", idRol);

    $.ajax({
        url: "ajax/roles.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(response) {
            console.log("Respuesta AJAX:", response);
            if (response.error) {
                console.error("Error:", response.error);
            } else {
                $("#idRolE").val(response["id_rol"]);
                $("#nom_rolE").val(response["nom_rol"]);
            }
        },
        error: function(xhr, status, error) {
            console.error("Error AJAX:", error);
        }
    });
});

/*=============================================
Eliminar rol
=============================================*/

$(document).on("click", ".eliminarRol", function(){
	var idRol = $(this).attr("idRolE");
	Swal.fire({
		title: '¿Está seguro de eliminar este rol?',
		text: "¡Si no lo está puede cancelar la acción!",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		cancelButtonText: 'Cancelar',
		confirmButtonText: 'Si, eliminar rol!'
	}).then(function(result){
		if (result.value) {
			var datos = new FormData();
			datos.append("idRolE", idRol);
			$.ajax({
				url: "ajax/roles.ajax.php",
				method: "POST",
				data: datos,
				cache: false,
				contentType: false,
				processData: false,
				success:function (respuesta) {
					console.log(respuesta);
					if (respuesta == "ok") {
						Swal.fire({
							icon: "success",
							title: "¡CORRECTO!",
							text: "El rol ha sido borrado correctamente",
							showConfirmButton: true,
							confirmButtonText: "Cerrar"
						}).then(function (result) {
							if (result.value){
								window.location = "roles";
                     }
                })
             }
          }
        })
      }
    })
})




