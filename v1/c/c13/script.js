function draggable(el) {
    let mouseDown = false;
    el.addEventListener('mousedown', e => {
        mouseDown = true;
    });
    el.addEventListener('mouseup', e => {
        mouseDown = false;
    });
    window.addEventListener('mousemove', e => {
       if(mouseDown) {
           el.style.top = e.clientY + 'px';
           el.style.left = e.clientX + 'px';
       }
    })
}

draggable(document.getElementById('draggable'));
