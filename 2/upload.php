<?php
// Незакрытый файл из-за исключения может превести к утечке памяти и блокировке файла.
function parsePathExtention($path) {
    return strtolower(end(explode(".", $path)));
}

function handleFile($file) {
    $i = 0;
    while(($data = fgetcsv($file, 1000, ",")) !== false) {
        $resultFileExt = parsePathExtention($data[0]);
        $resultFileFd = fopen("./upload/$i.$resultFileExt", "w");
        fwrite($resultFileFd, htmlspecialchars($data[1]));
        fclose($resultFileFd);
        $i++;
    }
}

$csvPostFile = $_FILES["csv"];
if($csvPostFile["error"] == 0){
    $ext = parsePathExtention($csvPostFile["name"]);
    $tmpName = $csvPostFile["tmp_name"];
    if($ext === "csv"){
        if(($fd = fopen($tmpName, "r")) !== false) {
            handleFile($fd);
            fclose($fd);
        }
    }
}

?>
<pre>
Загрузка данных из внешнего источника может привести к XSS-уязвимостям и SQL-инъекциям.

Для этого перед прямым использованием нужно экранировать синтаксис.
</pre>
<form action="/upload.php" method="post" enctype="multipart/form-data">
    <input name="csv" type="file" required>
    <button type="submit">Send</button>
</form>
