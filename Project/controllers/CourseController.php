<?php
require_once __DIR__ . '/BaseController.php';
require_once __DIR__ . '/../models/Course.php';
require_once __DIR__ . '/../models/Lecturer.php';

class CourseController extends BaseController
{
    private Course $model;
    private Lecturer $lecturers;
    private array $fields = ['code', 'name', 'credits', 'lecturer_id'];

    public function __construct()
    {
        $this->model = new Course();
        $this->lecturers = new Lecturer();
    }

    public function index(): void
    {
        $this->render('courses/index', ['courses' => $this->model->all()]);
    }

    public function create(): void
    {
        if ($this->isPost()) {
            $this->model->create($this->post($this->fields));
            $this->redirect('courses', 'Course berhasil ditambahkan.');
        }
        $this->render('courses/form', ['item' => null, 'lecturers' => $this->lecturers->all()]);
    }

    public function edit(): void
    {
        $id = (int)($_GET['id'] ?? 0);
        $item = $this->model->find($id);
        if (!$item) {
            $this->redirect('courses', 'Data tidak ditemukan.');
        }
        if ($this->isPost()) {
            $this->model->update($id, $this->post($this->fields));
            $this->redirect('courses', 'Course berhasil diubah.');
        }
        $this->render('courses/form', ['item' => $item, 'lecturers' => $this->lecturers->all()]);
    }

    public function delete(): void
    {
        if ($this->isPost()) {
            $this->model->delete((int)($_POST['id'] ?? 0));
            $this->redirect('courses', 'Course berhasil dihapus.');
        }
        $this->redirect('courses');
    }
}
