window.addEventListener('load', function () {
    let image = document.getElementById('image')
    let filter = document.getElementById('filter')
    let img = new Image();
    img.onload = () => {
        ctx.clearRect(0, 0, 200, 400)
        ctx.drawImage(img, 0, 0, 200, 400);
    }
    img.src = 'athena.jpg'
    let cvs = document.getElementById('canvas')
    cvs.height = 400;
    cvs.width = 200;
    let ctx = cvs.getContext('2d')
    let cvs2 = document.getElementById('canvas2')
    cvs2.height = 400;
    cvs2.width = 200;
    let ctx2 = cvs2.getContext('2d')

    image.addEventListener('change', function () {
        img.src = this.value

        img.onload = () => {
            ctx.clearRect(0, 0, 200, 400)
            ctx.drawImage(img, 0, 0, 200, 400);
        }
    })


    filter.addEventListener('change', function () {
        ctx2.clearRect(0, 0, 200, 400)
        if(this.value === 'darken') {
            ctx2.filter = 'brightness(70%)';
        }
        else {
            ctx2.filter = 'brightness(125%)';
        }
        ctx2.drawImage(img, 0, 0, 200, 400);
    })

})