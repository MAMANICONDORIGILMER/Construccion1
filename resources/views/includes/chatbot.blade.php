<div class="app-title">
    <h1><i class="material-symbols-outlined mr-2" style="color: #724AE8;">smart_toy</i>Chat Bot</h1>
</div>

<ul class="chatbox">
    <li class="chat incoming">
        <span class="material-symbols-outlined mr-2">smart_toy</span>
        <p>hola! <br> como puedo ayudarte?</p>
    </li>
</ul>

<div class="chat-input">
    <textarea placeholder="Escribe un mensaje..."></textarea>
    <span id="send-btn" class="material-symbols-outlined mr-2">send</span>
</div>

<script type="text/javascript">
    const chatInput = document.querySelector(".chat-input textarea");
    const sendChatBtn = document.querySelector(".chat-input span");
    const chatBox = document.querySelector(".chatbox");

    let userMenssage;
    const API_KEY = "";
    const inputInitHeight = chatInput.scrollHeight;

    const createChatLi = (menssage, className) => {
        const chatLi = document.createElement("li");
        chatLi.classList.add("chat", className);
        let chatContent = className === "outgoing" ? '<p>'+menssage+'</p>' : '<span class="material-symbols-outlined mr-2">smart_toy</span><p>'+menssage+'</p>';
        chatLi.innerHTML = chatContent;
        return chatLi;
    }

    const generateResponse = (incomingChatLi) => {
        const API_URL = "https://api.openai.com/v1/chat/completions";
        const messageElement = incomingChatLi.querySelector("p");

        const requestOptions = {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "Authorization": 'Bearer '+API_KEY
            },
            body: JSON.stringify({
                model: "gpt-3.5-turbo",
                messages: [{role: "user", content: userMenssage}]
            })
        }

        fetch(API_URL, requestOptions).then(res => res.json()).then(data => {
            messageElement.textContent = data.choices[0].message.content;
        }).catch((error) => {
            messageElement.textContent = "Oops! Ocurrio un Error. Porfavor intente de nuevo."
        }).finally(() => chatBox.scrollTo(0, chatBox.scrollHeight));
    }

    const handleChat = () => {
        userMenssage = chatInput.value.trim();
        if(!userMenssage) return;

        chatBox.appendChild(createChatLi(userMenssage, "outgoing"));
        chatBox.scrollTo(0, chatBox.scrollHeight);
        chatInput.value = "";
        chatInput.focus();

        setTimeout(() => {
            const incomingChatLi = createChatLi("...", "incoming")
            chatBox.appendChild(incomingChatLi);
            chatBox.scrollTo(0, chatBox.scrollHeight);
            generateResponse(incomingChatLi);
        }, 600);
    }

    chatInput.addEventListener("input", () => {
        chatInput.style.height = inputInitHeight+'px';
        chatInput.style.height = chatInput.scrollHeight+'px';
    })

    sendChatBtn.addEventListener("click", handleChat);
</script>