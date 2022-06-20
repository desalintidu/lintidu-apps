
<?php 

	/*
		*****************************************************************
		* 	Framework    : iobject.grid
		*   Deskrispi    : PHP programing framework 		
		*	Author   	 : iad ifriandi (iadifriandi@yahoo.co.id)		
		*	Build date   : 03/04/2013						
		*****************************************************************
	*/
	class igrid{				
		function headtb($head){
			$pecah=explode(",",$head);
			echo"<tr class='tb_head'>";
				for($i=0; $i < count($pecah); $i++){
					echo"<th height='26'>$pecah[$i]</th>";
				}
			echo"</tr>";
		}
		
		function bodytb($tbl,$field,$filter,$id,$index_tampil,$type){
			
			$op=new q_sql();
			$cnfg=new q_tools();
			
			$path=$cnfg->linkPage($_SERVER['REQUEST_URI'],15);
			
			$tipe=strtolower($type);
			$view=$op->cs_query("SELECT ".$field." FROM ".$tbl." ".$filter);
			$jum_field=mysqli_num_fields($view);
			$i=1;
			while($dt=mysqli_fetch_array($view)){
			if($i % 2){
				$bg="#FFFFFF";
			}else{
				$bg="#DFDFDF";
			}	
				echo"<tr bgcolor='$bg' class='cursor_move'>";
				echo"<td align='center'>$i</td>";
				for($x=$index_tampil; $x < $jum_field; $x++){
					echo"<td style='padding:3px 3px 3px 3px; color:#333333'>$dt[$x]</td>";
				}
				if($tipe=='hapus'){
					echo"<td align='center'>";
					?><a href="index.php?action=del&&id=<?php echo base64_encode($dt[$id]);?>&&tb=<?php echo  base64_encode($tbl);?>&&fld=<?php echo base64_encode($id);?>&&path=<?php echo base64_encode($path);?>" onClick="if(confirm('Yakin Data Akan Dihapus..?')){ return true; }else{ return false;}"><img src="plugin/qFrame/style/img/trash.png" border="0" align="absmiddle" title="Hapus"></a><?php
					echo"</td>";
				}else if($tipe=='hapus/edit'){
					echo"<td align='center'>&nbsp;hapus/edit</td>";
				}else if($tipe=='hapus/cetak'){
					echo"<td align='center'>";
					?>
					<a href="../index.php?action=del&&id=<?php echo base64_encode($dt[$id]);?>&&tb=<?php echo base64_encode($tbl);?>&&fld=<?php echo base64_encode($id);?>&&path=<?php echo base64_encode($path);?>" onClick="if(confirm('Yakin Data Akan Dihapus..?')){ return true; }else{ return false;}"><img src="../plugin/qFrame/style/img/trash.png" border="0" align="absmiddle" title="Hapus" width="18" height="19"></a> <a href="preview.php?id=<?php echo $dt[$id];?>"><img src="../plugin/qFrame/style/img/ic_print.png" border="0" align="absmiddle" /></a>
					<?php
					echo"</td>";
				} 
				echo"</tr>";
				$i++;
			}
		}
	}
?>