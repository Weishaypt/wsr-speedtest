window.addEventListener('load', function () {
    let sec = document.querySelector('.sec')
    let min = document.querySelector('.min')
    let hour = document.querySelector('.hour')

    setInterval(() => {
        let date = new Date();
        let seconds = date.getSeconds();
        let minutes = date.getMinutes();
        let hours = date.getHours();

        sec.style.transform = `rotateZ(calc(6deg * ${seconds})`;
        min.style.transform = `rotateZ(calc(6deg * ${minutes})`;
        hour.style.transform = `rotateZ(calc(6deg * 5 * ${hours})`;

    }, 1000)
});