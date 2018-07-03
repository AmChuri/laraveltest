<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf_token" content="{ csrf_token() }" />

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="http://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
 <!-- <script async src="http://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
        <!-- Styles -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" type="text/javascript"></script>

         <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">   
        <style>
            html, body {
                background-color: #fff;
                /*color: #636b6f;*/
                /*font-family: 'Raleway', sans-serif;*/
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: grid;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
                    width: 100%;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            #submit{
                    background-color: #444bd6;
    color: #fff;
    margin: 10px 0;
    outline: none;
    text-transform: uppercase;
    transition: all .3s;
    padding: 6px 14px;
    font-size: 13px;
    border-radius: 35px;
            }
            #price, #quantity, #name{
                    user-select: text!important;
    resize: none;
    margin-left: auto;
    margin-right: auto;
    display: block;
    border: none;
    padding: 10px 0;
    border-bottom: solid 1px #444bd6;
    -webkit-transition: all 0.3s cubic-bezier(0.64, 0.09, 0.08, 1);
    transition: all 0.3s cubic-bezier(0.64, 0.09, 0.08, 1);
    background: -webkit-linear-gradient(top, rgba(255, 255, 255, 0) 98%, #444bd6 4%);
    background: linear-gradient(to bottom, rgba(255, 255, 255, 0) 98%, #444bd6 4%);
    background-position: -790px 0;
    background-size: 100% 100%;
    background-repeat: no-repeat;
    color: #000;
    border-radius: 0px;
    box-shadow: none;
    height: 42px;
            }
            th,td{
                border: 1px solid black;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height container-fluid">
            
<div class="">
            <div class="content">
                <form class="form-horizontal" id="dataform" role="form" method="POST" action="">
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Product Name</label>
                         <div class="col-sm-8">
                      <input id="name" type="text" class="form-control material-form" name="name" value="" autofocus="" placeholder="Product Name">
                      <small id="error"></small>
                  </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Quantity in Stock</label>
                         <div class="col-sm-8">
                      <input id="quantity" type="number" class="form-control material-form" name="quantity" placeholder="Quantity present" style="width: 100%">
                  </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Price per item</label>
                         <div class="col-sm-8">
                      <input id="price" type="text" class="form-control material-form" name="price" placeholder="Price for each item" style="width: 100%">
                    </div>
                </div>
                    <div class="form-group">
                      <button type="submit" class="btn-continue btn-material" id="submit">Submit</button>
                    </div>
                  </form>
            </div>
            </div>
            <div class="">
            <div class="col-md-12">
                <table id="valuedisplay">
                    <tr>
                       
                       <th>Product name </th>
                       <th>Quantity in stock</th>
                       <th>Price per item</th>
                       <th>Datetime submitted</th>
                        <th>Total value number</th> 
                    </tr>
                    <tr>
                       @foreach($data as $row)
<tr>
<td>{{$row['productname']}}</td>
<td>{{$row['quantity']}}</td>
<td>{{$row['price']}}</td> 
<td>{{$row['created_at']}}</td>
<td>{{$row['totalvaluenumber']}}</td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
        </div>
    </body>
          <script async src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script async src="http://use.fontawesome.com/52f306dbd6.js"></script>

        <script type="text/javascript">
            $(document).ready(function () {
            $('#submit').on("click", function (e) {

e.preventDefault();

    var quantity = $('#quantity').val();
    var price = $('#price').val();
    var name = $('#name').val();

 $.ajax({
                method: 'POST',
                url: 'upload',
                data: {"_token": "{{ csrf_token() }}","name":name,"quantity":quantity,"price":price},
                dataType: 'html',
                success: function(data){
              e.preventDefault();
                    responsedata(data);
                    }
    });

});
        });
            function responsedata(data)
            {
$('#dataform')[0].reset();
console.log(data);
newdata = JSON.parse(data);
console.log(newdata[0]);

var para = document.createElement("tr");
for (i = 1; i < newdata.length; i++) { 
    var node = document.createElement("td");
    node.innerHTML += newdata[i];
para.appendChild(node);
}


var element = document.getElementById("valuedisplay");
element.appendChild(para);
            }
        </script>
</html>
