<html>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
    .div-form{
        text-align: center;
        /* background: linear-gradient(45deg, black, transparent); */
        width: 50%;
        margin-left: auto;
        margin-right: auto;
    }    
    .msg_error{
      color: red;
    }
    
    </style>
<body>
    
<form action="/addBlog/{{request()->route('id')}}" method="POST" id="form-register" enctype="multipart/form-data">
    @csrf
    <div class="container">
    <div class="card">
        <div class="card-body">
        <h2>Add blog</h2>
        <label for="firstname">Title</label><br>
        <input type="text" class="form-control" name="title" id="title_val" maxlength="255" />
        <span class="msg_error firstname_err"></span><br>
        <label>Description</label><br>
        <textarea rowspan="3" class="form-control" name="description" id="desc_val"></textarea>
        <span class="msg_error lastname_err"></span><br>
        <label>Image</label><br>
        <input type="file" class="form-control" name="image" id="image_val" /><br>
        <button type="submit" id="register_btn" class="btn btn-primary">Add</button>
      </div>
    </div>
</div>
    </form>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>

$('#register_btn').click(function(event){
  event.preventDefault();
    var firstname = $('#tite_val').val();
    var lastname = $('#desc_val').val();

  /* validate fields */
    if(firstname == ''){
      $('.firstname_err').text("Firstname is required");
    }else if(lastname == ''){
      $('.lastname_err').text("Lastname is required");
    }else{
      $('#form-register').submit();
    }


});


</script>
</html>