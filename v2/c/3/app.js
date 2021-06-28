window.addEventListener('load', function () {
    let cvs = document.querySelector('#canvas');
    let color = 'red';
    let lastX, lastY;
    cvs.height = 500;
    cvs.width = document.querySelector('.colors').clientWidth
    let ctx = cvs.getContext('2d');
    let mouseDown = false;

    cvs.addEventListener('mousedown', function (e) {
        mouseDown = true;
        draw(e.pageX - this.offsetLeft, e.pageY - this.offsetTop, false)
    })
    window.addEventListener('mouseup', function (e) {
        mouseDown = false;
    })

    cvs.addEventListener('mousemove', function (e) {
        if(mouseDown) {
            draw(e.pageX - this.offsetLeft, e.pageY - this.offsetTop)
        }
    })

    document.querySelectorAll('.colors button').forEach(item => {
        item.addEventListener('click', function () {
            color = this.classList.item(0)
        })
    })


    function draw(x, y, isDown = true) {
        if(isDown) {
            ctx.beginPath()
            ctx.strokeStyle = color;
            ctx.lineWidth = '5px'
            ctx.lineJoin = "round";
            ctx.moveTo(lastX, lastY);
            ctx.lineTo(x, y);
            ctx.closePath();
            ctx.stroke();
        }

        lastX = x;
        lastY = y;
    }
})