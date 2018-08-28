<?php

function locations($ids)

{

	$CI = &get_instance();

	//echo "SELECT locationName,locationId from location where locationId IN(".$ids.")";

	return $CI->db->query("SELECT locationName,locationId from location where locationId IN(".$ids.")")->result();

}



function getDataMasterOrWork($tbl1,$tbl2,$tblId,$value,$locId)

{

	$CI = &get_instance();



	//echo "SELECT o.".$tblId." as tblId,o.*,w.* from ".$tbl1." as o LEFT JOIN ".$tbl2." as w ON w.".$tblId."=o.".$tblId." where  o.".$tblId."='".$value."' and w.locationId='".$locId."'";

	$res=$CI->db->query("SELECT o.".$tblId." as tblId,o.*,w.* from ".$tbl1." as o JOIN ".$tbl2." as w ON w.".$tblId."=o.".$tblId." where  o.".$tblId."='".$value."' and w.locationId='".$locId."'")->result();

	if(count($res)>0)

	{

		//echo "SELECT o.".$tblId." as tblId,o.*,w.* from ".$tbl1." as o JOIN ".$tbl2." as w ON w.".$tblId."=o.".$tblId." where  o.".$tblId."='".$value."' and w.locationId='".$locId."'";

		return $res;

	}

	else

	{

		//echo "SELECT o.".$tblId." as tblId,o.*,w.* from ".$tbl1." as o LEFT JOIN ".$tbl2." as w ON w.".$tblId."=o.".$tblId." where  o.".$tblId."='".$value."'";

		// return $CI->db->query("SELECT o.".$tblId." as tblId,o.*,w.* from ".$tbl1." as o LEFT JOIN ".$tbl2." as w ON w.".$tblId."=o.".$tblId." where  o.".$tblId."='".$value."'")->result();

		return $CI->db->query("SELECT o.".$tblId." as tblId,o.* from ".$tbl1." as o where  o.".$tblId."='".$value."'")->result();

	}

	

	

}

function getSWSWorkData($id1)

{

	$CI = &get_instance();

	return $CI->db->query("SELECT sw.*,sv.* from SWSWorkProgress as sw left join SWSWorkProgressValue as sv on sv.SWSWorkProgressId=sw.SWSWorkProgressId where sw.SWSId='".$id1."'")->result();

}

function getTssWorkData($id1)

{

	$CI = &get_instance();

	return $CI->db->query("SELECT sw.*,sv.* from tssWorkProgress as sw left join tssWorkProgressValue as sv on sv.tssWorkProgressId=sw.tssWorkProgressId where sw.tssId='".$id1."'")->result();

}

function getTrWorkData($id1)

{

	$CI = &get_instance();

	return $CI->db->query("SELECT sw.*,sv.* from trWorkProgress as sw left join trWorkProgressValue as sv on sv.trWorkProgressId=sw.trWorkProgressId where sw.trId='".$id1."'")->result();

}

function getPsWorkData($id1)

{

	$CI = &get_instance();

	return $CI->db->query("SELECT sw.psToClsWorkProgressId as psToClsWorkProgressId1, sw.*,sv.* from psToClsWorkProgress as sw left join psToClsWorkProgressValue as sv on sv.psToClsWorkProgressId=sw.psToClsWorkProgressId where sw.psToClsId='".$id1."'")->result();

}

function getLtWorkData($id1)

{

	$CI = &get_instance();

	return $CI->db->query("SELECT sw.ltModworkProgressId as ltModworkProgressId1, sw.*,sv.* from ltModworkProgress as sw left join ltmodworkprogressvalue as sv on sv.ltModworkProgressId=sw.ltModworkProgressId where sw.ltModId='".$id1."'")->result();

}

function getDataworkprogressVlaue($id1,$id2)

{

	$CI = &get_instance();

	return $CI->db->query("SELECT * from ohe2WorkProgressValue where ohe2Id='".$id1."' and locationId='".$id2."'")->result();

}

//



//View work module 

 

 function forAllWork($tbl,$id,$value)

 {

 	$CI = &get_instance();



 	//echo "SELECT * From ".$tbl." where  ".$id."='".$value."' ";

 	$query=$CI->db->query("SELECT * From ".$tbl." where  ".$id."='".$value."' ")->result();

 	return $query;

 }



/// end here



function userListForGroup1($hq)

{

$CI = &get_instance();



		$query=$CI->db->query("SELECT ud.userId,ud.FullName,ud.userEmail,g.groupName,al.status,al.adminId,g.groupId,al.createdBy from userdetails as ud inner join groups as g on ud.groupId=g.groupId inner join adminlogin as al on al.userId=ud.userId where g.status=1 AND al.adminType=3 AND al.hqId='".$hq."'");

		//echo $query;

        if($query->num_rows()>0)

        {

            

            return $query->result();

            

               

        }

        else

        {

            return $zero=array();

            

        }

}





function groupWiseReports($g)

{

        $CI = &get_instance();



		$query=$CI->db->query("SELECT ud.userId,ud.FullName,ud.userEmail,al.status from userdetails as ud inner join adminlogin as al on ud.userId=al.userId where ud.groupId='".$g."' AND al.adminType=4");

		//echo $query;

        if($query->num_rows()>0)

        {

            

            return $query->result();

            

               

        }

        else

        {

            return $zero=array();

            

        }

}



function workEntryCount($hq)

{

$CI = &get_instance();



		$query=$CI->db->query("SELECT count(ohe1Id) as wCount,hqId,groupId from ohe1 where hqId='".$hq."'  group by groupId");

		//echo $query;

        if($query->num_rows()>0)

        {

            

            return $query->result();

        }

        else

        {

            return $zero=array();

            

        }

}



function numberOfusersInGroups($hq)

{

$CI = &get_instance();



		$query=$CI->db->query("SELECT count(ud.userId) as uCount ,g.groupId from userdetails as ud inner join groups as g on ud.groupId=g.groupId inner join adminlogin as al on al.userId=ud.userId where g.status=1 AND al.adminType=4 AND al.hqId='".$hq."' group by g.groupId ");

		//echo $query;

        if($query->num_rows()>0)

        {

            

            return $query->result();

            

               

        }

        else

        {

            return $zero=array();

            

        }

}



function get_datahq($type,$hq)

{

    $CI = &get_instance();

     if($type=='OHE')

	 {

	 	

		 $str="SELECT ud.FullName,g.groupName,s.stationName,l.locationName,oh.oheFoundationType,oh.status,oh.ohe1Id from ohe1 as oh join userdetails as ud on ud.userId=oh.userId join groups as g on g.groupId=oh.groupId join station as s on s.stationId=oh.stationId join location as l on l.locationId=oh.oheLocation WHERE (oh.createDate BETWEEN '".date('Y-m-d',strtotime($from_date))."' AND '".date('Y-m-d',strtotime($to_date))."')";

		 

		 if($from_date!='')

		 {

			 if($to_date!='')

			 {

				 

			 }

			 else

			 {

			    

			 }

		 }

		 

	      $query=$CI->db->query($str);

        $num=$query->num_rows();

        if($num>0)

        {

            return $query->result();

        }

        else

        {

            return $zero=array();

        }	 

	 }

	 else if($type=="OHE WIRING")

	 {

	 	if($from_date!='')

		 {

			 if($to_date!='')

			 {

				 

			 }

			 else

			 {

			    

			 }

		 }

		  $query=$CI->db->query("SELECT ud.FullName,g.groupName,s.stationName,l.locationName,oh.LocationAnticreep,oh.status,oh.ohe2Id from OHE2 as oh join userdetails as ud on ud.userId=oh.userId join groups as g on g.groupId=oh.groupId join station as s on s.stationId=oh.stationId join location as l on l.locationId=oh.location WHERE (oh.createDate BETWEEN '".date('Y-m-d',strtotime($from_date))."' AND '".date('Y-m-d',strtotime($to_date))."')");

        $num=$query->num_rows();

        if($num>0)

        {

            return $query->result();

        }

        else

        {

            return $zero=array();

        }

	 }



	 else if($type=="YARD")

	 {



	 	//echo hello;

	 	if($from_date!='')

		 {

			 if($to_date!='')

			 {

				 

			 }

			 else

			 {

			    

			 }

		 }

		  $query=$CI->db->query("SELECT ud.FullName,g.groupName,s.stationName,l.locationName,oh.LocationOfSectionInsulator,oh.status,oh.yardWorkId from yardWork as oh join userdetails as ud on ud.userId=oh.userId join groups as g on g.groupId=oh.groupId join station as s on s.stationId=oh.stationId join location as l on l.locationId=oh.yardLocation WHERE (oh.createDate BETWEEN '".date('Y-m-d',strtotime($from_date))."' AND '".date('Y-m-d',strtotime($to_date))."')");

        $num=$query->num_rows();

        if($num>0)

        {

            return $query->result();

        }

        else

        {

            return $zero=array();

        }

	 }



	 else if($type=="SWS")

	 {

	 	if($from_date!='')

		 {

			 if($to_date!='')

			 {

				 

			 }

			 else

			 {

			    

			 }

		 }

		  $query=$CI->db->query("SELECT ud.FullName,oh.Type_SP_SSP_FP,oh.status,oh.PTFE,oh.NoOfFencingFoundations,oh.NoOfStructureFoundations,oh.CablingInMetres,oh.SWSId from SWS as oh join userdetails as ud on ud.userId=oh.userId join groups as g on g.groupId=oh.groupId WHERE (oh.createDate BETWEEN '".date('Y-m-d',strtotime($from_date))."' AND '".date('Y-m-d',strtotime($to_date))."')");

        $num=$query->num_rows();

        if($num>0)

        {

            return $query->result();

        }

        else

        {

            return $zero=array();

        }

	 }



	 else if($type=="TSS")

	 {

	 	if($from_date!='')

		 {

			 if($to_date!='')

			 {

				 

			 }

			 else

			 {

			    

			 }

		 }

		  $query=$CI->db->query("SELECT ud.FullName,g.groupName,s.stationName,l.locationName,oh.PTFELocation,oh.status,oh.tssId from tssLine as oh join userdetails as ud on ud.userId=oh.userId join groups as g on g.groupId=oh.groupId join station as s on s.stationId=oh.stationId join location as l on l.locationId=oh.location WHERE (oh.createDate BETWEEN '".date('Y-m-d',strtotime($from_date))."' AND '".date('Y-m-d',strtotime($to_date))."')");

        $num=$query->num_rows();

        if($num>0)

        {

            return $query->result();

        }

        else

        {

            return $zero=array();

        }

	 }



	 else if($type=="TR")

	 {

	 	if($from_date!='')

		 {

			 if($to_date!='')

			 {

				 

			 }

			 else

			 {

			    

			 }

		 }

		  $query=$CI->db->query("SELECT ud.FullName,g.groupName,s.stationName,l.locationName,oh.GSS,oh.status,oh.trId from trLine as oh join userdetails as ud on ud.userId=oh.userId join groups as g on g.groupId=oh.groupId join station as s on s.stationId=oh.stationId join location as l on l.locationId=oh.locationId WHERE (oh.createDate BETWEEN '".date('Y-m-d',strtotime($from_date))."' AND '".date('Y-m-d',strtotime($to_date))."')");

        $num=$query->num_rows();

        if($num>0)

        {

            return $query->result();

        }

        else

        {

            return $zero=array();

        }

	 }



	 else if($type=="HT Xing")

	 {

	 	if($from_date!='')

		 {

			 if($to_date!='')

			 {

				 

			 }

			 else

			 {

			    

			 }

		 }

		  $query=$CI->db->query("SELECT ud.FullName,g.groupName,s.stationName,l.locationName,oh.TypeOfHTCrossing,oh.status,oh.htXingId from htXing as oh join userdetails as ud on ud.userId=oh.userId join groups as g on g.groupId=oh.groupId join station as s on s.stationId=oh.stationId join location as l on l.locationId=oh.locationId WHERE (oh.createDate BETWEEN '".date('Y-m-d',strtotime($from_date))."' AND '".date('Y-m-d',strtotime($to_date))."')");

        $num=$query->num_rows();

        if($num>0)

        {

            return $query->result();

        }

        else

        {

            return $zero=array();

        }

	 }

	 else if($type=="LT Mod")

	 {

	 	if($from_date!='')

		 {

			 if($to_date!='')

			 {

				 

			 }

			 else

			 {

			    

			 }

		 }

		  $query=$CI->db->query("SELECT ud.FullName,g.groupName,s.stationName,oh.LocationFrom,oh.LocationTo,oh.status,oh.ltModId from ltMod as oh join userdetails as ud on ud.userId=oh.userId join groups as g on g.groupId=oh.groupId join station as s on s.stationId=oh.stationId WHERE (oh.createDate BETWEEN '".date('Y-m-d',strtotime($from_date))."' AND '".date('Y-m-d',strtotime($to_date))."')");

        $num=$query->num_rows();

        if($num>0)

        {

            return $query->result();

        }

        else

        {

            return $zero=array();

        }

	 }



	 else if($type=="PS to CLS")

	 {

	 	if($from_date!='')

		 {

			 if($to_date!='')

			 {

				 

			 }

			 else

			 {

			    

			 }

		 }

		  $query=$CI->db->query("SELECT ud.FullName,g.groupName,s.stationName,oh.LocationFrom,oh.LocationTo,oh.status,oh.psToClsId from psToCls as oh join userdetails as ud on ud.userId=oh.userId join groups as g on g.groupId=oh.groupId join station as s on s.stationId=oh.stationId WHERE (oh.createDate BETWEEN '".date('Y-m-d',strtotime($from_date))."' AND '".date('Y-m-d',strtotime($to_date))."')");

        $num=$query->num_rows();

        if($num>0)

        {

            return $query->result();

        }

        else

        {

            return $zero=array();

        }

	 }

}



// function get_Hqdata($type)

// {

//     $CI = &get_instance();

//     echo $type;

// }





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

	$query=$CI->db->query("SELECT * from ".$table."  where ".$con."='".$val."'")->result();

}

    else

    {

    	$query=$CI->db->query("SELECT * from ".$table." ")->result();

    }

    return $query;

}



function getPermission($userId)

{

	$CI = &get_instance();

	return $CI->db->query("SELECT workModulePermission from adminlogin where userId='".$userId."'")->row_array();
}



function geteditdata($ohe1Id,$locationId)

{

	$CI = &get_instance();

	

	return $CI->db->query("SELECT * from ohe1Value where ohe1Id='".$ohe1Id."' and locationId='".$locationId."'")->row();







}





function current_full_url()

{

    $CI = &get_instance();



     $url = $CI->config->site_url().$CI->uri->uri_string();

    return $_SERVER['QUERY_STRING'] ? $url.'?'.$_SERVER['QUERY_STRING'] : $url;

}

function getUserData()

{

    $CI = &get_instance();
 return $CI->db->query("SELECT * from userdetails where userId='".$this->session->userdata('userId')."'")->result();

}



function updatedata($con,$val,$table,$updatedata)
{
$CI = &get_instance();
$query=$CI->db->query("update ".$table." set ".$updatedata." where ".$con."='".$val."'");
return $query;

}



function getlocation($start,$endlocationid)
{
$CI = &get_instance();

$query=$CI->db->query("SELECT locationId,locationName from location where locationId between '".$start."' AND '".$endlocationid."' order by locationId asc ")->result();
return $query;

}

function getstation($start,$end)
{
$CI = &get_instance();

$query=$CI->db->query("SELECT stationId,stationName,startLocationId,endLocationId from station where stationId between '".$start."' AND '".$end."'")->result();
return $query;

}
function getcomplcount($sid,$date,$todate)
{

	if($sid!='')
	{
	$CI = &get_instance();
$WorkProgressInput=array('FoundationDate','MastErectionDate','MastGroutingDate','BracketErectionDate');
for($i=0;$i<count($WorkProgressInput);$i++)
{	
$oheid=$CI->db->query("SELECT ohe1WorkProgressId from ohe1workprogress where sectionId=".$sid." and type='".$WorkProgressInput[$i]."' ")->row_array();
if($oheid['ohe1WorkProgressId']!='')
{
if($date!='')
{
$fdate=date('Y-m-d',strtotime($date));
if($todate!='')
{
$ftodate=date('Y-m-d',strtotime($todate));
$query=$CI->db->query("SELECT id from oheworkprogressdata where oheworkprogressid=".$oheid['ohe1WorkProgressId']." and (value between '".$fdate."' and  '".$ftodate."')")->result();
}
else
{
$query=$CI->db->query("SELECT id from oheworkprogressdata where oheworkprogressid=".$oheid['ohe1WorkProgressId']." and value='".$fdate."' ")->result();
}
	
}
else
{
$query=$CI->db->query("SELECT id from oheworkprogressdata where oheworkprogressid=".$oheid['ohe1WorkProgressId']." and value!='' ")->result();	
}		

$total=$total.','.count($query);
}
else
{
$total=$total.','.'0';	
}

}	
}
else
{
$total=',0,0,0,0';		
}


return $total;

}


function getallcomplcount($sid,$date,$todate)
{

	if($sid!='')
	{
	$CI = &get_instance();
$WorkProgressInput=array('FoundationDate','MastErectionDate','MastGroutingDate','BoomErectionDate','DAErectionDate','BracketErectionDate','BracketAdjustmentDate','SEDCheckingDate','ATDErectionDate','ATDAdjustmentDate','ATErectionDate','ATCommissioningDate','StructureBondErectionDate');
for($i=0;$i<count($WorkProgressInput);$i++)
{	
$oheid=$CI->db->query("SELECT ohe1WorkProgressId from ohe1workprogress where sectionId=".$sid." and type='".$WorkProgressInput[$i]."' ")->row_array();
if($oheid['ohe1WorkProgressId']!='')
{
if($date!='')
{
$fdate=date('Y-m-d',strtotime($date));
if($todate!='')
{
$ftodate=date('Y-m-d',strtotime($todate));
$query=$CI->db->query("SELECT id from oheworkprogressdata where oheworkprogressid=".$oheid['ohe1WorkProgressId']." and (value between '".$fdate."' and  '".$ftodate."')")->result();
}
else
{
$query=$CI->db->query("SELECT id from oheworkprogressdata where oheworkprogressid=".$oheid['ohe1WorkProgressId']." and value='".$fdate."' ")->result();
}
	
}
else
{
$query=$CI->db->query("SELECT id from oheworkprogressdata where oheworkprogressid=".$oheid['ohe1WorkProgressId']." and value!='' ")->result();	
}		

$total=$total.','.count($query);
}
else
{
$total=$total.','.'0';	
}

}	
}
else
{
$total=',0,0,0,0,0,0,0,0,0,0,0,0,0';		
}


return $total;

}


function getdailycomplcount($sid,$dateType)
{
	

	if($sid!='')
	{
	$CI = &get_instance();
$WorkProgressInput=array('FoundationDate','MastErectionDate','MastGroutingDate','BoomErectionDate','DAErectionDate','BracketErectionDate','BracketAdjustmentDate','SEDCheckingDate','ATDErectionDate','ATDAdjustmentDate','ATErectionDate','ATCommissioningDate','StructureBondErectionDate');
for($i=0;$i<count($WorkProgressInput);$i++)
{	

$oheid=$CI->db->query("SELECT ohe1WorkProgressId from ohe1workprogress where sectionId=".$sid." and type='".$WorkProgressInput[$i]."' ")->row_array();
if($oheid['ohe1WorkProgressId']!='')
{
if($dateType=='daily')
{
	$date=date('Y-m-d');
	$prev_date = date('Y-m-d', strtotime($date .' -1 day'));	
$query=$CI->db->query("SELECT id from oheworkprogressdata where oheworkprogressid=".$oheid['ohe1WorkProgressId']." and value='".$prev_date."'")->result();
}
if($dateType=='week')
{
	$date=date('Y-m-d');
	$prev_date = date('Y-m-d', strtotime($date .' -7 day'));	
$query=$CI->db->query("SELECT id from oheworkprogressdata where oheworkprogressid=".$oheid['ohe1WorkProgressId']." and (value between '".$prev_date."' and  '".$date."')")->result();
}
if($dateType=='month')
{
	$date=date('Y-m-d');
	$prev_date = date('Y-m-d', strtotime($date .' -1 months'));	
$query=$CI->db->query("SELECT id from oheworkprogressdata where oheworkprogressid=".$oheid['ohe1WorkProgressId']." and (value between '".$prev_date."' and  '".$date."')")->result();
}		

$total=$total.','.count($query);
}
else
{
$total=$total.','.'0';	
}

}	
}
else
{
$total=',0,0,0,0,0,0,0,0,0,0,0,0,0';		
}


return $total;

}



function getcumulcal($sid,$date)
{
 if($sid!='')
	{
	$CI = &get_instance();
$WorkProgressInput=array('FoundationDate','MastErectionDate','MastGroutingDate','BoomErectionDate','DAErectionDate','BracketErectionDate','BracketAdjustmentDate','SEDCheckingDate','ATDErectionDate','ATDAdjustmentDate','ATErectionDate','ATCommissioningDate','StructureBondErectionDate');
for($i=0;$i<count($WorkProgressInput);$i++)
{	
$oheid=$CI->db->query("SELECT ohe1WorkProgressId from ohe1workprogress where sectionId=".$sid." and type='".$WorkProgressInput[$i]."' ")->row_array();
if($oheid['ohe1WorkProgressId']!='')
{

$fdate=date('Y-m-d',strtotime($date));
$query=$CI->db->query("SELECT id from oheworkprogressdata where oheworkprogressid=".$oheid['ohe1WorkProgressId']." and value <'".$fdate."'  and value!=''")->result();	
$total=$total.','.count($query);
}
else
{
$total=$total.','.'0';	
}

}	
}
else
{
$total=',0,0,0,0,0,0,0,0,0,0,0,0,0';	
}

return $total;

	
}



function getallcomplcountohewiring($sid,$date,$todate)
{

	if($sid!='')
	{
	$CI = &get_instance();
$WorkProgressInput=array('FoundationDate','MastErectionDate','MastGroutingDate','BoomErectionDate','DAErectionDate','BracketErectionDate','BracketAdjustmentDate','SEDCheckingDate','ATDErectionDate','ATDAdjustmentDate','ATErectionDate','ATCommissioningDate','StructureBondErectionDate');
for($i=0;$i<count($WorkProgressInput);$i++)
{	
$oheid=$CI->db->query("SELECT ohe1WorkProgressId from ohe1workprogress where sectionId=".$sid." and type='".$WorkProgressInput[$i]."' ")->row_array();
if($oheid['ohe1WorkProgressId']!='')
{
if($date!='')
{
$fdate=date('Y-m-d',strtotime($date));
if($todate!='')
{
$ftodate=date('Y-m-d',strtotime($todate));
$query=$CI->db->query("SELECT id from oheworkprogressdata where oheworkprogressid=".$oheid['ohe1WorkProgressId']." and (value between '".$fdate."' and  '".$ftodate."')")->result();
}
else
{
$query=$CI->db->query("SELECT id from oheworkprogressdata where oheworkprogressid=".$oheid['ohe1WorkProgressId']." and value='".$fdate."' ")->result();
}
	
}
else
{
$query=$CI->db->query("SELECT id from oheworkprogressdata where oheworkprogressid=".$oheid['ohe1WorkProgressId']." and value!='' ")->result();	
}		

$total=$total.','.count($query);
}
else
{
$total=$total.','.'0';	
}

}	
}
else
{
$total=',0,0,0,0,0,0,0,0,0,0,0,0,0';		
}


return $total;

}


function forallcon($con,$table)

{

$CI = &get_instance();

$query=$CI->db->query("SELECT * from ".$table." ".$con." ")->row_array();

return $query;

}
function forallcon1($con,$table)

{

$CI = &get_instance();

$query=$CI->db->query("SELECT * from ".$table." ".$con." ")->result();

return $query;

}



