<?php
if(!function_exists('my_file'))
{
	function my_file($filename,$type)
	{
		$path=base_url()."public/";		
		if($type==1)
		{
			$str= "<link href='".$path."css/$filename.css' rel='stylesheet'/>";
		}
		if($type==2)
		{
			$str="<script src='".$path."js/$filename.js' ></script>";
		}
		if($type==3)
		{
		   $str="<script src='".$path."ckeditor/$filename.js' ></script>";	
		}
		
		return $str;
	}
}
/////////////////////////////////////


if(!function_exists('pre'))
{
	function pre($data)
	{
		echo "<pre>";
		print_r($data);
		echo "</pre>";
	}
}
////////////////////////////

?>