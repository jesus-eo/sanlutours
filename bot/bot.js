let btnSend = document.getElementById("btnChat");
let chat = document.getElementById("chat");

async function getMessage(){
  try {
    
    let respuesta =await fetch(`bot/chat.php?msg=${chat.value}`);
    console.log(chat.value);
    if (respuesta.ok){
   
      let response = await respuesta.text();
      console.log(response);
      const chatBody = document.querySelector(".scroller");
      const divCpu = document.createElement("div");
      divCpu.className = "robot visible";
      divCpu.innerHTML = response;
      const divUser = document.createElement("div");
      divUser.className = "me visible";  
      divUser.textContent = chat.value;
      
      chatBody.append(divUser);
      setTimeout(() => {
        chatBody.append(divCpu);
      }, 400);
    }
    chat.value = "";
  } catch (error) {
    
  }
}
/* const getMessage = (msg) => {
  const xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      const response = xhr.responseText;
      const chatBody = document.querySelector(".scroller");
      const divCpu = document.createElement("div");
      divCpu.className = "alicia visible";
      divCpu.innerHTML = response;
      const divUser = document.createElement("div");
      divUser.className = "me visible";
      divUser.textContent = msg;
      chatBody.append(divUser);
      setTimeout(() => {
        chatBody.append(divCpu);
      }, 600);
      //   console.log(divCpu);
    }
  };
  xhr.open("GET", "bot/chat.php?msg=" + msg, true);
  xhr.send();
}; */

/**
 * Cualdo pulsa enviar manda una petición mandandole el valor del chat 
 */
btnSend.addEventListener("click", (e) => {
  e.preventDefault();
  if (chat.value != "") {
    getMessage();
    
  } 
});
