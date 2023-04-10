<?php namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class Users extends Controller
{
    public function index()
    {
        $model = new UserModel();
        $data['users'] = $model->findAll();

        return view('users/index', $data);
    }

    public function create()
    {
        $model = new UserModel();

        if ($this->request->getMethod() === 'post' && $this->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|valid_email',
			'mobile' => 'required',
			'username' => 'required',
			'password' => 'required',
		])) {
			$model->save([
			'firstname' => $this->request->getPost('firstname'),
			'lastname' => $this->request->getPost('lastname'),
			'email' => $this->request->getPost('email'),
			'mobile' => $this->request->getPost('mobile'),
			'username' => $this->request->getPost('username'),
			'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
			]);



        return redirect()->to('/users')->with('success', 'User created successfully!');
    }

    return view('users/create');
}

public function edit($id = null)
{
    $model = new UserModel();
    $data['user'] = $model->find($id);

    if ($this->request->getMethod() === 'post' && $this->validate([
        'firstname' => 'required',
        'lastname' => 'required',
        'email' => 'required|valid_email',
        'mobile' => 'required',
        'username' => 'required',
    ])) {
        $model->update($id, [
            'firstname' => $this->request->getPost('firstname'),
            'lastname' => $this->request->getPost('lastname'),
            'email' => $this->request->getPost('email'),
            'mobile' => $this->request->getPost('mobile'),
            'username' => $this->request->getPost('username'),
        ]);

        return redirect()->to('/users')->with('success', 'User updated successfully!');
    }

    return view('users/edit', $data);
}

public function delete($id = null)
{
    $model = new UserModel();
    $model->delete($id);

    return redirect()->to('/users')->with('success', 'User deleted successfully!');
}
}