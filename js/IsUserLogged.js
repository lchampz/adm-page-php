import { Encrypt } from "./Encrypt.js";
const _API_ = window.location.href; 

export function isUserLogged() {
  const token = window.localStorage.getItem("token");
  const crypto = new Encrypt();
  

  if(token) return crypto.decrypt(token);
  else return null;
}

addEventListener("load", () => {
  const username = document.getElementById('adm-name');
  const actualDateDiv = document.getElementById('date');
  const token = isUserLogged();
  const date = new Date();


  if(token) {
    username.innerHTML = token + "!";
    actualDateDiv.innerHTML = date.getDate() + "/" + (date.getMonth() + 1 )+ "/"+date.getFullYear() 
  }
  else window.location.href = 'http://127.0.0.1:5500'
} )

