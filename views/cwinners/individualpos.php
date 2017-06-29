<?php
/* @var $this yii\web\View */ 
$this->title = 'Индивидуальное положение';
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    
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
    background-image: url('http://yii.local/app/images/teampos.png');
    background-size: 100% 100%;
    background-repeat: no-repeat;
}
.row{
    margin-top:30%;
    margin-left:1%;
    
}
.tbl2{
    margin-left:-2%;
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
    font-size:24px;
}
</style>
<div class="container-fluid">
<div class="row">
   <div class="col-xs-6">
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
   <div class="col-xs-6 tbl2">
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