window.addEventListener('load', function () {
    let alphabet = 'qwertyuiopasdfghjklzxcvbnm'
    let keyboardTemplate = ''
    let uppercase = false;
    let keyboardEl = document.querySelector('.keyboard')
    let inputEl = document.querySelector('.input #input')
    alphabet.split('').forEach(i => {
        keyboardTemplate += `<div class="key" data-key="${i}">${i}</div>`
    })

    keyboardTemplate += '<div class="key" data-key="space">space</div>'
    keyboardTemplate += '<div class="key" data-key="shift">shift</div>'
    keyboardTemplate += '<div class="key" data-key="backspace">backspace</div>'
    keyboardTemplate += '<div class="key" data-key="enter">enter</div>'

    keyboardEl.innerHTML = keyboardTemplate;

    keyboardEl.addEventListener('click', function (e) {
        let t = e.target;
        let key = t.attributes.getNamedItem('data-key').value;

        switch (key) {
            case "space": {
                inputEl.value += ' ';
            }
            break;
            case "shift": {
                uppercase = !uppercase;
            }
            break;
            case "backspace": {
                inputEl.value = inputEl.value.slice(0, inputEl.value.length - 1)
            }
            break;
            case "enter": {
                inputEl.value += '\n'
            }
            break;
            default: {
                if(uppercase) key = key.toUpperCase();
                inputEl.value += key;
            }
        }
    })
})