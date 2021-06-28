window.addEventListener('load', function () {
    let form = document.querySelector('form')
    let name = document.getElementById('name')
    let cost = document.getElementById('cost')
    let error = document.querySelector('.error')
    let success = document.querySelector('.success')
    let list = []
    let listEl = document.querySelector('.list')

    form.addEventListener('submit', function (e) {
        e.preventDefault();
        error.innerHTML = ''
        success.innerHTML = ''

        if(name.value === '' || cost.value === '') {
            error.innerHTML = '<strong>There was an error</strong>'
            setTimeout(() => {
                error.innerHTML = ''
            }, 3000)

            return;
        }
        list.push({
            name: name.value,
            cost: cost.value
        })

        let html = ''
        list.forEach(i => {
            html += `<li><span>${i.name}</span> - <span>${i.cost}$</span></li>`
        })
        listEl.innerHTML = html;

        success.innerHTML = '<strong>Correct!</strong>'
        setTimeout(() => {
            success.innerHTML = ''
        }, 3000)
    })
})