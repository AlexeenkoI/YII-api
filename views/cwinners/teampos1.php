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
		url:"http://ds.citrus24.com/view/kubik",//заменить при переносе на сервер
		dataType:"json",
        success:function(data){
            var table = $('#tablebodythis');
            table.html("");
            for (var i = 0; i < data.length; i++) {
                var tr = $("<tr>");

                var tdname = $("<td>");
                var tdp1 = $("<td>");
                var tdp2 = $("<td>");
                var tdp3 = $("<td>");

                tdname.html(data[i].name);
                tdp1.html(data[i].p1);
                tdp2.html(data[i].p2);
                tdp3.html(data[i].p3);

                tr.append(tdname);
                tr.append(tdp1);
                tr.append(tdp2);
                tr.append(tdp3);

                table.append(tr);
                
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
    background-image: url('http://ds.citrus24.com/app/images/individualpos.png');
    /*background-image: url(http://yii.local/app/images/individualpos.png);*/
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
}
.table th, .table td {
    border: 1px !important;
}
.fixed-table-container {
    border:0px !important;
}
.row{
    margin-top:26.5%;
    margin-left:1%;
    
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
</style>
<div class="container-fluid">
<div class="row">
   <table style="width:100%;">
        <tr>
            <th>Комманда</th>
            <th>Кубик 1</th>
            <th>Кубик 2</th>
            <th>Кубик 3</th>
        </tr>
        <tbody id="tablebodythis">

        </tbody>
   </table>
</div>
</div>