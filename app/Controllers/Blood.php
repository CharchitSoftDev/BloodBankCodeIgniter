<?php namespace App\Controllers;

use App\Models\BloodBank;
use App\Models\UserModel;
use App\Models\Requests;

class Blood extends BaseController
{
    public function index()
    {
        $this->menu();
    }

    public function view($page = 'home', $data = ['Home'])
    {
        if (!is_file(APPPATH . '/Views/pages/' . $page . '.php')) {
            // Whoops, we don't have a page for that!
            throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
        }
        $data["title"] = ucfirst($page);
        echo view('templates/header', $data);
        echo view('pages/' . $page, $data);
        echo view('templates/footer', $data);
    }
    public function save()
    {
        $model = new UserModel();
        if ($this->request->getMethod() == 'post') {
            $rules = [
                'username' => ['label' => 'username', 'rules' => 'required', 'errors' => ['required' => 'Username is required']],
                'email' => ['label' => 'email', 'rules' => 'required|valid_email', 'errors' => ['required' => 'Email is required']],
                'password' => ['label' => 'password', 'rules' => 'required|min_length[8]', 'errors' => ['min_length' => 'Your password is too short']],
            ];

            if (!$this->validate($rules)) {
                $data['validation'] = $this->validator;
                $this->view('register', $data);
            } else {
                $data = array(
                    "firstname" => $this->request->getPost('username'),
                    "email" => $this->request->getPost('email'),
                    "password" => $this->request->getPost('password'),
                    "blood_type" => $this->request->getPost('blood-type'),
                    "hospital_name" => $this->request->getPost('restaurant-name'),
                    "account_type" => $this->request->getGet('form'),
                );
                $model->saveUser($data);
                return redirect()->to('/blood/view');
            }
        }
    }
    public function getBloodInfo()
    {
        $model = new BloodBank();
        $data['food'] = $model->getFoodItem(session()->get('hospital_name'));
        $this->view('hospital_dashboard',$data);
    }
    public function menu()
    {
        $model = new BloodBank();
        $data['title'] = ucfirst("menu");
        $data['food'] = $model->getItems();
        $this->view('menu',$data);
    }
    public function saveBlood()
    {
        $model = new BloodBank();
        $rest_name = $model->getRestaurant(session()->get('email'));
        $data = array(
            "hospital_name" => session()->get('hospital_name'),
            "blood_type" => $this->request->getPost('blood-type'),
            "status" => $this->request->getPost('food-status'),
        );
        $model->saveUser($data);
        return redirect()->to('/blood/view');
    }
    public function login()
    {
        $model = new UserModel();
        $user = $model->where('email', $this->request->getVar('email'))
            ->where('password', $this->request->getPost('password'))
            ->first();
        $data = [];

        if ($this->request->getMethod() == 'post') {

            $rules = [
                'email' => ['label' => 'email', 'rules' => 'required|valid_email', 'errors' => ['required' => 'Email is required']],
                'password' => ['label' => 'password', 'rules' => 'required|min_length[8]', 'errors' => ['min_length' => 'Your password is too short']],
            ];
            if (!$this->validate($rules)) {
                $data['validation'] = $this->validator;
                $this->view('home', $data);
            } elseif (!$user) {
                $data["user"] = "Email or password don\'t found";
                $this->view('home', $data);
            } else {
                $this->setUserSession($user);
                if (session()->get('account_type') == "restaurant") {
                    return redirect()->to('/blood/getBloodInfo');
                }
                return redirect()->to('/blood/menu');
            }
        }
    }
    public function order(){
        $data['user'] = session()->get('firstname');
        $model = new Requests();
        $requestData = array(
            "email" => session()->get('email'),
            "hospital_name" => $this->request->getPost('hospital_name'),
            "blood_type" => $this->request->getPost('type'),            
        );
        $model->saveRequests($requestData);
        $this->view('order', $data);
    }

    public function requests(){
        $model = new Requests(); 
        $data['requests'] = $model->getRequests(session()->get('hospital_name'));
        $this->view('view_requests', $data);
    }

    private function setUserSession($user)
    {
        $data = [
            'id' => $user['u_id'],
            'firstname' => $user['firstname'],
            'email' => $user['email'],
            'is_veg' => $user['blood_type'],
            'hospital_name' => $user['hospital_name'],
            'account_type' => $user['account_type'],
            'success' => true,
        ];

        session()->set($data);
        return true;
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/blood/view/');
    }
}
