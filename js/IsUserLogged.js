import { Encrypt } from "./Encrypt.js";
const _API_ = window.location.href; 

function isUserLogged() {
  const token = window.localStorage.getItem("token");
  const crypto = new Encrypt();
  const username = document.getElementById('adm-name')

  if(token) {
    username.innerText = crypto.decrypt(token);
  }
  else window.location.href = 'http://127.0.0.1:5500';
}

isUserLogged();


