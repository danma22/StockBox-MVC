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
                    response = JSON.parse(response);
                    if (response.exito) {
                        $("#toastHeader").html("¡Categoria agregada!");
                        $("#toastBody").html("La categoria indicada ha sido registrada con éxito");
                        $("#toast").removeClass("bg-danger");
                        $("#toast").addClass("bg-success");
                        
                        const toast = new bootstrap.Toast(document.getElementById('toast'))
                        toast.show()
                    }else{
                        $("#toastHeader").html("¡Sin éxito!");
                        $("#toastBody").html("La categoria indicada no ha sido registrada, pruebe más tarde");
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
                url: "index.php?controller=CategoriesController&action=updCategories",
                data: $("#addCategoryForm").serialize(),
                success: function(response) {
                    response = JSON.parse(response);
                    if (response.exito) {
                        $("#toastHeader").html("¡Categoria actualizada!");
                        $("#toastBody").html("La categoria indicada ha sido actualizada con éxito");
                        $("#toast").removeClass("bg-danger");
                        $("#toast").addClass("bg-success");
                        
                        const toast = new bootstrap.Toast(document.getElementById('toast'))
                        toast.show()
                    }else{
                        $("#toastHeader").html("¡Sin éxito!");
                        $("#toastBody").html("La categoria indicada no ha sido actualizada, pruebe más tarde");
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