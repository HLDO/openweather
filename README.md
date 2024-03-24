<p align="center"><img src='https://www.2st.com.au/wp-content/uploads/sites/8/2023/04/Weather.jpg' width='405' border='0'></p>

## PROJETO: Previsão do Tempo

### Visão Geral

Projeto teste de uma aplicação para previsão do tempo, com integração a API do OpenWeatherMap.

### Infos técnicas:

PHP 8.1

Laravel 10

AdminLTE 3

MySQL 8

Redis

## Endpoints consultados
- https://api.openweathermap.org/data/2.5/weather?q
- https://api.openweathermap.org/data/2.5/weather?id

## Pré-Requisitos
- Docker e Docker Compose previamente instalado;
- Terminal para execução de comandos.

## Instruções para instalação
- Realizar o clone do projeto:
```bash
git clone https://github.com/HLDO/openweather.git
```
- Acessar a pasta openweather;
- Executar o docker-compose:
```bash
docker-compose up -d
```
- Durante o processo de criação dos containeres, um script rodará automaticamente o composer, migração de tabelas e será gerado um link simbólico do env (apenas para este teste, visto que aplicações em produção deve-se utilizar secret-manager e/ou geração de variáveis de ambiente via CI/CD);
- Aguardar o término do download e execução dos containeres: openweather-php, openweather-mysql, openweather-nginx, openweather-redis.

## Utilização
- Acessar, de seu navegador, o ambiente principal: http://localhost:8080/
- Realizar o login com os dados informados na tela;
- Ao realizar o login, você será direcionado ao Dashboard principal;
- Em sua primeira execução, há a possibilidade de se cadastrar cidades para a exibição das previsões do tempo no Dashboard, ou popular a base de dados com algumas cidades. Para importar algumas cidades, execute o comando abaixo em seu terminal:
```bash
docker exec openweather-php php artisan db:seed --class=WeatherCitiesSeeder
```
- Novas cidades podem ser cadastradas através do menu "Gerenciar cidades" para incluí-las no Dashboard;
- Para verificar o clima de uma cidade, basta utilizar o campo de pesquisa "Pesquise sua cidade...", localizado no canto superior direito, informando o nome da cidade e o país com 2 dígitos. Ex: Curitiba, BR;
- A cada 30 minutos o sistema atualizará as informações de clima das cidades cadastradas;
- Os dados climáticos das cidades pesquisadas ficarão armazenados em cache por 30 minutos no Redis;
- É possível rodar manualmente a atualização das informações de clima das cidades cadastradas, com mais de 30 minutos desde a última atualização, através do comando:
```bash
docker exec openweather-php php artisan command:weather_update
```
- É possível atualizar as informações de clima apenas de uma cidade específica através do ID OpenWeatherMap (Ex: São Paulo - ID '3448439'), através do comando:
```bash
docker exec openweather-php php artisan command:weather_update --cityid=3448439
```
- É possível também forçar a atualização das informações de clima, independente do último horário verificado, passando o parâmetro --force=true, através do comando:
```bash
docker exec openweather-php php artisan command:weather_update --force=true
```

## Testes Unitários
- Os testes unitários da aplicação abrangem acesso, cadastro, atualização de dados, remoção e consumo de informações da API do OpenWeatherMap;
- Testes podem ser executados com o comando abaixo:
```bash
docker exec openweather-php php artisan test
```

#### Captura de telas
<table style="width: 100%;" >
<tbody>
  <tr>
    <td align="center"><img src="https://i.imgur.com/IcreBdT.png" width=501 height=538></td>
  </tr>
  <tr>
    <td align="center"><img src="https://i.imgur.com/qU0OKKY.png" width=501 height=249></td>
  </tr>
  <tr>
    <td align="center"><img src="https://i.imgur.com/YjYtxCu.png" width=501 height=249></td>
  </tr>
  <tr>
    <td align="center"><img src="https://i.imgur.com/wLMZRSR.png" width=501 height=249></td>
  </tr>

</tbody>
</table>
