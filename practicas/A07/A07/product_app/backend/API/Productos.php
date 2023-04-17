<?php

require_once 'API/database.php';

class Productos extends DataBase{
    private $response;

    public function __construct($database='marketzone'){
        parent::__construct($database);
        $this->response = array();
    }

    public function add($jsonOBJ){
        $this->response = array(
            'status'  => 'Existe un error',
            'message' => 'Ya aparece un producto con ese nombre'
        );
    
        $data = json_decode($jsonOBJ->data, true); //decodificar el objeto JSON en un arreglo asociativo
    
        $sql = "SELECT * FROM productos WHERE nombre = '{$data['nombre']}' AND eliminado = 0";
        $result = $this->conexion->query($sql);

        if($result->num_rows > 0){
            $this->response['message'] = "Existe un error, ya existe un producto con ese nombre";
        }else{
            $sql = "INSERT INTO productos (nombre, marca, modelo, precio, detalles, unidades, imagen) VALUES ('{$data['nombre']}', '{$data['marca']}', '{$data['modelo']}', {$data['precio']}, '{$data['detalles']}', {$data['unidades']}, '{$data['imagen']}')";
            $this->conexion->set_charset("utf8");
            if($this->conexion->query($sql)){
                $this->response['status'] = "Exito";
                $this->response['message'] = "El Producto se a insertado de manera correcta";
            }else{
                $this->response['message'] = "Error, no se pudo ejecutar el query:". mysqli_error($this->conexion);
            }
            $this->conexion->close();
        }

        //echo json_encode($this->response);
    }

    public function delete($id){
        $this->response = array(
            'status'  => 'Error',
            'message' => 'Falla de consulta'
        );

        if(isset($id)){
            $sql="UPDATE productos SET eliminado = 1 WHERE id = {$id}";
            if($this->conexion->query($sql)){
                $this->response['status'] = "Exito";
                $this->response['message'] = "El producto se a eliminado de forma correcta";
            }else{
                $this->response['message'] = "Error, no se a podido ejecutar el query:". mysqli_error($this->conexion);
            }
            $this->conexion->close();
        }
    }

    public function edit($jsonOBJ){
        $this->response = array(
            'status'  => 'Error',
            'message' => 'Falla de consulta'
        );
    
        $data = json_decode($jsonOBJ->data, true); //decodificar el objeto JSON en un arreglo asociativo
    
        if(isset($data['id'])){
            $id = $data['id'];
    
            $sql = "UPDATE productos SET nombre ='{$data['nombre']}', marca ='{$data['marca']}', modelo = '{$data['modelo']}', precio = {$data['precio']}, detalles = '{$data['detalles']}', unidades = {$data['unidades']}, imagen = '{$data['imagen']}' WHERE id = {$id}";
            $this->conexion->set_charset("utf8");
            if($this->conexion->query($sql)){
                $this->response['status'] = "Exito";
                $this->response['message'] = "El producto se a actualizado de manera correcta";
            }else{
                $this->response['message'] = "Error, no se a podido ejecutar el query:". mysqli_error($this->conexion);
            }
            $this->conexion->close();
        }else{
            $this->response['message'] = "Error, no se a podido proporcionar un ID para actualizar el producto";
        }
       // echo json_encode($this->response);
    }
    
    
    

    public function list(){
        if($result = $this->conexion->query("SELECT * FROM productos WHERE eliminado = 0")){
            $rows = $result->fetch_all(MYSQLI_ASSOC);

            if(!is_null($rows)){
                foreach($rows as $num => $row){
                    foreach($row as $key => $value){
                        $this->response[$num][$key] = utf8_encode($value);
                    }
                }
            }
            $result->free();
        }else{
            die('Error, no se a podido ejecutar el query:'. mysqli_error($this->conexion));
        }
        $this->conexion->close();
    }

    public function search($search){
        if(isset($search)){
            $sql = "SELECT * FROM productos WHERE (id = '{$search}' OR nombre LIKE '{$search}%' OR marca LIKE '{$search}%' OR detalles LIKE '%{$search}%') AND eliminado = 0";
            if($result = $this->conexion->query($sql)){
                $rows = $result->fetch_all(MYSQLI_ASSOC);

                if(!is_null($rows)){
                    foreach($rows as $num => $row){
                        foreach($row as $key => $value){
                            $this->response[$num][$key] = utf8_encode($value);
                        }
                    }
                }
                $result->free();
            }
            else{
                die('Error, no se a podido ejecutar el query:'. mysqli_error($this->conexion));
            }
            $this->conexion->close();
        }
    }

    public function single($id){
        if(isset($id)){
            if($result=$this->conexion->query("SELECT * FROM productos WHERE id={$id}")){
                $row = $result->fetch_assoc();

                if(!is_null($row)){
                    foreach($row as $key => $value){
                        $this->response[$key] = utf8_encode($value);
                    }
                }
                $result->free();
            }else{
                die('Error, no se a podido ejecutar el query:'. mysqli_error($this->conexion));
            }
            $this->conexion->close();
        }
    }

    public function singleByName($name){
        if(isset($name)){
            if($result=$this->conexion->query("SELECT * FROM productos WHERE nombre = '{$name}'")){
                $row = $result->fetch_assoc();

                if(!is_null($row)){
                    foreach($row as $key => $value){
                        $this->response[$key] = utf8_encode($value);
                    }
                }
                $result->free();
            }else{
                die('Error, no se a podido ejecutar el query:'. mysqli_error($this->conexion));
            }
            $this->conexion->close();
        }
    }

    public function getResponse(){
        return json_encode($this->response, JSON_PRETTY_PRINT);
    }
}

?>