window.addEventListener('load', function () {
    let input = document.getElementById('input')
    let result = document.getElementById('result')

    input.addEventListener('change', function () {
        let value = this.value
        value = value.replace('^', '**')
        let output = eval(value)
        result.innerHTML = output;
    })
})