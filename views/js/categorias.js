


  
/*=============================================
Editar categoria
=============================================*/
$(".tableCat").on("click", ".btnEditCat", function() {
    var idCat = $(this).attr("idCat");
    console.log("ID de categoria seleccionado:", idCat);
    var datos = new FormData();
    datos.append("idCat", idCat);

    $.ajax({
        url: "ajax/categorias.ajax.php",
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
                $("#idCatE").val(response["id_cat"]);
                $("#nom_catE").val(response["nom_cat"]);
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

$(document).on("click", ".eliminarCat", function(){
	var idCat = $(this).attr("idCatE");
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
			datos.append("idCatE", idCat);
			$.ajax({
				url: "ajax/categorias.ajax.php",
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




