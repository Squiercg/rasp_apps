<div class="banner_completo">

    <div class="info_login">          
	<?php        
        if (isset($_SESSION['usuario'])){
            echo 'Usuário: '.$_SESSION['usuario'];
            echo ' ';
            echo '<a href="?op=logout">Logout</a>';
        }else{
            echo "Desconectado!";         
        }
	?>
    </div>

    <div class ="banner_figura">
    </div>

</div>
