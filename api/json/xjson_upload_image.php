<?php

    // Get image string posted from Android App

    //$ids = $_POST['IDS'];
    $base=$_POST['ENC']; 
    $filename = $_POST['PIC'];
    $response = array();

    if(isset($base)){
		// Decode Image
	    $binary=base64_decode($base);
	    header('Content-Type: bitmap; charset=utf-8');
	    $file = fopen('../img/tmp/'.$filename, 'wb');
	    
		// Create File
	   	fwrite($file, $binary);
	    fclose($file);
	   
		/*$img  = $filename;
		$file = substr($img,strlen($img) - 4,strlen($img));
		$x 	= substr($file,0,strlen($file) - 3);
		
		if($x == "."){
			$tipe = $file;
		}else{
			$tipe = ".".$file;
		}
		
		$newname = $ids."_".date(his)."".$tipe;
		$ren = rename("../img/tmp/".$filename,"../img/tmp/".$newname);
		
		if($ren){

			//resize
			$img_view = new my_image("../img/tmp/".$newname);
			$w_view = 400; $h_view = 600;
			$new_view = "../img/preview/view_".$newname;
			$img_view->resize($w_view, $h_view, $new_view);

			$img = new my_image("../img/tmp/".$newname);
            $w_crop = 100; $h_crop = 120;
            $new_crop = "../img/croping/crop_".$newname;
            $img->resize($w_crop, $h_crop, $new_crop);

            //get pic before
			/*$get = $op->select("tb_user","foto_user"," WHERE nip='".$ids."'");
			$set = mysqli_fetch_array($get);
			$namalama = $set['foto_user'];

			$upd = $op->cs_query("UPDATE tb_user SET foto_user='".$newname."' WHERE nip='".$nip."'");
			if($upd){
				unlink("../images/img/croping/crop_".$namalama);
				unlink("../images/img/preview/view_".$namalama);
            	unlink("../images/img/tmp/".$newname);

            	$response["success"] = 1;
			}else{
				$response["success"] = 0;
			}
			$response["success"] = "1";
		}else{
			$response["success"] = "0";
		}*/

		$response["success"] = "1";
		print(json_encode($response));
	}

	/*class my_image {
			protected $image;
			
			public function __construct($image) {
				if(!is_file($image)): trigger_error('Image file does not exists', E_USER_ERROR); 
				else: $this->image = $image; endif; clearstatcache();
			}
			
			public function resize($new_width=0, $new_height=0, $new_name='') {
				if(empty($new_width) && empty($new_height)) { return false; }
				
				list($iwidth, $iheight, $type) = getimagesize($this->image);
				$rext = image_type_to_extension($type, false);
				
				if($type !== 2 && $type !== 3) { return false; }
				
				if(!empty($new_width) && empty($new_height)) {
					$mwidth = $new_width / $iwidth;
					$new_height = round($iheight * $mwidth);
				}
				
				if(empty($new_width) && !empty($new_height)) {
				$mheight = $new_height / $iheight;
				$new_width = round($iwidth * $mheight);
			}
			
			$image_p = imagecreatetruecolor($new_width, $new_height);
			$image = ($rext == 'png' ? imagecreatefrompng($this->image) : imagecreatefromjpeg($this->image));
			
			if(isset($image)) {
				imagecopyresampled($image_p, $image, 0, 0, 0, 0, $new_width, $new_height, $iwidth, $iheight);
			}
			
			if(!empty($new_name)) {
				$next = strtolower(end(explode('.', $new_name)));
				switch($next) {
					case 'jpg':
						if($rext == 'jpg'): $new_name .= '.'.$rext; endif; break;
					case 'png':
						if($rext == 'png'): $new_name .= '.'.$rext; endif; break;
					default:
						$new_name .= '.'.$rext;
				}
			} else { $new_name = $this->image; }
			
			if($rext === 'png') {
				imagepng($image_p, $new_name, 0);
			} else {
				imagejpeg($image_p, $new_name, 95);
			}
		}
	}*/
