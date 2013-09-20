/**
 * Created with JetBrains PhpStorm.
 * User: user
 * Date: 20.09.13
 * Time: 1:09
 * To change this template use File | Settings | File Templates.
 */
var CtegoryFilter;
$(document).ready(function(){
$("#City").change(GetIdCity);

$("#Trash").change(AddMaker)




});

function GetIdCity(){
    window.CityID=$("#select-choice-min").val();
    console.log("(GetIdCity) window.city="+window.CityID);

    $("#HideTrash").removeClass();
    GetInfoCity();
}



function GetInfoCity()
{
    $.getJSON(
        "ajax_city_info.php?city_id=" + window.CityID,
        function(city_info)
        {
            console.log("GetInfoCity  lat"+city_info.city_lat);
            console.log("GetInfoCity  lng"+city_info.city_lng);
            console.log("GetInfoCity  zoom"+city_info.city_zoom);
            if((city_info.city_lat==null)||(city_info.city_lng==null)) {alert("Error:Dont get response lat,lng see ajax_city_info.php")}
            else { InitMap( parseFloat(city_info.city_lat), parseFloat(city_info.city_lng), parseInt(city_info.city_zoom) );
                AddMaker(map);
            }


        }
    );

}
function InitMap(lat, lng, zoom)
{
    var city = new google.maps.LatLng(lat,lng);
    console.log("InitMap city"+city);
    var myOptions = { zoom: zoom, center: city, mapTypeId: google.maps.MapTypeId.ROADMAP }

    map = new google.maps.Map(document.getElementById("map"), myOptions);
    return map;
}
function AddMaker( ){

    window.CategoryFilter=$("#Trash").val()
    console.log("(AddMaker)  CtegoryFilter="+ window.CategoryFilter);
    $.ajax(
        {
            url: "GetTrash.php?city_id=" + window.CityID + "&cat_filter=" + window.CategoryFilter,
            success: function(data)
            {

                var CompanyData = JSON.parse (data);


                for(var i=0; i<data.length; i++) {
                    var myLatlng = new google.maps.LatLng(parseFloat(CompanyData[i].lat),parseFloat(CompanyData[i].lng));
console.log ("MylatLNG="+myLatlng);
               var contentString ="<div >название компании"+CompanyData[i].title+"</div>";
                var infowindow= new google.maps.InfoWindow({
                 content: contentString
               });
                    var marker = new google.maps.Marker({
                        position: myLatlng,
                        map: map,
                        title:"Uluru (Ayers Rock)"
                    });

                  google.maps.event.addListener(marker, 'click', function() {
                       infowindow.open(map,marker);
              });

                }


            }

});
}
/*


function dddd()
{
 //   delete_markers();

    $.ajax(
        {
            url: "ajax_markers_xml.php?city_id=" + city_id + "&cat_filter=" + cat_filter,
            success: function(data)
            {
                console.log(data);
                $(data).find("marker").each(function()
                {
                    var marker_xml = $(this);
                    var point = new google.maps.LatLng(marker_xml.attr("lat"),marker_xml.attr("lng"));
                    var image = new google.maps.MarkerImage('img/markers/' + cat_filter + '.png', null, null, new google.maps.Point(21, 18));
                    var marker = new google.maps.Marker(
                        {
                            position: point,
                            map: global_map,
                            title:marker_xml.attr("title"),
                            icon: image
                        });
                    // saving markers for future...
                    markersArray.push(marker);

                    console.log("ajax complete");

                    google.maps.event.addListener(marker, 'click', function()
                    {
                        show_org_info(marker_xml.attr("id"), marker)
                    });
                });
            }
        }); // markers_xml.php

}
*/