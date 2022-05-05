<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\AlunosModel;

class Alunos extends Controller
{
    public function index()
    {
        $model = new AlunosModel();

        $data = [
            'title' => 'Alunos',
            'alunos' => $model->getAlunos()
        ];

        echo view('templates/header', $data);
        echo view('pages/alunos', $data);
        echo view('templates/footer');
    }

    public function inserir()
    {
        helper('form');

        $data['title'] = 'Cadastrar Aluno';

        echo view('templates/header', $data);
        echo view('pages/alunos_gravar');
        echo view('templates/footer');
    }

    public function gravar()
    {
        helper('form');

        $model = new AlunosModel();

        if ($this->validate([
            'nome' => ['label' => 'Nome', 'rules' => 'required|min_length[3]|max_length[100]'],
            'endereco' => ['label' => 'Endereço', 'rules' => 'required|min_length[3]|max_length[200]'],
            'img' => []
        ])) {
            $id = $this->request->getVar('id');
            $nome = $this->request->getVar('nome');
            $endereco = $this->request->getVar('endereco');
            $img = $this->request->getFile('img');

            if (!$img->isValid()) {
                $model->save([
                    'id' => $id,
                    'nome' => $nome,
                    'endereco' => $endereco
                ]);

                return redirect('alunos');
            } else {
                $validaIMG = $this->validate([
                    'img' => [
                        'uploaded[img]',
                        'mime_in[img,image/jpg,image/jpeg,image/gif,image/png]',
                        'max_size[img, 4096]'
                    ]
                ]);

                if ($validaIMG) {
                    $novoNome = $img->getRandomName();

                    $img->move('img/alunos', $novoNome);

                    $model->save([
                        'id' => $id,
                        'nome' => $nome,
                        'endereco' => $endereco,
                        'img' => $novoNome
                    ]);

                    return redirect('alunos');
                } else {
                    $data['title'] = 'Erro ao gravar o aluno!';

                    echo view('templates/header', $data);
                    echo view('pages/alunos_gravar');
                    echo view('templates/footer');
                }
            }
        } else {
            $data['title'] = 'Erro ao gravar o aluno!';

            echo view('templates/header', $data);
            echo view('pages/alunos_gravar');
            echo view('templates/footer');
        };
    }

    public function item($id = NULL)
    {
        $model = new AlunosModel();

        $data['alunos'] = $model->getAlunos($id);

        if (empty($data['alunos'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Não é possível encontrar o aluno com id: ' . $id);
        }

        $data['title'] = $data['alunos']['nome'];

        echo view('templates/header', $data);
        echo view('pages/aluno', $data);
        echo view('templates/footer');
    }

    public function editar($id = NULL)
    {
        $model = new AlunosModel();

        $data = [
            'title' => 'Editar Aluno',
            'alunos' => $model->getAlunos($id)
        ];

        if (empty($data['alunos'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Não é possível encontrar o aluno com id: ' . $id);
        }

        echo view('templates/header', $data);
        echo view('pages/alunos_gravar', $data);
        echo view('templates/footer');
    }

    public function excluir($id = NULL) 
    {
        $model = new AlunosModel();
        
        $model->delete($id);

        return redirect('alunos');
    }
}