var dias = ['Segunda-feira', 'Terça-feira', 
            'Quarta-feira', 'Quinta-feira', 
            'Sexta-feira', 'Sábado', 'Domingo'];// Array com os dias em portugues da semana
var IDTimer //ID do timer para a função de contagem regressiva para a próxima série

$(document).ready(function(){
    procurarProxima(); //Inicia a tela com a próxima séria
    initDataTable();
});

function pesquisarID(id){
  $('#serie').val(id);
  procurarProxima();
}

function procurarProxima(){
    //Inicializa horario/dia/serie para mandar na URL
    var horario = ($('#horario').val() != '' ? $('#horario').val() : null)
    var dia = ($('#dia').val() != '' ? $('#dia').val() : null)
    var serie = ($('#serie').val() != '' ? $('#serie').val() : null)
    //Faz uma requisição GET para receber as informações da próxima série
    $.get('/questao3/proxima/' + horario + '/' + dia + '/' + serie, function(retorno) {
        setTimeout(function() {
          $('#card').removeClass('slide-in');
          $('#card').addClass('slide-out');
        }, 0);

        $('#titulo_proximo').text(retorno.serie["titulo"]);
        $('#horario_proximo').html('<b>'+dias[retorno.dia_da_semana-1]+'</b> às <b>'+retorno.horario+'</b>');
        $('#informacao_proximo').text('Programa exibido no canal '+retorno.serie["canal"]);
        $('#genero_proximo').text(retorno.serie["genero"]);
        setTimeout(function() {
          $('#card').removeClass('slide-out');
          $('#card').addClass('slide-in');
        }, 1000);
        
        var [hora, minuto, segundo] = retorno.horario.split(':'); //Separa horas:minutos:segundos em variaveis
        contagemRegressiva(retorno.dia_da_semana, hora, minuto, segundo);//Cria uma nova contagem
      });
}


function contagemRegressiva(dia_da_semana, hora, minuto, segundo) {
    var agora = new Date(); //Inicializa um objeto Date (padrao é o valor atual)
    var proximaData = new Date();
    proximaData.setHours(hora, minuto, segundo); //Inicializa os valores passados como argumento
    
    // para evitar valores negativos, adiciona +7
    var diferenca_em_dias = (7 + dia_da_semana - agora.getDay()) % 7;
    proximaData.setDate(agora.getDate() + diferenca_em_dias); //Configuro a proxima data
    
    //caso a próxima data ja tenha passado, adiciona +7
    if (proximaData < agora) {
      proximaData.setDate(7 + proximaData.getDate());
    }

    clearInterval(IDTimer);//Caso ja tenha algum Intervalo configurado, limpa ele.
    IDTimer = setInterval(function() { 
        
      let tempoAtualizado = new Date(); //Calcula o novo tempo
      let diferença_de_tempo = proximaData - tempoAtualizado; //Calcula a nova diferença
      
      if (diferença_de_tempo <= 0) {// Se o timer alcançou uma nova série
        procurarProxima(); // Chama a próxima Série
        return;
      }
      
      // Calcula individualmente o tempo restante
      let segundos = Math.floor((diferença_de_tempo / 1000) % 60);
      let minutos = Math.floor((diferença_de_tempo / 1000 / 60) % 60);
      let horas = Math.floor((diferença_de_tempo / (1000 * 60 * 60)) % 24);
      let dias = Math.floor(diferença_de_tempo / (1000 * 60 * 60 * 24));
      
      //Formata individualmente os tempos para adicionar um 0 caso necessário
      segundos = String(segundos).padStart(2, '0');
      minutos = String(minutos).padStart(2, '0');
      horas = String(horas).padStart(2, '0');
      dias = String(dias).padStart(2, '0');

      //Exibe o timer decrescente, e esconde os dias caso não haja uma espera maior que 1 dia.
      $('#timer').text((dias < 1 ? '' : dias + ' Dias ') + horas.padStart(2, '0') + ':' + minutos.padStart(2, '0') + ':' + segundos.padStart(2, '0'));
    }, 1000)// Atualiza o timer a cada segundo;
    
}

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
        if(title != 'Pesquisar'){
          $(this).html('<input type="text" style = "width:100%" placeholder="' + title + '" />');
        }else{
          $(this).text('');
        }
          
    });

    
    tabela.on('keyup change clear', 'tfoot input', function(){// Aplica filtro nos rodapés
        var columnIndex = tabela.find('tfoot input').index(this);
        dataTable.column(columnIndex).search(this.value).draw();
    });
}

 