# Projeto Final - Software de Gestão de Prontuário


Instalação do ambiente de desenvolvimento

1. Clone o repositório do GitHub

2. Instale o Composer (se necessário)
3. Exclua a pasta vendor e arquivos composer (composer.json, composer.lock e composer.phar)
4. Execute o camando a seguir na pasta do projeto:

    composer require "twig/twig: ^3.10"

5. Faça as alterações necessárias com o banco de dados:
   
   - Modifique o acesso na classe Connection e o arquivo authenticate.php
   - Crie as tabelas da aplicação
