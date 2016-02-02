<!-- Controlador de contenidos paginas --> 
                <?php
				
				if(isset($_GET['contenido']))
			{
				
switch ($_GET['contenido']) {
    case 0:
        echo "mostrar contenido";
        break;
    case 1:
        echo "dsadada holas como estan";
        break;
    case 2:
        echo "i es igual a 2";
        break;
    default:
       include('modulos/cuadro_contenido.php');
}

			}	
			else{
				include('modulos/cuadro_contenido.php');
			}	
 ?>  