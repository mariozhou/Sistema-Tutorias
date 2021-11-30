$(document).ready(function() {   
    
    var table = $('#example').DataTable({   
       
           scrollY: 300,
           scrollX: 300,
           paging: true ,
       deferRender: true,
       scrollX:     300,
       scroller:    true,

       "buttons":[ 
           {
               extend:    'excelHtml5',
               text:      '<i class="fas fa-file-excel"></i> ',
               titleAttr: 'Exportar a Excel',
               className: 'btn btn-success'
           }
       ],
       language: {
               "lengthMenu": "Mostrar MENU registros",
               "zeroRecords": "No se encontraron resultados",
               "info": "Mostrando registros del START al END de un total de TOTAL registros",
               "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
               "infoFiltered": "(filtrado de un total de MAX registros)",
               "sSearch": "Buscar:",
               "oPaginate": {
                   "sFirst": "Primero",
                   "sLast":"Último",
                   "sNext":"Siguiente",
                   "sPrevious": "Anterior"
                },
                "sProcessing":"Procesando...",
           },

       //para usar los botones   
       responsive: "true",
       dom: 'Bfrtilp'
           
       
   
   });     
});