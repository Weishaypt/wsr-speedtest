window.addEventListener('load', function () {
    let cvs = document.querySelector('canvas')
    cvs.width = 400;
    cvs.height = 320;
    let ctx = cvs.getContext('2d')

    let pos = {
        x: 0,
        y: 160,
        dir: 'right'
    }

    setInterval(() => {
        ctx.clearRect(0, 0, cvs.width, cvs.height)
        ctx.fillStyle = 'green'
        ctx.fillRect(0, 0, cvs.width, cvs.height)

        let circle = new Path2D()
        circle.arc(pos.x, pos.y, 20, 0, 2 * Math.PI, false)

        ctx.fillStyle = 'white'
        ctx.fill(circle)

        if(pos.dir === 'right') {
            pos.x += 1;
        }
        else {
            pos.x -= 1;
        }
        if(pos.x > 400) {
            pos.dir = 'left'
        }
        else if(pos.x <= 0) {
            pos.dir = 'right'
        }

    }, 1)
})