


  
/*=============================================
Editar categoria
=============================================*/
$(".tableCategoria").on("click", ".btnEditCategoria", function() {
    var idCategoria = $(this).attr("idCategoria");
    console.log("ID de categoria seleccionado:", idCategoria);
    var datos = new FormData();
    datos.append("idCategoria", idCategoria);

    $.ajax({
        url: "ajax/categoria.ajax.php",
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
                $("#idCategoriaE").val(response["id_cat"]);
                $("#nom_categoriaE").val(response["nom_cat"]);
            }
        },
        error: function(xhr, status, error) {
            console.error("Error AJAX:", error);
        }
    });
});

/*=============================================
Eliminar categoria
=============================================*/

$(document).on("click", ".eliminarCategoria", function(){
	var idCategoria = $(this).attr("idCategoriaE");
	Swal.fire({
		title: '¿Está seguro de eliminar esta categoria?',
		text: "¡Si no lo está puede cancelar la acción!",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		cancelButtonText: 'Cancelar',
		confirmButtonText: 'Si, eliminar categoria!'
	}).then(function(result){
		if (result.value) {
			var datos = new FormData();
			datos.append("idCategoriaE", idRol);
			$.ajax({
				url: "ajax/categoria.ajax.php",
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
							text: "La categoria ha sido borrada correctamente",
							showConfirmButton: true,
							confirmButtonText: "Cerrar"
						}).then(function (result) {
							if (result.value){
								window.location = "categoria";
                     }
                })
             }
          }
        })
      }
    })
})




