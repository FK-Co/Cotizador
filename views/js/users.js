


  
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