<?php
require_once __DIR__ . '/BaseController.php';
require_once __DIR__ . '/../models/Department.php';

class DepartmentController extends BaseController
{
    private Department $model;
    private array $fields = ['name', 'faculty'];

    public function __construct()
    {
        $this->model = new Department();
    }

    public function index(): void
    {
        $this->render('departments/index', ['departments' => $this->model->all()]);
    }

    public function create(): void
    {
        if ($this->isPost()) {
            $this->model->create($this->post($this->fields));
            $this->redirect('departments', 'Department berhasil ditambahkan.');
        }
        $this->render('departments/form', ['item' => null]);
    }

    public function edit(): void
    {
        $id = (int)($_GET['id'] ?? 0);
        $item = $this->model->find($id);
        if (!$item) {
            $this->redirect('departments', 'Data tidak ditemukan.');
        }
        if ($this->isPost()) {
            $this->model->update($id, $this->post($this->fields));
            $this->redirect('departments', 'Department berhasil diubah.');
        }
        $this->render('departments/form', ['item' => $item]);
    }

    public function delete(): void
    {
        if ($this->isPost()) {
            $this->model->delete((int)($_POST['id'] ?? 0));
            $this->redirect('departments', 'Department berhasil dihapus.');
        }
        $this->redirect('departments');
    }
}
