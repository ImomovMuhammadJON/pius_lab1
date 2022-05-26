<?php

include "../vendor/autoload.php";

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Mapping\ClassMetadata;

class User
{
    public $id;
    public $name;
    public $email;
    private $password;
    private $creationDateTime;

    /**
     * @param $id - идентификатор пользователя
     * @param $name - имя пользователя
     * @param $email - email
     * @param $password - пароль
     */
    public function __construct($id, $name, $email, $password)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->creationDateTime = date('Y-m-d H:i:s');
    }

    public static function loadValidatorMetadata(ClassMetadata $metadata)
    {
        $metadata->addPropertyConstraints("id", [
            new Assert\Length(['min' => 4,
                'max' => 16]),
            new Assert\NotBlank(),
        ]);
        $metadata->addPropertyConstraints("name", [
            new Assert\NotBlank(),
            new Assert\Regex([
                'pattern' => '/\d/',
                'match' => false,
                'message' => 'Name can not contain a number'
            ])
            ]);
        $metadata->addPropertyConstraints("email", [
            new Assert\Email(),
            new Assert\NotBlank()
        ]);
        $metadata->addPropertyConstraints("password", [
            new Assert\Length(['min' => 8]),
            new Assert\NotBlank(),
        ]);
    }

    /**
     * Возвращает дату и время создания пользователя
     * @return DateTime - дата и время создания пользователя
     */
    public function getCreationDateTime(): DateTime
    {
        return DateTime::createFromFormat('Y-m-d H:i:s', $this->creationDateTime);
    }
}
