import { Encrypt } from "./Encrypt.js";
const _API_ = "http://localhost:4000/"; ;//window.location.href


const btn = document.getElementById("btn-login");

async function logIn() {
    const pass = document.getElementById("pass-input").value;
    const user = document.getElementById("user-input").value;
    const textBtn = document.getElementById("login-text-btn");
    const spin = document.getElementById("loading-icon");
    const crypto = new Encrypt();

    if (!pass || !user) {
        toastfy("e", "[ERRO] Input vazio!");
        return;
    }

    spin.style.display = "block";
    textBtn.style.display = "none";
    btn.disabled = true;
    btn.style.backgroundImage = "linear-gradient(to right, #5a4f6191 0%, #595575b0 51%, #574b5e91 100%)";
    btn.style.cursor = "not-allowed"
    btn.style.pointerEvents = 'none'

    async function sendData() {
        const response = await fetch(_API_ + "api/login", {
            method: "POST",
            body: JSON.stringify({
                user: crypto.encrypt(user),
                pass: crypto.encrypt(pass),
            })
        });
        return response.json();
    }

    //resolver validação, criar a API de login

    const response = await sendData();
    console.log(response);
    toastfy(response.type, response.msg);
    if(response) {
        spin.style.display = "none";
        textBtn.style.display = "block";
        btn.disabled = false;
        btn.style.backgroundImage = "linear-gradient(to right, #8d5fa891 0%, #5038edb0 51%, #b087c791 100%)"
        btn.style.cursor = "pointer"
        btn.style.pointerEvents = 'auto'
    }
    if (response.type === "s") {
        window.localStorage.setItem("token", response.token);
        window.location.href = "http://127.0.0.1:5500/pages/home.html" //_API_+'pages/home.html';
    }
    
    
}


function toastfy(type, msg) {
    let toast = document.getElementById("toast")

    toast.classList.remove("invisible");

    switch (type) {
        case "e":
            toast.classList.add("error");
            break;
        case "a":
            toast.classList.add("alert");
            break;
        case "s":
            toast.classList.add("success");
            break;
    }
    toast.innerText = msg;

    setTimeout(() => {
        toast.classList.remove("error");
        toast.classList.remove("alert");
        toast.classList.remove("success");

        toast.classList.add("invisible");
    }, 3500)
}

btn.addEventListener("click", logIn);
