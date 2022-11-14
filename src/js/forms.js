let add_staff = document.querySelector('#add_staff'),
    add_book = document.querySelector('#add_book'),
    add_user = document.querySelector('#add_user'),
    burrow_btn = document.querySelector("#borrow_book"),
    return_btn = document.querySelector("#return_book")

let user_form_con = document.querySelector('#user_regis'),
    user_form = document.querySelector("#user_regis form")

let staff_form_con = document.querySelector('#staff_regis'),
    staff_form = document.querySelector('#staff_regis form')


let book_form_con = document.querySelector('#book_regis'),
    book_form = document.querySelector('#book_regis form')


let burrow_form_con = document.querySelector("#borrow"),
    burrow_form = document.querySelectorAll("#borrow form")

let return_form_con = document.querySelector("#return"),
    return_form = document.querySelectorAll("#borrow form")



setup_form_ev(return_form_con, return_btn)
setup_form_ev(burrow_form_con, burrow_btn)
setup_form_ev(user_form_con, add_user)
setup_form_ev(staff_form_con, add_staff)
setup_form_ev(book_form_con, add_book)


function setup_form_ev(form_con, btn) {
    if (!form_con) return

    form_con.addEventListener("transitionend", () => {
        display_none(form_con)

    })

    btn.onclick = () => {
        show_form(form_con)
    }

    form_con.onclick = (ev) => {
        hide_form(form_con, ev)
    }
}

function display_none(elem) {
    if (elem.style.opacity == "1") return
    elem.style.display = "none"
}

function hide_form(elem, ev) {
    if (ev.target != elem) return
    elem.style.opacity = "0"
}

function show_form(elem) {
    elem.style.display = "table"
    elem.style.opacity = "1"
}
