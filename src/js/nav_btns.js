
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



