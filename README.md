## Docker way
### Prerequisites
* docker
* docker-compose
### Installation
1. `docker-compose up -d`
3. go to [http://localhost](http://localhost)

### Custom CLI Commands
- `app/composer` - Run the composer binary
- `app/console` - Run the Symfony CLI
- `app/phpcs` - Run the PHPCSFixer
- `app/phpunit` - Run the phpunit tests

## Non docker way
### Prerequisites
* postgresql
* php 7.1
* composer
### Installation
0. create file `.env.local` with the following content:
    ```dotenv
    ###> symfony/framework-bundle ###
    APP_ENV=dev
    APP_SECRET=81568b58e849f3a6bff9c1d7a72324fb
    ###< symfony/framework-bundle ###
    
    ###> doctrine/doctrine-bundle ###
    # Replace the username, password, and database_name on your credentials
    DATABASE_URL=postgres://username:password@127.0.0.1:5432/database_name
    ###< doctrine/doctrine-bundle ###
    
    ```
1. composer install
2. bin/console doctrine:database:create
2. bin/console doctrine:migrations:migrate --no-interaction
3. go to [http://localhost](http://localhost)

# API

Method `POST`
Path `/tmsg`  
Body:
```json
{
 "cid": "a65f7960-a19d-49c1-a915-c48f036e8887",
 "vst": {
     "ip": "0.0.0.0",
     "lg": "en-US",
     "rf": "http://www.beeckon.swiss",
     "ua": "Mozilla/5.0 (X11; Linux x86_64; rv:12.0) Gecko/20100101 Firefox/21.0"
  },
 "url": "http://vantino.com/mno",
  "sid": "110ec58a-a0f2-4ac4-8393-c866d813b8d1",
  "uid": "4648471f-a360-471f-91f1-008b75d74f3b"
}
```