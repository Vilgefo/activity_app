два разделенных проекта с названиями landing и activity.
landing – это основной сайт
activity – система учета визитов пользователя

При переходе на ЛЮБЫЕ страницы landing передается информация в проект activity по протоколу json-rpc версии 2.0. Информация содержит url, дату и ip.
На странице (landing): /admin/activity выведена история активности с пагинацией. Поля таблицы: URL, Количество визитов, Последнее посещение. Эту информация запрашивается в проекте activity (json-rpc запрос).

install
- docker-compose up -d
- wait about 10 seconds after containers starts.
- go to localhost:8080
