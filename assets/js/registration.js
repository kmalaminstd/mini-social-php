const firstname = document.querySelector("#firstName")
const lastname = document.querySelector("#lastName")
const email = document.querySelector("#email")
const password = document.querySelector("#password")
const form = document.querySelector("form")

const firstnameVal = firstname.value;
const lastnameVal = lastname.value;
const emailVal = email.value;
const passwordVal = password.value;

form.addEventListener("submit", (e)=>{

    if(firstnameVal && lastnameVal && emailVal && passwordVal){

        const xhr = new XMLHttpRequest();
        xhr.open('POST', '../functions/registration.php', true)

        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')

        xhr.addEventListener("load", ()=>{
            if(xhr.status === 200){
                console.log(xhr.responseText);
            }
        })
        xhr.send(`username=${encodeURIComponent(firstnameVal)}$lastname=${encodeURIComponent(lastnameVal)}$email=${encodeURIComponent(lastnameVal)}$password=${encodeURIComponent(passwordVal)}`)
    }


})

