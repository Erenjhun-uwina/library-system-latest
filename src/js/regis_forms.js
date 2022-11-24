//references ################################################################
const add_staff = document.querySelector('#add_staff'),
    add_book = document.querySelector('#add_book'),
    add_user = document.querySelector('#add_user'),
    transaction_btn = document.querySelector("#add_transaction")


const user_form_con = document.querySelector('#user_regis'),
    staff_form_con = document.querySelector('#staff_regis'),
    book_form_con = document.querySelector('#book_regis'),
    transaction_form_con = document.querySelector("#transaction")

const user_form = document.querySelector("#user_regis form"),
    staff_form = document.querySelector('#staff_regis form'),
    book_form = document.querySelector('#book_regis form'),
    transaction_form = document.querySelector("#transaction form")

const transaction_prev_form = document.querySelector("#transaction_prev_form")
//references #################################################################

setup_form_ev(transaction_form_con, transaction_form, transaction_btn, async () => { await setup_book_transaction_form(transaction_form) }, ['transaction_form'])
setup_form_ev(user_form_con, user_form, add_user, async () => { await setup_regis_form(user_form) }, ['user_form'])
setup_form_ev(staff_form_con, staff_form, add_staff, async () => { await setup_regis_form(staff_form) }, ['staff_form'])
setup_form_ev(book_form_con, book_form, add_book, async () => { await setup_regis_form(book_form) }, ['book_form'])

setup_form_onsubmit(transaction_prev_form, async () => {
    await setup_book_transaction_prev_form()
})


resume_state()

// ###########################################################################
/**
 * returns a callback function for setup_form_ev 
 * a function runs on submit for return and borrow book forms
 * @param {*} form 
 * 
 */
async function setup_book_transaction_form(form) {
    let fdata = new FormData(form)
    const code = fdata.get('transaction_code')
    location.href = `../transaction/${code == "" ? "blank_code" : code}`
}



async function setup_book_transaction_prev_form() {
    if (!transaction_prev_form) return

    let fdata = new FormData(transaction_prev_form)

    let data = await fetch(`../inc/book_transaction.inc.php`, {
        method: "post",
        body: fdata
    })
    data = await data.text()
    transaction_prev_form.children[6].disabled = true
    if (data == "success") return location.reload()
    alert("something went wrong:" + data)
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
    alert(data)
}

