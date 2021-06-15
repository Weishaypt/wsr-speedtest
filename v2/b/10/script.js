window.addEventListener('load', function () {
    let rectangleEl = document.querySelector('.rectangle')
    let borderEl = document.getElementById('border')
    let shadowEl = document.getElementById('box-shadow')

    borderEl.addEventListener('input', function () {
        rectangleEl.style.borderRadius = borderEl.value + 'px';
    })

    shadowEl.addEventListener('input', function () {
        rectangleEl.style.boxShadow = shadowEl.value
    })
})