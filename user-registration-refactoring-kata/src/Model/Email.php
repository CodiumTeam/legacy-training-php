<?php

namespace App\Model;

class Email
{
    public function __construct(
        public string $from,
        public string $to,
        public string $subject,
        public string $body,
    )
    {
    }
}
