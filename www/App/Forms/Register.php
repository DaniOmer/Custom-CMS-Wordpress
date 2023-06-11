<?php

namespace App\Forms;

use Core\Validator;

class Register extends Validator
{


    public string $method = "POST";

    public function __construct()
    {
        $this->config = [
            "config" => [
                "method" => $this->method,
            ],
            "inputs" => [
                "firstname" => [
                    "rules" => ["required", "min:2", "max:120"],
                ],
                "lastname" => [
                    "rules" => ["required", "min:2", "max:120"],
                ],
                "email" => [
                    "rules" => ["required", "email"],
                ],
                "password" => [
                    "rules" => ["required", "min:8", "max:120"],
                ],
                "password_confirm" => [
                    "rules" => ["required"]
                ]
            ]
        ];

        parent::__construct();
    }

    public function getConfig(): array
    {
        return $this->config;
    }

}