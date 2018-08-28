<?php

function show_error_messages($message = "")
{
    if (empty($message)) {
        $CI = &get_instance();
        $message = $CI->session->flashdata("message");
    }

    if (!trim($message) == "") {
        echo '<div class="callout callout-danger">';
        echo $message;
        echo '</div>';
    }
}







function get_dealer_image($image){
	$CI = &get_instance();
	$path = $CI->config->item("dealer_image_path", "application");
	
	if (!empty($image) && file_exists(FCPATH . $path . $image)) {
		return base_url($path .$image);
	}
	
	return false;
}

function get_news_image($image)
{
	$CI = &get_instance();
	$path = $CI->config->item("news_image_path", "application");

	if (!empty($image) && file_exists(FCPATH . $path . $image)) {
		return base_url($path .$image);
	}

	return false;
}

function get_model_image($image)
{
	$CI = &get_instance();
	$path = $CI->config->item("model_image_path", "application");

	if (!empty($image) && file_exists(FCPATH . $path . $image)) {
		return base_url($path .$image);
	}

	return false;
}

function get_service_image($image)
{
	$CI = &get_instance();
	$path = $CI->config->item("service_image_path", "application");

	if (!empty($image) && file_exists(FCPATH . $path . $image)) {
		return base_url($path .$image);
	}

	return false;
}



function convert_to_mysql_date($format,$date){
	$date = DateTime::createFromFormat($format, $date);
	return $date->format('Y-m-d');
}
function convert_to_html_date($date){
    $date = DateTime::createFromFormat('Y-m-d', $date);
    return $date->format('m/d/Y');
}
function convert_mysql_to_calender_date($date){
    $date = DateTime::createFromFormat('Y-m-d H:i:s', $date);
    return $date->format('Y-m-d');
}
function convert_mysql_to_readable_date($date){
    return $date->format('d-M-Y g:i:s a');
}
function convert_to_mysql_timestamp($date){
    return $date->format('Y-m-d H:i:s');
}
function convert_to_mysql_timestamp_date($date){
    return  date('Y-m-d H:i:s', strtotime($date));
}
function delete_quote_image($image)
{
    $CI = &get_instance();
    $path = $CI->config->item("quote_image_path", "application");

    if (!empty($image) && file_exists(FCPATH . $path . $image)) {
        @unlink(FCPATH . $path . $image);
		@unlink(FCPATH . $path . 'thumb_'.$image);
    }

}

function set_flash_message($type = "success", $message)
{
    $CI = &get_instance();
    $cls="callout-info";
    if($type=="error"){
        $cls="callout-danger";
    }

    $msg =  '<div class="callout '.$cls.'">';
    $msg .= $message;
    $msg .= '</div>';
    $CI->session->set_flashdata("message",$msg);
}


function draw_json_encode($array){
    echo json_encode($array);exit;
}

function automobile_resize_image($from,$to,$width="100"){
	$CI = &get_instance();
	
	
	$config = array();
	$config['source_image']	= $from;
	$config['new_image'] = $to;
	$config['maintain_ratio'] = TRUE;
	$config['height']	= 100;
	$config['width']	= $width;
	$config['master_dim'] = 'width';
	
	$CI ->image_lib->initialize($config);
	
	$CI ->image_lib->resize();
	
	
}

function add_record($table,$data) 
{
        $CI = &get_instance();
        $CI->db->insert($table, $data);
        return $CI->db->insert_id();
}
 function multiple($select,$from,$where)
{
     $CI = &get_instance();
    $select . $from . $where;
    $CI->db->select($select);
    $CI->db->from($from);
    $CI->db->where($where);
    $query = $CI->db->get();
    return $query->result();
}
function update($table,$data,$where)
 {
    $CI = &get_instance();
    $query = $CI->db->update($table, $data, $where);
    return $CI->db->affected_rows();
}
function getImageName($tablename,$colname,$id)
{
    $CI = &get_instance();
   $query="SELECT *  FROM `$tablename` where $colname = $id";
   $q = $CI->db->query($query);
   $result = $q->row();
   return $result->image;
}

function printR($arr){
    echo "<pre>";
    print_r($arr);
    echo "</pre>";
}
function isTodayDate($date){

    $timestamp = strtotime($date);
    $date = date('d/m/Y', $timestamp);
    if($date == date('d/m/Y')) {
        return true;
    }else{
        return false;
    }
}
function isAfterNowDateTime($date){

    $timestamp = strtotime($date);
    $now = new DateTime();
    $timestampNow = $now->getTimestamp();
    if($timestamp>$timestampNow) {
        return true;
    }else{
        return false;
    }
}
function dateDifferenceFromNow($date){

    $timestamp = strtotime($date);
    $now = new DateTime();
    $timestampNow = $now->getTimestamp();
    return $timestamp-$timestampNow;
}

function base_encode($data){
	//return base64_encode(base64_encode(base64_encode($data)));
	$encoded = base64_encode(base64_encode(base64_encode($data)));
	return rtrim(strtr($encoded, '+/', '-_'), '=');
}

function base_decode($data){
	$data = strtr($data, '-_', '+/');
	return base64_decode(base64_decode(base64_decode($data)));
}

function ArrayToHTMLOptions($option_array, $selected = null){
	$options = "";
	foreach ($option_array as $key => $val){
			
		$options .= (!is_null($selected) && $key == $selected) ? "<option value='$key' selected='selected'>$val</option>" : "<option value='$key'>$val</option>";
	}
	return $options;
}

function print_array($data){
	echo "<pre>";
	print_r($data);
	echo "</pre>";
}