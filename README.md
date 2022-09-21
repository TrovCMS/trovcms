# TrovCMS

[TrovCMS](https://github.com/TrovCMS/trov) is a starter kit for websites, built on [Filament](https://filamentphp.com) and [Laravel](https://laravel.com).

## Installation

### Step 1
Install with composer.
```bash
composer create-project trovcms/trovcms <my-cool-trov-app>
```

### Step 2
Then, update your database settings in `.env` to what is appropriate for your app.
```php
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=trovcms
DB_USERNAME=root
DB_PASSWORD=
```

### Step 3
And finally, run the Trov install command.

```bash
cd <my-cool-trov-app>
php artisan trov:install
```

## Adding modules

TrovCMS comes with some additional modules that you can install into your application.

```bash
php artisan trov:add
```

## Module Options

* FAQs
* Blog
* Airport (Landing Pages)
* Sheets (Unbranded Pages, *typically used for SEO initiatives*)
* Discovery Center (This is similar to a blog with Topics and Articles, *typically used for SEO initiatives*)

## Demo Content

TrovCMS comes with demo content that you can use to seed your database if you just want to explore the CMS. To seed it you can either run:

```bash
php artisan trov:demo
```

or

```bash
php artisan db:seed --class=DemoSeeder
```

## License

TrovCMS is open-sourced software licensed under the [MIT license](LICENSE.md).