<?php
/* @var $this yii\web\View */ 
$this->title = 'Командный зачет';
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
function totems(pos,name,score){
    var totem = [
        'http://ds.citrus24.com/app/images/antilopa.png',
        'http://ds.citrus24.com/app/images/bear.png',
        'http://ds.citrus24.com/app/images/behemot.png',
        'http://ds.citrus24.com/app/images/cobra.png',
        'http://ds.citrus24.com/app/images/crocodile.png',
        'http://ds.citrus24.com/app/images/elephant.png',
        'http://ds.citrus24.com/app/images/enot.png',
        'http://ds.citrus24.com/app/images/flamingo.png',
        'http://ds.citrus24.com/app/images/giraf.png',
        'http://ds.citrus24.com/app/images/letmish.png',
        'http://ds.citrus24.com/app/images/lion.png',
        'http://ds.citrus24.com/app/images/monkey.png',
        'http://ds.citrus24.com/app/images/nosorog.png',
        'http://ds.citrus24.com/app/images/parrot.png',
        'http://ds.citrus24.com/app/images/tiger.png',
        'http://ds.citrus24.com/app/images/wolf.png',
    ];
    var val = 0;
    switch (name){
        case 'Антилопы': val = totem[0]; break;
        case 'Медведи' : val = totem[1]; break;
        case 'Бегемоты': val = totem[2]; break;
        case 'Кобры' : val = totem[3];  break;
        case 'Крокодилы': val = totem[4]; break;
        case 'Слоны': val = totem[5]; break;
        case 'Еноты': val = totem[6]; break;
        case 'Фламинго': val = totem[7]; break;
        case 'Жирафы' : val = totem[8]; break;
        case 'Летучие мыши' : val = totem[9]; break;
        case 'Львы' : val = totem[10]; break;
        case 'Обезьяны' : val = totem[11]; break;
        case 'Носороги' : val = totem[12]; break;
        case 'Попугаи' : val = totem[13]; break;
        case 'Тигры' : val = totem[14]; break;
        case 'Волки' : val = totem[15]; break;
    }
    if(pos==1){
        $(".if").attr('src',val);
        $(".sif").html(score);
    }else if(pos==2){
        $(".is").attr('src',val);
        $(".sis").html(score);
    }else if(pos==3){
        $(".ith").attr('src',val);
        $(".sith").html(score);
    }
}
function appendText(viewport,pos,team,score){
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
    $(insertRow).append(insertTeam);
    $(insertRow).append(insertScore);

    $(viewport).append(insertRow);
}
function loadData(){
    	$.ajax({
		type:"POST",
		url:"http://ds.citrus24.com/view/index",//заменить при переносе на сервер
		dataType:"json",
        success:function(data){
            console.log(data);
            const viewport = "#t1Tbody";
            var counter = 0
            var tableCounter = 13;
            $(viewport).empty();
            var pos = 4;
            totems(1,data[0].group, data[0].score);
            totems(2,data[1].group, data[1].score);
            totems(3,data[2].group, data[2].score);
             //$(".if").attr('src','http://ds.citrus24.com/app/images/tiger.png');
            // $(".imgsecond").attr('src',src2);
            // $(".imgthird").attr('src',src3);
            final = data.length;
            if (final > 10) final = 10;
            for(var i = 3; i<final; i++){  
            var tableCounter = 8;
                if(counter<=tableCounter){
                appendText(viewport,pos,data[i].group,data[i].score);
                counter++;
                pos++;          
                }
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
#w0{
    width:100%;
}
tr{

}
th{
    font-size:28px;
}
td{
    font-size:36px;
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
    top: -245px;
    left: 242px;
    text-align: center;
    width: 200px;
    font-size: 23px;
}


.imgsecond {
    position: absolute;
    left: 462px;
    top: -149px;
    font-size: 23px;
    text-align: center;
    width: 200px;
}


.imgthird {
    position: absolute;
    width: 200px;
    top: -87px;
    left: 18px;
    font-size: 23px;
    text-align: center;
}

#logo{
    width:4%;
    max-width:5%;
    height:40px;
    left:62%;
    margin-right:40%;
    margin-top: 2vh;
    margin-bottom:0%;

    position:relative
}
.posfirst {
    text-align: center;
    width: 680px;
    position: absolute;
    top: 400px;
    left: 70px;
}

.score {
    text-align: center;
    width: 200px;
    font-size: 23px;
}

</style>
<body>
<div class="container-fluid">
<!--<div id="logo" class="">
<image src="http://ds.citrus24.com/app/images/logo.png" class="img-fluid center-block" width="350" height="350"/>
</div>-->
<div class="row">
<h1 class="text-center">Награждение победителей</h1>
<h3 class="text-center">Командный зачет</h3>
   <div class="col-xs-12 offset3 tbl1">
         <table id="t1" class="table borderless">
         <thead>
         <tr>
         <th class="text-center">Место</th>
         <th class="text-center">Команда</th>
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
</div>
</div>

<div class="posfirst">
    <img src="http://ds.citrus24.com/app/images/tumbs.png" class="img-fluid center-block">

    <div class="imgfirst text-center">
        <img src="" alt="Первое место" class="img-rounded place img-fluid if center-block">
        <div class="score sif"></div>
    </div>

    <div class="imgsecond text-center">
        <img src="" alt="Второе место" class="img-rounded is place " style="margin-bottom: 10px;">
        <div class="score sis"></div>
    </div>

    <div class="imgthird text-center">
        <img src="" alt="Третье место" class="img-rounded ith place">
        <div class="score sith"></div>
    </div>

</div>





</body>
