let change_pass_con = document.querySelector('#change_pass'),
    change_pass_form = document.querySelector('#change_pass form'),
    change_pass_btn = document.querySelector('#update_pass'),
    change_pass_new = document.getElementsByName("new_pass")[0],
    change_pass_confirm = document.getElementsByName("pass")[0]



change_pass_con.addEventListener("transitionend", () => {
    display_none(change_pass_con)

})

change_pass_btn.onclick = () => {
    show_form(change_pass_con)
}

change_pass_con.onclick = (ev) => {
    hide_form(change_pass_con, ev)
}

change_pass_new.oninput = ev=>{
    if(change_pass_confirm.value == "")return
    validate_new_confirm()
}

change_pass_confirm.oninput = ev=>{
    if(change_pass_new.value == "")return
    validate_new_confirm()
}


function validate_new_confirm(){

    if(change_pass_confirm.value == change_pass_new.value){
        change_pass_form.valid = true
        change_pass_form.style.border = "none"
        return
    }
    change_pass_form.valid = false
    change_pass_form.style.border = "2px solid red"
}


change_pass_con.addEventListener("submit", async (ev) => {
    ev.preventDefault()

    if (change_pass_form.validating) return
    if (!change_pass_form.valid) return
    change_pass_form.validating = true
    let fdata = new FormData(change_pass_form);

    let data = await fetch('../inc/updatepassword.inc.php', {
        method: 'post',
        body: fdata
    })
    data = await data.text()
    change_pass_form.reset()
    alert(data)
    change_pass_form.validating = false
});

