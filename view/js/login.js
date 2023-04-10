$(document).ready(function() {
    $("#authForm").submit(function(event) {
        // Evita el envío del formulario por defecto
        event.preventDefault();
        $("#alert").css("display", "none");
    
        // Obtiene los valores del formulario
        var user = $("#user").val();
        var pass = $("#pass").val();
    
        // Validación de campos vacíos
        if (user == '' || pass == '') {
            $("#alert").html("Los campos están vacios -- Revisalo!");
            $("#alert").css("display", "block");
            return false;
        }
    
        // Envía la solicitud AJAX
        $.ajax({
            type: "POST",
            url: "index.php?controller=LoginController&action=check",
            data: $("#authForm").serialize(),
            success: function(response) {
                response = JSON.parse(response);
                if (response.exito) {
                    window.location.href = response.url;
                }else{
                    $("#alert").html("El usuario y/o contraseña son incorrectos <br>Ingresa de nuevo!");
                    $("#alert").css("display", "block");
                }
            }
        });
    });
});