
const book_search = document.querySelector('#book_search'),
    search_res = document.querySelector('#search_res')

window.addEventListener('click', (ev) => {
    if (search_res.innerHTML == '' || ev.target == search_res || ev.target == book_search) return
    search_res.innerHTML = ''
    search_res.focused = -1
});

const key_handlers = new Map();

key_handlers.set("ArrowDown", (ev, search_len) => {
    ev.preventDefault()

    let ind = search_res.focused + 1

    ind = (ind > search_len - 1) ? 0 : ind
    search_res_nav(ind)
})

key_handlers.set("ArrowUp", (ev, search_len) => {
    ev.preventDefault()
    let ind = search_res.focused - 1
    ind = (ind < 0) ? search_len - 1 : ind
    search_res_nav(ind)
})

key_handlers.set("Enter", (ev) => {
    ev.preventDefault()
    search_res.children[search_res.focused].click()
})

window.addEventListener('keydown', (ev) => {

    if (search_res.innerHTML == '' || search_res.children[0] == null || search_res.children[0].innerText == 'no result') return search_res.focused = -1

    let search_len = search_res.children.length;

    [...search_res.children].forEach(el => {
        el.classList.remove("hover")
    })

    if (key_handlers.has(ev.key)) key_handlers.get(ev.key)(ev, search_len)
});

function search_res_nav(ind) {
    search_res.focused = ind
    const res_el = search_res.children[ind]
    res_el.classList.add("hover")
    book_search.value = res_el.innerText
}

book_search.addEventListener('input', async () => {
    await search()
});


book_search.addEventListener('click', async () => {
    await search()
});

async function search() {

    let search_str = book_search.value

    if (search_str == '' || search_str == ' ' || !search_str) {

        search_res.innerHTML = ""
        return
    }

    const fdata = new FormData
    fdata.append("book_search", search_str)

    let data = await fetch('../inc/bookSearch.php',
        {
            method: 'post',
            body: fdata
        }
    )

    data = await data.text();
    search_res.innerHTML = data;


    if (search_res.children[0].innerText == 'no result') return;
    [...search_res.children].forEach((child) => {

        child.addEventListener(
            "click", () => {
                console.log(child.dataset.id);
                show_prev(child.dataset.id)
            }
        )
    });
}

