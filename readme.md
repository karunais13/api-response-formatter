# Response Formatter 
[![Build Status](https://img.shields.io/github/forks/karunais13/api-response-formatter.svg)](https://github.com/karunais13/api-response-formatter)
[![Latest Stable Version](https://img.shields.io/packagist/v/karunais13/api-response-formatter.svg)](https://packagist.org/packages/karunais13/api-response-formatter)
[![PHP version](https://img.shields.io/packagist/php-v/karunais13/api-response-formatter.svg)](https://packagist.org/packages/karunais13/api-response-formatter)
[![License](https://img.shields.io/packagist/l/karunais13/api-response-formatter.svg)](https://packagist.org/packages/karunais13/api-response-formatter)

This package allows to standardise and structure response. Especially for api. Structure of the response will be : 
```json
{
       "succeeded"	: "true/false (boolean)",
       "code"		: "Success/Error Code (integer)" ,
       "message"	: "Success/Error Message (string)",
       "objects"	: "Return data (*)"
}
```
## Installation

Install the usual [composer](https://getcomposer.org/) way.

###### Run this command at root directory of your project
```json
"composer require karu/api-response-formatter"
```

#### For Laravel 5.5 and below add provider in config file like below : 
###### app/config/app.php 
```php
	...
	
	'providers' => array(
		...
		Karu\ApiResponse\ApiResponseProvider::class,
	],
	
	...

        'aliases' => [
            ...
            ApiResponse: Karu\ApiResponse\Facades\ApiResponseFacade::class
        ]
```
#

### Configure

Copy the packages config to respective folder.

```
 php artisan vendor:publish --provider='Karu\ApiResponse\ApiResponseProvider'
```

###### app/config/responsecode.php

```php

<?php
return [
    'message' => [
        0           => '',

        // Sample Code setup
        // Model    : User
        100         => 'User not found.',
        101         => 'Incorrect combination of login information.',
        102         => 'You\'re not allow to use the same current password.',
        103         => 'Failed to update new password.',
        104         => 'This email is not available.',
        105         => 'Failed to create new user account.',
        106         => 'Failed to upload avatar.',
        107         => 'Failed to update user account.',
        108         => 'Invalid image file format.',
        109         => sprintf('Image file size cannot larger than %dMB.', 5),
        110         => 'Old password incorrect.',
        111         => 'Email does not exits. Please contact admin to reset the password.',
        112         => 'Password successfully updated',
        113         => 'User FB ID already exists',
        114         => 'Too many login attempt',
        115         => 'Failed to update new token.',
    ],
];
    
```

## Basic Usage

Import facade into the file and return it. Like below :

### 

For Laravel : 
```php
    ....
    use ApiResponse;
    
    function example(){
        ....
        ....
        ....

        return ApiResponse::res(true, 100, []);
    }

```

## Methods Available

#### res( $status, $code, $data )
* Gets Response message based on the code
    * @param boolean $status
    * @param integer $code
    * @param string|object|array|null $data 
```php

ApiResponse::res(true, 100, [])

```
#### resCustom( $status, $message, $data )
* Return response without code
    * @param boolean $status
    * @param string $message
    * @param string|object|array|null $data 
```php

ApiResponse::resCustom(true, "User not found", [])

```
#

#### Change Alias (for laravel): 
###### app/config/app.php 
```php
	...

        'aliases' => [
            ...
            {user alias name}: Karu\ApiResponse\Facades\ApiResponseFacade::class
        ]
```
Example : 

```php
	...

        'aliases' => [
            ...
            NpRes: Karu\ApiResponse\Facades\ApiResponseFacade::class
        ]
```



## Licence

[View the licence in this repo.](https://github.com/karunais13/api-response-formatter/blob/master/LICENSE)
