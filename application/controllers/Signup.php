<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signup extends CI_Controller {

	public function index()
	{
		if($this->session->userdata('role')){

			if($this->session->userdata('role')=="etudiant" || $this->session->userdata('role')=="ecole"){
			 redirect('Accueil');
			}

		}else{

			$this->load->helper('form');
			$this->load->view('Signup');

		}
	}

  public function register(){
    $this->load->model('Register_model');
    $query = $this->Register_model->addUser();

		if($query){
			$userData = $this->Register_model->getUser($this->input->post('username'), $this->input->post('password'));
			$this->session->set_userdata($userData[0]);
			redirect('/Accueil');
		}else{

		}

  }
}
