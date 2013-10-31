## File upload with resized.

Attach is a file uploader for Laravel version 4.

### Installation

- [Attach on Packagist](https://packagist.org/packages/teepluss/attach)
- [Attach on GitHub](https://github.com/teepluss/laravel4-attach.git)

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

    'Attach' => 'Teepluss\Attach\Facades\Attach'

)
~~~

Publish config using artisan CLI.

~~~
php artisan config:publish teepluss/attach
~~~

## Usage

Basic upload
~~~php
$attach = Attach::inject(array(
    'subpath' => 'tee'
))
->add(Input::file('userfile'))
->upload();

var_dump($attach->onComplete());
~~~

Remote upload
~~~php
$attach = Attach::inject(array(
    'remote' => true
))
->add('http://...../file.png')
->upload();
~~~

Resizing
~~~php
$attach = Attach::open('/path/to/image.png')->resize();

// To specific scales from config.

$attach = Attach::open('/path/to/image.png')->resize(array('l', 'm'));
~~~

Upload and Resize
~~~php
$attach = Attach::add(Input::file('userfile'))->upload()->resize();
~~~

Remove
~~~php
$attach = Attach::open($path)->remove();
~~~

You can inject your config anytime
~~~php
$attach = Attach::inject(array(
    ..... YOUR CONFIG .....
))
->upload();
~~~

Callback
~~~php
Attach::inject(array(

    'onUpload' => function($result)
    {
        //
    },

    'onComplete' => function($results)
    {
        //
    },

    'onRemove' => function($result)
    {
        //
    }

))
->upload()
->resize();
~~~

## Support or Contact

If you have some problem, Contact teepluss@gmail.com


[![Support via PayPal](https://rawgithub.com/chris---/Donation-Badges/master/paypal.jpeg)](https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=9GEC8J7FAG6JA)