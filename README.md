# TrovCMS

[TrovCMS](https://github.com/TrovCMS/trov) is a start kit for websites, built on [Filament](https://filamentphp.com) and [Laravel](https://laravel.com).

Install globally with composer.

```bash
composer global require trovcms/installer
```

Now you can run the `new` command to quickly set up a new Trov CMS Project.

```bash
trov new my-app
```

## Options / Flags

* --force (Forces install even if the directory already exists)
* --faqs (Install FAQs Module)
* --discoveries (Install Discovery Center Module (Topic and Articles))
* --airport (Install the Airport Module (Landing Pages))
* --sheets (Install Sheets Module (Unbranded Pages))
* --blog (Install Blog Module)
* --all (Install All Modules)

## Adding modules after installation

If you've installed TrovCMS already and would like to add a module to your app you may do so with the `add` command while inside your app's root directory.

```bash
trov add --faqs
```

After adding the module you will need to run the migrations and generate the policies and permissions.

**Note**: Currently there is an issue with regenerating policies where it will regenerate all of your policies. If you have any custom policies they will be lost. Please make backups before running these commands so that you can easily re-add your changes to existing policies

```bash
php artisan:migrate
php artisan shield:generate
```

## License

Trov Installer is open-sourced software licensed under the [MIT license](LICENSE.md).