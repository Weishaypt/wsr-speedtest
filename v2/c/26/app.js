window.addEventListener('load', function () {
    let home = document.getElementById('home')
    let about = document.getElementById('about')
    let contact = document.getElementById('contact')
    let map = document.getElementById('map')
    let privacy = document.getElementById('privacy')
    let circles = [
        home,
        about,
        contact,
        map,
        privacy
    ]

    for (let i = 0; i < 5; i++) {
        let width, height = width = getRandomInt(300, 400)
        let circle = circles[i];
        circle.style.width = width + 'px';
        circle.style.height = height + 'px';
    }

    for (let i = 0; i < 5; i++) {
        let circle = circles[i];
        let x = 0
        let y = 0
        let checked = true;
        while (checked) {
            checked = false;
            x = getRandomInt(20, window.innerWidth - 400)
            y = getRandomInt(20, window.innerHeight - 400)
            circles.forEach(c => {
                if (checkCollision(
                    c.offsetLeft, c.offsetTop, (c.style.width.replace('px', '') / 2 ) + 40,
                    x, y, circle.style.width.replace('px', '') / 2
                )) checked = true;
            })
        }

        circle.style.top = y + 'px';
        circle.style.left = x + 'px';
    }

})

function getRandomInt(min, max) {
    return Math.floor(Math.random() * (max - min)) + min;
}

const checkCollision = (p1x, p1y, r1, p2x, p2y, r2) =>
    ((r1 + r2) ** 2 > (p1x - p2x) ** 2 + (p1y - p2y) ** 2)
