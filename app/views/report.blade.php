﻿@extends('usermain')

@section('pageName')

رپورٹ
@stop

@section('content')
<script>
    

$(document).ready(function(){
updateTable('{{Input::get('date')}}');
//loadAll();
    $("#btn1").click(function(){
       
   //       alert("ss");     
       
       addAll();
        

       
    });
    
   




});
 function addAll(){
     
     @foreach($prs as $pr)
            @foreach($newspapers as $newspaper)
           
            
                    add({{$newspaper->ID}},{{$pr->pr_ID}} );
             
            @endforeach
    @endforeach
            
       alert("Sucessfully Added");
       updateTable('{{Input::get('date')}}');

 }
    function add(npID,prID){
                var col = $("#co"+prID+"l"+npID).val();
                      var pg = $("#p"+prID+"g"+npID).val();
//alert(""+npID+"ss"+prID);
              $.post("Report",
                     {
                         
                         npID:npID,
                         prID:prID,
                         pg:pg,
                         cl:col



                     },
                     function(data,status){
                 

                      //alert("Data: " + data + "\nStatus: " + status);

                     });

 
     } 
 function loadAll(){
     @foreach($prs as $pr)
            @foreach($newspapers as $newspaper)
           
            
                    load({{$newspaper->ID}},{{$pr->pr_ID}} );
             
            @endforeach
       @endforeach
            
     
 }   
 function load(npID,prID){
     
      var col = "";
       var pg = "";
      
        $.get("getCol?npID="+npID+"&prID="+prID, function(data, status){
            col = data;
        });
        $.get("getPg?npID="+npID+"&prID="+prID, function(data, status){
            pg = data;
         });
      $("#co"+prID+"l"+npID).val(col);
       $("#p"+prID+"g"+npID).val(pg);
      
 }
 
function updateTable(date){

     $("#reportTable").load("reportTable?date="+date);

}
function report(){

         var date = $("#date01").val();
//    updateTable(date);

	window.open("Report?date="+date,'_self');
	
	
}
</script>
<div style="width:80%; margin-left: auto; margin-right: auto;">

     <div class="control-group" >
                                          <label class="control-label" for="date01">تاریخ ان پٹ</label>
                                          <div class="controls">
                                            <input name="date" type="text" class="input-xlarge datepicker" id="date01" value="{{$date1}}">
                                            <button onclick="report()">رپورٹ حاصل</button>
                                          </div>    
                                        </div>
<div class="form-actions">
                                        
                                          <button id="btn1" class="btn btn-primary">رپورٹ شامل کریں</button>
                                        </div>     
</div>
                           
                                 
    
    
    
    
    
                             





@stop
@section('content2')

<div id="reportTable">
    
    
</div>      
@stop