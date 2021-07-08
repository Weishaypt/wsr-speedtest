<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<div class="container"></div>
<form enctype="application/x-www-form-urlencoded">
    <input name="file" type="file">
    <button type="submit">TEST</button>
</form>
<canvas>

</canvas>
<img id="img">
<script>
    window.addEventListener('load', function () {
        let form = document.querySelector('form')
        form.addEventListener('submit', function (e) {
            e.preventDefault();
            let fd = new FormData(this)

            fetch('upload.php', {
                body: fd,
                method: 'POST'
            })
            .then(res => {
                res.text().then(text => {
                    img.src = text;
                })
            })

        })
    })
</script>
</body>
</html>