
let menu = document.querySelector("#menu_opt_con")
let menu_btn = document.querySelector(".menu")


const dropdown = {
    open: (el) => {
        el.style.display = "block"
        el.active = true
    },
    close: (el) => {
        el.style.display = "none"
        el.active = false
    },
    toggle: el => {
        if (el.active) return dropdown.close(el)
        dropdown.open(el)
    }
}

menu_btn.onclick = (ev) => {
    dropdown.toggle(menu)
    ev.stopPropagation()
    return false
}

window.onclick = ev => {

    if (ev.target == menu_btn || !menu.active) return
    dropdown.close(menu)
    ev.stopPropagation()
    return false
}

let change_pass_con = document.querySelector('#change_pass'),
change_pass_form = document.querySelector('#change_pass form'),
change_pass_btn = document.querySelector('#update_pass'),
change_pass_new = document.getElementsByName("new_pass")[0],
change_pass_confirm = document.getElementsByName("pass")[0]

setup_form_ev(change_pass_con,change_pass_form,change_pass_btn,change_pass_cb);


async function change_pass_cb(){
    let fdata = new FormData(change_pass_form);

    let data = await fetch('../inc/updatepassword.inc.php', {
        method: 'post',
        body: fdata
    })
    data = await data.text()
    change_pass_form.reset()
    alert(data)
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


