<?php
/* @var $this yii\web\View */ 
$this->title = 'Маршруты';
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
function appendText(pos,name,count){
    var insertRow = document.createElement("tr");
    var insertName = document.createElement("td");
    $(insertName).addClass("name");
    $(insertName).addClass("text-center");
    var insertCount = document.createElement("td");
    $(insertCount).addClass("count");
    $(insertCount).addClass("text-center");
    if(count == 0){
        $(insertCount).addClass("warn");
    }
    insertName.innerText = name;
    insertCount.innerText = count;
    $(insertRow).append(insertName);
    $(insertRow).append(insertCount);
    $(pos).append(insertRow);
}
function loadData(){
    	$.ajax({
		type:"POST",
		url:"http://ds.citrus24.com/view/getajaxroute",//заменить при переносе на сервер
		dataType:"json",
        success:function(data){
            const pos1 = "#t1Tbody";
            const pos2 = "#t2Tbody";
            $(pos1).empty();
            $(pos2).empty();
            var tableCounter = 1;
            var maxForTable = data.length/2;
            for(var i = 0; i<data.length; i++){
                if(tableCounter<=maxForTable){
                    appendText(pos1,data[i].name,data[i].capacity);
                    tableCounter++;
                }else{
                    appendText(pos2,data[i].name,data[i].capacity)
                }
            }
                //console.log(data[0].capacity);
            setTimeout(function(){
                loadData()
            },2000);
        }
    });
}
$(document).ready(function(){
    loadData();
// $("body").click(function(){
//     $("#w0").fadeIn(2000);
// })
 $("#w0").mouseleave(function(){
     $("#w0").fadeOut(2000);
 });
 $("#w0").fadeOut(8000);
 $(".footer").fadeOut(8000);
})
</script>
<style>
.warn{
    color:red !important;
}
.table {
    border-bottom:0px !important;
    border-spacing: 10px;
    border-collapse: separate;
}
.table th, .table td {
    border: 1px !important;
}
.fixed-table-container {
    border:0px !important;
}
body{
    /*background-image: url('http://ds.citrus24.com/app/images/route22.jpg');*/
    background-image: url(http://ds.citrus24.com/app/images/background.png);
    background-size: 100% 100%;
    background-repeat: no-repeat;
    color: #095764;
    font-weight: bold;
}
.name{
    background:  rgba(255,255,255,.7);
    -webkit-border-radius: 7px;
    -moz-border-radius: 7px;
    border-radius: 7px;
    font-size:25px;
    /*color:#191970;*/
    /*background-position:bottom 10px;*/
}
.count{
     color:white;
    background:  rgba(0,84,95,.7);
    -webkit-border-radius: 7px;
    -moz-border-radius: 7px;
    border-radius: 7px;
    font-size:25px;
    /*color:#191970;*/
}

.row{
    top:15%;
    left:10% !important;
    right:10% !important;
    position:absolute;
    /*width:90%;*/
    /*margin-top:18%;
    margin-left:14%;*/
    
}

h1{
    /*left:5%;
    right:5%;*/
    font-size:45px;
    font-weight: 700;
    /*color:#000066;*/
}
#logo{
    width:4%;
    max-width:5%;
    height:40px;
    margin-left:40%;
    margin-right:40%;
    margin-top: 2vh;
    margin-bottom:0%;
    display:inline;
    position:relative;
}
</style>

<div class="container-fluid">
<!--<div id="logo" class="text-center">
<image src="http://ds.citrus24.com/app/images/logo.png" class="img-fluid center-block" width="350" height="350"/>
</div>-->
<div class="row text-center">
<h1 class="text-center">Маршруты</h1>
   <div class="col-xs-6">
         <table id="t1" class="table borderless">
            <tbody id="t1Tbody">
               <tr>
                  <td class="name text-center">Название маршрута555</td>
                  <td class="count text-center">55</td>
               </tr>
               <tr>
                  <td class="name text-center">Название маршрута555</td>
                  <td class="count text-center">55</td>
               </tr>
               <tr>
                  <td class="name text-center">Название маршрута555</td>
                  <td class="count text-center">55</td>
               </tr>
            </tbody>
         </table>
   </div>
   <div class="col-xs-6">
         <table id = "t2" class="table borderless">
            <tbody id="t2Tbody">
               <tr>
                    <td class="name text-center">Название маршрута 666</td>
                    <td class="count text-center">55</td>
               </tr>
               <tr>
                  <td class="name text-center">Название маршрута555</td>
                  <td class="count text-center">55</td>
               </tr>
               </tbody>
         </table>
      </div>
</div>
</div>