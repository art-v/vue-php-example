# Установка
## Запускаем фронт
* Зайти в директорию Front Vue
* Выполнить npm install
* После устновки запустить npm run dev


## Запускаем бэк (Нужен установленный docker)
* Зайти в директорию BackPhp/docker_example
* Запустить docker-compose up -d
* Далее нужно выполнить команду docker exec example_php composer install
* Когда проект будет запущен нужно перейти по адресу http://localhost/install чтобы создалась таблица с постами


После устновки можно перейти на http://localhost:3000/