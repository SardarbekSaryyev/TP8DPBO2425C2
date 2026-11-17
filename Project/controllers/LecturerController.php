<?php
require_once __DIR__ . '/BaseController.php';
require_once __DIR__ . '/../models/Lecturer.php';
require_once __DIR__ . '/../models/Department.php';

class LecturerController extends BaseController
{
    private Lecturer $model;
    private Department $departments;
    private array $fields = ['name', 'nidn', 'phone', 'join_date', 'department_id'];

    public function __construct()
    {
        $this->model = new Lecturer();
        $this->departments = new Department();
    }

    public function index(): void
    {
        $this->render('lecturers/index', ['lecturers' => $this->model->all()]);
    }

    public function create(): void
    {
        if ($this->isPost()) {
            $this->model->create($this->post($this->fields));
            $this->redirect('lecturers', 'Lecturer berhasil ditambahkan.');
        }
        $this->render('lecturers/form', [
            'item' => null,
            'departments' => $this->departments->all(),
        ]);
    }

    public function edit(): void
    {
        $id = (int)($_GET['id'] ?? 0);
        $item = $this->model->find($id);
        if (!$item) {
            $this->redirect('lecturers', 'Data tidak ditemukan.');
        }
        if ($this->isPost()) {
            $this->model->update($id, $this->post($this->fields));
            $this->redirect('lecturers', 'Lecturer berhasil diubah.');
        }
        $this->render('lecturers/form', [
            'item' => $item,
            'departments' => $this->departments->all(),
        ]);
    }

    public function delete(): void
    {
        if ($this->isPost()) {
            $this->model->delete((int)($_POST['id'] ?? 0));
            $this->redirect('lecturers', 'Lecturer berhasil dihapus.');
        }
        $this->redirect('lecturers');
    }
}
