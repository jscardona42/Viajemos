_libros = function () {
    var crearEditorial = function () {
        var data = {
            nombre: $("#nombre").val(),
            sede: $("#sede").val(),
        };

        if (data.nombre != "" && data.sede != "") {
            $.ajax({
                url: creareditoriales,
                cache: false,
                type: "POST",
                data: data,
                success: function (result) {
                    location.href = editoriales;
                },
                error: function (error) {
                    console.log("Error" + error);
                }
            });
        }
    }
    return {
        crearEditorial: crearEditorial
    }
}();

$("#btnGuardar").off("click").on("click", function () {
    _libros.crearEditorial();
})


