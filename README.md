* rode composer install e preencha os dados de acordo com a sua configuraçao

* no console dê: 
$cd <project_path>

*digite o comando abaixo para criar o banco
$app/console doctrine:database:create

* Rode o arquivo /app/assetic/meritt_dump.sql que contém a estrutura do banco 
E dados pré-cadastrados
OU

*Rode o comando <project_path>/app/console doctrine:database:update --force
    -Ira atualizar o banco do projeto de acordo com as especificações das classes

*Com o web server levantado acesse o caminho do sistema
use /student para crud de estudantes
use /question para crud de questões
use /exam para crud de provas
use /alternative para crud de alternativas
use /evaluation para crud de de gabaritos
e use /evaluation/list para recuperar o filtro de estudantes e seus pontos
