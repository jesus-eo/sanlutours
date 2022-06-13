let btnSend = document.getElementById("btnChat");
let chat = document.getElementById("chat");

async function getMessage() {
    try {
        let respuesta = await fetch(`bot/chat.blade.php?msg=${chat.value}`);
        if (respuesta.ok) {
            let response = await respuesta.text();
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

/**
 * Cualdo pulsa enviar manda una petición mandandole el valor del chat
 */
btnSend.addEventListener("click", (e) => {
    e.preventDefault();
    if (chat.value != "") {
        getMessage();

    }
});
