<?php
/* @var $this yii\web\View */ 
$this->title = 'Маршруты';
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
function appendText(viewport,pos,totem,score){
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
    insertPos.innerText = pos;
    insertTotem.innerText = totem;
    insertScore.innerText = score;

    $(insertRow).append(insertPos);
    $(insertRow).append(insertTotem);
    $(insertRow).append(insertScore);
    $(viewport).append(insertRow);
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
                       var score = data[i].p1+data[i].p2+data[i].p3;
                       appendText(viewport1,pos,data[i].name,score);
                       tableCounter++;
                       pos++;
                   }
                   if(tableCounter>7 && tableCounter<=14){
                       var score = data[i].p1+data[i].p2+data[i].p3;
                       appendText(viewport2,pos,data[i].name,score);
                       tableCounter++;
                       pos++;
                   }
                   if(tableCounter>14){
                       var score = data[i].p1+data[i].p2+data[i].p3;
                       appendText(viewport3,pos,data[i].name,score);
                       tableCounter++;
                       pos++;
                   }
                   if(pos>21&&tableCounter>21){
                       pos = 1;
                       tableCounter = 1;
                   }
            }
            setTimeout(function(){
                loadData()
            },2000);
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
    width:85%;
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
    background:url(http://ds.citrus24.com/app/images/placetest.png);
    background-repeat:no-repeat;
    background-position:center;
    background-size:60% 90%;
    width:4%;
}
.totem{
    background:url(http://ds.citrus24.com/app/images/coubtotem.png);
    background-size:90% 85%;
    background-position:center;
    background-repeat:no-repeat;
    width:15%;
}

.score{
    color:#000066;
    background:url(http://ds.citrus24.com/app/images/coubscore.png);
    background-size:60% 90%;
    background-position:center;
    background-repeat:no-repeat;
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
<div id="logo" class="text-center">
<image src="http://ds.citrus24.com/app/images/logo.png" class="img-fluid center-block" width="350" height="350"/>
</div>
<div class="row text-center">
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