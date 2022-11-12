
let add_user = document.querySelector('#add_user')
let add_staff = document.querySelector('#add_staff')
let add_book = document.querySelector('#add_book')

let user_form_con = document.querySelector('#user_regis')
let user_form = document.querySelector("#user_regis form")
if (user_form) user_form.validating = false

let staff_form_con = document.querySelector('#staff_regis')
let staff_form = document.querySelector('#staff_regis form')

if (staff_form) staff_form.validating = false

let book_form_con = document.querySelector('#book_regis')
let book_form = document.querySelector('#book_regis form')
if (book_form) book_form.validating = false


//validation :: USER 
if (user_form) {
    user_form.addEventListener("submit", async (ev) => {
        ev.preventDefault()

        if (user_form.validating) return
        user_form.validating = true

        let fdata = new FormData(user_form);
        await register(fdata,'createUser')

        user_form.validating = false
    });
}


//validation :: STAFF
if (staff_form) {
    staff_form.addEventListener("submit", async (ev) => {
        ev.preventDefault()

        if (staff_form.validating) return
        staff_form.validating = true
        let fdata = new FormData(staff_form);

        await register(fdata,'createStaff')
        staff_form.validating = false
    });
}


//validation :: BOOK
if (book_form) {
    book_form.addEventListener("submit", async (ev) => {
        ev.preventDefault()

        if (book_form.validating) return
        book_form.validating = true
        let fdata = new FormData(book_form);
        await register(fdata,'addBook')

        book_form.validating = false
    });
}

// #################### EVENTS #############################

async function register(form,path) {

    let data = await fetch(`../inc/${path}.inc.php`, {
        method: "post",
        body: form
    });

    data = await data.text()

    if (data == "success") return display_regis_succes()
    display_error_message(data)
}

function display_error_message(data) {
    user_form.reset()
    staff_form.reset()
    book_form.reset()
    alert("something went wrong.\n" + data)
}

function display_regis_succes() {
    user_form.reset()
    staff_form.reset()
    book_form.reset()
    alert("success")
    // user_form_con.click()
}

// //////////////////////////////////////////////////
if (user_form) {
   
    user_form_con.addEventListener("transitionend", () => {
        display_none(user_form_con)
    })

    add_user.onclick = () => {
        show_form(user_form_con)
    }

    user_form_con.onclick = (ev) => {
        hide_form(user_form_con, ev)
    }
}

if (staff_form) {
  
    staff_form_con.addEventListener("transitionend", () => {
        display_none(staff_form_con)
    })

    add_staff.onclick = () => {
        show_form(staff_form_con)
    }

    staff_form_con.onclick = (ev) => {
        hide_form(staff_form_con, ev)
    }

}


if (book_form) {
    
    book_form_con.addEventListener("transitionend", () => {
        display_none(book_form_con)
        
    })

    add_book.onclick = () => {
        show_form(book_form_con)
    }

    book_form_con.onclick = (ev) => {
        hide_form(book_form_con, ev)
    }
}

//################## animation shit ###################

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


