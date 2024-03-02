import { Encrypt } from "./Encrypt.js";

function isUserLogged() {
  const token = window.localStorage.getItem("token");
  const encrypt = new Encrypt();

  encrypt.decrypt(token);


}

//window.onload = () => isUserLogged


