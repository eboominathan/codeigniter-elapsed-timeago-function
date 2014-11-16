<?php

class demo extends CI_Controller{
    
    public function index(){
        $data['names']=$this->mtimeago->GetAllInfo();
        $this->load->view('demo_view',$data);
    }
    
    public function add_visitor(){
           if($this->input->post('name')){
             $name=$this->input->post('name');
             $timestamp=date('Y-m-d H:i:s', time());
             $this->mtimeago->SaveForm(array('name'=>$name,'timestamp'=>$timestamp));
           }


        redirect('demo');
    }
    
    
    
}