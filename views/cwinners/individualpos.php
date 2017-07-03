<?php
/* @var $this yii\web\View */ 
$this->title = 'Индивидуальное положение';
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
function appendText(viewport,pos,name,score){
    var insertRow = document.createElement("tr");

    var insertPos = document.createElement("td");
    $(insertPos).addClass("position");
    $(insertPos).addClass("text-center");

    var insertName = document.createElement("td");
    $(insertName).addClass("name");
    $(insertName).addClass("text-center");

    var insertScore = document.createElement("td");
    $(insertScore).addClass("totalscore");
    $(insertScore).addClass("text-center");

    insertPos.innerText = pos;
    insertName.innerText = name;
    insertScore.innerText = score;

    $(insertRow).append(insertPos);
    $(insertRow).append(insertName);
    $(insertRow).append(insertScore);
    $(viewport).append(insertRow);
}
function loadData(){
    	$.ajax({
		type:"POST",
		url:"http://194.67.194.82/view/user",//заменить при переносе на сервер
		dataType:"json",
        success:function(data){
            const viewport1 = "#t1Tbody";
            const viewport2 = "#t2Tbody";
            $(viewport1).empty();
            $(viewport2).empty();
            var pos = 1;
            var tableCounter = 1;
            var maxForTable = data.length/2;
            for(var i = 0; i<data.length; i++){
                if(tableCounter<=maxForTable){
                    appendText(viewport1,pos,data[i].name,data[i].score);
                    tableCounter++;
                }else{
                    appendText(viewport2,pos,data[i].name,data[i].score)
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
    background-image: url(http://194.67.194.82/app/images/individual.png);
    /*background-image: url(http://yii.local/app/images/individual.png);*/
    background-size: 100% 100%;
    background-repeat: no-repeat;
}
.row{
    margin-top:26.5%;
    margin-left:1%;
    
}
.tbl2{
    margin-left:4.5%;
    padding-right:8%;
    padding-top:1.5vh;
}

.table {
    border-bottom:0px !important;
}
.table th, .table td {
    border: 1px !important;
}

.fixed-table-container {
    border:0px !important;
}
td{
    font-size:22px;
}
.tbl1{
    margin-left:7%;
}
</style>
<div class="container-fluid">
<div class="row">
   <div class="col-xs-5 tbl1">
         <table id="t1" class="table borderless">
            <tbody id="t1Tbody">
               <tr>
                  <td class="position text-center">Two</td>
                  <td class="name text-center">Two</td>
                  <td class="totalscore text-center">Two</td>
               </tr>
               <tr>
                  <td class="position text-center">Two</td>
                  <td class="name text-center">Two</td>
                  <td class="totalscore text-center">Two</td>
               </tr>
               <tr>
                  <td class="position text-center">Two</td>
                  <td class="name text-center">Two</td>
                  <td class="totalscore text-center">Two</td>>
               </tr>
            </tbody>
         </table>
   </div>
   <div class="col-xs-5 tbl2">
         <table id = "t2" class="table borderless">
            <tbody id="t2Tbody">
               <tr>
                  <td class="position text-center">Two</td>
                  <td class="name text-center">Two</td>
                  <td class="totalscore text-center">Two</td>
               </tr>
               <tr>
                  <td class="position text-center">Two</td>
                  <td class="name text-center">Two</td>
                  <td class="totalscore text-center">Two</td>
               </tr>
               </tbody>
         </table>
      </div>
</div>
</div>