var modal = document.getElementById('id01');

window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}


var cadForm = document.getElementById("cad-usuario-form");


cadForm.addEventListener("submit", (e) => {

   
    e.preventDefault();


    var Nome = document.getElementById("nome").value;
    var Data_de_Nascimento = document.getElementById("date").value;
    var Cpf = document.getElementById("cpf").value;
    var Telefone = document.getElementById("phnumber").value;
    var Email = document.getElementById("email").value;
    var Usuário = document.getElementById("user").value;
    var Senha = document.getElementById("psw").value;
    var RepitirSenha = document.getElementById("pswrepeat").value;

    let usuarios = new Array();

   
    if (localStorage.hasOwnProperty("usuarios")) {
    
        usuarios = JSON.parse(localStorage.getItem("usuarios"));
    }

    usuarios.push({ nome, date, cpf, phnumber, email, user, psw, pswrepeat});

 
    localStorage.setItem("usuarios", JSON.stringify(usuarios));


   document.getElementById("conteudo").insertAdjacentHTML('beforeend', "Nome: " + Nome + ":Data de Nascimento" + date +"<br>:Cpf" + cpf + ":Telefone:" + phnumber + ":Email" + email + ":Usuário" + user + ":Senha" + psw + ":Repitir Senha" + pswrepeat + "<br><hr>");


    document.getElementById("msg").innerHTML = "<p style='color: green'>Usuário registrado com sucesso!</p>";
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
