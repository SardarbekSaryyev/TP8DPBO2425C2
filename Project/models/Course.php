<?php
require_once __DIR__ . '/../config/database.php';

class Course
{
    private mysqli $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function all(): array
    {
        $sql = "SELECT c.*, l.name AS lecturer_name
                FROM courses c
                JOIN lecturers l ON l.id = c.lecturer_id
                ORDER BY c.id";
        return $this->db->query($sql)->fetch_all(MYSQLI_ASSOC);
    }

    public function find(int $id): ?array
    {
        $stmt = $this->db->prepare("SELECT * FROM courses WHERE id = ?");
        $stmt->bind_param('i', $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc() ?: null;
    }

    public function create(array $d): void
    {
        $credits = (int)$d['credits'];
        $lecturer = (int)$d['lecturer_id'];
        $stmt = $this->db->prepare("INSERT INTO courses (code, name, credits, lecturer_id) VALUES (?, ?, ?, ?)");
        $stmt->bind_param('ssii', $d['code'], $d['name'], $credits, $lecturer);
        $stmt->execute();
    }

    public function update(int $id, array $d): void
    {
        $credits = (int)$d['credits'];
        $lecturer = (int)$d['lecturer_id'];
        $stmt = $this->db->prepare("UPDATE courses SET code=?, name=?, credits=?, lecturer_id=? WHERE id=?");
        $stmt->bind_param('ssiii', $d['code'], $d['name'], $credits, $lecturer, $id);
        $stmt->execute();
    }

    public function delete(int $id): void
    {
        $stmt = $this->db->prepare("DELETE FROM courses WHERE id = ?");
        $stmt->bind_param('i', $id);
        $stmt->execute();
    }
}
