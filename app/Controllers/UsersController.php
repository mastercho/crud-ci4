<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class UsersController extends Controller {

    public function index() {
        $model = new UserModel();
        $data['users'] = $model->findAll();
        echo view('users/index', $data);
    }

    public function get() {
        $model = new UserModel();
        $users = $model->findAll();

        $data = array();
        foreach ($users as $user) {
            $row = array(
                "id" => $user['id'],
                "firstname" => $user['firstname'],
                "lastname" => $user['lastname'],
                "email" => $user['email'],
                "mobile" => $user['mobile'],
                "username" => $user['username']
            );
            $data[] = $row;
        }

        $output = array(
            "data" => $data
        );

        echo json_encode($output);
    }

    public function create() {
        echo view('users/create');
    }

    public function store() {
        $model = new UserModel();
        $validationRules = [
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|valid_email|is_unique[users.email]',
            'mobile' => 'required',
            'username' => 'required|is_unique[users.username]',
            'password' => 'required',
        ];
        $validationMessages = [
            'email.is_unique' => 'That email address is already in use.',
            'username.is_unique' => 'That username is already taken.',
        ];
        $isValid = $this->validate($validationRules, $validationMessages);
        if (!$isValid) {
            $data['validation'] = $this->validator;
            echo view('users/create', $data);
        } else {
            $db = db_connect();
            try {
                $db->transStart();

                $data = [
                    'firstname' => $this->request->getPost('firstname'),
                    'lastname' => $this->request->getPost('lastname'),
                    'email' => $this->request->getPost('email'),
                    'mobile' => $this->request->getPost('mobile'),
                    'username' => $this->request->getPost('username'),
                    'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
                    'created_at' => date('Y-m-d H:i:s'),
                ];
                $model->insert($data);

                $db->transComplete();
                return redirect()->to('/users');
            } catch (\Exception $e) {
                $db->transRollback();
                log_message('error', 'Error creating user: ' . $e->getMessage());
                return redirect()->back()->with('error', 'Error creating user. Please try again.');
            }
        }
    }

    public function update($id) {
        $model = new UserModel();
        $user = $model->find($id);
        $validationRules = [
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|valid_email|is_unique[users.email,id,' . $id . ']',
            'mobile' => 'required',
            'username' => 'required|is_unique[users.username,id,' . $id . ']',
        ];
        $validationMessages = [
            'email.is_unique' => 'That email address is already in use.',
            'username.is_unique' => 'That username is already taken.',
        ];
        if (!empty($this->request->getPost('password'))) {
            $validationRules['password'] = 'required';
        }
        $isValid = $this->validate($validationRules, $validationMessages);
        if (!$isValid) {
            $data['validation'] = $this->validator;
            $data['user'] = $user;
            echo view('users/edit', $data);
        } else {
            $db = db_connect();
            try {
                $db->transStart();

                $data = [
                    'firstname' => $this->request->getPost('firstname'),
                    'lastname' => $this->request->getPost('lastname'),
                    'email' => $this->request->getPost('email'),
                    'mobile' => $this->request->getPost('mobile'),
                    'username' => $this->request->getPost('username'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ];
                if (!empty($this->request->getPost('password'))) {
                    $data['password'] = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
                }
                $model->update($id, $data);

                $db->transComplete();
                return redirect()->to('/users');
            } catch (\Exception $e) {
                $db->transRollback();
                log_message('error', 'Error updating user: ' . $e->getMessage());
                return redirect()->back()->with('error', 'Error updating user. Please try again.');
            }
        }
    }

    public function delete($id) {
        $model = new UserModel();
        $user = $model->find($id);
        $model->delete($id);
        return redirect()->to('/users')->with('success', 'The user ' . $user['username'] . ' has been deleted.');
    }

}
