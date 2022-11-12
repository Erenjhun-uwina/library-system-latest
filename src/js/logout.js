let logout = document.querySelector('#logout')

logout.addEventListener('click',async ()=>{

    let data = await fetch('../inc/logout.inc.php',{
        method:"post",
        body:""
    })
                  
    data = await data.text()
    location = data
})