<?php
/* @var $this yii\web\View */ 
$this->title = 'Маршруты';
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
function appendText(viewport,pos,group,score){
    var insertRow = document.createElement("tr");

    var insertPos = document.createElement("td");
    $(insertPos).addClass("position");
    $(insertPos).addClass("text-center");

    var insertGroup = document.createElement("td");
    $(insertGroup).addClass("team");
    $(insertGroup).addClass("text-center");

    var insertScore = document.createElement("td");
    $(insertScore).addClass("totalscore");
    $(insertScore).addClass("text-center");
    insertPos.innerText = pos;
    insertGroup.innerText = group;
    insertScore.innerText = score;

    $(insertRow).append(insertPos);
    $(insertRow).append(insertGroup);
    $(insertRow).append(insertScore);
    $(viewport).append(insertRow);
}
function loadData(){
    	$.ajax({
		type:"POST",
		url:"http://ds.citrus24.com/view/index",//заменить при переносе на сервер
		dataType:"json",
        success:function(data){
            const viewport1 = "#t1Tbody";
            const viewport2 = "#t2Tbody";
            $(viewport1).empty();
            $(viewport2).empty();
            var pos = 1;
            var tableCounter = 1;
            for(var i = 0; i<data.length; i++){
                if(pos<=data.length / 2){
                    appendText(viewport1,pos,data[i].group,data[i].score);
                    tableCounter++;
                    pos++;
                }else{
                    appendText(viewport2,pos,data[i].group,data[i].score)
                    tableCounter++;
                     pos++;
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
body{
    /*background-image: url('http://ds.citrus24.com/app/images/individualpos.png');*/
    background-image: url(http://ds.citrus24.com/app/images/background.png);
    background-size: 100% 100%;
    background-repeat: no-repeat;
    color: #095764;
    font-weight: bold;
}
/*td{
    font-size:20px;
}*/
/*.row{
    margin-top:26%;
    margin-left:14%;
    
}*/
.table {
    border-bottom:0px !important;
    width:90% !important;
    background-color: rgba(255, 255, 255, 0.3);
    border-color:blue;
}
.table th, .table td {
    border: 1px !important;
    
}
.fixed-table-container {
    border:0px !important;
}
h1,h3{
    width:95%;
    margin-left:0% !important;
    /*color:#000066;*/
}
.row{
    margin-top:5%;
    margin-left:4%;
    
}
th{
    font-size:28px;
    /*color:#000066;*/
}
td {
    font-size:28px;
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
/*.tbl1{
    margin-left:6%;
    margin-right:0%;
}
.tbl2{
    margin-left:4.5%;
    padding-right:8%;
    padding-top:1.5vh;
}*/

.row h1 {
    font-size: 45px;
    font-weight: 700;
}
.row h3 {
    font-size: 32px;
}
</style>
<div class="container-fluid">
<!--<div id="logo" class="">
<image src="http://ds.citrus24.com/app/images/logo.png" class="img-fluid center-block" width="350" height="350"/>
</div>-->
<div class="row">

<h1 class="text-center">Текущее положение</h1>
<h3 class="text-center">Командный зачет</h3>
   <div class="col-xs-6">
         <table id="t1" class="table borderless">
            <tr>
                <th class="text-center">Место</th>
                <th class="text-center">Команда</th>
                <th class="text-center">Баллы</th>
            </tr>
            <tbody id="t1Tbody">
               <tr>
                  <td class="position text-center">Two</td>
                  <td class="team text-center">Two</td>
                  <td class="totalscore text-center">Two</td>
               </tr>
               <tr>
                  <td class="position text-center">Two</td>
                  <td class="team text-center">Two</td>
                  <td class="totalscore text-center">Two</td>
               </tr>
               <tr>
                  <td class="position text-center">Two</td>
                  <td class="team text-center">Two</td>
                  <td class="totalscore text-center">Two</td>
               </tr>
            </tbody>
         </table>
</div>
   <div class="col-xs-6">
         <table id = "t2" class="table borderless">
            <tr>
                <th class="text-center">Место</th>
                <th class="text-center">Команда</th>
                <th class="text-center">Очки</th>
            </tr>
            <tbody id="t2Tbody">
               <tr>
                  <td class="position text-center">Two</td>
                  <td class="team text-center">Two</td>
                  <td class="totalscore text-center">Two</td>
               </tr>
               <tr>
                  <td class="position text-center">Two</td>
                  <td class="team text-center">Two</td>
                  <td class="totalscore text-center">Two</td>
               </tr>
               <tr>
                  <td class="position text-center">Two</td>
                  <td class="team text-center">Two</td>
                  <td class="totalscore text-center">Two</td>
               </tr>
               </tbody>
         </table>
      </div>
</div>
</div>