const btn = document.getElementById("exit");
const info = document.getElementById("e-info")

function logOut() {
    window.localStorage.removeItem("token");
    window.location.href = 'http://127.0.0.1:5500'
}

btn.addEventListener("click", logOut)
btn.addEventListener("mouseover", () => {
    info.style.opacity = 1;
})
btn.addEventListener("mouseout", () => {
    info.style.opacity = 0;
})