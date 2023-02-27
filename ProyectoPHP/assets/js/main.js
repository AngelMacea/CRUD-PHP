$(document).ready(function() {
    $("#TablaEmpleados").DataTable({
        stateSave: true,
        language: {
            "url": "https://cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json"
        },
        //Aqui se ingresa el numero de columnas que tiene la tabla
        columns: [
            {},
            {},
            {},
            {}
        ],
        order: [[1, 'asc']],
        dom: 'Bfrtip',

        //Son los botones de acciones para exportar
        buttons: [
            {
                extend: 'pdfHtml5',
                text: '<i class="fa-solid fa-file-pdf"></i> PDF',
                className: "btn btn-secondary",
                exportOptions: {
                    columns: [0, 1, 2, 3]
                }
            },
            {
                extend: 'excelHtml5',
                text: '<i class="fa-solid fa-file-excel"></i> Excel',
                className: "btn btn-secondary",
                exportOptions: {
                    columns: [0, 1, 2, 3]
                }
            },
            {
                extend: 'csvHtml5',
                text: '<i class="fa-solid fa-file-csv"></i> CSV',
                className: "btn btn-secondary"
            },
            {
                extend: 'print',
                text: '<i class="fa-solid fa-print"></i> Imprimir',
                className: "btn btn-secondary"
            },
        ]
    });
});
   


    function UpdateModal(id,codigo,nombres,apellidos,edad){
        $("#txtIDU").hide();
        $("#UpdateData").modal('show');
        //$("#UpdateData").modal('hide');
       $("#txtIDU").val(id);
       $("#txtCodigoU").val(codigo.toString().substring(3));
       $("#txtNombresU").val(nombres);
       $("#txtApellidosU").val(apellidos);
       $("#txtEdadU").val(edad);
    }
    function DeleteModal(id,codigo, empleado){
        $("#txtIDD").val(id);
        $("#txtIDD").hide();
        $("#lblCodigo").text(codigo);
        $("#lblEmpleado").text(empleado);
        $("#DeleteData").modal('show');
        
    }