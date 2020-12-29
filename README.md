# Clayful PHP SDK

Official PHP SDK for [clayful.io](https://clayful.io).

## Tests

```sh
vendor/bin/phpunit
```

## Links

- [API & SDK Documentation](https://dev.clayful.io)

## Laravel Support

### Installation

To install through composer, run the following command from terminal:

```
composer require "clayful/clayful"
```

If you are still using below version 5.4 of Laravel, the final steps for you are to add the service provider of the
package and alias the package. To do this open your config/app.php file.

Add a new line to the providers array:

```
Clayful\ServiceProvider::class
```

And add a new line to the aliases array:

```
'ClayfulFacade' => Clayful\Facade::class,
```

Now you're ready to start using the clayful in your application

### Configuration

To configure the package you need to publish config first:

```
php artisan vendor:publish --tag=clayful-config
```

Then, set the api token on `.env`:

```
CLAYFUL_API_TOKEN={Your api token}
```

### Usage

You could use clayful core api with the facade
like `ClayfulFacade::request('{ModelName}','{method}', ...{any arguments here})`. All arguments after 3rd parameters and
order on facade request method will match with clayful arguments `payload`, `options`, `id`, etc.

Examples:

|Core|Facade|
|---|---|
|`Vendor::create($payload, $options)`|`ClayfulFacade::request('Vendor', 'create', $payload, $options)`|
|`Product::get($id, $options)`|`ClayfulFacade::request('Product', 'get', $id, $options)`|

Test code example:

```
namespace Tests\Unit\Clayful;

use ClayfulFacade;
use Tests\TestCase;

class VendorTest extends TestCase
{
    public function test_get_vendor()
    {
        $vendorId = 'ABCD';
        $vendor = ClayfulFacade::request('Vendor', 'get', $vendorId);

        self::assertEquals($vendorId, $vendor->data['_id']);
    }
}
```
