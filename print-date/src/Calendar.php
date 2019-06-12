<?php

namespace PrintDate;

class Calendar
{
    public function now()
    {
        return date("Y-m-d H:i:s");
    }
}