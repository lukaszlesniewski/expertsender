# expertsender
Simple ExpertSender Service API (ECDP) for Laravel

#### Installation
1. Require package:
`composer require lukaszlesniewski/expertsender`

2. Add following package service provider in config/app.php file:
`Lukaszlesniewski\ExpertSender\Providers\ExpertSenderProvider::class`

3. Publish package config:
`php artisan vendor:publish --provider="Lukaszlesniewski\ExpertSender\Providers\ExpertSenderProvider"`

#### Usage examples
##### Add new subscriber

    $es = new Customers(YOUR_API_KEY);
    $es->setEmail($email);
    $es->setConsentsData(1, 'True');
    $es->setConsentsData(2, 'True');
    $result = $es->add(ExpertSenderEnum::MODE_ADD);
    
    if ($result->ifSuccess()) { ... }

##### Get information about the subscriber by e-mail
    $es = new Customers(YOUR_API_KEY);
    $result = $es->getByEmail($customerEmail);
    
##### Get information about the subscriber by customer ID
    $es = new Customers(YOUR_API_KEY);
    $result = $es->getById($customerId);

#### Results object
You can use the following methods to read result of the request

1. `ifSuccess()` – returns true if http_code for request is less than 299
2. `getCode()` – returns http code for request
3. `getInfo($option)` – returns the information defined in $option variable; if $option is null, it returns the array containing all information
4. `getResponse()` – returns array containing the result
5. `getMessage() `– returns the message based on the http code
