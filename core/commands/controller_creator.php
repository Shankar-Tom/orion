<?php
$controllerName = $argv[1] ?? null;

if (!$controllerName) {
    echo "Please provide a controller name.\n";
    exit(1);
}

echo "Creating controller: " . $controllerName . "\n";

$controllerContent = "<?php

class " . $controllerName . "{
    public function index() {
        echo 'Hello World';
    }
}";

file_put_contents('app/controllers/' . $controllerName . '.php', $controllerContent);

echo "Controller created successfully.\n";
