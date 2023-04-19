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
                    window.location.href = "index.php?controller=InventoryController&action=loadPage"
                }
            });
        } else {
            // Envía la solicitud AJAX para actualizar
            $.ajax({
                type: "POST",
                url: "index.php?controller=InventoryController&action=updProducts",
                data: $("#addProductForm").serialize(),
                success: function(response) {
                    window.location.href = "index.php?controller=InventoryController&action=loadPage"
                }
            });
        }
    });
});