<script>
    function reverse(){
    var pre = $("#tpre").val();

  var url = "pressReleaseTable?pre="+pre+"&btn=<";

     $("#prTable").load(url);
 
   
}
function forward(){
    var pre = $("#tpre").val();
    
     $("#prTable").load("pressReleaseTable?pre="+pre+"&btn=>");
   
}
    function deletePressRelease(pr_ID){
        
           $.post("deletePressRelease",
        {
         pr_ID: pr_ID
        },
        function(data,status){
            updateTable();    
            
        alert("Data: " + data + "\nStatus: " + status);
             
            
        });
        
    }
    
    </script>
    <center>
                     <button name="btn" onclick="forward()" value="<" class="btn btn-white btn-navi btn-navi-left ml5" type="button"><</button>
                           
                    {{$tdate}}         
                    <button name="btn" onclick="reverse()" value=">" class="btn btn-white btn-navi btn-navi-left ml5" type="button">></button>               
               
                    <form>
                    <input type="hidden" id="tpre" value="{{$pre}}" />
                    <input type="hidden" id="tdate" value="{{$tdate}}" />
                    </form>
    </center>
<table style="width:80%; margin-left: auto; margin-right: auto;" aria-describedby="example2_info" class="table table-striped table-bordered dataTable" id="example2" border="0" cellpadding="0" cellspacing="0">
                                        <thead>
                                            <tr role="row">
                                               <th aria-label="Engine version: activate to sort column ascending" style="width: 142px;" colspan="1" rowspan="1" aria-controls="example2" tabindex="0" role="columnheader" class="sorting">تاریخ  </th>
                                           
                                                <th aria-label="Engine version: activate to sort column ascending" style="width: 142px;" colspan="1" rowspan="1" aria-controls="example2" tabindex="0" role="columnheader" class="sorting">عنوان </th>
                                                <th aria-label="Engine version: activate to sort column ascending" style="width: 142px;" colspan="1" rowspan="1" aria-controls="example2" tabindex="0" role="columnheader" class="sorting">
ایکشن </th>
                                            
                                            </tr>
                                        </thead>
                                        
                                    <tbody aria-relevant="all" aria-live="polite" role="alert">
                                        
                                        @foreach($prs as $pr)
                                        <tr class="gradeA odd">
                                         
                                                
                                               <td class=" ">{{$pr->date}}</td>
                                               <td class=" ">{{$pr->title}}</td>
                                                
                                               <td class=" ">
                                                 
        
                                                     <button onclick="deletePressRelease({{$pr->pr_ID}})"  class="btn btn-danger">
خارج کر دیں</button>
                                                
                                                 </td>
                                              
                                         </tr>
                                         @endforeach
        </tbody></table>
          