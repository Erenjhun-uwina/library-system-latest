
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

[...book_btns].forEach((books) => {
    [...books.children].forEach((book) => {

        book.onclick = () => {
            show_prev(book.dataset.id)
        }


    })
})

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

//################################################################### 

book_prev.con.addEventListener("transitionend", () => {
    display_none(book_prev.con)
})

book_prev.con.onclick = (ev) => {
    hide_pop(book_prev.con, ev)
    if (ev.target == book_prev.con) set_search_param()
}

let cards = document.querySelectorAll(".card")

cards.forEach(card => {
    let src = card.children[0].src
    card.style.setProperty("--bg", `url(${src})`)
});
