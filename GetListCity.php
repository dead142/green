<?php
/**
 * Created by JetBrains PhpStorm.
 * User: user
 * Date: 20.09.13
 * Time: 0:47
 * To change this template use File | Settings | File Templates.
 */
header('Content-type: text/html; charset=utf-8');
class CityOption {
    private $sql;
    private $city,$cities;
function GetListOptionCity(){
    $this->sql = "SELECT id,title FROM rm_city";
    $this->cities = mysql_query($this->sql);
    return $this->cities;
}
function ShowListOptionCity(){
    $this->GetListOptionCity();
    while ($this->city = mysql_fetch_array($this->cities)){
    echo '<option value="'.$this->city['id'].'" >'.$this->city['title'].'</option>';
}
}
    function CityOption(){
        $this->ShowListOptionCity();
    }

}
