# Profiles : Laravel 5.1.x Beta Development


## Functionality


### Profiles
Supplements the main Rakko app's locale functionality.
Ability to control Locales through the database.


## Routes

* /admin/profiles


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
