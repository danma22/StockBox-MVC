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
                    window.location.href = "index.php?controller=StoreController&action=loadPage"
                }
            });
        } else {
            $.ajax({
                type: "POST",
                url: "index.php?controller=StoreController&action=updStore",
                data: $("#addStoreForm").serialize(),
                success: function(response) {
                    window.location.href = "index.php?controller=StoreController&action=loadPage"
                }
            });
        }
        
    });
});
