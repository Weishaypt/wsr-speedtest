window.addEventListener('load', function () {
    let c1 = 'red';
    let c2 = 'blue'
    color1.addEventListener('change', function () {
        c1 = this.value
        update();
    })

    color2.addEventListener('change', function () {
        c2 = this.value
        update();
    })
    update();
    function update() {
        document.querySelector('.bg').style.background = `linear-gradient(${c1}, ${c2})`
    }

})