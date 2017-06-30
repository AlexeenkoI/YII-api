<?php
/* @var $this yii\web\View */ 
$this->title = 'Маршруты';
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
function appendText(pos,name,count){
    var insertRow = document.createElement("tr");
    var insertName = document.createElement("td");
    $(insertName).addClass("name");
    $(insertName).addClass("text-center");
    var insertCount = document.createElement("td");
    $(insertCount).addClass("count");
    $(insertCount).addClass("text-center");
    if(count == 0){
        $(insertCount).addClass("warn");
    }
    insertName.innerText = name;
    insertCount.innerText = count;
    $(insertRow).append(insertName);
    $(insertRow).append(insertCount);
    $(pos).append(insertRow);
}
function loadData(){
    	$.ajax({
		type:"POST",
		url:"http://194.67.194.82/route/getajaxroute",//заменить при переносе на сервер
		dataType:"json",
        success:function(data){
            const pos1 = "#t1Tbody";
            const pos2 = "#t2Tbody";
            $(pos1).empty();
            $(pos2).empty();
            var tableCounter = 1;
            var maxForTable = data.length/2;
            for(var i = 0; i<data.length; i++){
                if(tableCounter<=maxForTable){
                    appendText(pos1,data[i].name,data[i].capacity);
                    tableCounter++;
                }else{
                    appendText(pos2,data[i].name,data[i].capacity)
                }
            }
                //console.log(data[0].capacity);
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
.warn{
    color:red !important;
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
body{
    background-image: url('http://194.67.194.82/app/images/route22.jpg');
    background-size: 100% 100%;
    background-repeat: no-repeat;
    
}
.name{
    background-image: url('http://194.67.194.82/app/images/routename.png');
    background-size:95% 85%;
    background-repeat: no-repeat;
    font-size:35px;
    color:#191970;
    background-position:bottom 10px;
}
.count{
    background-image: url('http://194.67.194.82/app/images/routecount.png');
    background-size:100% 85%;
    background-repeat: no-repeat;
    font-size:35px;
    color:#191970;
}

.row{
    margin-top:20%;
    margin-left:14%;
    
}

</style>

<div class="container-fluid">
<div class="row">
   <div class="col-xs-5">
         <table id="t1" class="table borderless">
            <tbody id="t1Tbody">
               <tr>
                  <td class="name text-center">Название маршрута555</td>
                  <td class="count text-center">55</td>
               </tr>
               <tr>
                  <td class="name text-center">Название маршрута555</td>
                  <td class="count text-center">55</td>
               </tr>
               <tr>
                  <td class="name text-center">Название маршрута555</td>
                  <td class="count text-center">55</td>
               </tr>
            </tbody>
         </table>
   </div>
   <div class="col-xs-5">
         <table id = "t2" class="table borderless">
            <tbody id="t2Tbody">
               <tr>
                    <td class="name text-center">Название маршрута 666</td>
                    <td class="count text-center">55</td>
               </tr>
               <tr>
                  <td class="name text-center">Название маршрута555</td>
                  <td class="count text-center">55</td>
               </tr>
               </tbody>
         </table>
      </div>
</div>
</div>