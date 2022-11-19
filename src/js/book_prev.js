
let book_prev = {
    con: document.querySelector('#book_preview'),
    form:document.querySelector('#book_preview form'),
    burrow:document.querySelector('#book_prev_button button'),
    img: document.querySelector('#book_prev_img'),
    title: document.querySelector("#book_prev_title"),
    author: document.querySelector("#book_prev_author"),
    date: document.querySelector("#book_prev_date"),
}

let book_btns = document.querySelectorAll('.book_btn');

setup_borrow_form(book_prev.con,book_prev.form,book_prev.burrow,async ()=>{

    const fdata  = new FormData(book_prev.form)
    fdata.append("book_id",book_prev.book_id)

    let data = await fetch('../inc/borrow.inc.php',{
        method:'post',
        body:fdata
    })

    data = await data.text()
    alert(data)
    console.log(data);
})  



function setup_borrow_form(form_con,form,btn,callback){

    if(!book_prev.burrow) return
    form_con.addEventListener("transitionend", () => {
        display_none(form_con)
    })

    btn.onclick = () => {
        show_form(form_con)
        const st = {}
    }

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
            show_prev(book)
        }
        if(book.dataset.details.split("%//%")[0] == search_params.get('book_prev'))book.click()
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
        img: details[5]
    }

    book_prev.book_id = book_details.id
    book_prev.img.src = "../"+img_path + book_details.img
    book_prev.title.innerText = `"${book_details.title}"`
    book_prev.author.innerText = `(${book_details.author})`
    book_prev.date.innerText = book_details.date


    book_prev.img.parentElement.style.setProperty("--bg", "url(" +location.origin +"/xampp/test/"+ img_path + book_details.img + ")")
    show_form(book_prev.con)

    set_search_param({
        'book_prev':book_details.id
    })
}

book_prev.con.addEventListener("transitionend", () => {
    display_none(book_prev.con)
})

book_prev.con.onclick = (ev) => {
    hide_form(book_prev.con, ev)
    if(ev.target == book_prev.con)set_search_param()
}

let cards = document.querySelectorAll(".card")

cards.forEach(card => {
    let src = card.children[0].src
    card.style.setProperty("--bg", `url(${src})`)
});
