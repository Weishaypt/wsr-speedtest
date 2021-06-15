<?php
$xml = '';
$json = '';
if(isset($_REQUEST['xml']))
{
    $xml = $_REQUEST['xml'];
    $str = simplexml_load_string($_REQUEST['xml']);
    $json = json_encode($str, JSON_PRETTY_PRINT);
}
?>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <div class="card p-5">
                    <form method="POST" action="index.php" class="row">
                    <div class="col-md-6">
                                <div class="form-group">
                                    <label class="w-100">
                                        XML:
                                        <textarea id="xml" class="form-control w-100" rows="10"name="xml">
                                            <?= $xml?>
                                        </textarea>
                                    </label>
                                </div>
                    </div>
                    <div class="col-md-6">

                                <div class="form-group">
                                    <label class="w-100">
                                        JSON:
                                        <textarea readonly id="json" class="form-control w-100" rows="10"   name="json">
                                                <?= $json?>
                                        </textarea>
                                    </label>
                                </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">CONVERT</button>
                </form>
        </div>
    </div>
</div>
</body>
