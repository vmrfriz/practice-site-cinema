<?php

class View
{
    public function __construct(string $name, bool $wrap = true, array $variables = []) {
        foreach ($variables as $k => $var) {
            $this->$k = $var;
        }

        $root = $_SERVER['DOCUMENT_ROOT'];
        $include_path = strlen($name) < 260 - strlen($root)
            ? "{$root}/view/{$name}.php"
            : false;

        if ($wrap) {
            require $root . '/view/header.php';
        }

        if ($include_path && file_exists($include_path)) {
            require_once $include_path;
        } else {
            echo $name;
        }

        if ($wrap) {
            require $root . '/view/footer.php';
        }
    }
}
