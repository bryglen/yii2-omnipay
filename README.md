Yii 2 Omnipay
==============
Yii 2 use omni pay based on `https://github.com/thephpleague/omnipay`

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist bryglen/yii2-omnipay "1.0.0"
```

or add

```
"bryglen/yii2-omnipay": "1.0.0"
```

to the require section of your `composer.json` file.

----------

in your main.php your configuration would look like this

```php
'components' => [
    'stripe' => [
        'class' => 'bryglen\omnipay\OmniPayComponent',
        'name' => 'Stripe',
        // optional parameters
        //'testMode' => true,
        //'currency' => 'your_currency'
        'parameters' => [
            'apiKey' => 'your_api_key'
        ]
    ]
]
```
