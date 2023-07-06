# g4f_prova

Informações iniciais para configuração

1. Abra o cmd (terminal) na pasta prova
2. Certifique-se de ter o composer instalado na sua máquina. Caso não tenha, baixe [aqui](https://getcomposer.org/download/)
3. Execute e certifique-se de estar funcionando algum servidor web como Apache. [XAMPP](https://www.apachefriends.org/download.html) é recomendado
4. Rode o comando `composer install`. Esse processo pode demorar alguns minutos.
5. Certifique-se de que o Laravel foi instalado com sucesso rodando o comando `php artisan`
6. Caso o Laravel esteja instalado, rode o comando `php artisan migrate`. Será perguntado se deseja criar a base de dados. Digite 'yes'.
7. Após a base criada, popule com o comando `php artisan db:seed --class=Questao3Seeder`. Caso deseje alterar a quantidade de itens a serem populados na base de dados, altere no arquivo 'Questao3Seeder.php'. Como padrão, são criadas 10 séries e são gerados 30 intervalos, atrelados aleatoriamente entre as séries geradas.
8. Rode o comando `php artisan generate:key`
9. Caso deseje, rode o comando `php artisan test` para executar os testes das 3 questões.
10. O sistema está pronto para uso. Rode o comando `php artisan serve`.

---

**Observações:**

- Certifique-se de ter o Laravel instalado e configurado corretamente antes de executar os comandos mencionados acima.
- Certifique-se de ter as dependências necessárias instaladas, como o Composer e um servidor web (por exemplo, Apache) para executar o Laravel.
- Certifique-se de ter as permissões adequadas para executar os comandos mencionados acima.
- Caso ocorra um erro no passo 8. Crie a pasta "Unit" no diretório tests