
let book_search = document.querySelector('#book_search')
let search_res = document.querySelector('#search_res')

window.addEventListener('click', (ev) => {
    if (search_res.innerHTML == '' || ev.target == search_res || ev.target == book_search) return
    search_res.innerHTML = ''
    search_res.focused = -1
});



window.addEventListener('keydown', (ev) => {
    
    if (search_res.innerHTML == '') return search_res.focused = -1
   
    let search_len = search_res.children.length

    if (ev.key == "ArrowDown") {
        ev.preventDefault()

        let ind = search_res.focused+1

        ind = (ind > search_len-1)?0:ind
        search_res.focused = ind

        
        const res_el = search_res.children[ind]
        // res_el.hover()

        book_search.innerText = res_el.innerText
        return false
    }

    if (ev.key == "ArrowUp")  {
        ev.preventDefault()
        let ind = search_res.focused-1
        ind = (ind < 0)?search_len-1:ind
        search_res.focused = ind
     
        const res_el = search_res.children[ind]
        // res_el.hover()

        book_search.innerText = res_el.innerText
        return false
    }


});

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

    [...search_res.children].forEach((child) => {
        child.addEventListener(
            "click", () => show_prev(child)
        )
    });
}

