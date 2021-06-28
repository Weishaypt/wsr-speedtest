window.addEventListener('load', function () {
    let r = 0;
    let g = 0;
    let b = 0;

    document.getElementById('r').addEventListener('change', function () {
        r = this.value
        update();
    })


    document.getElementById('g').addEventListener('change', function () {
        g = this.value
        update();
    })


    document.getElementById('b').addEventListener('change', function () {
        b = this.value
        update();
    })

    function update() {
        let text = `rgb(${r}, ${g}, ${b})`;
        document.querySelector('.result').style.background = text
        document.querySelector('.result').innerHTML = text;
    }
})