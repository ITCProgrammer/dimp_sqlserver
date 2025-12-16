<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('captcha', 'string');
    }

    public function index()
    {
        redirect('login');
    }

    public function login()
    {
		$ts = time();
        if (isset($_POST['submit'])) {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $login    = $this->db->get_where('app_users', ['username' => $username, 'password' => md5($password)]);

            if ($login->num_rows() > 0) {
                $r    = $login->row_array();
                $data = ['id_users' => $r['id_users'],
                    'device_code_session'    => 'emptyy',
                    'level'                  => $r['level'],
                    'dept_code'              => $r['dept_code'],
                    'sess_login_absen'       => substr(time(), 0, 10),
                    'nama'                   => $r['nama'],
                    'username'               => $username];
                $this->session->set_userdata($data);
                // $this->db->update('app_users', ['last_login' => time()], 'username', $username);
				$this->db->set('last_login', "DATEADD(SECOND, $ts, '1970-01-01')", false);
				$this->db->where('username', $username);
				$this->db->update('app_users');
                                       //redirect('mahasiswa');
                redirect('dashboard'); //('obat');
            } else {
                redirect('auth/login');
            }
        } else {
            $this->load->view('login');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth/login');
    }

    public function logoutpmb()
    {
        $this->session->sess_destroy();
        redirect('publik/loginpsb');
    }
}
