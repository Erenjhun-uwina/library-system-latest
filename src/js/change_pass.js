let change_pass_con = document.querySelector('#change_pass')
let change_pass_form = document.querySelector('#change_pass form')
let change_pass_btn = document.querySelector('#update_pass')

change_pass_con.addEventListener("transitionend", () => {
    display_none(change_pass_con)

})

change_pass_btn.onclick = () => {
    show_form(change_pass_con)
}

change_pass_con.onclick = (ev) => {
    hide_form(change_pass_con, ev)
}


change_pass_con.addEventListener("submit", async (ev) => {
    ev.preventDefault()

    if (change_pass_form.validating) return
    change_pass_form.validating = true
    let fdata = new FormData(change_pass_form);

    let data = await fetch('../inc/updatepassword.inc.php', {
        method: 'post',
        body: fdata
    })
    data = await data.text()

    console.log(data);

    change_pass_form.validating = false
});

