# LaravelSurveyJs

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Total Downloads][ico-downloads]][link-downloads]

Laravel Survey Manager system based on surveyjs library. Take a look at [contributing.md](contributing.md) to see a to do list.
<br>
<img src="https://i.imgur.com/o9RAHmp.gif" />
<br>

## Installation

1. In your terminal:

```bash
$ composer require dkvhin/laravelsurveyjs
```

2. Publish the config file & run the migrations

```bash
php artisan vendor:publish --provider="Dkvhin\LaravelSurveyJs\LaravelSurveyJsServiceProvider"
php artisan migrate
```

3. Create a new survey on your-project-domain/admin/survey

4. [optional] Change values in config/survey-manager.php (route prefix, middleware, builder theme etc.)

## Usage

TODO

## Change log

Please see the [changelog](changelog.md) for more information on what has changed recently.
``

## Contributing

Please see [contributing.md](contributing.md) for details and a todolist.

## Credits

- [Ervin Musngi][link-author]
- [Aidyn Makhataev][link-author]
- [All Contributors][link-contributors]

## License

MIT. Please see the [license file](license.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/dkvhin/laravelsurveyjs.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/dkvhin/laravelsurveyjs.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/dkvhin/laravelsurveyjs/master.svg?style=flat-square
[ico-styleci]: https://styleci.io/repos/12345678/shield
[link-packagist]: https://packagist.org/packages/dkvhin/laravelsurveyjs
[link-downloads]: https://packagist.org/packages/dkvhin/laravelsurveyjs
[link-travis]: https://travis-ci.org/dkvhin/laravelsurveyjs
[link-styleci]: https://styleci.io/repos/134269033
[link-author]: https://github.com/dkvhin

[link-contributors]: ../../contributors]
