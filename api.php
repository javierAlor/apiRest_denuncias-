<?php

// $agresor = $_POST["nombre"];
// $estado_suceso = $_POST["estado"];
// $lugar_suceso = $_POST["lugar_suceso"];
// $descripcion = $_POST["descripcion"];

require_once('controller/UserController.php');
$denuncias;
$method = strtolower ($_SERVER['REQUEST_METHOD']);

$user_controller = new UserController();

if($_SERVER['REQUEST_METHOD']!=null && $_SERVER['REQUEST_METHOD'] !=""){
    //mensaje('paso las 2 validaciones');
    switch ($method) {
        case 'get':
            
            if(isset($_REQUEST['value'])){
                //get one row
                $id = $_REQUEST['value'];
                $resulset = $user_controller->getById($id);

                if($resulset!=false){
                    echo json_encode($resulset);
                }else{
                    mensaje('NO existe registro ...');
                }
                
            }else{ // get all row
                $resulset = $user_controller->getAll();
                // echo json_encode($resulset);
                $denuncias = $resulset;
                $array = ($resulset);

                //Este seria si tuvieses mas de un indice dentro de tu json array
                
            
            }

            break;
        case 'post':
            # code...
            $array_user = array(
                            'agresor'   => $_POST["agresor"],
                            'estado_suceso' => $_POST["estado"],
                            'lugar_suceso'  => $_POST["lugar_suceso"] ,
                            'descripcion'  => $_POST["descripcion"]           

            );

            $result = $user_controller->add($array_user);
            if($result==true){
                mensaje('Registro guardado exitosamente');
                header('Location: index.php');
            }else{
                error('Error al intentar guardar registro');
            }
            
            break;
        case 'put':
            # code...

            if (isset($_REQUEST['id'])) {
                //get one row
                //$id = $_REQUEST['value'];
                $array_user = array(
                    'id'   => $_REQUEST['id'],
                    'agresor'   => $_REQUEST['agresor'],
                    'estado_suceso' => $_REQUEST['estado_suceso'],
                    'lugar_suceso'  => $_REQUEST['lugar_suceso'],
                    'descripcion'  => $_REQUEST['descripcion'],

                    
                );

                $result = $user_controller->update($array_user);
                //var_dump($result);
                if ($result == 0) {
                    mensaje('Registro actualizado exitosamente');
                } else {
                    error('Error al intentar actualizar registro');
                }
            }            
            
            break;
        case 'delete':
            # code...
            if (isset($_REQUEST['id'])) {
                $id = $_REQUEST['id'];
                $rs = $user_controller->delete($id);
                if($rs == 1)
                mensaje('Registro borrado con exito.');

            }else{
                error('Error al borrar, falta ID...');
            }
            break;

        default:
            # code...
            header('HTTP/1.1 405 Method Not Allowed');
            header('Allow: GET, POST, PUT, DELETE');
            error('Method not exist...' . $method);
            break;
    }    

}else{
    error('Error al llamar a la API');
}



function error($mensaje){
    echo json_encode($mensaje);
}

function mensaje($mensaje){
    echo json_encode($mensaje);
}

?>