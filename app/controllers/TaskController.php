<?php
require_once __DIR__ . '/../models/Task.php';

class TaskController
{
    public function index()
    {
        $tasks = Task::all();
        require_once __DIR__ . '/../views/task.php';
    }
    public function tasksAPI()
    {
        $tasks = Task::all();
        echo json_encode($tasks);
    }
    public function taskRegisterAPI()
    {
        //Lee los datos json de la solicitud
        $jsonData = file_get_contents('php://input');

        //Decodifica en un array asociativo
        $data = json_decode($jsonData, true);

        //Verifica que los datos fueron decodificados correctamente
        if (isset($data['tarea']) && isset($data['desc'])) {
            $tarea = $data['tarea'];
            $desc = $data['desc'];
            echo json_encode([
                'mensaje' => "La tarea es $tarea y la descripcion es: $desc"
            ]);
            try{
                Task::register($tarea, $desc);
            }
            catch (PDOException $e) {
                echo json_encode(['status' => 'error', 'mensaje' => 'Error en la base de datos: ' . $e->getMessage()]);        
            }
        } else {
            echo json_encode(['error' => 'Datos inválidos']);
        }
        
    }
    public function taskUpdateAPI()
    {
        //Lee los datos json de la solicitud
        $jsonData = file_get_contents('php://input');

        //Decodifica en un array asociativo
        $data = json_decode($jsonData, true);

        //Verifica que los datos fueron decodificados correctamente
        if (isset($data['id']) && isset($data['tarea']) && isset($data['desc']) && isset($data['estado'])) {
            $id = $data['id'];
            $tarea = $data['tarea'];
            $desc = $data['desc'];
            $estado = $data['estado'];
            echo json_encode([
                'mensaje' => "La tarea es $tarea y la descripcion es: $desc"
            ]);
            Task::update($id, $tarea, $desc, $estado);
        } else {
            echo json_encode(['error' => 'Datos inválidos']);
        }
        
    }
    public function taskDeleteAPI()
    {
        //Lee los datos json de la solicitud
        $jsonData = file_get_contents('php://input');

        //Decodifica en un array asociativo
        $data = json_decode($jsonData, true);

        //Verifica que los datos fueron decodificados correctamente
        if (isset($data['id'])) {
            $id = $data['id'];

            echo json_encode([
                'mensaje' => "El id a eliminar es $id" 
            ]);
            Task::delete($id);
        } else {
            echo json_encode(['error' => 'Datos inválidos']);
        }
        
    }
}
