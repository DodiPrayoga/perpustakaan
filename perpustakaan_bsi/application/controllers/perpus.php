<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perpus extends CI_Controller {
function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->database();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->model('user_model');
    } 
     public function index(){
        $this->load->view('index');
    } 
     public function login(){
        $this->load->view('login');
    } 
     public function table(){
        $this->load->model('user_model');
        $data['v_userpinjam'] = $this->user_model->list_table()->result();
        $this->load->view('table',$data);
    } 
   
   public function book(){
        $this->load->model('user_model');
        $data['buku'] = $this->user_model->book()->result();
        $this->load->view('buku',$data);
    }

	public function home()
	{
		$this->load->view('home');
	}
    
   function proses(){
         $user_name = $this->input->post('user_name');
         $password = $this->input->post('password');
         
         if ($this->user_model->cek_login($user_name, $password)== TRUE)
         {
             redirect('perpus/home');
         }else{
              redirect('perpus/loginn');
         }}

    function register()
    {           
        $this->form_validation->set_rules('nik', 'Nik', 'required');                   
        $this->form_validation->set_rules('nama', 'Nama', 'required');         
        $this->form_validation->set_rules('no_hp', 'No_hp', 'required');
         $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('alamat', 'alamat', 'required');
        $this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
 
        if ($this->form_validation->run() == FALSE) 
        {
            $this->load->view('register');
        }
        else
        {
 
            $form_data = array(
                            'nik' => set_value('nik'),
                            'nama' => set_value('nama'),
                            'no_hp' => set_value('no_hp'),
                            'email' => set_value('email'),
                            'alamat' => set_value('alamat')
                        );
 
            if ($this->user_model->SaveForm($form_data) == TRUE) 
            {
                redirect('perpus');
            }
            else
            {
            redirect('perpus/register');
            }
        }
       } 

 		 public function anggota(){
        $this->load->model('user_model');
        $data['anggota'] = $this->user_model->list_anggota()->result();
        $this->load->view('anggota',$data);
    } 
     public function member(){
        $this->load->model('user_model');
        $data['member'] = $this->user_model->list_member()->result();
        $this->load->view('member',$data);
    } 

 }

	