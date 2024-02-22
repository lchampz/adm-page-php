const _API_ = window.location.href; //"http://localhost:4000/"

let btn = document.getElementById("btn-login");

async function logIn() {
    let pass = document.getElementById("pass-input").value;
    let user = document.getElementById("user-input").value;

    if (!pass || !user) {
        toastfy("e", "[ERRO] Input vazio!");
        return;
    }

    async function sendData() {
        const response = await fetch(_API_ + "api/login", {
            method: "POST",
            body: JSON.stringify({
                user: user,
                pass: pass,
            })
        });
        return response.json();
    }

    //resolver validação, criar a API de login

    const response = await sendData();
    console.log(response);
    toastfy(response.type, response.msg);
    if (response.type === "s") window.localStorage.setItem("token", response.token);
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