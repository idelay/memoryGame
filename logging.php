   <?php  
if(isset($_POST["submit"])){  
  
if(!empty($_POST['uname']) && !empty($_POST['pass'])) {  
    $user=$_POST['uname'];  
    $pass=$_POST['pass'];  
  
    $con=mysqli_connect('localhost','root','') or die(mysqli_error());  
    mysqli_select_db($con,'jogo_da_memoria') or die("Banco de dados não pôde ser conectado");  
  
    $query=mysqli_query($con,"SELECT * FROM usuario WHERE login='".$user."' AND senha='".$pass."'");  
    $numrows=mysqli_num_rows($con,$query);  
    if($numrows!=0)
    {  
    while($row=mysqli_fetch_assoc($con,$query))  
    {  
    $dbusername=$row['login'];  
    $dbpassword=$row['senha'];  
    }  
  
    if($user == $dbusername && $pass == $dbpassword)  
    {  
    session_start();  
    $_SESSION['sess_user']=$user;  
  
    /* Redirect browser */  
    header("Location: escolhaGAME.html");  
    }  
    } else {  
    echo "Usuário ou senha inválido.";  
    }  
  
} else {  
    echo "Todos os campos devem ser preenchidos.";  
}  
}  
?> 
