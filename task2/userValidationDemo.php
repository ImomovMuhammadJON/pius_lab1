<?php

include "User.php";
include "../vendor/autoload.php";

use \Symfony\Component\Validator\ValidatorBuilder;

function validateUser(User $user) {
    $validator = (new ValidatorBuilder())->addMethodMapping('loadValidatorMetadata')->getValidator();

    $errors = $validator->validate($user);

    if(count($errors) > 0) {
        foreach ($errors as $error) {
            echo $error."<br>";
        }
    }
}

$users[] = new User(1234, "test", "email@example.com", 12345678);

$users[] = new User(123, "test", "email@example.com", 12345678);

$users[] = new User(1234, "test1", "email@example.com", 12345678);

$users[] = new User(1234, "test", "emailexample.com", 12345678);

$users[] = new User(1234, "test", "email@example.com", 1234567);

foreach ($users as $user) {
    validateUser($user);
}
