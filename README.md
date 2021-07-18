# Laravel HMVC Structure - Sample Project
A sample project, building and using HMVC structure for Laravel 5.7+, 6, 7, 8.

## What is HMVC?
You can find out here: [HMVC - WIKI](https://en.wikipedia.org/wiki/Hierarchical_model%E2%80%93view%E2%80%93controller)

Key advantages (M.O.R.E): 
- Modularization: Reduction of dependencies between the disparate parts of the application.
- Organization: Having a folder for each of the relevant triads makes for a lighter work load.
- Usability: By nature of the design it is easy to reuse nearly every piece of code.
- Extensibility: Makes the application more extensible without sacrificing ease of maintenance.

### Other advantages
- Able to achieve Microservice with ease. Splitting up the Modules into Services would be blazing fast.
- In the Project itself it's like a Mono-Repo strategy.

## Laravel HMVC Structure - this project
- Top - Base MVC - Laravel App
    - Module 1 MVC - Small Laravel App
    - Module 2 MVC - Small Laravel App
    - ...
    - Module n MVC - Small Laravel App

## Module Structure
- ModuleName
    - Configs: Your config files here.
    - Http:
        - Controllers: Your controllers here.
        - Requests
    - Languages: your language files here (translation)
        - en
        - vi
        - ...
    - Libraries: your special library classes file here.
    - Models: your models here.
    - Views: your view file here.
    - Routes: all the routes of the module
        - routes.php: routes of this module.
    - Services: your service handlers here
    - Providers: Service Provider
    - Policies: policies of the module

So you can see, a Module is just a small Laravel Application. You don't have to create a full structure to make it work.

The most important part is: `ServiceProvider`. Without that we can't boot up the Module.

## How to create a new module?
1. Create your module folder inside `app/Modules`
2. Inside your module folder, create folder that you need like the structure above (ServiceProvider, Views,...)
3. Create a ServiceProvider and register it in `configs/app.php`
4. Test your module

## How to access View/Language/Config?
Module folder name is the alias name to let us load views, language text,...     
Example: I have **Home** module. Alias: `home`

### Load view
We need to insert module alias in the beginning like this:
```php
return view('home::home.view', $arrData);
```

### Get language (translation) text
```php
trans('home::home.hello'); // Hello
__('home::home.world'); // World
```

#### Get Config Value
Just like normal config, you can get your config via your alias like this:
```php
config('home.text'); // get 'text' in home alias
```

## Migrations

### How it works?
When you run `php artisan migrate`, it will run like this:
```php
- Base/Core (database/migrations) first
- Thought each module
    - Module 1
    - Module 2
    - ...
    - Module n
```

### Create migration
Just create migration file (Laravel format) in `<ModulePath>/Migrations`.

Note:
- Filename must be: `yyyy_MM_dd_hhmmss_class_name_here.php` (follow Laravel format)

## Console Command registration
- Create your command in `app/Modules/<insert_module_name/Console/Commands`
- Open your module's ServiceProvider, register it in `boot` method like this:
```php
$this->commands([
    MyCommand::class,
]);
```

Note: Older Laravel versions might not have this opportunity. The current project is using Laravel 5.7

## Final

If you got any problems or any questions, feel free to ask me.

Copyright &copy; 2018-2021 by Seth Phat.
