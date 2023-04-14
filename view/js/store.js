$(document).ready(function() {
    $("#addStoreForm").submit(function(event) {
        // Evita el envío del formulario por defecto
        event.preventDefault();
        $("#alert").css("display", "none");
    
        // Obtiene los valores del formulario
        var name = $("#name").val();
        var id = $("#id").val();
    
        // Validación de campos vacíos
        if (name == '') {
            $("#alert").html("Los campos están vacios -- Revisalo!");
            $("#alert").css("display", "block");
            return false;
        }
    
        // Envía la solicitud AJAX de acuerdo a si se va actualizar o no
        if (id == "") {
            $.ajax({
                type: "POST",
                url: "index.php?controller=StoreController&action=addStore",
                data: $("#addStoreForm").serialize(),
                success: function(response) {
                    response = JSON.parse(response);
                    if (response.exito) {
                        $("#toastHeader").html("¡Tienda agregada!");
                        $("#toastBody").html("La tienda indicada ha sido registrada con éxito");
                        $("#toast").removeClass("bg-danger");
                        $("#toast").addClass("bg-success");
                        
                        const toast = new bootstrap.Toast(document.getElementById('toast'))
                        toast.show()
                    }else{
                        $("#toastHeader").html("¡Sin éxito!");
                        $("#toastBody").html("La tienda indicada no ha sido registrada, pruebe más tarde");
                        $("#toast").removeClass("bg-success");
                        $("#toast").addClass("bg-danger");
                        
                        const toast = new bootstrap.Toast(document.getElementById('toast'))
                        toast.show()
                    }
                }
            });
        } else {
            $.ajax({
                type: "POST",
                url: "index.php?controller=StoreController&action=updStore",
                data: $("#addStoreForm").serialize(),
                success: function(response) {
                    response = JSON.parse(response);
                    if (response.exito) {
                        $("#toastHeader").html("¡Tienda actualizada!");
                        $("#toastBody").html("La tienda indicada ha sido actualizada con éxito");
                        $("#toast").removeClass("bg-danger");
                        $("#toast").addClass("bg-success");
                        
                        const toast = new bootstrap.Toast(document.getElementById('toast'))
                        toast.show()
                    }else{
                        $("#toastHeader").html("¡Sin éxito!");
                        $("#toastBody").html("La tienda indicada no ha sido actualizada, pruebe más tarde");
                        $("#toast").removeClass("bg-success");
                        $("#toast").addClass("bg-danger");
                        
                        const toast = new bootstrap.Toast(document.getElementById('toast'))
                        toast.show()
                    }
                }
            });
        }
        
    });
});