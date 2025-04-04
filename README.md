# SdkTecnospeedPlugMessage (Não oficial)

Kit de Desenvolvimento de Software (SDK) de consumo de APIs da PlugMessage - Tecnospeed, para envio de mensagens via WhatsApp  

Este SDK encapsula por métodos de classes PHP todas as chamadas da API.
Respeitando as nomenclaturas de parâmetros e estrutura de retorno (response) das chamadas (request).

Os arquivos estão organizados por diretórios conforme abaixo:

```
|+-- Context
|    +-- Messages.php
|+-- Types
|    +-- ButtonList.php
|    +-- OptionList.php
|+-- Utils
|    +-- HTTPClient.php
+--Configuration.php
```

## Instalação Via Compose

Instale o pacote via **composer** utilizando o comando ```composer require o4l3x4ndr3/SdkTecnospeedPlugMessage```.

### Utilizando arquivo .htaccess

Utilizando o arquivo ```.htaccess``` da sua aplicação (caso não possua, crie), declare as seguintes variáveis:

```
PLUGMESSAGE_CLIENT_TOKEN
PLUGMESSAGE_INSTANCE_ID
PLUGMESSAGE_INSTANCE_TOKEN
```

### Utilizando a classe Configuration

Também é possível configurar a comunicação com a API através da classe ``Configuration``.

```
use O4l3x4ndr3\SdkTecnospeedPlugMessage\Configuration;
use O4l3x4ndr3\SdkTecnospeedPlugMessage\Context\Messages;

# Definindo o token e ambiente... 
$config = new Configuration('***client_token***', '***instance_id***', '***instance_token***');
```

## Testar

Para utilizar os arquivos de exemplos, edite o arquivo `_config.php,` localizado na pasta `samples/context`, e substitua o valor das variáveis `$client_token`, `$instance_id`, `$instance_token` para os respectivos valores fornecidos. Após isso, rode o PHP Server na sua máquina local (ou container Docker), utilizando o seguinte comando:

```
php -S localhost:3333 -t samples
```

## Contextos da API

As classes de contextos são constituídas por métodos de consumo da API e possuem suporte a ```namespace``` do PHP,
possível utilizá-los através da palavra-chave ```use```, conforme exemplo abaixo:

```
use O4l3x4ndr3\SdkTecnospeedPlugMessage\Context\Messages;

### ENVIAR UM MENSAGEM SIMPLES ###

# Instanciando a classe
$message = new Messages();
$message->sentText('27998788****', 'Olá mundo!');

# ou através de chamada de forma anônima:
(new Messages())->getById('27998788****', 'Olá mundo!');
```

Todas as classes possuem assinaturas que remetem aos métodos documentados no site oficial da
API ([https://atendimento.tecnospeed.com.br/hc/pt-br/categories/6855680308887-PlugMessage](https://atendimento.tecnospeed.com.br/hc/pt-br/categories/6855680308887-PlugMessage)).

## Objetos de Tipos

Os chamados objetos de tipo, são classes que de modelos representados nos contextos de requisição da API e não possuem
métodos, apenas propriedades. Um objeto de tipo pode um modelo de dados estruturado e deve ser instanciado e atribuídos
os seus respetivos valores de propriedades para assim sejam utilizados nas classes de contextos.

## Contribuição

Caso deseja contribuir para melhorar e manter esse pacote envie e-mail para alexandre@2plug.com.br e solicite acesso ao
repositório informando o seu perfil no github.
