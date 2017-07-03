<?php
/* @var $this yii\web\View */ 
$this->title = 'Индивидуальный зачет';
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
function appendText(viewport,pos,name,score){
    var insertRow = document.createElement("tr");
    var insertPos = document.createElement("td");
    var insertTeam = document.createElement("td");
    var insertScore = document.createElement("td");

    $(insertPos).addClass("position");
    $(insertPos).addClass("text-center");
    insertPos.innerText=pos;

    $(insertName).addClass("name");
    $(insertName).addClass("text-center");
    insertName.innerText=team;

    $(insertScore).addClass("score");
    $(insertScore).addClass("text-center");
    insertScore.innerText=score;

    $(insertRow).append(insertPos);
    $(insertRow).append(insertName);
    $(insertRow).append(insertScore);

    $(table).append(insertRow);
}
function loadData(){
    	$.ajax({
		type:"POST",
		url:"",//заменить при переносе на сервер
		dataType:"json",
        success:function(data){
            const vewport = "#t1Tbody";
            $(vewport).empty();
            var pos = 1;
            $(".imgfirst").attr('src',src1);
            $(".imgsecond").attr('src',src2);
            $(".imgthird").attr('src',src3);
            for(var i = 3; i<data.length; i++){  
                appendText(viewport,pos,data[i].name,data[i].score);          
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
    /*background-image: url('http://194.67.194.82/app/images/individualwin.png');*/
    background-image: url(http://yii.local/app/images/individualwin.png);
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
    margin-top:21%;
    margin-left:52%;
    margin-right:6%;
}
.imgfirst{
    position:absolute;
    left:21.5vw;
    bottom:34vh;
    width:300px;
    height:300px;
}
.imgsecond{
    position:absolute;
    left:9vw;
    bottom:25vh;
    width:300px;
    height:300px;
}
.imgthird{
    position:absolute;
    left:31vw;
    bottom:28vh;
    width:300px;
    height:300px;
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
<div class="imgfirst">
<img src="http://yii.local/app/images/tiger.png" alt="Первое место" class="img-rounded place">
</div>
<div class="imgsecond">
<img src="http://yii.local/app/images/zebra.png" alt="Второе место" class="img-rounded place">
</div>
<div class="imgthird">
<img src="http://yii.local/app/images/elephant.png" alt="Третье место" class="img-rounded place">
</div>