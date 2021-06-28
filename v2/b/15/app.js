let time = 0;
let timer = {};
let numbers = {
    0: [1, 1, 0, 1, 0, 1, 0, 1, 1],
    1: [0, 0, 0, 1, 0, 0, 0, 1, 0],
    2: [1, 0, 0, 1, 1, 1, 0, 0, 1],
    3: [1, 0, 0, 1, 1, 0, 0, 1, 1],
    4: [0, 1, 0, 1, 1, 0, 0, 1, 0],
    5: [1, 1, 0, 0, 1, 0, 0, 1, 1],
    6: [1, 1, 0, 0, 1, 1, 0, 1, 1],
    7: [1, 0, 0, 1, 0, 0, 0, 1, 0],
    8: [1, 1, 0, 1, 1, 1, 0, 1, 1],
    9: [1, 1, 0, 1, 1, 0, 0, 1, 1],
}

window.addEventListener('load', function () {
    let start = document.querySelector('.start')
    let stop = document.querySelector('.stop')
    let reset = document.querySelector('.reset')

    start.addEventListener('click', startMethod)
    stop.addEventListener('click', stopMethod)
    reset.addEventListener('click', resetMethod)


    function countTimer() {
        time++;
        let date = new Date(time * 1000)
        let sec = date.getSeconds();
        let min = date.getMinutes();
        if(sec < 10) sec = '0' + sec;
        let timef = min + '' + sec;
        console.log(timef)
        timef = timef.split('')
        timef.reverse().forEach((item, index) => {
            index = Math.abs(index - 5)
            let number = document.querySelector('[data-item="'+index+'"]')
            let pattern = numbers[item];
            for(let i = 0; i < number.children.length; i++) {
                if(pattern[i] === 1) {
                    number.children[i].style.background = '#db4c4c';
                }
                else number.children[i].style.background = '#ffe5e5';
            }
        })
    }

    function startMethod(e) {
        clearInterval(timer)
        timer = setInterval(countTimer, 1000)
    }

    function stopMethod(e) {
        clearInterval(timer)
    }

    function resetMethod(e) {
        time = 0;
    }
})