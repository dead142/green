<?php
/**
 * Created by JetBrains PhpStorm.
 * User: user
 * Date: 20.09.13
 * Time: 1:58
 * To change this template use File | Settings | File Templates.
 */
include('db_config.php');
header('Content-type: text/html; charset=utf-8');

class GetListTrash {

    private $sql;
    private $trash , $trashes;
    private $CityId,$CategoryFilter;
    function GetRequest(){
        $this->CityId=$_REQUEST['city_id'];
        $this->CategoryFilter=$_REQUEST['cat_filter'];
    }
    function GetListPoint(){
        $this->GetRequest();
        $this->sql = 'SELECT o.*
			FROM `rm_org` o
			JOIN rm_org_category oc
			ON o.id = oc.org_id
			WHERE o.city_id ='.$this->CityId.' AND oc.category_id ='.$this->CategoryFilter;
        $this->trashes= mysql_query($this->sql);
        while($row=mysql_fetch_array($this->trashes)){
            $ArrayCompany[] = array("title"=>$row['title'],
                "lat"=>$row['lat'],
                "lng"=>$row['lng'],
                "info_time"=>$row['info_time'],
                "info_contacts"=>$row['info_contacts']
            );
        }
        return $ArrayCompany;
    }


    function SendJsonePoint() {



        echo json_encode($this->GetListPoint());
    }
}

$obj = new GetListTrash();
$obj->SendJsonePoint();
