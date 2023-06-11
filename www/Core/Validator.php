<?php

namespace Core;
class Validator
{
    public array $data;
    protected array $config;
    public function __construct(){
        $this->data = ($this->method == "POST")? $_POST: $_GET;
    }

    public function isValid(): array
    {
        $listOfErrors = [];

        foreach ($this->config["inputs"] as $name => $input) {
            if (str_ends_with($name, "confirm")) {
                $toConfirm = explode("_", $name)[1];
                if ($this->data[$name] != $this->data[$toConfirm]) {
                    $listOfErrors[] = $input["error"];
                }
            }
            foreach ($input["rules"] as $rule) {
                $args = explode(":", $rule);
                $rule = array_shift($args);
                if (method_exists(Rules::class, $rule)) {
                    if (!Rules::$rule($this->data[$name], [
                        "name" => $name,
                        "args"=>$args
                    ], $listOfErrors)) {
                        break;
                    }
                } else {
                    die("Tentative de Hack: Règle inconnue:$rule");
                }
            }

        }
        return array_filter($listOfErrors);
    }
}