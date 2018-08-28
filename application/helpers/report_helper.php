<?php





function forall($con,$val,$table)

{

    $CI = &get_instance();

    //$query=$this->db->query("SELECT count(ohe1Id) as wCount,hqId from ohe1  group by hqId");

        //return $query->result();

    // echo "SELECT groupId from groups where hqId='".$hqId."'";



    $query=$CI->db->query("SELECT * from ".$table."  where ".$con."='".$val."'")->result();

    return count($query);





}

function forsingleData($con,$val,$table,$col)

{

$CI = &get_instance();

$query=$CI->db->query("SELECT ".$col." from ".$table."  where ".$con."='".$val."'")->row_array();

return $query;

}

function forallData($con,$val,$table)

{

    $CI = &get_instance();

  

if($con!="")

{
  //echo "SELECT * from ".$table."  where ".$con."='".$val."'";
	$query=$CI->db->query("SELECT * from ".$table."  where ".$con."='".$val."'")->result();

}

    else

    {

    	$query=$CI->db->query("SELECT * from ".$table." ")->result();

    }

    return $query;

}







function current_full_url()

{

    $CI = &get_instance();



     $url = $CI->config->site_url().$CI->uri->uri_string();

    return $_SERVER['QUERY_STRING'] ? $url.'?'.$_SERVER['QUERY_STRING'] : $url;

}


function forallcon($con,$table,$col)

{

$CI = &get_instance();


$query=$CI->db->query("SELECT ".$col." from ".$table." ".$con." ")->row_array();

return $query;

}

function forCountDataSingleTable($con,$table)

{

$CI = &get_instance();

//echo "SELECT * from ".$table." ".$con."";
$query=$CI->db->query("SELECT * from ".$table." ".$con." ")->num_rows();

return $query;

}

function forallcon1($con,$table)

{

$CI = &get_instance();

$query=$CI->db->query("SELECT * from ".$table." ".$con." ")->result();

return $query;

}




