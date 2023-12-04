# Example

Это пример из руководства пользователя
библиотекой [Simple-files](https://github.com/vinogradsoft/simple-files). Описание примера можно прочитать в
разделе ["Прикладные методы"](https://github.com/vinogradsoft/simple-files/blob/master/docs/guide-ru/applied-methods.md)

## Установка

Минимальная версия php 8.0.

- Клонируйте проект себе на компьютер.
- В корне проекта запустите команду ``` composer install ```

## Запуск

Чтобы запустить команду, описанную в любом из разделов, перейдите в консоли в папку `bin` скачанного проекта:

```
cd path/to/cloned/example/bin/
```

Где `path/to/cloned` та папка в которую вы скачали пример.

### Раздел ["Копирование директорий"](https://github.com/vinogradsoft/simple-files/blob/master/docs/guide-ru/copying-directories.md)

Создавать новые модули можно командой `php copy -v=<Vendor Name> -m=<Module Name>`.
Повторный вызов команды с теми же параметрами приведет к перезаписи файлов `package.xml` и `composer.json` в модуле.

### Раздел ["Запись директорий"](https://github.com/vinogradsoft/simple-files/blob/master/docs/guide-ru/writing-directories.md)

Создать тестовый класс можно командой `php writeTo -c="<Сlass Name>"`.
Повторный вызов команды с теми же параметрами приведет к перезаписи созданного ранее тестового класса.

Пример для `\VendorName\ModuleName\Model\Model`, который существует в проекте:

```
php writeTo -c="\VendorName\ModuleName\Model\Model"
```

### Раздел ["Перемещение директорий"](https://github.com/vinogradsoft/simple-files/blob/master/docs/guide-ru/moving-directories.md)

Чтобы переместить изображение из модуля `VendorName/ModuleName`, в имени которого нет цифры 2, в папку
`example/public/images`, можно выполнить команду:

```
php move -v="VendorName/ModuleName" -p="*[!2].png"
```

### Раздел ["Удаление директорий"](https://github.com/vinogradsoft/simple-files/blob/master/docs/guide-ru/removing-directories.md)

Чтобы очистить кэш, выполните команду:

```
php delete
```

## Лицензия

Лицензия MIT (MIT). Пожалуйста, смотрите [файл лицензии](LICENSE) для получения дополнительной информации.