@extends('layouts.default')
@section('content')


<div class="row">

    <div class="col-lg-9 col-md-9 col-sm-12">
        <!-- title -->
        <div class="app-title">
            <h1><i class="fa fa-plus"></i> Crear Proyecto</h1>
        </div>

        <!-- content -->
        <form action="/proyecto/agregar" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <!-- datos del proyecto -->
            <div class="tile mb-3">
                <h3 class="tile-title">Datos del Proyecto</h3>
                <div class="tile-body">     
                    <div class="form-group">
                        <label class="control-label">Nombre</label>
                        <input class="form-control" name="Nombre" type="text">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Descripción</label>
                        <input class="form-control" name="Descripcion" type="text">
                    </div>
                    
                    <script>
                        window.onload = function(){
                            var fecha = new Date(); //Fecha actual
                            var mes = fecha.getMonth()+1; //obteniendo mes
                            var dia = fecha.getDate(); //obteniendo dia
                            var ano = fecha.getFullYear(); //obteniendo año
                            if(dia<10)
                                dia='0'+dia; //agrega cero si el menor de 10
                            if(mes<10)
                                mes='0'+mes //agrega cero si el menor de 10
                            document.getElementById('fechaActual').value=ano+"-"+mes+"-"+dia;
                            }
                    </script>

                    <input type="date" name="fechaCreacion" id="fechaActual" value="" hidden>
                    <input type="hidden" name="UsuarioId" value="1">
                </div>
            </div>
            <!-- datos del proyecto -->
            <!-- metodologia del proyecto -->
            <div class="tile">
                <h3 class="tile-title">Datos de la Metodología</h3>
                <div class="tile-body">
                    <div class="form-group">
                        <!-- HIDDEN identificadores de metodologia -->

                        <label class="control-label">Metodología</label>
                        <select id="CmbMetodologia" name="MetodologiaId" class="form-control" onchange="obtener(this);">
                            <option disabled selected>Seleccione una opción...</option>
                            @foreach($ListadoMetodologia as $ObjMetodologia)
                                <option value="{{$ObjMetodologia->Id}}">{{$ObjMetodologia->Nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="tile-footer">
                    <button class="btn btn-primary text-uppercase" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Crear Proyecto</button>
                </div>
            </div>
            <!-- metodologia del proyecto -->
        </form>
    </div>

    <div class="col-lg-3 col-md-3 col-sm-12" style="position: relative;">
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
            const API_KEY = "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";
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
                    console.log(messageElement.textContent);
                }).catch((error) => {
                    console.log(data.choices[0].message.content);
                    messageElement.textContent = "Oops! Ocurrio un Error. Porfavor intente de nuevo."
                }).finally(() => chatBox.scrollTo(0, chatBox.scrollHeight));
            }

            const generateResponse2 = (incomingChatLi) => {
                    const messageElement = incomingChatLi.querySelector("p");
                    let url = "{{action('ProyectoController@ConsultarChatbot',['Entrada' => ''])}}/"+userMenssage;
                    fetch(url).then(response => response.text()).then(response => {
                        if(response.length < 500){
                            messageElement.textContent = response;
                        } else{
                            messageElement.textContent = "Oops! Ocurrio un Error. Porfavor intente de nuevo."
                        }
                    }).catch((error) => {
                        messageElement.textContent = "Oops! Ocurrio un Error. Porfavor intente de nuevo."
                    }).finally(() => chatBox.scrollTo(0, chatBox.scrollHeight));
                }

            function obtener (sel) {
                userMenssage = sel.options[sel.selectedIndex].text;
                setTimeout(() => {
                    const incomingChatLi = createChatLi("...", "incoming")
                    chatBox.appendChild(incomingChatLi);
                    chatBox.scrollTo(0, chatBox.scrollHeight);
                    generateResponse2(incomingChatLi);
                }, 600);
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
    </div>

    
</div>

@stop