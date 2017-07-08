<?php
/* @var $this yii\web\View */ 
$this->title = 'Индивидуальный зачет';
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
function appendText(viewport,pos,name,score){
    var insertRow = document.createElement("tr");
    var insertPos = document.createElement("td");
    var insertName = document.createElement("td");
    var insertScore = document.createElement("td");

    $(insertPos).addClass("position");
    $(insertPos).addClass("text-center");
    insertPos.innerText=pos;

    $(insertName).addClass("name");
    $(insertName).addClass("text-center");
    insertName.innerText=name;

    $(insertScore).addClass("score");
    $(insertScore).addClass("text-center");
    insertScore.innerText=score;

    $(insertRow).append(insertPos);
    $(insertRow).append(insertName);
    $(insertRow).append(insertScore);

    $(viewport).append(insertRow);
}
function loadData(){
    	$.ajax({
		type:"POST",
		url:"http://ds.citrus24.com/view/user",//заменить при переносе на сервер
		dataType:"json",
        success:function(data){
            const firstpos = ".imgfirst";
            const secondpos = ".imgsecond";
            const thirdpos = ".imgthird";
            $(firstpos).append(data[0].name);
            $(secondpos).append(data[1].name);
            $(thirdpos).append(data[2].name);
            const viewport = "#t1Tbody";
            $(viewport).empty();
            var pos = 3;
            // $(".imgfirst").attr('src',src1);
            // $(".imgsecond").attr('src',src2);
            // $(".imgthird").attr('src',src3);
            for(var i = 3; i<data.length; i++){  
                appendText(viewport,pos,data[i].name,data[i].score);
                pos++;          
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
    /*background-image: url('http://ds.citrus24.com/app/images/command.png');*/
    background-image: url('http://ds.citrus24.com/app/images/background.png');
    background-size: 100% 100%;
    background-position:center;
    background-repeat: no-repeat;
    color: #095764;
    font-weight: bold;

}
.table {
    border-bottom:0px !important;
    background-color: rgba(255, 255, 255, 0.3);
}
.table th, .table td {
    border: 1px !important;
}
.fixed-table-container {
    border:px !important;
}
tr{

}
th{
    font-size:25px;
}
td{
    font-size:20px;
}
.row{
    margin-top:10%;
    margin-left:51%;
    margin-right:6%;
}
.appendTexttbl{
    padding-left:5vh;
    padding-right:3%;
    width:34% !important;
    margin-left:3vh !important;
}
.place{
    width:100%;
    height:100%;
}
.imgfirst {
    position: absolute;
    bottom: 35px;
    width: 100px;
    height: 300px;
    top: 325px;
    left: 470px;
    font-size: 25px;
    text-align: center;
}


.imgsecond {
    position: absolute;
    width: 300px;
    height: 300px;
    left: 135px;
    top: 480px;
    font-size: 25px;
    text-align: center;
}


.imgthird {
    position: absolute;
    width: 300px;
    height: 300px;
    top: 420px;
    left: 600px;
    font-size: 25px;
    text-align: center;
}


#logo{
    /*width:4%;
    max-width:5%;
    height:40px;*/
    margin-left:62% !important;
    margin-right:10%;
    margin-top: 2vh;
    margin-bottom:0%;
    /*display:inline;*/
    position:relative;
}
.posfirst {
    text-align: center;
    width: 50%;
    position: absolute;
    top: 400px;
    left: 40px;
}
</style>
<body>
<div class="container-fluid">
<!--<image id ="logo" src="http://ds.citrus24.com/app/images/logo.png" class="img-fluid center-block" width="350" height="350"/>-->
<div class="row">
<h1 class="text-center">Награждение победителей</h1>
<h3 class="text-center">Индивидуальный зачет</h3>
   <div class="col-xs-12 offset3 tbl1">
         <table id="t1" class="table borderless">
         <thead>
         <tr>
         <th class="text-center">Место</th>
         <th class="text-center">Имя</th>
         <th class="text-center">Баллов</th>
         </tr>
         </thead>
            <tbody id="t1Tbody">
               <tr>
                  <td class="position text-center">Two</td>
                  <td class="group text-center">Two</td>
                  <td class="totalscore text-center">Two</td>
                  </tr>
            </tbody>
         </table>
    </div>
</div>
</div>>
</div>
<div class="imgfirst text-center">
<!--<img src="http://ds.citrus24.com/app/images/tiger.png" alt="Первое место" class="img-rounded place img-fluid center-block">-->
</div>
    <div class="posfirst">
        <img src="http://ds.citrus24.com/app/images/tumbs.png" class="img-fluid center-block">
    </div>
<div class="imgsecond text-center">
<!--<img src="http://ds.citrus24.com/app/images/zebra.png" alt="Второе место" class="img-rounded place ">-->
    <!--<div class="posthird">
        <img src="http://yii.local/app/images/pos3.png" class="img-fluid center-block">
    </div>-->
</div>
<div class="imgthird text-center">
<!--<img src="http://ds.citrus24.com/app/images/elephant.png" alt="Третье место" class="img-rounded place">-->
    <!--<div class="posecond">
        <img src="http://yii.local/app/images/pos2.png" class="img-fluid center-block">
    </div>-->
</div>
</body>