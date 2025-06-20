Fazendo a simulação do ambiente
- Instalar o XAMP.
    Vá ao site https://www.apachefriends.org/pt_br/index.html;
    Selecione uma das opções abaixo (de acordo com seu sistema operacional);
    Após concluir o download, basta executar o instalador e avançar até concluir
    a instalação
- Clonar o projeto para a máquina
    Vá a pasta htdocs dentro da pasta do XAMP, normalmente em
    C:\xampp\htdocs (verificar pasta que você instalou);
    Exclua o conteúdo de dentro dessa pasta;
    Usando o git, clone o projeto para essa pasta com o comando:
    git clone https://github.com/apkauapires/Projeto-Ler-Mais.git
- Criar o banco de dados
    Na pasta do projeto abrir o arquivo:
    C:\xampp\htdocs\Projeto-Ler-Mais\SQL criação do banco.txt
    Abrir o XAMP control panel e iniciar o apache e o mysql
    No seu navegador, vá ao endereço localhost/phpmyadmin (é comum demorar
  um pouco pra abrir);
    Dentro do phpmyadmin clique em “SQL”
    Dentro de SQL, cole o conteúdo do arquivo “SQL criação do banco.txt” e em
    seguida clique em “Executar”
- Acessando o sistema
    Acesse o endereço localhost/projeto-ler-mais
    Acessar o sistema como administrador, basta usar o email “admin@sistema”
    e a senha “admin”.
    Para acessar com um usuário qualquer, basta criar uma conta.
