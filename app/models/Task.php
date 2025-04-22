<?php
require_once __DIR__ . '/../core/Database.php';

class Task{
    public static function all() {
        $db = Database::connect();
        $stmt = $db->query("SELECT * FROM tareas ORDER BY fecha_creacion DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function register($tarea, $desc){
            $db = Database::connect();
            $stmt = $db->prepare("INSERT INTO tareas (tarea, descripcion, fecha_creacion, terminado) VALUES (?, ?, ?, ?);");
            $stmt->execute([$tarea, $desc, date('Y-m-d'), 0]);
    }
    public static function update($id, $tarea, $desc, $estado) {
        $db = Database::connect();
        $stmt = $db->prepare("UPDATE tareas SET tarea = ?, descripcion = ?, terminado = ? WHERE id = ?");
        $stmt->execute([$tarea, $desc, $estado, $id]);
    }    
    public static function delete($id) {
        $db = Database::connect();
        $stmt = $db->prepare("DELETE FROM tareas WHERE id = ?");
        $stmt->execute([$id]);
    }    
}
?>