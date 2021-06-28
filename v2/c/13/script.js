function draggable(el) {
    let down = false;
    el.addEventListener('mousedown', function () {
        down = true;
    })
    el.addEventListener('mouseup', function () {
        down = false;
    })

    window.addEventListener('mousemove', function (e) {
        if(down) {
            console.log(e)
            el.style.left = e.clientX + 'px'
            el.style.top = e.clientY + 'px'
        }
    })
}

draggable(document.getElementById('draggable'));
