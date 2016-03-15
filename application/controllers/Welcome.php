<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('infografik/homepage');
		//$this->load->view('welcome_message');
	}

	public function makanan()
	{
		$this->load->view('infografik/makanan');
	}
	public function olahraga()
	{
		$this->load->view('infografik/olahraga');
	}

	public function kalkulator()
	{
		$this->load->view('infografik/kalkulator');
	}

	public function tentang()
	{
		$this->load->view('infografik/about');
	}
}
