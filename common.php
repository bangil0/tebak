<?php
class common {
	function DateToIndo($date) { // echo DateToIndo("2011-08-05"); return 5 Agustus 2011
		$BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
		$tahun = substr($date, 0, 4);
		$bulan = substr($date, 5, 2);
		$tgl   = substr($date, 8, 2);
		$result = (int)$tgl . " " . $BulanIndo[(int)$bulan-1] . " ". $tahun;
		return $result;
	}
	function hide_username($str){
		if(strlen($str) < 7){
			return substr($str, 0, 3).'***';
		}
		else if(strlen($str) < 10){
			return substr($str, 0, 3).'****';
		}
		else if(strlen($str) < 13){
			return substr($str, 0, 4).'****';
		}
		else {
			return substr($str, 0, 5).'****';
		}
	}
	function pagination($row_per_page, $current_page, $total_rows, $func){
		$total_pages = ceil($total_rows/$row_per_page);
		$pagination = '';
		if($total_pages > 1 && $current_page <= $total_pages){
			$pagination .= '<ul class="pagination">';
			
			$right_links    = $current_page + 3; 
			$next           = $current_page + 1; //next link
			$first_link     = true; //boolean var to decide our first link
			
			if($current_page > 1){
				$pagination .= '<li class="first"><a onclick="'.$func.'(1)" title="First">&laquo;</a></li>'; //first link
				for($i = ($current_page-2); $i < $current_page; $i++){ //Create left-hand side links
					if($i > 0){
						$pagination .= '<li><a onclick="'.$func.'('.$i.')" title="Page'.$i.'">'.$i.'</a></li>';
					}
				}
				$first_link = false; //set first link to false
			}
			
			if($first_link){ //if current active page is first link
				$pagination .= '<li class="first active">'.$current_page.'</li>';
			}elseif($current_page == $total_pages){ //if it's the last active link
				$pagination .= '<li class="last active">'.$current_page.'</li>';
			}else{ //regular current link
				$pagination .= '<li class="active">'.$current_page.'</li>';
			}
					
			for($i = $current_page+1; $i < $right_links ; $i++){ //create right-hand side links
				if($i<=$total_pages){
					$pagination .= '<li><a onclick="'.$func.'('.$i.')" title="Page '.$i.'">'.$i.'</a></li>';
				}
			}
			if($current_page < $total_pages){ 
					$pagination .= '<li class="last"><a onclick="'.$func.'('.$total_pages.')" title="Last">&raquo;</a></li>'; //last link
			}
			
			$pagination .= '</ul>'; 
		}
		if(isset($_POST['ajax'])){
			echo $pagination;
		}
		else{
			return $pagination;
		}
	}
	function upload($upload_name, $upload_dir, $extension=array(), $max_size=2097152){
		$file_name = $_FILES[$upload_name]['name'];
		$file_size = $_FILES[$upload_name]['size'];
		$file_tmp = $_FILES[$upload_name]['tmp_name'];
		$file_type = $_FILES[$upload_name]['type'];
		if (!file_exists($upload_dir)) {
			mkdir($upload_dir, 0777, true);
		}
		if($file_size > $max_size){
			return "ukuran file tidak boleh lebih dari 2 MB";
		}
		$file_extension = pathinfo($upload_dir.$file_name, PATHINFO_EXTENSION);
		if(!empty($extension)){
			if(in_array($file_extension, $extension) === false){
				return "File extension hanya boleh ".implode(", ",$extension).".";
			}
		}
		if(move_uploaded_file($file_tmp, $upload_dir.$file_name)){
			return "uploaded";
		}
		else{
			return "failed";
		}
	}
	function generate_random_string(){
		$string1 = "abcdefghijklmnopqrstuvwxyz";
		$string2 = "1234567890";
		$string = $string1.$string2;
		$string= str_shuffle($string);
		$random_string = substr($string,0,8);
		return $random_string;
	}
}
$common = new common();
switch($_POST['page']){
	case pagination:
		$common->pagination($_POST['row_per_page'], $_POST['current_page'], $_POST['total_rows'], $_POST['func']);
		break;
}
?>