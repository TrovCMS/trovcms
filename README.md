# TrovCMS

[TrovCMS](https://github.com/TrovCMS/trov) is a starter kit for websites, built on [Filament](https://filamentphp.com) and [Laravel](https://laravel.com).

## Installation

### With TrovCMS Installer

Install globally with composer.

```bash
composer global require trovcms/installer
```

Now you can run the `new` command to quickly set up a new Trov CMS Project.

```bash
trov new my-app
```

### Without TrovCMS Installer

Install with composer.

```bash
composer create-project trovcms/trov <my-cool-trov-app>
```

## Adding modules

```bash
php artisan trov:add --faqs
```

## Module Options

* --force (Forces install even if the directory already exists)
* --faqs (Install FAQs Module)
* --discoveries (Install Discovery Center Module (Topic and Articles))
* --airport (Install the Airport Module (Landing Pages))
* --sheets (Install Sheets Module (Unbranded Pages))
* --blog (Install Blog Module)
* --all (Install All Modules)

## License

Trov Installer is open-sourced software licensed under the [MIT license](LICENSE.md).