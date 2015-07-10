# Core II : Laravel 5.1.x Beta Development


## Functionality


### Locales
Supplements the main Rakko app's locale functionality.
Ability to control Locales through the database.


### Settings
Settings allow you to set key/values to the database or to a .json file


## Routes

* /admin/locales
* /admin/settings


## Packages


* https://github.com/illuminate3/kotoba
```
"illuminate3/kotoba": "dev-master",
Illuminate3\Kotoba\KotobaServiceProvider::class,
```


* https://github.com/vinkla/translator
```
'Vinkla\Translator\TranslatorServiceProvider'
vendor:publish --provider="Vinkla\Translator\TranslatorServiceProvider"
```


* https://github.com/anlutro/laravel-settings
```
composer require anlutro/l4-settings
anlutro\LaravelSettings\ServiceProvider::class,
'Setting' => 'anlutro\LaravelSettings\Facade'
```

```
vendor:publish --provider="anlutro\LaravelSettings\ServiceProvider"
```

* https://github.com/laracasts/Presenter
```
"laracasts/presenter": "dev-master"
```


## Thanks


*


## Partial Code or Ideas


* https://github.com/mcamara/laravel-localization/blob/master/src/config/config.php
