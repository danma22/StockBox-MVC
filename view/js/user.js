$(document).ready(function() {
    $("#addUsersForm").submit(function(event) {
        // Evita el envío del formulario por defecto
        event.preventDefault();
        $("#alert").css("display", "none");
    
        // Obtiene los valores del formulario
        var name = $("#name").val();
        var lastname_p = $("#lastname_p").val();
        var lastname_m = $("#lastname_m").val();
        var username = $("#username").val();
        var email = $("#email").val();
        var password = $("#password").val();
        var id = $("#id").val();

        // Validación de campos vacíos
        if (username == '' || password == '' || name =='' || lastname_p =='' || lastname_m =='' || email =='') {
            $("#alert").html("Los campos están vacios -- Revisalo!");
            $("#alert").css("display", "block");
            return false;
        }

        if (id == "") {
            // Envía la solicitud AJAX para ingresar
            $.ajax({
                type: "POST",
                url: "index.php?controller=UserController&action=addUsers",
                data: $("#addUsersForm").serialize(),
                success: function(response) {
                    window.location.href = "index.php?controller=UserController&action=loadPage";
                }
            });
        } else {
            // Envía la solicitud AJAX para actualizar
            $.ajax({
                type: "POST",
                url: "index.php?controller=UserController&action=updUsers",
                data: $("#addUsersForm").serialize(),
                success: function(response) {
                    window.location.href = "index.php?controller=UserController&action=loadPage";
                }
            });
        }
    });
});