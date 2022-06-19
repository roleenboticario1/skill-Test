@extends('layouts.app-master')

@section('content')  
        @auth
           <h1>Product(s)</h1>
          <a href="{{ url('products/create')}}" class="btn btn-primary float-end mb-3"> Add New Product</a>
          <table class="table table-bordered">
           <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Price</th>
                <th>Category</th>
                <th width="280px">Action</th>
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

      //Products
      $(document).ready(function(){
         $(".fade-out").fadeOut(3000);
      });

       $(document).ready(function() {
        var url = "{{URL('products')}}";
        $.ajax({
            url: "/products",
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
                    var row1 = row.products;
                     $.each(row1,function(key, row2){
                        var editUrl = url+'/edit/'+row2.id;
                        bodyData+="<tr>"
                        bodyData+="<td>"+ i++ +"</td><td>"+row2.name+"</td><td>"+row2.price+"</td><td>"+row.name+"</td>"+
                        "<td><a class='btn btn-primary' href='"+editUrl+"'>Edit</a> &nbsp;" 
                        +"<button class='btn btn-danger delete' value='"+row2.id+"'>Delete</button></td>";
                        bodyData+="</tr>";
                     })                   
                })
                $("#bodyData").append(bodyData);
            }
        });


    // $(document).on("click", ".delete", function() { 
    //     var $ele = $(this).parent().parent();
    //     var id= $(this).val();
    //     var url = "{{URL('products')}}";
    //     var dltUrl = url+"/delete/"+id;
    //     $.ajax({
    //         url: dltUrl,
    //         type: "DELETE",
    //         cache: false,
    //         data:{
    //             _token:'{{ csrf_token() }}'
    //         },
    //         success: function(dataResult){
    //             var dataResult = JSON.parse(dataResult);
    //             if(dataResult.statusCode==200){
    //                 $ele.fadeOut().remove();
    //             }
    //         }
    //     });
    // });
        
});
</script>
@endsection



