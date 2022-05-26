<?php

class Comment
{
    private $user, $message;

    /**
     * @param $user - пользователь
     * @param $message - сообщение
     */
    public function __construct($user, $message)
    {
        $this->user = $user;
        $this->message = $message;
    }

    /**
     * Возвращает пользователя
     * @return User
     */
    public function getUser() : User
    {
        return $this->user;
    }

    /**
     * Возвращает сообщение
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }
}
