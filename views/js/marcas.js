


  
/*=============================================
Editar marca
=============================================*/
$(".tableMarca").on("click", ".btnEditMarca", function() {
    var idMarca = $(this).attr("idMarca");
    console.log("ID de marca seleccionado:", idMarca);
    var datos = new FormData();
    datos.append("idMarca", idMarca);

    $.ajax({
        url: "ajax/marcas.ajax.php",
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
                $("#idMarcaE").val(response["id_marca"]);
                $("#nom_marcaE").val(response["nom_marca"]);
            }
        },
        error: function(xhr, status, error) {
            console.error("Error AJAX:", error);
        }
    });
});

/*=============================================
Eliminar marca
=============================================*/

$(document).on("click", ".eliminarMarca", function(){
	var idMarcaE = $(this).attr("idMarcaE");
	Swal.fire({
		title: '¿Está seguro de eliminar esta marca?',
		text: "¡Si no lo está puede cancelar la acción!",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		cancelButtonText: 'Cancelar',
		confirmButtonText: 'Si, eliminar marca!'
	}).then(function(result){
		if (result.value) {
			var datos = new FormData();
			datos.append("idMarcaE", idMarcaE);
			$.ajax({
				url: "ajax/marcas.ajax.php",
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
							text: "La marca ha sido borrada correctamente",
							showConfirmButton: true,
							confirmButtonText: "Cerrar"
						}).then(function (result) {
							if (result.value){
								window.location = "marcas";
                     }
                })
             }
          }
        })
      }
    })
})




