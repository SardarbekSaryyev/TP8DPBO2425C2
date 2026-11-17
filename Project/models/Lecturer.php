<?php
require_once __DIR__ . '/../config/database.php';

class Lecturer
{
    private mysqli $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function all(): array
    {
        $sql = "SELECT l.*, d.name AS department_name
                FROM lecturers l
                LEFT JOIN departments d ON d.id = l.department_id
                ORDER BY l.id";
        return $this->db->query($sql)->fetch_all(MYSQLI_ASSOC);
    }

    public function find(int $id): ?array
    {
        $stmt = $this->db->prepare("SELECT * FROM lecturers WHERE id = ?");
        $stmt->bind_param('i', $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc() ?: null;
    }

    public function create(array $d): void
    {
        $dept = $d['department_id'] !== '' ? (int)$d['department_id'] : null;
        $stmt = $this->db->prepare(
            "INSERT INTO lecturers (name, nidn, phone, join_date, department_id) VALUES (?, ?, ?, ?, ?)"
        );
        $stmt->bind_param('ssssi', $d['name'], $d['nidn'], $d['phone'], $d['join_date'], $dept);
        $stmt->execute();
    }

    public function update(int $id, array $d): void
    {
        $dept = $d['department_id'] !== '' ? (int)$d['department_id'] : null;
        $stmt = $this->db->prepare(
            "UPDATE lecturers SET name=?, nidn=?, phone=?, join_date=?, department_id=? WHERE id=?"
        );
        $stmt->bind_param('ssssii', $d['name'], $d['nidn'], $d['phone'], $d['join_date'], $dept, $id);
        $stmt->execute();
    }

    public function delete(int $id): void
    {
        $stmt = $this->db->prepare("DELETE FROM lecturers WHERE id = ?");
        $stmt->bind_param('i', $id);
        $stmt->execute();
    }
}
