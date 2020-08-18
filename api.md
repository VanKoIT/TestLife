# API
### Content-Type: application/json для всех запросов, где он не указан

---
### URI: register
#### Method: POST
_Регистрация пользователя._
### Request body
    email(str): email
    name(str): ФИО пользователя
    password(str): пароль
    password_confirmation(str): подтверждение пароля, должно совпадать с password
### Success
- #### Status: 201 Created. Регистрация прошла успешно, пользователь добавлен.
### Error
- #### Status: 422 Unprocessable Entity. Валидация не пройдена.
#### Response body:
    message(str): сообщение об ошбибке
    errors(obj): массив ошибок валидации
        email|name|password[ключ, соответствует неправильному параметру] (arr): массив с сообщениями ошибок.
---
### URI: login
#### Method: POST
_Авторизация пользователя._
### Request body
    email(str): email
    password(str): пароль
### Success
- #### Status: 204 No Content. Ошибок валидации нет, авторизация прошла успешно.
### Error
- #### Status: 422 Unprocessable Entity. Валидация не пройдена.
#### Response body:
    message(str): сообщение об ошбибке
    errors(obj): массив ошибок валидации
        email|password[ключ, соответствует неправильному параметру] (arr): массив с сообщениями ошибок.
---
### Для всех запросов ниже необходима авторизация пользователя через COOKIE. Если авторизация не пройдена, то в ответ вернется ошибка:
- Status: 401 Unauthorized. 
---
### URI: like/add
#### Method: POST
_Поставить лайк тесту_
### Request body
    test_id(int): id теста, которому нужно поставить лайк

### Success
- #### Status: 204 No Content. Лайк добавлен.
### Error
- #### Status: 422 Unprocessable Entity. Пользователь уже поставил лайк тесту.
---
### URI: like/delete
#### Method: POST
_Удалить поставленный лайк_

### Request body
    test_id(int): id теста, которому нужно удалить лайк

### Success
- #### Status: 204 No Content. Лайк удален.
### Error
- #### Status: 422 Unprocessable Entity. Пользователь не ставил лайк тесту.

---
### URI: result
#### Method: POST
_Сохранение ответов пройденного теста_

### Request body
    test_id(int): id теста, ответы которого надо сохранить
    answers:(arr): массив, состоящий из id ответов пользователия
### Success
- #### Status: 200 OK. Результаты сохранены.
#### Response body:
    correct(int): количестов правильных ответов
### Error
- #### Status: 404 Not Found. Ответ(ы) не найдены.
- #### Status: 422 Unprocessable Entity. Количество вопросов не соответствует количеству ответов.
