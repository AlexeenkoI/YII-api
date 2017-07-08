<?php
/* @var $this yii\web\View */ 
$this->title = 'Маршруты';
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
function appendText(viewport,pos,totem,score,scoret){
    var insertRow = document.createElement("tr");

    var insertPos = document.createElement("td");
    $(insertPos).addClass("position");
    $(insertPos).addClass("text-center");

    var insertTotem = document.createElement("td");
    $(insertTotem).addClass("totem");
    $(insertTotem).addClass("text-center");

    var insertScore = document.createElement("td");
    $(insertScore).addClass("score");
    $(insertScore).addClass("text-center");

    var insertScoret = document.createElement("td");
    $(insertScoret).addClass("scoret");
    $(insertScoret).addClass("text-center");


    $(insertPos).html(pos);
    $(insertTotem).html(totem);
    $(insertScore).html(score);
    $(insertScoret).html(scoret);

    $(insertRow).append(insertPos);
    $(insertRow).append(insertTotem);
    $(insertRow).append(insertScore);
    $(insertRow).append(insertScoret);
    $(viewport).append(insertRow);
}

function doScore(p1, p2, p3) {
    var score = parseInt(p1) + parseInt(p2);

    return score;
}

function doScoret(p1, p2, p3) {
    var lab = ""

    if (p3 == "1") lab += "HС";
    if (p3 == "2") lab += "ГЛ";
    if (p3 == "3") lab += "УХ";
    if (p3 == "4") lab += "КР";
    if (p3 == "5") lab += "ЛП";
    if (p3 == "6") lab += "ХВ";

    return lab;
}

function loadData(){
    	$.ajax({
		type:"POST",
		url:"http://ds.citrus24.com/view/kubik",//заменить при переносе на сервер
		dataType:"json",
        success:function(data){
            const viewport1 = "#t1Tbody";
            const viewport2 = "#t2Tbody";
            const viewport3 = "#t3Tbody";
            $(viewport1).empty();
            $(viewport2).empty();
            $(viewport3).empty();
            var pos = 1;
            tableCounter = 1;
            for (var i = 0; i < data.length; i++) { 
                   if(tableCounter<=7){
                       var score = doScore(data[i].p1, data[i].p2, data[i].p3);
                       var scoret = doScoret(data[i].p1, data[i].p2, data[i].p3);
                       appendText(viewport1,pos,data[i].name,score,scoret);
                       tableCounter++;
                       pos++;
                       continue;
                   }
                   if(tableCounter>7 && tableCounter<=14){
                       var score = doScore(data[i].p1, data[i].p2, data[i].p3);
                       var scoret = doScoret(data[i].p1, data[i].p2, data[i].p3);
                       appendText(viewport2,pos,data[i].name,score,scoret);
                       tableCounter++;
                       pos++;
                       continue;
                   }
                   if(tableCounter>14){
                       var score = doScore(data[i].p1, data[i].p2, data[i].p3);
                       var scoret = doScoret(data[i].p1, data[i].p2, data[i].p3);
                       appendText(viewport3,pos,data[i].name,score,scoret);
                       tableCounter++;
                       pos++;
                       continue;
                   }
                //    if(pos>21&&tableCounter>21){
                //        pos = 1;
                //        tableCounter = 1;
                //    }
            }
            // setTimeout(function(){
            //     loadData()
            // },2000);
        }
    });
}
$(document).ready(function(){  
    loadData(); 
$("body").click(function(){
    $("#w0").fadeIn(2000);
})
 $("#w0").mouseleave(function(){
     $("#w0").fadeOut(2000);
 });
 $("#w0").fadeOut(2000);
 $(".footer").fadeOut(2000);
})
</script>
<style>
body{
    /*background-image: url('http://ds.citrus24.com/app/images/individualpos.png');*/
    background-image: url(http://ds.citrus24.com/app/images/background.png);
    background-size: 100% 100%;
    background-repeat: no-repeat;
    color: #095764;
    font-weight: bold;
}
td{
    font-size:20px;
}
/*.row{
    margin-top:26%;
    margin-left:14%;
    
}*/
.table {
    border-bottom:0px !important;
    width:100%;
    border-spacing: 10px;
    border-collapse: separate;
}
.table th, .table td {
    border: 1px !important;
}
.fixed-table-container {
    border:0px !important;
}
.row{
    margin-top:2%;
    margin-left:5%;
    margin-right: 50px;
}
th{
    font-size:24px;
}
td{
    font-size:26px;
}
.tbl1{
    margin-left:6%;
    margin-right:0%;
}
.tbl2{
    margin-left:4.5%;
    padding-right:8%;
    padding-top:1.5vh;
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
.position{
    color:white;
     background:  rgba(0,84,95,.7);
    -webkit-border-radius: 7px;
    -moz-border-radius: 7px;
    border-radius: 7px;
    width:4%;
}
.totem{
     background:  rgba(255,255,255,.7);
    -webkit-border-radius: 7px;
    -moz-border-radius: 7px;
    border-radius: 7px;
    width:15%;
}

.score{
    background:  rgba(255,255,255,.7);
    -webkit-border-radius: 7px;
    -moz-border-radius: 7px;
    border-radius: 7px;
    width:5%;
}
.scoret{
    color:white;
    background:  rgba(0,84,95,.7);
    -webkit-border-radius: 7px;
    -moz-border-radius: 7px;
    border-radius: 7px;
    width:5%;
}
</style>
<!--<div class="container">
<div class="container-fluid">

   <table style="width:100%;">
        <tr>
            <th class="text-center">Комманда</th>
            <th class="text-center">Кубик 1</th>
            <th class="text-center">Кубик 2</th>
            <th class="text-center">Кубик 3</th>
        </tr>
        <tbody id="tablebodythis">

        </tbody>
   </table>
</div>
</div>-->


<div class="container-fluid">
<!--<div id="logo" class="text-center">
<image src="http://ds.citrus24.com/app/images/logo.png" class="img-fluid center-block" width="350" height="350"/>
</div>-->
<div class="row text-center">
<h1 class="text-center">Последовательность записи</h1>
   <div class="col-xs-4">
         <table id="t1" class="table borderless">
            <tbody id="t1Tbody">
               <tr>
                    <td class="pos text-center">1</td>
                    <td class="name text-center">тотем</td>
                    <td class="count text-center">55</td>
               </tr>
               <tr>
                    <td class="pos text-center">1</td>
                    <td class="name text-center">тотем</td>
                    <td class="count text-center">55</td>
               </tr>
               <tr>
                    <td class="pos text-center">1</td>
                    <td class="name text-center">тотем</td>
                    <td class="count text-center">55</td>
               </tr>
            </tbody>
         </table>
   </div>
   <div class="col-xs-4">
         <table id = "t2" class="table borderless">
            <tbody id="t2Tbody">
               <tr>
                    <td class="pos text-center">1</td>
                    <td class="name text-center">тотем</td>
                    <td class="count text-center">55</td>
               </tr>
               <tr>
                    <td class="pos text-center">1</td>
                    <td class="name text-center">тотем</td>
                    <td class="count text-center">55</td>
               </tr>
               </tbody>
         </table>
      </div>
      <div class="col-xs-4">
         <table id = "t2" class="table borderless">
            <tbody id="t3Tbody">
               <tr>
                    <td class="pos text-center">1</td>
                    <td class="name text-center">тотем</td>
                    <td class="count text-center">55</td>
               </tr>
               <tr>
                  <td class="pos text-center">2</td>
                  <td class="name text-center">Тотем</td>
                  <td class="count text-center">55</td>
               </tr>
               </tbody>
         </table>
      </div>  
</div>
</div>