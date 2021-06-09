<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post extends CI_Controller {

	public function index()
	{
        $data['title'] = 'Home';
        if ($this->session->userdata('email'))
        {

            $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        }
        $this->db->order_by('id', 'DESC');
        $data['posts'] = $this->db->get('posts')->result_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('post/index', $data);
		$this->load->view('templates/footer');

        if ($this->input->post('email-regist'))
        {
            $this->_register();
        } else if ($this->input->post('email-login'))
        {
            $this->_login();
        }
	}

    public function search()
    {
        $keyword = $this->input->get('keyword');
        $data['title'] = 'Search for ' . $keyword;
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $this->db->like('title', $keyword);
        $data['posts'] = $this->db->get('posts')->result_array();

        if (!$keyword)
        {
            redirect('post');
        }

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('post/search', $data);
		$this->load->view('templates/footer');

        if ($this->input->post('email-regist'))
        {
            $this->_register();
        } else if ($this->input->post('email-login'))
        {
            $this->_login();
        }
    }

    private function _register()
    {
        $name = $this->input->post('name-regist');
        $email = $this->input->post('email-regist');
        $password1 = $this->input->post('password1-regist');
        $password2 = $this->input->post('password2-regist');
        $user = $this->db->get_where('users', ['email' => $email])->row_array();

        if ($password1 == $password2)
        {
            if (!$user)
            {
                if (strlen($password1) >= 8)
                {
                    $data = array(
                        'name' => $name,
                        'email' => $email,
                        'password' => password_hash($password1, PASSWORD_DEFAULT),
                        'image' => 'default.jpg',
                        'date_created' => time()
                    );
                    $this->db->insert('users', $data);
                    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Registration success.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>');
                    redirect('post');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                The password should be minimum 8 characters.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>');
                redirect('post');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                That email has been taken.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>');
                redirect('post');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Please match your passwords.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>');
                redirect('post');
        }
    }

    private function _login()
    {
        $email = $this->input->post('email-login');
        $password = $this->input->post('password-login');

        $user = $this->db->get_where('users', ['email' => $email])->row_array();
        if ($user) 
        {
            if (password_verify($password, $user['password']))
            {
                    $data = [
                        'id' => $user['id'],
                        'name' => $user['name'],
                        'email' => $user['email']
                    ];
                    $this->session->set_userdata($data);
                    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Login success.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>');
                redirect('post');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Please enter the correct email or password.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>');
                redirect('post');
                }
            

        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Please enter an existing email.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>');
                redirect('post');
        }
    }

    public function logout()
    {
        if (!$this->session->userdata('email'))
		{
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Please login first.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>');
                    redirect('post');
		}
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('name');

        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Logout success.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>');
                redirect('post');
    }

    public function add()
    {
        if (!$this->session->userdata('email'))
        {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Please login first.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>');
                    redirect('post');
        }
        $data['title'] = 'Add Post';
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('post/add', $data);
		$this->load->view('templates/footer');

        if ($this->input->post('title'))
        {
            $this->_addpost();
        }
    }

    private function _addpost()
    {
        $title = $this->input->post('title');
        $content = $this->input->post('content');

        $filename = $_FILES['image']['name'];
		$filesize = $_FILES['image']['size'];
		$fileerror = $_FILES['image']['error'];
		$filetmp = $_FILES['image']['tmp_name'];
		
		$validfileextensions = ['jpg', 'jpeg', 'png', 'gif'];
		$fileextension = explode('.', $filename);
		$fileextension = strtolower(end($fileextension));
		
		$newfilename = uniqid();
		$newfilename = $newfilename . '.';
		$newfilename = $newfilename . $fileextension;
		
		if (!in_array($fileextension, $validfileextensions))
		{
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Please enter an image with the correct extension.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
            redirect('post/add');
		} else if ($filesize > 5 * 1024 * 1024)
		{
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Please enter an image with a size below 2 mb.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
            redirect('post/add');
		} else {
            move_uploaded_file($filetmp, 'assets/cover/' . $newfilename);
        $data = array(
            'title' => $title,
            'content' => $content,
            'author' => $this->session->userdata('id'),
            'image' => $newfilename,
            'date_created' => time()
        );
        $this->db->insert('post-queue', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Post successfully added to queue. Please wait for approval.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>');
        redirect('post');
    }
    }

    public function admin()
    {
        if (!$this->session->userdata('email') || $this->session->userdata('email') != 'admin@gmail.com')
        {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Please login first.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>');
                    redirect('post');
        }
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['queue'] = $this->db->get('post-queue')->result_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('post/admin', $data);
		$this->load->view('templates/footer');
    }

    public function approve()
    {
        if (!$this->session->userdata('email') || $this->session->userdata('email') != 'admin@gmail.com')
        {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Please login first.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
            redirect('post');
        }
        $id = $this->input->get('id');
        $post = $this->db->get_where('post-queue', ['id' => $id])->row_array();

        if (!$post)
        {
            redirect('post/admin');
        }

        $data = array(
            'title' => $post['title'],
            'content' => $post['content'],
            'image' => $post['image'],
            'author' => $post['author'],
            'date_created' => $post['date_created']
        );

        $this->db->insert('posts', $data);
        $this->db->where('id', $id);
        $this->db->delete('post-queue');
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Post approved.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>');
                redirect('post/admin');
    }

    public function reject()
    {
        $id = $this->input->get('id');
        $post = $this->db->get_where('post-queue', ['id' => $id])->row_array();
        if (!$post)
        {
            redirect('post/admin');
        }

        if (!$this->session->userdata('email') || $this->session->userdata('email') != 'admin@gmail.com')
        {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Please login first.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
            redirect('post');
        }
        $this->db->where('id', $id);
        $this->db->delete('post-queue');
        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Post rejected.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>');
                redirect('post/admin');
    }

    public function details()
    {
        $id = $this->input->get('id');
        $data['post'] = $this->db->get_where('posts', ['id' => $id])->row_array();
        $this->db->order_by('id', 'DESC');
        $data['comments'] = $this->db->get_where('comments', ['post_id' => $id])->result_array();
        $data['comments_num'] = $this->db->get_where('comments', ['post_id' => $id])->num_rows();

        if (!$data['post'])
        {
            redirect('post');
        }

        $data['title'] = $data['post']['title'];
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        
		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('post/details', $data);
		$this->load->view('templates/footer');

        if ($this->input->post('content'))
        {
            if (!$this->session->userdata('email'))
		    {
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Please login first.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>');
                    redirect('post/details?id=' . $id);
            }
            $data = array(
                'content' => $this->input->post('content'),
                'sender' => $this->session->userdata('name'),
                'post_id' => $id,
                'date_created' => time()
            );
    
            $this->db->insert('comments', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Comment successfully added.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>');
                    redirect('post/details?id=' . $id);
        }
    }

    public function error()
    {
        $data['title'] = '404 Error';
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        
		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('post/404', $data);
		$this->load->view('templates/footer');
    }

    public function profile()
    {
        if (!$this->session->userdata('email'))
        {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Please login first.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>');
                    redirect('post');
        }
        $data['title'] = 'Profile';
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['post'] = $this->db->get_where('posts', ['author' => $this->session->userdata('name')])->result_array();
        
		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('post/profile', $data);
		$this->load->view('templates/footer');
    }

    public function delete()
    {
        $id = $this->input->get('id');

        if (!$id)
        {
            redirect('post/profile');
        }
        $this->db->where('id', $id);
        $this->db->delete('posts');
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Post successfully deleted.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>');
                    redirect('post/profile');
    }

}
