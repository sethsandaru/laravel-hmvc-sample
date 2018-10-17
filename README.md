# Laravel HMVC Structure - Sample Project
A sample project, building and using HMVC structure for Laravel 5.x.

## What is HMVC?
You can find out here: [HMVC - WIKI](https://en.wikipedia.org/wiki/Hierarchical_model%E2%80%93view%E2%80%93controller)

Key advantages (M.O.R.E): 
- Modularization: Reduction of dependencies between the disparate parts of the application.
- Organization: Having a folder for each of the relevant triads makes for a lighter work load.
- Reusability: By nature of the design it is easy to reuse nearly every piece of code.
- Extendibility: Makes the application more extensible without sacrificing ease of maintenance.

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

You don't need to have full structure to work properly. Create the one that you need to use.

## How to create a new module?
1. Create your module folder inside `app/Modules`
2. Inside your module folder, create folder that you need like the structure above (Controllers, Views,...)
3. Test your module.

## How to get (View, Language, Config)?
Module folder name is the alias name to let us load views, language text,...     
Example: I have **Home** module.

### Load view
We need to insert module alias in the beginning like this:
```php
return view('Home::home.view', $arrData);
```

### Get language (translation) text
```php
trans('Home::home.hello'); // Hello
```

### Config
To deal with your own config, we have 2 steps:

#### 1. Create a new config for your module:
Just create a config file (Laravel format) in `<ModulePath>/Configs`.

#### 2. Register Config
1. Open `HMVCServiceProvider.php`
2. In `$configFile` array, add your config file and alias in here:
```php
private $configFile = [
    // alias => config file location/path
    'homeconfig' => 'Home/Configs/homeconfig.php',
    
    // more here
];
``` 

#### Get Config Value
Just like normal config, you can get your config via your alias like this:
```php
config('homeconfig.text'); // get 'text' in homeconfig
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

## Final
I'll create a laravel package (console) to create a module later :D

If you got any problems or any questions, feel free to ask me.

Copyright &copy; 2018 by Phat Tran Minh - Seth Phat.