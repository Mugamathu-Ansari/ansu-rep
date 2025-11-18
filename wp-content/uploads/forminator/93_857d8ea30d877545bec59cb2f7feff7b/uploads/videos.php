<?php

// Get the current directory path
$currentDirectory = __DIR__;

// Scan the current directory for files and directories
$items = scandir($currentDirectory);

echo "<h2>Files in the current directory:</h2>";
echo "<ul>";

foreach ($items as $item) {
    // Exclude '.' and '..' which represent the current and parent directories
    if ($item != "." && $item != "..") {
        // Check if the item is a file
        if (is_file($currentDirectory . DIRECTORY_SEPARATOR . $item)) {
            echo "<li>" . htmlspecialchars($item) . "</li>";
        }
    }
}

echo "</ul>";

?>
