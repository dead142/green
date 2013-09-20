<? include "db_config.php";
include "GetListCity.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>recycle map v1.0.0</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--JQ Mobile start here ----->
    <link rel="stylesheet" href="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.css" />
    <script src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
    <script src="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.js"></script>
    <!-- End JQ mobile ---->
    <!-- =========================GEO Google================================================================ -->
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <!-- ====================END GEO Google================================================================ -->
    <script src="js/heart.js"></script>
    <link rel="stylesheet" href="css/main.css" type="text/css" media="screen" />
</head>
<body>
<header></header>
<section id="City">
<select name="select-choice-min" id="select-choice-min" data-mini="true">
    <option value="geo">Выберите город</option>
    <? $option=new CityOption();?>
</select>
</section>
<section id="HideTrash" class="Trash">

    <select name="select-choice-min"   data-mini="true"  id="Trash">
    <option>Сдать ресурс =)</option>
    <option value="1" >Бумага</option>
    <option value="1" >Бумага</option>
    <option value="2" >Стекло</option>
    <option value="3" >Пластик</option>
    <option value="4" >Металл</option>
    <option value="5" >Одежда</option>
    <option value="6" >Опасные</option>
    <option value="7" >Что-то непонятное</option>
    </select>

</section>



<section>
    <div id="map"></div>

</section>


</body>
</html>

<?php
/**
 * Created by JetBrains PhpStorm.
 * User: user
 * Date: 20.09.13
 * Time: 0:35
 * To change this template use File | Settings | File Templates.
 */