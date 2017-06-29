<?php
/* @var $this yii\web\View */ 
$this->title = 'Индивидуальный зачет';
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
function appendText(table,pos,name,team,score){
    var insertRow = document.createElement("tr");
    var insertPos = document.createElement("td");
    var insertName = document.createElement("td");
    var insertTeam = document.createElement("td");
    var insertScore = document.createElement("td");

    $(insertPos).addClass("position");
    $(insertPos).addClass("text-center");
    insertPos.innerText=pos;
    
    $(insertName).addClass("name");
    $(insertName).addClass("text-center");
    insertName.innerText=name;

    $(insertTeam).addClass("team");
    $(insertTeam).addClass("text-center");
    insertTeam.innerText=team;

    $(insertScore).addClass("score");
    $(insertScore).addClass("text-center");
    insertScore.innerText=score;

    $(insertRow).append(insertPos);
    $(insertRow).append(insertName);
    $(insertRow).append(insertTeam);
    $(insertRow).append(insertScore);

    $(table).append(insertRow);
}
function loadData(){
    	$.ajax({
		type:"POST",
		url:"",//заменить при переносе на сервер
		dataType:"json",
        success:function(data){
            const table1 = "#t1Tbody";
            const table2 = "#t2Tbody";
            $(table1).empty();
            $(table2).empty();
            var position = 1;
            var tableCounter = 0;
            var maxForTable = data.length/2;
            for(var i = 0; i<data.length; i++){
                if(tableCounter>=12){
                    break;
                }else{
                    if(tableCounter<=maxForTable){
                        appendText(table1,position,data[i].name,data[i].group,data[i].money);
                        position
                        tableCounter++;
                    }else{
                        appendText(table2,position,data[i].name,data[i].group,data[i].money)
                        position++;
                        tableCounter++;
                    }
                }
            }

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
    background-image: url('http://yii.local/app/images/individualwin.png');
    background-size: 100% 100%;
    background-repeat: no-repeat;
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
th{
    font-size:24px;
}
td{
    font-size:24px;
}

.row{
    margin-top:24%;
    margin-left:52%;
    margin-right:6%;
}
</style>
<div class="container-fluid">
<div class="row">
   <div class="col-xs-12 offset3">
         <table id="t1" class="table borderless">
            <tbody id="t1Tbody">
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
