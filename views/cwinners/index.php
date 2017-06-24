<?php
/* @var $this yii\web\View */ 
$this->title = 'Командный зачет';
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
function appendText(table,pos,team,score){
    var insertRow = document.createElement("tr");
    var insertPos = document.createElement("td");
    var insertTeam = document.createElement("td");
    var insertScore = document.createElement("td");

    $(insertPos).addClass("position");
    $(insertPos).addClass("text-center");
    insertPos.innerText=pos;

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
                        appendText(table1,position,data[i].group,data[i].money);
                        position
                        tableCounter++;
                    }else{
                        appendText(table2,position,data[i].group,data[i].money)
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
th{
    font-size:35px;
}
td{
    font-size:35px;
}
</style>
<h1 class="text-center">Награждение победителей</h1>
<h3 class="text-center">Командный зачет</h3> 
<body>
<div class="container-fluid">
   <div class="col-md-6">
      <div class="table-responsive">
         <table id="t1" class="table">
            <thead>
               <tr>
                  <th class="text-center">Место</th>
                  <th class="text-center">Команда</th>
                  <th class="text-center">Баллы</th>
               </tr>
            <thead>
            <tbody id="t1Tbody">
               <tr>
                  <td class="position text-center">Two</td>
                  <td class="team text-center">Two</td>
                  <td class="totalscore text-center">Two</td>
            </tbody>
         </table>
      </div>
   </div>
   <div class="col-md-6">
      <div class="table-responsive">
         <table id = "t2" class="table">
            <thead>
               <tr>
                  <th class="text-center">Место</th>
                  <th class="text-center">Команда</th>
                  <th class="text-center">Баллы</th>
               </tr>
            <thead>
            <tbody id="t2Tbody">
               <tr>
                  <td class="position text-center">Two</td>
                  <td class="team text-center">Two</td>
                  <td class="totalscore text-center">Two</td>
         </table>
      </div>
   </div>
</div>

</body>