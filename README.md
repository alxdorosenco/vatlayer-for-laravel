# Vatlayer for Laravel

This is a package of the service Vatlayer adapted for Laravel framework.
You can find additional information in the documentation via this link 

<a href="https://vatlayer.com/documentation">https://vatlayer.com/documentation </a>

# How to install?

1. First of all you need to install the package:
    ```
    composer require alxdorosenco/vatlayer-for-laravel
    ```
2. Next, you need to put access key in your .env file:
    ```
   VATLAYER_ACCESS_KEY=<vatlayer access key>
    ```
3. Also, you can export config file of the package
   ```
   php artisan vendor:publish --provider="AlxDorosenco\VatlayerForLaravel\VatlayerServiceProvider" --tag="config"
   ```

## Endpoint 1: Simple VAT number validation

"validate" endpoint
```php
Vatlayer::validate()->setVatNumber('LU26375245')->toArray();
Vatlayer::validate()->setVatNumber('LU26375245')->setFormat(1)->toJson();
```

```php
Vatlayer::validate()
                ->setVatNumber('LU26375245')
                ->setCallback('CALLBACK_FUNCTION')
                ->setFormat(1)
                ->toJson();
```

## Endpoint 2: VAT rate for single EU member state

"rate" endpoint - via country code
```php
Vatlayer::rate()->setCountryCode('GB')->toArray();
Vatlayer::rate()->setCountryCode('GB')->setFormat(1)->toJson();
```

"rate" endpoint - via custom IP address
```php
Vatlayer::rate()->setIpAddress('176.249.153.36')->toArray();
Vatlayer::rate()->setIpAddress('176.249.153.36')->setFormat(1)->toJson();
```

"rate" - get EU VAT rate for a specific country - via client IP address
```php
Vatlayer::rate()->setCountryCode('GB')->setClientIp(1)->toArray();
Vatlayer::rate()->setCountryCode('GB')->setClientIp(1)->toJson();
```

## Endpoint 3: VAT rates for all EU member states
"rate_list" endpoint
```php
Vatlayer::rateList()->toArray();
Vatlayer::rateList()->setFormat(1)->toJson();
```

## Endpoint 4: Price calculation
"price" endpoint
```php
Vatlayer::price()->setAmount(100)
                ->setCountryCode('GB')
                ->setType('medical')
                ->setIncl(1)
                ->toArray();
                
Vatlayer::price()->setAmount(100)
                ->setCountryCode('GB')
                ->setType('medical')
                ->setIncl(1)
                ->setFormat(1)
                ->toJson();
```

## Endpoint 5: Reduced VAT Rates - Types of Goods
"types" endpoint
```php
Vatlayer::types()->toArray();
Vatlayer::types()->setFormat(1)->toJson();
```

## License
Released under the MIT License, see [LICENSE](LICENSE).

