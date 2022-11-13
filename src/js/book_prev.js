
let book_prev = {
    con: document.querySelector('#book_preview'),
    img: document.querySelector('#book_prev_img'),
    title: document.querySelector("#book_prev_title"),
    author: document.querySelector("#book_prev_author"),
    date: document.querySelector("#book_prev_date"),
}


let book_btns = document.querySelectorAll('.book_btn');


[...book_btns].forEach((books) => {
    [...books.children].forEach((book) => {

        book.onclick = () => {
            show_prev(book)
        }
    })
})



function show_prev(el) {
    let details = el.dataset.details.split("%//%"),
        img_path = "src/assets/covers/"

    let book_details = {
        id: details[0],
        title: details[1],
        author: details[2],
        date: details[3],
        img: details[5],
    }

    book_prev.img.src = "../"+img_path + book_details.img
    book_prev.title.innerText = `"${book_details.title}"`
    book_prev.author.innerText = `(${book_details.author})`
    book_prev.date.innerText = book_details.date


    book_prev.img.parentElement.style.setProperty("--bg", "url(" +location.origin +"/xampp/test/"+ img_path + book_details.img + ")")
    show_form(book_prev.con)
}





book_prev.con.addEventListener("transitionend", () => {
    display_none(book_prev.con)
})

book_prev.con.onclick = (ev) => {
    hide_form(book_prev.con, ev)
}

let cards = document.querySelectorAll(".card")

cards.forEach(card => {
    let src = card.children[0].src
    card.style.setProperty("--bg", `url(${src})`)
});
