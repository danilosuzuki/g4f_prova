@extends('index')

@section('content')
	<div class="row justify-content-center">
		<div class="col-12">
			
			<div class="p-3 mb-5">
				<h1 class="text-center my-5">Informações gerais do projeto</h1>
				<ul>
					<li>O projeto foi realizado em <b>PHP</b> utilizando o framework <b>Laravel</b>.</li>
					<li>O projeto foi realizado com padrão <b>MVC</b> e <b>OOP</b>.</li>
					<li>Todos os <b>3 exercícios</b> propostos se encontram no projeto, e você pode navegar por eles através do <b>menu superior</b>.</li>
					<li>Foram utlizadas as bibliotecas para o front-end: <b>Bootstrap</b>, <b>Jquery</b>, <b>DataTables</b>.</li>
					<li>Para reutilização de código, o layout para o <b>header</b> e o <b>.container</b> que engloba todos os exercícios foi feito no arquivo <b>index.blade.php</b>.</li>
					<li>Foram utilizadas as <b>rotas</b> web que se encontram no arquivo <b>web.php</b>.</li>
					<li>Foi aplicado parcialmente o <b>DesignPattern SOLID</b></li>
					<li>Foram criadas <b>Migrations, Seeders e Factories</b> para criação do banco de dados para a <b>Questao 3</b>.</li>
					<li>O projeto se encontra utilizando <b>Eloquent</b> para a interação com a base de dados.</li>
					<li><b>Não</b> foram utilizadas:
						<b><ul>
							<li>Filters</li>
							<li>Middlewares</li>
							<li>Rules</li>
							<li>Requests</li>
							<li>Casts</li>
							<li>Listeners</li>
							<li>Observers</li>
						</ul></b>
					</li>
				</ul>

				<h2 class="text-center my-5" id='arquitetura'>Informações sobre arquitetura de projeto</h2>
				<ul>
					<li><b>Requisição é recebida</b> e <b>roteada</b> pelo Router do Laravel para uma <b>Controller correspondente</b>.</li>
					<li><b>Controller</b> gerencia a requisição e <b>encaminha a um responsável</b> e retorna a <b>resposta adequada</b> (view, objetos, dados, etc).</li>
					<li><b>Services</b> recebem requisições que necessiatam de aplicação de <b>regra de negócios</b> e tratam delas, e <b>encaminham</b> as requisições que necessitam de consulta.</li>
					<li><b>Respositores</b> recebem e processam requisições que necessiatam de consulta na base de dados <b>regra de negócios</b>.</li>
					<li><b>Interfaces</b> definem as necessidades das outras classes implementarem. </li>
					<li><b>Binds</b> para injeções de dependências se encontram no <b>register</b> do <b>AppServiceProvider</b>.</li>
				</ul>
					
					<div id="accordion" class="mt-5">
					  <div class="accordion-item">
						<h2 class="accordion-header" id="headingOne">
						  <button class="btn collapsed w-100 text-center" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
							<h2>Informações sobre a Resolução da Questão 1</h2>
						  </button>
						</h2>
						<div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordion">
						  <div class="accordion-body">
							<ul>
								<li>Iniciei a Questão 1 entendendo que era necessário criar um script em JS para imprimir todos os valores de 1 a 100 e informar quais eram seus divisores e uma informação adicional nos números primos.</li>
								<li>Criei, em seguida, uma seção para destacar a questão exposta, bem como seu enunciado.</li>
								<li>Para visualização, eu criei uma tabela para a inserção da respota em html e para facilitar a seleção no javascript eu dei ao <code>&#60;tbody&#62;</code> um id.</li>
								<li>Para a impressão, eu criei uma função <code>impressao()</code> para ficar responsavél por selecionar o elemento HTML no qual seria inserido a informação.</li>
								<li>Criei uma função <code>divisores(valor)</code> para ser responsável por receber um valor e encontrar todos os divisores deles.</li>
								<li>Em caso da quantidade de divisores ser menor ou igual a 2 ('1' e o prórprio número) ele retorna além dos divisores dentro do formato pedido, uma informação de que o número é primo.</li>
								<li>Em seguida, me deparei com uma tabela muito extensa, e para facilitar a filtragem e reduzir um pouco do tamanho da página, eu inicializei a tabela como um <code>DataTable()</code>.</li>
							</ul>
							<dl>
								<dt>Disclaimer</dt>
								<dd>
									<p>Para a encontrar os valores que fossem divisores do número recebido pelo parâmetro, eu realizei uma divisão <code>valor%i</code> durante um for que percorria por todos os 100 números.</p>
									<p>Entretanto, reparei que no enunciado foi solicitado, na verdade, que fossem encontrados os múltiplos daquele número.</p>
									<p>Portanto, pela definição de primos, entendi que a solicitação de múltiplos, na verdade, se tratava de divisores.</p>
									<p>Porém, caso minha interpretação esteja equivocada e realmente for necessário apresentar os múltiplos (até 100), pode-se realizar a divisão <code>valor%i</code> para encontrar os divisores e definir os números primos e também realizar a divisão <code>i%valor</code> para encontrar os múltiplos</p>
									<p></p>
								</dd>
							</dl>
						</div>
					  </div>
					  <div class="accordion-item">
						<h2 class="accordion-header" id="headingTwo">
						  <button class="btn collapsed w-100 text-center" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
							<h2>Informações sobre a Resolução da Questão 2</h2>
						  </button>
						</h2>
						<div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordion">
						  <div class="accordion-body">
							<ul>
								<li>Iniciei a Questão 2 entendendo que era necessário criar um script em PHP para gerar um array com todos os caractéres da tabela ASCII (entre ',' e '|'), da qual estaria embaralhada (de forma aleatória) e com um caractér faltando.</li>
								<li>Criei, em seguida, uma seção para destacar a questão exposta, bem como seu enunciado.</li>
								<li>Para visualização, eu criei 2 tabelas e uma seção de destaque para o caractér retirado.</li>
								<li>A primeira tabela, eu imprimi todos o caracteres, em ordem, e sem exclusão.</li>
								<li>A segunda tabela, eu imprimi a tabela aleatória e com a exclusão.</li>
								<li>Para ambas as tabelas eu apliquei o DataTable para reduzir o tamanho da página, bem como facilitar a procura de elementos específicos. Também como um adicional, eu incluí uma coluna com o valor em decimal para os caracteres nas tabelas.</li>
								<li>Se tratando da lógica aplicada no processo</li>
								<li><ul>
									<li>Eu realizei primeiro o roteamento do Router para o Controller e do Controller para uma classe de Service (que ficou responsável pelas regras de negócio).</li>
									<li>Dentro da classe de Service, eu criei 2 funções <code>geraASCII(random)</code> e <code>encontraCharFaltando($referencia,$ascii)</code>.</li>
									<li>A função <code>geraASCII(random)</code> recebe como parametro um boolean que é responsável por determinar se haverá ou não a randomização da tabela gerada, bem como a exclusão de um elemento da mesma.</li>	
									<li>A função <code>encontraCharFaltando($referencia,$ascii)</code> recebe uma tabela de referencia e uma tabela modificada, compara ambas e retorna uma string com o valor diferente encontrado.</li>
								</ul></li>
							</ul>
							<dl>
								<dt>Disclaimer 1</dt>
								<dd>
									<p>Com base na regra de negócio do exercício eu utilizei o shuffle para fazer o embaralhamento após a geração, pois dessa forma com a mesma função posso gerar uma tabela de referencia para impressao e/ou comparação.</p>
									<p>E utilizei a função <code>current(array)</code> para transformar o primeiro índice em uma string, já que, na regra do execercício somente um valor seria retornado da função <code>array_dif(array1,array2)</code>. Caso houvessem mais valores, poderia-se utilizar a função <code>implode(separador,array)</code> ou  <code>join(separador,array)</code> por exemplo.</p>
								</dd>
								<dt>Disclaimer 2</dt>
								<dd>
									<p>Como forma mais eficiente em código e para um código mais limpo, poderia ter sido realizado apenas uma tabela que fosse gerada, emabaralhada, e no processo de retiragem de um dos elementos, esse elemento fosse salvo.</p>
									<p>Porém, como no enunciado pedia que fosse feito "Em seguida, escreva um código..." interpretei que essa forma não atenderia bem ao requisito, e decidi então criar uma função separada para que fosse procurado o elemento faltante.</p>
									<p>Compreendo também que poderia-se fazer a soma do valor de todos caracteres do <code>range(',','|')</code> e depois a soma do vetor com o valor retirado, e subtrair um pelo outro para encontrar o caractére faltando. Porém como para exibição no front eu já iria utilizar a tabela de referencia, optei por aplicar a comparação utilizando o <code>array_diff($array1,$array2)</code> que além da praticidade de já ter os dois arrays, fica mais fácil a legibilidade do código e entender a lógica realizada.</p>
								</dd>
							</dl>
						  </div>
						</div>
					  </div>
					  <div class="accordion-item">
						<h2 class="accordion-header" id="headingThree">
						  <button class="btn collapsed w-100 text-center" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
							<h2 class="text-center">Informações sobre a Resolução da Questão 3</h2>
						  </button>
						</h2>
						<div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordion">
						  <div class="accordion-body">
							<ul>
								<li>Iniciei a Questão 3 entendendo que era necessário criar uma estrutura no qual pudesse ser realizada o salvamento de informçãoes conforme a estrutura de dados passada, bem como uma estrutura para inserção de informção e consulta dessas informçãoes na base de dados.</li>
								<li>Inicialmente, criei Migrations, Seeder, Factories e Models para modelar e popular a base de dados.</li>
								<li>Iniciei o front-end criando uma seção para destacar a questão exposta, bem como seu enunciado.</li>
								<li>Para visualização, eu criei uma tabela para a inserção da próxima série e uma tabela adicional para consulta de todas as séries na base de dados.</li>
								<li>Para a inserção de dados, criei um pequeno <code>&#60;form&#62;</code> que é responsável por receber os dados do usuário caso assim necessário, bem como disparar uma requisição para consulta com os dados inseridos.</li>
								<li>No Back-end realizei as divisões da lógica em Controller, Services, Repositories e Interfaces conforme descrito na seção de <a href="#arquitetura">Arquitetura do projeto</a>.</li>
								<li>Toda lógica envolvida na seleção da próxima série a ser exibida foi realizada na consulta dentro de Questao3Repository. Para isso segui a seguinte lógica:</li>
								<li><ol>
									<li>Inicializei o dia da semana atual e a data atual, bem como realizei a configuração de locale para o horário de São Paulo e a incialização do contador de iteração em 0.</li>
									<li>Crio um <code>do-while</code> para procurar pela próxima série enquanto não encontrar uma.</li>
									<li>Inicializo um objeto novo da classe de intervalos.</li>
									<li>Consulto inicialmente se há alguma série no dia informado com horario maior que o horário informado.</li>
									<li>Opcionalmente verifico se a série é a informada.</li>
									<li>Em seguida faço a ordenação (que é aplicada para verificar a primeira ocorrencia nos casos acima) bem como faço a seleção de uma model com <code>first()</code>.</li>
									<li>Caso tenha retornado alguma model, o loop é quebrado (ou caso ja tenha dado a volta durante uma semana) e retorno o objeto com <code>load</code> para carregar os dados da série também.</li>
								</ol></li>
							</ul>
						  </div>
						</div>
					  </div>
					</div>

			</div>
		</div>
	</div>

@endsection