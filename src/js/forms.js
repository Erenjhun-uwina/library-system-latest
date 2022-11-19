
const forms = []//wtf is the past tense of setup??????? and wtf is the spelling of pastense wtffffffffffffff
const states = []


let search_params = new URL(location).searchParams;
function resume_state(){
   states.forEach((el)=>{
        if(search_params.get(el[0]))el[1].click()
   })
}

/**
 * sets forms events 
 * 
 * eg.btn.onclick => show_form
 * 
 * form.onclick =>close
 * 
 * form.ontransitionend => hide
 * 
 * form.onsubmit => callback
 * 
 * @param {*} form_con  form container reference
 * @param {*} form form reference
 * @param {*} btn  the html button reference
 * @param {*} callback callback runs after submitting the passed form
 * @returns 
 */
function setup_form_ev(form_con,form,btn,callback=()=>{},state) {
    if (!form_con) return

    form_con.addEventListener("transitionend", () => {
        display_none(form_con)
    })

    btn.onclick = () => {
        show_form(form_con)
        const st = {}
        st[state[0]]="open"
        set_search_param(st)
    }

    form_con.onclick = (ev) => {
        hide_form(form_con, ev)
        set_search_param()
    }

    forms.push(form)
    if(state)states.push([state,btn])


    form.addEventListener("submit", async (ev) => {
        ev.preventDefault()

        if (form.validating) return
        form.validating = true
        callback()
        form.validating = false
    });
}

function display_none(elem) {
    if (elem.style.opacity == "1") return
    elem.style.display = "none"
    set_search_param()
}

function hide_form(elem, ev) {
    if (ev.target != elem) return
    elem.style.opacity = "0"
}

function show_form(elem) {
    elem.style.display = "table"
    elem.style.opacity = "1"
}

function set_search_param(params) {

    let url = new URL(window.location)

    if (params) {
        for (const param in params) {
            url.searchParams.set(param, params[param])
        }

        return history.replaceState({}, '', url)
    }
    history.replaceState({}, '', url.pathname)
}
/**
 * resets all forms (setuped){the fuck is the pastense of that word????} by setup_form_ev function
 * resets all forms what do you expect???ahhahahahahah
 */
function reset_forms() {

    forms.forEach(form => {
        
        
        try {
            if (form) form.reset()
        } catch (error) {
            throw new Error('given a given param if not a form == '+form)
        }
    })
}
