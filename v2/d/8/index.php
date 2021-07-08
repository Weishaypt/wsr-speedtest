<?php
if(isset($_REQUEST['act']))
{
    switch ($_REQUEST['act'])
    {
        case 'delete': {
            $file = $_REQUEST['file'];
            if(!unlink($file)) die('Файл не найден');

            header("Location: index.php");
        }
            break;
        case 'save': {
            $file = $_REQUEST['file'];
            file_put_contents($file, $_REQUEST['content']);
        }
            break;
        case 'edit': {
            $content = file_get_contents($_REQUEST['file']);
            echo <<<HTML
<form method="POST" action="?act=save&file={$_REQUEST['file']}">
    <textarea style="width: 100%;" name="content">
    {$content}
    </textarea>
    <button type="submit">
    SAVE
</button>
</form>
HTML;
            die();

        }
    }
}


$log_directory = __DIR__;
$results_array = array();

if (is_dir($log_directory))
{
    if ($handle = opendir($log_directory))
    {
        //Notice the parentheses I added:
        while(($file = readdir($handle)) !== FALSE)
        {
            if($file != 'index.php')
            {
                $results_array[] = $file;
            }
        }
        closedir($handle);
    }
}
array_shift($results_array);
array_shift($results_array);

echo "<ul>";
//Output findings
foreach($results_array as $value)
{
    echo "<li>{$value} <span ><a href='?act=delete&file={$value}'>X</a></span>
 <span><a href='?act=edit&file={$value}'>E</a></span> </li>";
}
echo "</ul>";

?>

<style>
    span {
        background: #ccc;
        padding: 5px;
        cursor: pointer;
    }
</style>
