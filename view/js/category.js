$(document).ready(function() {
    $("#addCategoryForm").submit(function(event) {
        // Evita el envío del formulario por defecto
        event.preventDefault();
        $("#alert").css("display", "none");
    
        // Obtiene los valores del formulario
        var name = $("#name").val();
        var desc = $("#desc").val();
        var id = $("#id").val();
    
        // Validación de campos vacíos
        if (name == '' || desc == '') {
            $("#alert").html("Los campos están vacios -- Revisalo!");
            $("#alert").css("display", "block");
            return false;
        }
    
        // Envía la solicitud AJAX de acuerdo a si se va actualizar o no
        if (id == "") {
            $.ajax({
                type: "POST",
                url: "index.php?controller=CategoriesController&action=addCategories",
                data: $("#addCategoryForm").serialize(),
                success: function(response) {
                    window.location.href = "index.php?controller=CategoriesController&action=loadPage";
                }
            });
        } else {
            $.ajax({
                type: "POST",
                url: "index.php?controller=CategoriesController&action=updCategories",
                data: $("#addCategoryForm").serialize(),
                success: function(response) {
                    window.location.href = "index.php?controller=CategoriesController&action=loadPage";
                }
            });
        }
        
    });
});