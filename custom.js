
var cadForm = document.getElementById("cad-usuario-form");


cadForm.addEventListener("submit", (e) => {

   
    e.preventDefault();


    var Nome = document.getElementById("Nome").value;
    var RA = document.getElementById("RA").value;
    var Email = document.getElementById("Email").value;
    var Idade = document.getElementById("Idade").value;
    var Telefone = document.getElementById("Telefone").value;
    var endereco = document.getElementById("endereco").value;
    var Sexo = document.getElementById("Sexo").value;

    let usuarios = new Array();

   
    if (localStorage.hasOwnProperty("usuarios")) {
    
        usuarios = JSON.parse(localStorage.getItem("usuarios"));
    }

    usuarios.push({ Nome, RA, Email, Idade, Telefone, endereco, Sexo });

 
    localStorage.setItem("usuarios", JSON.stringify(usuarios));


    document.getElementById("conteudo").insertAdjacentHTML('beforeend', "Nome: " + Nome + "RA:" + RA +"<br>E-mail: " + Email + "Idade:" + Idade + "Telefone:" + Telefone + "endereco:" + endereco + "Sexo:" + Sexo + "<br><hr>");


    document.getElementById("msg").innerHTML = "<p style='color: green'>Usuário salvo no localStorage!</p>";
});


async function enviarServidor() {

  
    if (localStorage.hasOwnProperty("usuarios")) {


        let dadosLocalstorage = JSON.parse(localStorage.getItem("usuarios"));

        await fetch("cadastar.php", {
            method: "POST",
            body: JSON.stringify(dadosLocalstorage),
            headers: {
                "Content-Type": "application/json"
            }
        }).then((resposta) => {
       
            resposta.json().then(data => {
       
       
                document.getElementById("msg").innerHTML = data.msg;
            });


            if(resposta.status == 200){

             
                localStorage.removeItem("usuarios");

            
                document.getElementById("conteudo").innerHTML = "";
            }
        });

    } else {
       
        document.getElementById("msg").innerHTML = "<p style='color: #f00'>Erro: Nenhum registro encontrado para sicronizar!</p>";
    }
}