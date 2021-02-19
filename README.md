# Выполненное [тестовое задание](http://bit.ly/growavephpjunior) на позицию PHP программиста в компании Growave

Работающая версия располагается по следующему адресу: [http://temirlan.ml/blog](http://temirlan.ml/blog)
<br />

<hr />
<br />

## Инструкция по установке:

1. Скопировать репозиторий:

```bash
git clone https://github.com/ttermechikov/growave-test-task.git
```

2. Зайти в папку проекта:

```bash
cd growave-test-task
```

3. Установить зависимости:
   <br />(ранее на компьютере должны быть установлены [Composer](https://getcomposer.org/download/) и [Nodejs](https://nodejs.org/ru/))

```bash
composer install
npm install
```

4. Скопировать и настроить ".env" файл, прописав параметры подключения к MySQL. Создать базу данных "laravel" в MYSQL

```bash
cp .env.example .env
```

4. Сгенерировать ключ шифрования сессий и кук:

```bash
php artisan key:generate
```

5. Запустить миграции:

```bash
php artisan migrate
```

6. Заполнить базу данных тестовыми данными:

```bash
php artisan db:seed --class AppSeeder
```
