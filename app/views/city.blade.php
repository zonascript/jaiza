@extends('usermain')

@section('pageName')

شہر

@stop

@section('content')
<script>
    

$(document).ready(function(){
updateTable();
    $("#btn1").click(function(){
        var cityName = $("#myField").val();
       
        $.post("City",
        {
         
          name: cityName
        },
        function(data,status){
         updateTable();
                
         alert("Data: " + data + "\nStatus: " + status);
            
        });

       
    });
    
   




});


function updateCity( ID){
   var cityName = $("#mycity"+ID).val();
     
    $.post("updateCity",
        {
         city_ID: ID,
         btn:'Update',
          name: cityName
        },
        function(data,status){
            updateTable();
                
            alert("Data: " + data + "\nStatus: " + status);
            
        });
    
}

function deleteCity( ID){
   
    $.post("updateCity",
        {
         city_ID: ID,
         btn:'Delete'
        },
        function(data,status){
            updateTable();    
            alert("Data: " + data + "\nStatus: " + status);
             
            
        });
    
}

function updateTable(){
    $("#cityTable").load("cityTable");

}

</script>
<div style="width:88%; margin-left: auto; margin-right: auto;">

    <table style="width:100%;">
        <tr>
                            
                               <div class="control-group">
         <td>                                 <label class="control-label" for="focusedInput">شہر</label>
         </td>
         <td>                                 <div class="controls">
                                              <input id="myField" type="text" placeholder="شہر کا نام داخل  کریں" name="city"/>
                                                </div>
         </td>
                              
    </tr>
    <tr><td colspan="3">
<div class="form-actions">
                                        
                                          <button id="btn1" class="btn btn-primary" >درج کریں</button> 
                                        </div>     
        </td>                  
    </tr>                          
 
                             

</table>

</div>

@stop

@section('content2')
                      
                                        <div id="cityTable">
                                      
                                        </div>
                  

@stop