$(document).ready(function() {
    $("#addProductForm").submit(function(event) {
        // Evita el envío del formulario por defecto
        event.preventDefault();
        $("#alert").css("display", "none");
    
        // Obtiene los valores del formulario
        var code = $("#code").val();
        var name = $("#name").val();
        var price = $("#price").val();
        var stock = $("#stock").val();
        var id = $("#id").val();

        // Validación de campos vacíos
        if (code == '' || price == '' || name =='' || stock =='') {
            $("#alert").html("Los campos están vacios -- Revisalo!");
            $("#alert").css("display", "block");
            return false;
        }

        if (id == "") {
            // Envía la solicitud AJAX para ingresar
            $.ajax({
                type: "POST",
                url: "index.php?controller=InventoryController&action=addProducts",
                data: $("#addProductForm").serialize(),
                success: function(response) {
                    response = JSON.parse(response);
                    if (response.exito) {
                        $("#toastHeader").html("¡Producto agregado!");
                        $("#toastBody").html("El producto indicado ha sido registrada con éxito");
                        $("#toast").removeClass("bg-danger");
                        $("#toast").addClass("bg-success");
                        
                        const toast = new bootstrap.Toast(document.getElementById('toast'))
                        toast.show()
                    }else{
                        $("#toastHeader").html("¡Sin éxito!");
                        $("#toastBody").html("El producto indicado no ha sido registrado, pruebe más tarde");
                        $("#toast").removeClass("bg-success");
                        $("#toast").addClass("bg-danger");
                        
                        const toast = new bootstrap.Toast(document.getElementById('toast'));
                        toast.show();
                    }
                }
            });
        } else {
            // Envía la solicitud AJAX para actualizar
            $.ajax({
                type: "POST",
                url: "index.php?controller=InventoryController&action=updProducts",
                data: $("#addProductForm").serialize(),
                success: function(response) {
                    response = JSON.parse(response);
                    if (response.exito) {
                        $("#toastHeader").html("¡Producto actualizado!");
                        $("#toastBody").html("El producto indicada ha sido actualizado con éxito");
                        $("#toast").removeClass("bg-danger");
                        $("#toast").addClass("bg-success");
                        
                        const toast = new bootstrap.Toast(document.getElementById('toast'));
                        toast.show();
                    }else{
                        $("#toastHeader").html("¡Sin éxito!");
                        $("#toastBody").html("El producto indicado no ha sido actualizada, pruebe más tarde");
                        $("#toast").removeClass("bg-success");
                        $("#toast").addClass("bg-danger");
                        
                        const toast = new bootstrap.Toast(document.getElementById('toast'));
                        toast.show();
                    }
                }
            });
        }
    });
});