window.addEventListener('load', e => {
    let square = document.getElementById('square');
    window.addEventListener('mousemove', e => {
       square.style.position = 'absolute';
       square.style.left = e.clientX - square.offsetWidth / 2 + 'px';
       square.style.top = e.clientY - square.offsetHeight / 2 + 'px';
   });
});
