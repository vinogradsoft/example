# Example

Это пример из руководства пользователя
библиотекой [vinogradsoft/simple-files](https://github.com/vinogradsoft/simple-files)

## Установка

Минимальная версия php 8.0.

- Клонируйте проект себе на компьютер.
- В корне проекта запустите команду ``` composer install ```

## Запуск

Чтобы запустить команду, описанную в разделе "Копирование директорий" перейдите в консоли в папку с проектом:

```
cd path/to/cloned/example/bin/
```

Где `path/to/cloned` та папка в которую вы скачали пример.
После этого можно создавать новые модули командой `php cli -v=<Vendor Name> -m=<Module Name>`.
Повторный вызов команды с теми же параметрами приведет к перезаписи файлов `package.xml` и `composer.json` в модуле.

## Лицензия

Лицензия MIT (MIT). Пожалуйста, смотрите [файл лицензии](LICENSE) для получения дополнительной информации.