<?php
$page = 0;
if(!empty($_REQUEST['page'])) $page = $_REQUEST['page'];
$file = file_get_contents('data.json');
$arr = json_decode($file);
$pages = [];
$tmp_page = [];
$i = 0;
$pushPages  = 0;
foreach ($arr as $item)
{
    if($pushPages > 4)
    {
        $i += 1;
        $pushPages = 0;
        array_push($pages, $tmp_page);
        $tmp_page = [];
    }
    $item->page = $i;
    array_push($tmp_page, $item);
    $pushPages++;
}
$all_pages = count($pages);
?>
<head>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.min.js"></script>
</head>
<body>
<style>
    .page-link.disabled {
        cursor: default;
        background: #ccc;
    }
    .page-link.active {
        background: #4c6ef5;
        color: #fff !important;
        font-weight: bold;
    }
</style>
<div class="container">
    <div class="row">
        <?php foreach ($pages[$page] as $item) :?>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <?= $item->name?>
                    </div>
                    <div class="card-body">
                        <?php foreach ($item as $key => $value):?>
                            <h6><?= $key?> - <?= $value?></h6>
                        <?php endforeach;?>
                    </div>
                </div>
            </div>
        <?php endforeach?>
    </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <?php
                if($page == 0):
                ?>
                    <li class="page-item"><a class="page-link disabled" href="">Previous</a></li>
                <?php else: ?>
                    <li class="page-item"><a class="page-link" href="?page=<?= $page - 1;?>">Previous</a></li>
                <?php endif;?>
                <?php

                for($i = $page; $i < $page + 5; $i++) :
                ?>
                    <li class="page-item"><a class="page-link <?php if($page == $i) echo 'active'?>" href="?page=<?= $i?>"><?= $i?></a></li>
                <?php endfor?>


                <?php
                if($page+1 == $all_pages):
                    ?>
                    <li class="page-item"><a class="page-link disabled" href="">Next</a></li>
                <?php else: ?>
                    <li class="page-item"><a class="page-link" href="?page=<?= $page + 1;?>">Next</a></li>
                <?php endif;?>
            </ul>
        </nav>
    </div>
</div>
</body>
