setup_regis_form(user_form)
setup_regis_form(staff_form)
setup_regis_form(book_form)


function setup_regis_form(form){
    if(!form)return
    form.addEventListener("submit", async (ev) => {
        ev.preventDefault()

        if (form.validating) return
        form.validating = true
        let fdata = new FormData(form);
        await register(fdata, form.dataset.type)
        form.validating = false
    });
}

async function register(form, path) {

    let data = await fetch(`../inc/${path}.inc.php`, {
        method: "post",
        body: form
    });

    data = await data.text()

    if (data == "success") return display_regis_succes()
    display_error_message(data)
}

function display_error_message(data) {
    if(user_form)user_form.reset()
    if(staff_form)staff_form.reset()
    if(book_form)book_form.reset()
    alert("something went wrong.\n" + data)
}

function display_regis_succes() {
    user_form.reset()
    staff_form.reset()
    book_form.reset()
    alert("success")
    // user_form_con.click()
}