const _API_ = window.location.href;

let btn = document.getElementById("btn-login");

function logIn() {
    let pass = document.getElementById("pass-input").value;
    let user = document.getElementById("user-input").value;

    async function sendData() {
        const response = await fetch(_API_ + "login", {
            method: "POST",
            body: JSON.stringify({
                user: user,
                pass: pass,
            })
        });
        return response.json();
    }

    //resolver validação, criar a API de login

    //sendData()
    console.log("passou")
}


btn.addEventListener("click", logIn);