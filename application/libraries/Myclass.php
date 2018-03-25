<?php
// filename: libraries/Myclass.php

class Myclass{
	protected $CI="";
	public function __construct()
	{
		$this->CI =& get_instance();
		//pre($this->CI);
	}
	public function select($field,$table,$condition)
    {
		$sql = "select $field from $table where $condition";
		//echo $sql;
		$ans = $this->CI->db->query($sql);
		//pre($ans);
		if($ans->num_rows==0)
		{
			return "no";
		}
		else
		{
			$fans = $ans->result();
			//pre($fans);
			return $fans;
		}
    }
	public function chk_session()
	{
		$session_id= $this->CI->session->userdata('staff_name');
		if(empty($session_id))
		{
			return 0;
		}
		else
		{
			return 1;
		}
	}
	
	public function get_session_record($type)	
	{		
		switch($type)		
		{			
			case 1:			
			$record = "staff_name";			
			break;			
			case 2:			
			$record = "staff_loginid";			
			break;			
			case 3:			
			$record = "staff_type";	
			break;			
			case 4:			
			$record = "staff_status";	
			break;	
			case 5:	
			$record="view_patientid";
			case 6:	
			$record="staff_clinic_id";
			default:			
			$record = "staff_id";		
		}
		return $this->CI->session->userdata($record);
	}
	public function dropdown($field1,$field2,$table,$condition,$name,$class)
	{
		$str = "<select name='$name' id='$name' class='$class'>";
		
		$str.="<option value=''>Please Select</option>";
		
		$ans = $this->select("$field1,$field2",$table,$condition);
		
		//pre($ans);
		
		if($ans == "no")
		{
			$str.="<option value=''>No Records</option>";
		}
		else
		{
			//pre($ans);
			foreach($ans as $val)
			{
				$data1 = $val->$field2;
				$data2 = $val->$field1;
				$str.="<option value='$data2'>$data1</option>";
			}
		}
		
		$str.="</select>";
		
		echo $str;
	}
	
	
	function cascading_dropdown($field,$table,$condition,$name)
	{
		
			echo"<select name='$name' id='$name'>";
			$ans=$this->select($field,$table,$condition);
			
			if($ans=="no")
			{
				echo"<option>No data</option>";
			}
			else
			{
				echo "<option value=''>Select Region</option>";
				
				foreach($ans as $value)
				{
					
					//echo $value;
					echo "<option value='$value[0]'>$value[1]</option>";
				}
			}
			echo "</select>";
	}
	
	function dropdown_selected($field1,$field2,$table,$condition,$name,$s_field1,$s_field2,$s_table,$s_condition)
	{
			$ans1=$this->select($s_field1,$s_field2,$s_table,$s_condition);
			print_r($ans1[0]);
			//$selected=$ans1[0][0];
			//echo $selected;
			//print_r($ans1);	
			foreach($ans1 as $res)
			{
			$selected=$res->$field1;
			}
			$selected;
			$ans=$this->select($field,$table,$condition);
			//if($selected==$value[0])
				
					//$selected="selected='$selected'";
			echo"<select name='$name'class='styledselect_form_5' id='$name'>";
			
			if($ans=="no")
			{
				echo"<option>No data</option>";
			}
			else
			{	
				foreach($ans as $value)
				{
					if($value[0] == $selected)
					{
						echo "<option value='$value[0]' selected='selected'>$value[1]</option>";
					}
					else
					{
						echo "<option value='$value[0]'>$value[1]</option>";
					}
				}
			}
			echo "</select>";
	}
	
	public function dropdown_selected1($field1,$field2,$table,$condition,$name,$s_field1,$s_field2,$s_table1,$s_table2,$s_condition)
	{
			$ans1=$this->select("$s_field1,$s_field2","$s_table1,$s_table2",$s_condition);
			//print_r($ans1);
			foreach($ans1 as $res)
			{
			$selected=$res->$field1;
			}
			$selected;
			//echo $selected;
			//print_r($ans1);
				//echo $name;
			$ans=$this->select("$field1,$field2",$table,$condition);
			//if($selected==$value[0])
				//print_r($ans);
					//$selected="selected='$selected'";
			echo"<select name='$name'class='buy-search' id='$name'>";
			//print_r($ans);
			if($ans=="no")
			{
				echo"<option>No data</option>";
			}
			else
			{	
				foreach($ans as $value)
				{
					
					$data1=$value->$field1;
					$data2=$value->$field2;
					//print_r($data1);
					
					if($data1 == $selected)
					{
						echo "<option value='$data1' selected='selected'>$data2</option>";
					}
					else
					{
						echo "<option value='$data1'>$data2</option>";
					}
					
				}
			}
			echo "</select>";
	}
	
	
   
			
	}
	
?>