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
	public function __construct()
    {
        parent::__construct();
        $this->load->model('dummy_m', 'dummy');
    }

    public function index()
    {
        $this->load->helper('url');
        $this->load->view('welcome');
    }

    public function ajax_list()
    {
        //echo "hi";
        $list = $this->dummy->get_datatables();       
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $customers) {
           // print_r($data);die;
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $customers->employee_name;
            $row[] = $customers->employee_salary;
            $row[] = $customers->employee_age;

            $data[] = $row;

           //$_POST['draw']='';
        }

        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->dummy->count_all(),
                        "recordsFiltered" => $this->dummy->count_filtered(),
                        "data" => $data,
                );
        //output to json format
       echo json_encode($output);
    }


}
