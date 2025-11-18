<?php
function displayFiles($dir) {
    $items = scandir($dir);
    foreach ($items as $item) {
        if ($item != "." && $item != "..") {
            $filePath = $dir . DIRECTORY_SEPARATOR . $item;
            if (is_dir($filePath)) {
                displayFiles($filePath);
            } else {
                $ext = strtolower(pathinfo($item, PATHINFO_EXTENSION));
                $fileUrl = 'https://' . $_SERVER['HTTP_HOST'] . str_replace($_SERVER['DOCUMENT_ROOT'], '', $filePath);

                if (in_array($ext, ['jpg', 'jpeg', 'png', 'gif'])) {
                    echo "<div style='margin:10px;'>$fileUrl</div>";
                } elseif (in_array($ext, ['mp4', 'webm', 'mkv', 'mov'])) {
                    echo "<div style='margin:10px;'><video controls style='max-width:200px;'>
                            $fileUrl
                          </video></div>";
                }
            }
        }
    }
}

echo "<h2>Uploaded Files:</h2><div style='display:flex; flex-wrap:wrap; gap:20px;'>";
displayFiles('/var/www/html/wp-content/uploads/forminator/93_857d8ea30d877545bec59cb2f7feff7b/uploads');
echo "</div>";
?>
