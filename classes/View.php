<?php

class View
{
    public function __construct(string $name, array $variables = []) {
        foreach ($variables as $k => $var) {
            $this->$k = $var;
        }

        $root = $_SERVER['DOCUMENT_ROOT'];
        $include_path = strlen($name) < 260 - strlen($root)
            ? "{$root}/view/{$name}.php"
            : false;

        require_once $root . '/view/header.php';

        if ($include_path && file_exists($include_path)) {
            require_once $include_path;
        } else {
            echo $name;
        }

        require_once $root . '/view/footer.php';
    }
}
