


  
/*=============================================
Editar usuario
=============================================*/
$(".tableUser").on("click", ".btnEditUser", function() {
  var idUser = $(this).attr("idUser");
  console.log("ID de usuario seleccionado:", idUser);
  var datos = new FormData();
  datos.append("idUser", idUser);

  $.ajax({
      url: "ajax/usuarios.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function(response) {
          console.log("Respuesta AJAX:", response);
          if (response) {
              $("#idPerfilE").val(response["id"]);
              $("#nom_userE").val(response["usuario"]);
              $("#nom_usuariosE").val(response["nombre"]);
              $("#pass_userE").val(response["password"]);
              $('select[name="rol_userE"]').val(response["rol"]);
          } else {
              console.error("No se recibió una respuesta válida.");
          }
      },
      error: function(xhr, status, error) {
          console.error("Error AJAX:", error);
      }
  });
});


/*=============================================
Eliminar usuario
=============================================*/

$(document).on("click", ".eliminarUsuario", function(){
	var idUsuario = $(this).attr("idUsuarioE");
	Swal.fire({
		title: '¿Está seguro de eliminar este usuario?',
		text: "¡Si no lo está puede cancelar la acción!",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		cancelButtonText: 'Cancelar',
		confirmButtonText: 'Si, eliminar usuario!'
	}).then(function(result){
		if (result.value) {
			var datos = new FormData();
			datos.append("idUsuarioE", idUsuario);
			$.ajax({
				url: "ajax/usuarios.ajax.php",
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
							text: "El usuario ha sido borrado correctamente",
							showConfirmButton: true,
							confirmButtonText: "Cerrar"
						}).then(function (result) {
							if (result.value){
								window.location = "usuarios";
                     }
                })
             }
          }
        })
      }
    })
})




