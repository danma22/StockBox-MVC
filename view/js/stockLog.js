$(document).ready(function() {
    $(".modifyStock").click(function(event) {
        var boton = $(event.target);
        var action = boton.attr('id');

        $("#alert").css("display", "none");
    
        // Obtiene los valores del formulario
        var ref = $("#ref").val();
        var units = $("#units").val();
        var id = $("#id").val();

        // Validación de campos vacíos
        if (ref == '' || units == '') {
            $("#alert").html("Los campos están vacios -- Revisalo!");
            $("#alert").css("display", "block");
            return false;
        }

        if (action == "addStock") {
            // Envía la solicitud AJAX para ingresar
            $.ajax({
                type: "POST",
                url: "index.php?controller=InventoryController&action=addStockLog",
                data: $("#addStockForm").serialize()+"&type=1",
                success: function(response) {
                    window.location.href = "index.php?controller=InventoryController&action=detailProductPage&data="+id;
                }
            });
        } else if (action == "delStock") {
            // Envía la solicitud AJAX para actualizar
            $.ajax({
                type: "POST",
                url: "index.php?controller=InventoryController&action=addStockLog",
                data: $("#addStockForm").serialize()+"&type=2",
                success: function(response) {
                    window.location.href = "index.php?controller=InventoryController&action=detailProductPage&data="+id;
                }
            });
        }
    });
});