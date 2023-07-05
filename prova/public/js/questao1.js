$(document).ready(function(){
    impressao();//inicializa os valores na tabela
    initDataTable();//inicializa o DataTable na tabela
});

function initDataTable(){
    var tabela = $('#tabela-resultado');//Inicializo o objeto tabela
    
    dataTable = $('#tabela-resultado').DataTable({//Inicializa o DataTable
        destroy: true,
        scrollCollapse: false,
        ordering: false,
        info: true,
        searching: true,
        language: {
            url: '//cdn.datatables.net/plug-ins/1.10.24/i18n/Portuguese-Brasil.json'
        },
        lengthMenu: [
            [25, 50, 100, -1],
            [25, 50, 100, 'All'],
        ]
    });
     
     $('#tabela-resultado tfoot th').each(function () {//Cria os campos para pesquisa no rodapé
        var title = $(this).text();
        $(this).html('<input type="text" style = "width:100%" placeholder="' + title + '" />');
    });

    
    tabela.on('keyup change clear', 'tfoot input', function(){// Aplica filtro nos rodapés
        var columnIndex = tabela.find('tfoot input').index(this);
        dataTable.column(columnIndex).search(this.value).draw();
    });
}

function divisores(valor){//retorna PRIMO ou os divisores de um número??
    let divisores = [];
    for(let i=1; i<=100; i++){
        if(valor%i==0){
            divisores.push(i);
        }
    }
    if(divisores.length<=2)//caso tenha somente 1 e ele mesmo
        return "{"+divisores+"} <b>[PRIMO]</b>"
    return "{"+divisores+"}";
}

function impressao() {//cria os dados dentro da tabela para cada um dos valores
    let div = $('#resultado');
    for (let i = 1; i <= 100; i++) {
      let linha = $('<tr>').html('<td>' + i + '</td><td>' + divisores(i) + '</td>');
      div.append(linha);
    }
}
  
