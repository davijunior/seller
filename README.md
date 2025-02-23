<h1>Projeto Laravel</h1> 
<h2>Passos para Configuração</h2> 
<p>Siga os passos abaixo para configurar e rodar o projeto Laravel após clonar o repositório:</p> 
<h3>1. Clone o Repositório</h3> 

<h3>2. Makefile</h3>
<p><i>O repositório conta agora com os arquivos setup.sh e Makefile, você pode rodar:</i><p>

<pre>
    <code>make setup</code>
</pre>

<p>Siga as instruções pedidas no terminal.</p>
<p>Para rodar o backend, você pode rodar:</p>

<pre>
    <code>make serve</code>
</pre>

<p>Além disso, você pode configurar e rodar o frontend. (em uma segunda aba/janela do terminal)</p>
<pre>
    <code>npm install</code>
    <code>make frontend</code>
</pre>

<p>Seguindo esses passos, você acaba a configuração, caso queira fazer manualmente, pule o passo 2 e continue para os próximos passos.</p>


<h3>3. Instale as Dependências</h3>
<pre>
    <code>composer install </code>
</pre>
<h3>4. Configure o Ambiente</h3>
<p>Copie o arquivo <code>.env.example</code> para <code>.env</code> e ajuste as configurações de acordo com o seu ambiente (especialmente as configurações do banco de dados):</p>
<pre>
    <code>cp .env.example .env </code>
</pre> 
<p>Edite o arquivo <code>.env</code> com suas configurações de banco de dados, por exemplo:</p>
<pre>
    <code>
        DB_CONNECTION=mysql
        DB_HOST=127.0.0.1
        DB_PORT=3306
        DB_DATABASE=nome_do_banco
        DB_USERNAME=usuario
        DB_PASSWORD=senha
    </code>
</pre>
<h3>5. Gere a Chave da Aplicação</h3>
<pre>
    <code>php artisan key:generate </code>
</pre>
<h3>6. Migre o Banco de Dados</h3>
<pre>
    <code>php artisan migrate </code>
</pre>
<h3>7. Popule o Banco de Dados (No momento não é necessário)</h3>
<p>Se houver seeders disponíveis, você pode usá-los para popular o banco de dados:</p>
<pre>
    <code>php artisan db:seed </code>
</pre>
<h3>8. Instale as Dependências do NPM</h3>
<p>Instalar Vue e suas dependências:</p>
<pre>
    <code>npm install </code>
</pre>
<h3>9. Compile os Assets (Opcional)</h3>
<p>Compile os assets frontend:</p>
<pre>
    <code>npm run dev</code>
</pre>
<h3>10. Inicie o Servidor de Desenvolvimento</h3>
<pre>
    <code>php artisan serve </code>
</pre>