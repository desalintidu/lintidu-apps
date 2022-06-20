<?php 

	/*
		*****************************************************************
		* 	Framework    : iobject.form
		*   Deskrispi    : PHP programing framework 		
		*	Author   	 : iad ifriandi (iadifriandi@yahoo.co.id)		
		*	Build date   : 03/04/2013						
		*****************************************************************
	*/
	
	class iform{		
		//fungsi input type = text, hidden, file, submit, radio (tipe input, nama, id, class, lebar, nilai, option)
		function input($type, $name, $id, $class, $width, $value=null,$opt=null){
			if(($type=="text")||($type=="file") ||($type=="hidden") || ($type=="password")){
			echo "<input type='".strtolower($type)."' name='".strtolower($name)."' id='".strtolower($id)."' size='".$width."' class='".strtolower($class)."' value='$value' $opt />";
			}else if(($type =="submit") || ($type =="button") || ($type =="reset")){
				echo "<input type='".strtolower($type)."' name='".strtolower($name)."' id='".strtolower($id)."' class='".strtolower($class)."' value='".$value."' $opt/>";
			}else if(($type =="radio") || ($type =="checkbox")){
				echo "<input type='".strtolower($type)."' name='".strtolower($name)."' id='".strtolower($id)."' class='".strtolower($class)."' value='".$value."' $opt/>";		
			}
		}
		
		//fungsi select (nama object, id, value, option)
		function select($id, $optionvalue, $class, $opt=null){
			echo "<select name='".strtolower($nama)."' id='".strtolower($id)."' class='".$class."'  $opt/> ".$optionvalue."</select>";
		}
		 
		//fungsi textarea (nama objek, id, jumlah kolom, jumlah baris, data) 
		function textarea($nama, $id, $cols, $rows, $class, $value=null){
			echo "<textarea name='".strtolower($nama)."' id='".strtolower($id)."' class='".$class."' cols='".$cols."' rows='".$rows."' />".$value."</textarea>";
		}
	}
	
?>