<?php

namespace App\Model;

interface EmailsSender
{
    public function send(Email $email);
}
