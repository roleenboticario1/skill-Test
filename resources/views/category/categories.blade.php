@extends('layouts.app-master')

@section('content')
 <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
            
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
            <!-- Style -->
        @auth
          <h1>Category</h1>
          <a href="{{ url('category/create')}}" class="btn btn-primary float-end mb-3"> Add New Category</a>
          <table class="table table-bordered">
           <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th width="280px">Action</th>
            </tr>
           </thead>
           <tbody id="bodyData">

           </tbody>  
         </table>
        @endauth

    <script>
    $(document).ready(function() {
        var url = "{{URL('category')}}";
        $.ajax({
            url: "category/categories",
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
                        "<td><a class='btn btn-primary disabled' href='"+editUrl+"'>Edit</a> &nbsp;" 
                        +"<button class='btn btn-danger delete disabled' value='"+row.id+"'>Delete</button></td>";
                        bodyData+="</tr>";                  
                })
                $("#bodyData").append(bodyData);
            }
        });
        
});
</script>

@endsection
