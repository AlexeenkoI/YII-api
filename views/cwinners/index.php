<?php
/* @var $this yii\web\View */ 
$this->title = 'Командный зачет';
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
function loadData(){
    	$.ajax({
		type:"POST",
		url:"http://localhost/yiilocal/cwinners/ajaxwinners",
		dataType:"html",
        success:function(data){
            
        }
        });
}

$(document).ready(function(){
    loadData();
    setTimeout(function() {
        loadData();
    }, 2000);
})
</script>
<h1 class="text-center">Награждение победителей</h1>
<h3 class="text-center">Командный зачет</h3> 
<body>
<div class="container-fluid">
   <div class="col-xs-6">
      <div class="table-responsive">
         <table id="t1" class="table table-bordered">
            <thead>
               <tr>
                  <th>Место</th>
                  <th>Команда</th>
                  <th>Всего баллов</th>
               </tr>
            <thead>
            <tbody>
               <tr>
                  <td>Two</td>
                  <td>Two</td>
                  <td>Two</td>
            </tbody>
         </table>
      </div>
   </div>
   <div class="col-xs-6">
      <div class="table-responsive">
         <table id = "t2" class="table table-bordered">
            <thead>
               <tr>
                  <th>Место</th>
                  <th>Команда</th>
                  <th>Всего баллов</th>
               </tr>
            <thead>
            <tbody>
               <tr>
                  <td>Two</td>
                  <td>Two</td>
                  <td>Two</td>
         </table>
      </div>
   </div>
</div>

</body>