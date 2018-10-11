# Тестовое задание

Дамп базы (MySQL) находится в файле *test2.sql* <br/>
Настройки подключения к БД - *App/Models/Db.php* <br/>
Точка входа в приложение - *index.php*

## Запись данных
* В таблицу Конверсий:
  * POST-запрос на адрес http://localhost/test/conversion/add с параметрами conversion_id, user_id, payout, datetime
* В таблицу Показы:
  * POST-запрос на адрес http://localhost/test/impression/add c параметрами impression_id, user_id, datetime

(Отдельных форм для добавления не делал, проверял с помощью Postman)

## Просмотр статистики
* по конкретному user_id по часам, в указанном временном диапазоне:
  * http://localhost/test/statistics/hours *(по умолчанию user_id = 1; from = '2018-10-01 00:00:00'; to = '2018-10-02 00:00:00')*
  * http://localhost/test/statistics/hours?user_id=1&from=2018-10-01%2008:00:00&to=2018-10-02%2000:00:00
* за текущий месяц с разбивкой по user_id:
  * http://localhost/test/statistics/month
* общая статистика по месяцам за прошедший год:
  * http://localhost/test/statistics/year
