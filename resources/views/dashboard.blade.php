<html>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
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

        tr:nth-child(even) {
        background-color: #dddddd;
        }
        /* a{
            background-color: powderblue !important;
        } */
    </style>
<body>

@if(Session::has('message'))
<div class="container">
    <div class="card">
      <div class="card-body">
        <h2>All Blogs</h2>
<a href="add/{{$suceess1 ?? '1'}}" class="btn btn-primary">Add</a><br/><br>

<table>
  <thead>
    <th>Sr no</th>
    <th>Title</th>
    <th>Description</th>
    <th>Photo</th>
    <th>Action</th>
  </thead>
  <tbody>
    @php $i = 1; @endphp
    @foreach($blog as $bl)
    <tr>
    <td>{{$i}}</td>
    <td>{{$bl->title}}</td>
    <td>{{$bl->description}}</td>
    <td><img src="images/{{$bl->image}}" height="50px" width="75px"></td>
    <td><a href="edit/{{$bl->id}}" class="btn btn-primary">edit</a> <a href="del/{{$bl->id}}" class="btn btn-danger">delete</a></td>
    </tr>
    @php $i++; @endphp
    @endforeach
  </tbody>
</table>
      </div>
    </div>
</div>
@else
Please login <a href="loginview">Login</a>
@endif


</html>