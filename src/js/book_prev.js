
const book_prev = {
    con: document.querySelector('#book_preview'),
    form: document.querySelector('#book_preview form'),
    burrow: document.querySelector('#book_prev_button button'),
    img: document.querySelector('#book_prev_img'),
    title: document.querySelector("#book_prev_title"),
    author: document.querySelector("#book_prev_author"),
    date: document.querySelector("#book_prev_date"),
}

const book_btns = document.querySelectorAll('.book_btn');

resume_borrow_form()


setup_borrow_form(book_prev.con, book_prev.form, async () => {

    const fdata = new FormData(book_prev.form)
    fdata.append("book_id", book_prev.book_id)

    let data = await fetch('../inc/borrow.inc.php', {
        method: 'post',
        body: fdata
    })

    data = await data.text()
    alert(data)
})


function setup_borrow_form(form_con, form, callback) {

    if (!book_prev.burrow) return

    form_con.addEventListener("transitionend", () => {
        display_none(form_con)
    })

    form_con.onclick = (ev) => {
        hide_form(form_con, ev)
    }

    form.addEventListener("submit", async (ev) => {
        ev.preventDefault()

        if (form.validating) return
        form.validating = true
        callback()
        form.validating = false
    });
}


[...book_btns].forEach((books) => {
    [...books.children].forEach((book) => {

        book.onclick = () => {
            show_prev(book.dataset.id)
        }

       
    })
})

/**
 * 
 * @param {int} el id of the book being fetch
 */
async function show_prev(id) {


    const book_details = await fetch_book_details(id)
    if(!book_details)  return console.warn('undefined book')
    
    const img_path = 'src/assets/covers/'

    book_prev.book_id = book_details.Id
    book_prev.img.src = "../" + img_path + book_details.Cover_img
    book_prev.title.innerText = `"${book_details.Title}"`
    book_prev.author.innerText = `-${book_details.Author}`
    book_prev.date.innerText = book_details.Date_release


    book_prev.img.parentElement.style.setProperty("--bg", "url(" + location.origin + "/xampp/library-system-latest/" + img_path + book_details.Cover_img + ")")
    show_form(book_prev.con)

    set_search_param({
        'book_prev': book_details.Id
    })
}

/**
 * @param {int} id 
 * @returns {object} object containing book details
 */
async function fetch_book_details(id) {

    const fdata = new FormData()
    fdata.append("id", id)

    let data = await fetch("../inc/book.inc.php", {
        method: "post",
        body: fdata
    })

    data = await data.json()
    return data
}

/**
 * opens the borrow form/book prev on reload if opened
 * @returns null
 */
function resume_borrow_form(){
    const book_id = search_params.get('book_prev')
    if(!book_id)return
    show_prev(book_id)
}

//################################################################### 

book_prev.con.addEventListener("transitionend", () => {
    display_none(book_prev.con)
})

book_prev.con.onclick = (ev) => {
    hide_form(book_prev.con, ev)
    if (ev.target == book_prev.con) set_search_param()
}

let cards = document.querySelectorAll(".card")

cards.forEach(card => {
    let src = card.children[0].src
    card.style.setProperty("--bg", `url(${src})`)
});
