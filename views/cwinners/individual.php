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
		url:"http://ds.citrus24.com/view/user<?php echo $ANEX; ?>",//заменить при переносе на сервер
		dataType:"json",
        success:function(data){
            const firstpos = ".imgfirst";
            const secondpos = ".imgsecond";
            const thirdpos = ".imgthird";
            $(firstpos).append(data[0].name);
            $(secondpos).append(data[1].name);
            $(thirdpos).append(data[2].name);
            $(firstpos + ".score").append(data[0].score);
            $(secondpos + ".score").append(data[1].score);
            $(thirdpos + ".score").append(data[2].score);
            const viewport = "#t1Tbody";
            $(viewport).empty();
            var pos = 4;
            // $(".imgfirst").attr('src',src1);
            // $(".imgsecond").attr('src',src2);
            // $(".imgthird").attr('src',src3);
            final = data.length;
            if (final > 10) final = 10;
            for(var i = 3; i<final; i++){  
                appendText(viewport,pos,data[i].name,data[i].score);
                pos++;          
            }
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
    font-size:28px;
}
td{
    font-size:30px;
}
.row{
    margin-top:5%;
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
    top: -75px;
    left: 242px;
    text-align: center;
    width: 200px;
    font-size: 30px;
}


.imgsecond {
    position: absolute;
    left: 462px;
    top: -9px;
    font-size: 30px;
    text-align: center;
    width: 200px;
}


.imgthird {
    position: absolute;
    width: 200px;
    top: 43px;
    left: 18px;
    font-size: 30px;
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
    width: 680px;
    position: absolute;
    top: 400px;
    left: 70px;
}
.score {
    margin-top:40px;
}
.row h1 {
    font-size: 45px;
}
.row h2 {
    font-size: 28px;
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

<div class="posfirst">
    <img src="http://ds.citrus24.com/app/images/tumbs.png" class="img-fluid center-block">

    <div class="imgfirst text-center">
    </div>
    <div class="imgfirst score sif"></div>

    <div class="imgsecond text-center">
    </div>
    <div class="imgsecond score sis"></div>

    <div class="imgthird text-center">
    </div>
    <div class="imgthird score sith"></div>

</div>

</body>