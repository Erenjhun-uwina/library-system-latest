
const forms = []//wtf is the past tense of setup??????? and wtf is the spelling of pastense wtffffffffffffff
const states = []


let search_params = new URL(location).searchParams;


let loading_pop = document.querySelector('#loading_pop')
loading_pop.addEventListener("transitionend", () => {
    display_none(loading_pop)
})

function resume_state() {
    if (search_params.toString() == '') return
    states.forEach((el) => {
        if (search_params.get(el[0])) return el[1].click()
    })
    const book_id = search_params.get('book_prev')
    if (!book_id) return
    show_prev(book_id)
}

/**
 * sets forms events 
 * 
 * eg.btn.onclick => show_pop
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
function setup_form_ev(form_con, form, btn, callback = () => { }, state) {
    if (!form_con) return

    form_con.addEventListener("transitionend", () => {
        display_none(form_con)
    })

    btn.onclick = () => {
        show_pop(form_con)
        const st = {}
        st[state[0]] = "open"
        set_search_param(st)
    }

    form_con.onclick = (ev) => {
        hide_pop(form_con, ev)
        set_search_param()
    }

    forms.push(form)
    if (state) states.push([state, btn])


   
    form.addEventListener("submit", async (ev) => {
        ev.preventDefault()

        if (form.validating) return
        form.validating = true
        reset_forms()
        show_pop(loading_pop,"block")
        await callback()
        hide_pop(loading_pop)
        form.validating = false
    });
}


function setup_borrow_form(form_con, form, callback) {

    if (!book_prev.burrow) return

    form_con.addEventListener("transitionend", () => {
        display_none(form_con)
    })

    form_con.onclick = (ev) => {
        hide_pop(form_con, ev)
    }

    form.addEventListener("submit", async (ev) => {
        ev.preventDefault()

        if (form.validating) return
        form.validating = true
        show_pop(loading_pop,"block")
        callback()
        hide_pop(loading_pop)
        form.validating = false
    });
}


/**
 * 
 * @param {int} el id of the book being fetch
 */
async function show_prev(book_id) {
    
    const id = Number(book_id)
    if(typeof id != "number")throw new Error('show_prev first param must be type of int. '+typeof id +" given")
    const book_details = await fetch_book_details(id)
    if (!book_details) return console.warn('undefined book')

    const img_path = 'src/assets/covers/'

    book_prev.book_id = book_details.Id
    book_prev.img.src = "../" + img_path + book_details.Cover_img
    book_prev.title.innerText = `"${book_details.Title}"`
    book_prev.author.innerText = `-${book_details.Author}`
    book_prev.date.innerText = book_details.Date_release


    book_prev.img.parentElement.style.setProperty("--bg", "url(" + location.origin + "/xampp/library-system-latest/" + img_path + book_details.Cover_img + ")")
    show_pop(book_prev.con)

    set_search_param({
        'book_prev': book_details.Id
    })
}

/**
 * @param {int} id 
 * @returns {object} object containing book details
 */
async function fetch_book_details(id) {

    const fdata = new FormData()
    fdata.append("id", id)

    let data = await fetch("../inc/book.inc.php", {
        method: "post",
        body: fdata
    })

    data = await data.json()
    return data
}

function display_none(elem) {
    if (elem.style.opacity == "1") return
    elem.style.display = "none"
    set_search_param()
}

function hide_pop(elem, ev) {
    if(!ev || ev.target == elem) elem.style.opacity = "0"
}

function show_pop(elem,display = "table") {
    elem.style.display = display
    elem.style.opacity = "1"
    console.log(elem.style.opacity);
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
            throw new Error('given a given param if not a form == ' + form)
        }
    })
}


