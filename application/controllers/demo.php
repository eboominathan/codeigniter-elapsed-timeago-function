<?php

class demo extends CI_Controller{
    
    public function index(){
        $data['names']=$this->mtimeago->GetAllInfo();
        $this->load->view('demo_view',$data);
    }
    
    public function add_visitor(){
           if($this->input->post('name')){
             $name=$this->input->post('name');
             $this->mtimeago->SaveForm(array('name'=>$name));
           }


        redirect('demo');
    }
    
    
    
}