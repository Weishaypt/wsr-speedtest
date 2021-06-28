window.addEventListener("load", async function () {
    let tags = [];
    let tagsActive = [];

    const res = await fetch('taglist.json')
    const json = await res.json();
    tags = json;
    let tagsListHtml = '';
    tags.forEach(el => {
        tagsListHtml += `<li data-id="${el.id}"><span style="background: ${el.color}">${el.name}</span></li>`
    })


    let tagInput = document.getElementById('tag-input')
    let tagList = document.querySelector('.tags-select')
    let tagListUl = document.querySelector('.tags-select ul')
    tagListUl.innerHTML = tagsListHtml;

    tagInput.addEventListener('focusin', function () {
        tagList.style.display = 'block'
    })

    tagInput.addEventListener('focusout', function () {
        setTimeout(() => {
            tagList.style.display = 'none'
        }, 300)
    })

    tagListUl.childNodes.forEach(el => {
        el.addEventListener('click', function () {
            let id = this.attributes.getNamedItem('data-id').value

            tagsActive.push(tags.find(tag => tag.id === +id))
            renderTags();
        })
    })

    function renderTags() {
        let el = document.querySelector('.active-tags')
        let html = '';
        tagsActive.forEach(tag => {
            html += `<div data-tag-id="${tag.id}" style="background: ${tag.color}">${tag.name} &times;</div>`
        })
        el.innerHTML = html;

        el.addEventListener('click', function (e) {
            let tagEl = e.target;
            console.log(tagEl)
            let id = +tagEl.attributes.getNamedItem('data-tag-id').value
            tagsActive = tagsActive.filter(tag => tag.id !== id)
            renderTags();
        })
    }

})