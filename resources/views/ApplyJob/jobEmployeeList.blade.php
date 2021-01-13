<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<style>
body{
  min-height: 100vh;
  overflow: auto;
  background: url("public/images/bg.png"), -webkit-linear-gradient(bottom, #0250c5, #d43f8d);
}
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

</style>
</head>
<body>

<h2 style="text-align: center;">Employee List</h2>

<table id="employeeList">
  <tr>
    <th>ID</th>
    <th>Name</th>
    <th>Email</th>
    <th>Contact</th>
    <th>Address</th>
    <th>Action</th>
  </tr>
  @foreach($getEmployeeData as $emp)
  <tr>
    <td>{{$emp->id}}</td>
    <td>{{$emp->firstName}} {{$emp->lastName}}</td>
    <td>{{$emp->email}}</td>
    <td>{{$emp->phoneNo}}</td>
    <td>{{$emp->address}}</td>
    <td>
      <a href="{{route('employee.edit',$emp->id)}}" class="btn btn-sm" title="Edit details" style="background-color: #d43f8d;">Edit
      </a>
      <a href="javascript:;" class="btn btn-sm btn-delete" title="Delete" data-id="{{$emp->id}}" style="background-color: #d43f8d;">Delete
      </a>

    </td>
  </tr>
  @endforeach
</table>
<!-- sweetalert js -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
      $("#employeeList").on('click', '.btn-delete', function(){
        var id = $(this).data("id");
        var thisrow = $(this);
        swal({
          title: "Are you sure?",
          text: "Once deleted, you will not be able to recover this!",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            $.ajax({
            "type": "GET",
            "url": "{{url('deleteEmployee')}}",
            "data": {"delete_id":id},
            "dataType": "JSON",
              success: function(response) {
                  console.log('received this response: '+response);
                    thisrow.closest("tr").remove();
                toastr.success(response['message']);
              },
              error: function(response){
                toastr.error(response['message']);
              }
            });
            } else {
            swal("Your data is safe!");
            }
        });
      });
  });
</script>
</body>
</html>