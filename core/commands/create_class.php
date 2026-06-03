<?php

$className = $argv[1] ?? null;

if (!$className) {
    echo "Please provide a class name.\n";
    exit(1);
}

echo "Creating class: " . $className . "\n";
$namespaceParts = explode('\\', $className);
$className = array_pop($namespaceParts);
$namespace = implode('\\', $namespaceParts);
if (!file_exists('app/' . str_replace('\\', '/', $namespace))) {
    mkdir('app/' . str_replace('\\', '/', $namespace), 0777, true);
}

$classContent = "<?php

namespace App\\" . $namespace . ";

class " . $className . "{
    public function __construct() {
        // Constructor code here
    }
}";

file_put_contents('app/' . str_replace('\\', '/', $namespace) . '/' . $className . '.php', $classContent);

echo "Class created successfully.\n";
