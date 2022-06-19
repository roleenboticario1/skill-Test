@extends('layouts.app-master')

@section('content')  
        @auth
           <h1>Product(s)</h1>
          <table class="table table-bordered">
           <thead>
            <tr>
                <th>No</th>
                <th>user Type</th>
                <th>User</th>
                <th>Auditable Type</th>
                <th>Auditable Id</th>
                <th>Old Values</th>
                <th>New Values</th>
                <th>Url</th>
                <th>User Agent</th>
                <th>Url</th>
                <th>Tags</th>
                <th>Created At</th>
                <th>Updated At</th>
            </tr>
           </thead>
           <tbody id="bodyData">

           </tbody>  
         </table>
        @endauth

        @guest
        <h1>Homepage</h1>
        <p class="lead">Product Outside</p>
        @endguest

<script type="text/javascript">

    $(document).ready(function() {
        var url = "{{URL('logs')}}";
        $.ajax({
            url: "logs",
            type: "GET",
            data:{ 
                _token:'{{ csrf_token() }}'
            },
            cache: false,
            dataType: 'json',
            success: function(dataResult){
                var resultData = dataResult.data;
                var bodyData = '';
                var i=1;
      
                $.each(resultData,function(index,row){
                        var editUrl = url+'/edit/'+row.id;
                        bodyData+="<tr>"
                        bodyData+="<td>"+ i++ +"</td><td>"+row.name+
                        "</td><td>"+row.user_type +
                        "</td><td>"+row.user_id+
                        "</td><td>"+row.auditable_type+
                        "</td><td>"+row.auditable_id +
                        "</td><td>"+row.old_values+
                        "</td><td>"+row.new_values+
                        "</td><td>"+row.url+
                        "</td><td>"+row.user_agent+
                        "</td><td>"+row.tags+
                        "</td><td>"+row.created_at+
                        "</td><td>"+row.updated_at                       
                        bodyData+="</tr>";                  
                })
                $("#bodyData").append(bodyData);
            }
        });
    });

</script>
@endsection



