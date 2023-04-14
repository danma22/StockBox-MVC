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
    
        // Validación de campos vacíos
        if (username == '' || password == '' || name =='' || lastname_p =='' || lastname_m =='' || email =='') {
            $("#alert").html("Los campos están vacios -- Revisalo!");
            $("#alert").css("display", "block");
            return false;
        }
    
        // Envía la solicitud AJAX
        $.ajax({
            type: "POST",
            url: "index.php?controller=UserController&action=addUsers",
            data: $("#addUsersForm").serialize(),
            success: function(response) {
                response = JSON.parse(response);
                if (response.exito) {
                    $("#toastHeader").html("¡Usuario agregado!");
                    $("#toastBody").html("El usuario indicado ha sido registrada con éxito");
                    $("#toast").removeClass("bg-danger");
                    $("#toast").addClass("bg-success");
                    
                    const toast = new bootstrap.Toast(document.getElementById('toast'))
                    toast.show()
                }else{
                    $("#toastHeader").html("¡Sin éxito!");
                    $("#toastBody").html("El usuario indicado no ha sido registrado, pruebe más tarde");
                    $("#toast").removeClass("bg-success");
                    $("#toast").addClass("bg-danger");
                    
                    const toast = new bootstrap.Toast(document.getElementById('toast'))
                    toast.show()
                }
            }
        });
    });
});