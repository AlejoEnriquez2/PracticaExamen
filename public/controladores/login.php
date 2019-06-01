<?php
    session_start();

    include '../../config/conexionBD.php';

    $usuario = isset($_POST["user"]) ? trim($_POST["user"]) : null;

    $contrasena = isset($_POST["password"]) ? trim($_POST["password"]) : null;

    $sql = "SELECT * FROM usuarios
            WHERE usu_correo = '$usuario' and 
                  usu_password = MD5('$contrasena') and
                  usu_eliminado = 'N'";


    $result = $conn->query($sql);
    $u = $result->fetch_assoc();
    
    if ($result->num_rows > 0) {
        $_SESSION['isLogged']=TRUE;
        $_SESSION['codigo']= $u['usu_codigo'];
        $_SESSION['rol']=$u['usu_rol_id'];
        
        $admin = $u['usu_rol_id'];
        $codigo = $u['usu_codigo'];
        
        if($admin == 1){
            header("Location: /PracticaExamen/admin/vista/index.php?codigo=".$codigo);    
        }
		
		if($admin == 2){
            header("Location: /PracticaExamen/user/vista/perfil.php?codigo=".$codigo);
        }
        
    }else{
        echo "Error!";
        header("Location: ../pages/index.php");
    }

    $conn->close();
    
?>