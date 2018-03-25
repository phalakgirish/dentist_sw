<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventory extends CI_Controller {

	public function index()
	{
		$this->load->view('inwords_form');
	}
	public function item_register()
	{
		$data=$this->input->post();	
		$this->form_validation->set_rules('invt_product','Item Name','trim|required|xss_clean');
		$this->form_validation->set_rules('invt_podate','Purchase Date','trim|required|xss_clean');
		$this->form_validation->set_rules('invt_unit','No of unit','trim|required|xss_clean');
		$this->form_validation->set_rules('invt_qty','No of Quantity','trim|required|xss_clean');
		$this->form_validation->set_rules('invt_rate','Purchase Rate','trim|required|xss_clean');
		$this->form_validation->set_rules('invt_amt','Total Amount','trim|required|xss_clean');
		
		if($this->form_validation->run()==FALSE)
		{
			echo validation_errors();
		}
		else
		{
			$podate=date('Y-m-d',strtotime($data['invt_podate']));
			unset($data['invt_podate']);
			$data['invt_podate']=$podate;
			
			$this->user_model->do_register("bs_inventory",$data); 
			echo '1';
		}
	}
	public function inwards_list()
	{	
		
		$result=$this->welcome_model->get_inward_list();
		$final_record['listofinwards']= $result;
		$this->load->view('inward_list',$final_record);
	}
	public function edit_inwards($inwardsid)
	{
		# inwards edit
		$result=$this->welcome_model->get_single_inwards($inwardsid);
		$final_data['data'] = $result;
		$this->load->view('edit_inwards',$final_data);
	}
	public function edit_inwards_action()
	{
		# code...
		$data=$this->input->post();	
		
		$this->form_validation->set_rules('invt_product','Item Name','trim|required|xss_clean');
		$this->form_validation->set_rules('invt_podate','Purchase Date','trim|required|xss_clean');
		$this->form_validation->set_rules('invt_unit','No of unit','trim|required|xss_clean');
		$this->form_validation->set_rules('invt_qty','No of Quantity','trim|required|xss_clean');
		$this->form_validation->set_rules('invt_rate','Purchase Rate','trim|required|xss_clean');
		$this->form_validation->set_rules('invt_amt','Total Amount','trim|required|xss_clean');
		
		
		if($this->form_validation->run()==FALSE)
		{
			echo validation_errors();
		}
		else
		{

			$podate=date('Y-m-d',strtotime($data['invt_podate']));
			unset($data['invt_podate']);
			$data['invt_podate']=$podate;
			$id=$data['invt_id'];

			$this->welcome_model->update_record($id,"bs_inventory",$data,"invt_id");
			//print_r($data);
			//$user_data=$data['log_username']
			echo '1';
		}
	}

	public function delete_inwards()
	{
		$user_id=$_POST['userID'];

		//delete_record($delete_id,$field,$table)
		$this->welcome_model->delete_record($user_id,"invt_id","bs_inventory");
	}

	public function outwards()
	{
		$this->load->view('outwards_form');
	}
	public function outwards_register()
	{
		$data=$this->input->post();	
		$this->form_validation->set_rules('out_product','Item Name','trim|required|xss_clean');
		$this->form_validation->set_rules('out_totqty','Avaliable Quantity','trim|required|xss_clean');
		$this->form_validation->set_rules('out_qty','Outwards Quantity','trim|required|xss_clean');
		$this->form_validation->set_rules('out_balqty','Balance Quantity','trim|required|xss_clean');
		
		if($this->form_validation->run()==FALSE)
		{
			echo validation_errors();
		}
		else
		{
			$staff_id = $this->myclass->get_session_record(0);
			$outdate=date('Y-m-d');
			$data['out_date']=$outdate;
			$data['out_userid']=$staff_id;
			$this->user_model->do_register("bs_outwards",$data); 
			echo '1';
		}
	}
	//Check product qty
	public function check_qty()
	{
		# code...
		$producId=$this->input->post('productid');
		$ans=$this->myclass->select("sum(invt_qty) as totqty","bs_inventory","invt_product='$producId'");
		$outward=$this->myclass->select("sum(out_qty) as outqty","bs_outwards","out_product='$producId'");
		$avaliable=($ans[0]->totqty)-($outward[0]->outqty);
		print_r($avaliable);
	}
	public function outwards_list()
	{	
		
		//$result=$this->welcome_model->get_outward_list();
		 $result=$this->myclass->select("invt_id,sum(invt_qty) as inqty,invt_unit,drags_name,invt_product","bs_inventory,bs_drags","invt_product=drags_id GROUP BY invt_product");

		  //$result1=$this->myclass->select("sum(out_qty) as outqty","bs_outwards","1");
		
		$final_record['listofinwards']= $result;
		$this->load->view('outward_list',$final_record);
	}
	public function edit_outwards($inwardsid)
	{
		# inwards edit
		$result=$this->welcome_model->get_single_inwards($inwardsid);
		$final_data['data'] = $result;
		$this->load->view('edit_outwards',$final_data);
	}
	public function edit_outwards_action()
	{
		# code...
		$data=$this->input->post();	
		
		$this->form_validation->set_rules('invt_product','Item Name','trim|required|xss_clean');
		$this->form_validation->set_rules('invt_podate','Purchase Date','trim|required|xss_clean');
		$this->form_validation->set_rules('invt_unit','No of unit','trim|required|xss_clean');
		$this->form_validation->set_rules('invt_qty','No of Quantity','trim|required|xss_clean');
		$this->form_validation->set_rules('invt_rate','Purchase Rate','trim|required|xss_clean');
		$this->form_validation->set_rules('invt_amt','Total Amount','trim|required|xss_clean');
		
		
		if($this->form_validation->run()==FALSE)
		{
			echo validation_errors();
		}
		else
		{

			$podate=date('Y-m-d',strtotime($data['invt_podate']));
			unset($data['invt_podate']);
			$data['invt_podate']=$podate;
			$id=$data['invt_id'];

			$this->welcome_model->update_record($id,"bs_inventory",$data,"invt_id");
			//print_r($data);
			//$user_data=$data['log_username']
			echo '1';
		}
	}
}

/* End of file inventory.php */
/* Location: ./application/controllers/inventory.php */