import jwtDecode from "jwt-decode";

const HASH = "bGS6lzFqvvSQ8ALbOxatm7/Vk7mLQyzqaS34Q4oR1ew="

function isUserLogged() {
    const token = window.localStorage.getItem("token");

    const decode = jwtDecode(token); 

    console.log(decode);
}   

window.onload = () => isUserLogged