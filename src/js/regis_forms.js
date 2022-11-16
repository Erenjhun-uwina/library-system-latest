//references ################################################################
let add_staff = document.querySelector('#add_staff'),
    add_book = document.querySelector('#add_book'),
    add_user = document.querySelector('#add_user'),
    burrow_btn = document.querySelector("#borrow_book"),
    return_btn = document.querySelector("#return_book")


let user_form_con = document.querySelector('#user_regis'),
    staff_form_con = document.querySelector('#staff_regis'),
    book_form_con = document.querySelector('#book_regis'),
    burrow_form_con = document.querySelector("#borrow"),
    return_form_con = document.querySelector("#return")


let user_form = document.querySelector("#user_regis form"),
    staff_form = document.querySelector('#staff_regis form'),
    book_form = document.querySelector('#book_regis form'),
    burrow_form = document.querySelector("#borrow form"),
    return_form = document.querySelector("#return form")

//references #################################################################

setup_form_ev(return_form_con, return_form, return_btn, () => { setup_book_transaction_form(return_form) })
setup_form_ev(burrow_form_con, burrow_form, burrow_btn, () => { setup_book_transaction_form(burrow_form) })
setup_form_ev(user_form_con, user_form, add_user, () => { setup_regis_form(user_form) })
setup_form_ev(staff_form_con, staff_form, add_staff, () => { setup_regis_form(staff_form) })
setup_form_ev(book_form_con, book_form, add_book, () => { setup_regis_form(book_form) })


// ###########################################################################
/**
 * returns a callback function for setup_form_ev 
 * a function runs on submit for return and borrow book forms
 * @param {*} form 
 * 
 */
async function setup_book_transaction_form(form) {
    let fdata = new FormData(form)
    fdata.append("type",form.parentElement.id)
    
    let data = await fetch(`../inc/book_transaction.inc.php`, {
        method: "post",
        body: fdata
    })
    data = await data.text()
    reset_forms()
    alert(data)
}

/**
 * returns a callback function for setup_form_ev 
 * a function runs on submit for registration forms
 * @param {*} form 
 * 
 */
async function setup_regis_form(form) {

    let fdata = new FormData(form);
    await register(fdata, form.dataset.type)

}


async function register(form, path) {

    let data = await fetch(`../inc/${path}.inc.php`, {
        method: "post",
        body: form
    });

    data = await data.text()

    reset_forms()

    alert(data)
}

