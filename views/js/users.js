


/*=============================================
Subir imagen temporal usuarios
=============================================*/

$("input[name='subirImgUser']").change(function(){

    var imagen = this.files[0];
    
    /*=============================================
      VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
      =============================================*/
  
      if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png"){
  
        $("input[name='subirImgUser']").val("");
  
         swal({
            title: "Error al subir la imagen",
            text: "¡La imagen debe estar en formato JPG o PNG!",
            type: "error",
            confirmButtonText: "¡Cerrar!"
          });
  
      }else if(imagen["size"] > 2000000){
  
        $("input[name='subirImgUser']").val("");
  
         swal({
            title: "Error al subir la imagen",
            text: "¡La imagen no debe pesar más de 2MB!",
            type: "error",
            confirmButtonText: "¡Cerrar!"
          });
  
      }else{
  
        var datosImagen = new FileReader;
        datosImagen.readAsDataURL(imagen);
  
        $(datosImagen).on("load", function(event){
  
          var rutaImagen = event.target.result;
  
          $(".previsualizarImgUser").attr("src", rutaImagen);
  
        })
  
      }
  
  })
  
  
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
              $("#nom_usuariosE").val(response["nombre"]);
              $("#nom_userE").val(response["usuario"]);
              $("#pass_userE").val(response["password"]);
              $(".previsualizarImgUser").attr("src", response["foto"]);
              // Seleccionar el rol adecuado
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