## File upload with resized.

Attach is a file uploader for Laravel version 4.

### Installation

- [Attach on Packagist](https://packagist.org/packages/teepluss/attach)
- [Theme on GitHub](https://github.com/teepluss/laravel4-attach.git)

To get the lastest version of Theme simply require it in your `composer.json` file.

~~~
"teepluss/attach": "dev-master"
~~~

You'll then need to run `composer install` to download it and have the autoloader updated.

Once Attach is installed you need to register the service provider with the application. Open up `app/config/app.php` and find the `providers` key.

~~~
'providers' => array(

    'Teepluss\Attach\AttachServiceProvider'

)
~~~

Attach also ships with a facade which provides the static syntax for creating collections. You can register the facade in the `aliases` key of your `app/config/app.php` file.

~~~
'aliases' => array(

    'Theme' => 'Teepluss\Attach\Facades\Attach'

)
~~~

Publish config using artisan CLI.

~~~
php artisan config:publish teepluss/attach
~~~

## Usage

~~~php
 $attach = Attach::inject(array(
    'subpath' => 'tee'
))
->add('userfile')->upload()->resize();


var_dump($attach->onComplete());
~~~

## Support or Contact

If you have some problem, Contact teepluss@gmail.com
