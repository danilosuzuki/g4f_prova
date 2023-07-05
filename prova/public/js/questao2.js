$(document).ready(function(){
    initDataTable('#tabela-referencia'); // inicializa a tabela-referencia
    initDataTable('#tabela-resultado'); // inicializa a tabela-resultado
});

function initDataTable(tableId) 
{
    var table = $(tableId);

    // Inicializa o DataTable
    var dataTable = table.DataTable({
        destroy: true,
        scrollCollapse: false,
        ordering: false,
        info: true,
        searching: true,
        language: {
            url: '//cdn.datatables.net/plug-ins/1.10.24/i18n/Portuguese-Brasil.json'
        },
        lengthMenu: [
            [10, 25, 100, -1],
            [10, 25, 100, 'All'],
        ]
    });

    // cria os inputs no rodapé
    table.find('tfoot th').each(function(){
        var title = $(this).text();
        $(this).html('<input type="text" style="width:100%" placeholder="' + title + '" />');
    });

    // Aplica filtro nos rodapés
    table.on('keyup change clear', 'tfoot input', function(){
        var columnIndex = table.find('tfoot input').index(this);
        dataTable.column(columnIndex).search(this.value).draw();
    });
}