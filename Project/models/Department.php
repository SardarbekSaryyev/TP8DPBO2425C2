<?php
require_once __DIR__ . '/../config/database.php';

class Department
{
    private mysqli $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function all(): array
    {
        $sql = "SELECT d.*, COUNT(l.id) AS total_lecturers
                FROM departments d
                LEFT JOIN lecturers l ON l.department_id = d.id
                GROUP BY d.id
                ORDER BY d.id";
        return $this->db->query($sql)->fetch_all(MYSQLI_ASSOC);
    }

    public function find(int $id): ?array
    {
        $stmt = $this->db->prepare("SELECT * FROM departments WHERE id = ?");
        $stmt->bind_param('i', $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc() ?: null;
    }

    public function create(array $d): void
    {
        $stmt = $this->db->prepare("INSERT INTO departments (name, faculty) VALUES (?, ?)");
        $stmt->bind_param('ss', $d['name'], $d['faculty']);
        $stmt->execute();
    }

    public function update(int $id, array $d): void
    {
        $stmt = $this->db->prepare("UPDATE departments SET name=?, faculty=? WHERE id=?");
        $stmt->bind_param('ssi', $d['name'], $d['faculty'], $id);
        $stmt->execute();
    }

    public function delete(int $id): void
    {
        $stmt = $this->db->prepare("DELETE FROM departments WHERE id = ?");
        $stmt->bind_param('i', $id);
        $stmt->execute();
    }
}
