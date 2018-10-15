# Laravel HMVC Structure - Sample Project
A sample project, building and using HMVC structure for Laravel 5.x.

## What is HMVC?
You can find out here: [HMVC - WIKI](https://en.wikipedia.org/wiki/Hierarchical_model%E2%80%93view%E2%80%93controller)

## Laravel HMVC Structure - this project
- Top - Base MVC
    - Module 1 MVC
    - Module 2 MVC
    - ...
    - Module n MVC

## Module Structure
- Module
    - Configs: Your config files here.
    - Controllers: Your controllers here.
    - Languages: your language files here (translation)
        - en
        - vi
        - ...
    - Libraries: your special library classes file here.
    - Models: your models here.
    - Views: your view file here.
- routes.php: routes of this module.
- <ModuleName>ServiceProvider.php: Register service for Laravel.

## How to create a new module?
1. Copy the sample module folder and rename it to your module name (Ex: Administration)
2. Change `HomeServiceProvider.php` to `<ModuleName>ServiceProvider.php`, also change class name too.
3. Open `<ModuleName>ServiceProvider.php`, change `$moduleName` to your module name (lowercase)
4. Open `config/app.php`, find `providers` property.
5. Insert your provider class into `providers` (Ex: `App\Modules\Home\HomeServiceProvider::class`), insert at the end of this array.
6. Test your module now :D

## How to get (View, Language, Config)?
Remember the `$moduleName`? We will use it to load views, langs,...
For example, my `$moduleName` is **home**.

### Load view
We need to insert module alias in the beginning like this:
```php
return view('home::home.view', $arrData);
```

### Get language (translation) text
```php
trans('home::home.hello'); // Hello
```

### Config
To deal with your own config, we have 2 steps:

#### 1. Create a new config for your module:
Just create a config file (Laravel format) in `<ModulePath>/Configs`.

#### 2. Register Config
1. Open `<ModuleName>ServiceProvider.php`
2. In `register` method, you need to call this method to register your own config file:
```php
    // usage
    $this->mergeConfigFrom('PATH', 'ALIAS');
    
    // example
    $this->mergeConfigFrom(__DIR__ . '/Configs/homeconfig.php', 'homeconfig');
``` 

#### 3. Get Config Value
Just like normal config, you can get your config via your alias like this:
```php
config('homeconfig.text'); // get 'text' in homeconfig
```

## Migrations

### How it works?
When you run `php artisan migrate`, it will run like this:
```php
- Base/Core (database/migrations)
- Thought modules [priority by index of providers (config/app.php)]
    - Module 1
    - Module 2
    - ...
    - Module n
```

### Create migration
Just create migration file (Laravel format) in `<ModulePath>/Migrations`.

Note:
- Filename must be: `yyyy_MM_dd_hhmmss_class_name_here.php`
- And the class name, need to define as **Pascal Case** from filename: ClassNameHere

## Final
I'll create a laravel package (console) to create a module later :D

If you got any problems or any questions, feel free to ask me.

Copyright &copy; 2018 by Phat Tran Minh - Seth Phat.