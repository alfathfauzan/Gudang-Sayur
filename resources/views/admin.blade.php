<!DOCTYPE html>
<html>
<head>
  <title>Admin</title>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
       <link rel="stylesheet" href="/css/style1.css">
  </head>
</head>
<body >
    
    @include('partials.adminHeader');
        
    <div id="main-content" class="container allContent-section py-4">
        <div class="row">
            <div class="col-sm-3">
                <div class="card">
                    <i class="fa fa-users  mb-2" style="font-size: 70px;"></i>
                    <a href=""><h4 style="color:white;">Total Users</h4></a>
                    <h5 style="color:white;">
                        {{ \App\Models\User::where('status', 1)->count() }}
                    </h5>
                </div>
            </div>
            <div class="col-sm-3">
            <div class="card">
                    <i class="fa fa-th mb-2" style="font-size: 70px;"></i>
                    <a href="products"><h4 style="color:white;">Total Products</h4></a>
                    <h5 style="color:white;">
                        {{ \App\Models\Product::count() }}
                   </h5>
                </div>
            </div>
            <div class="col-sm-3">
            <div class="card">
                    <i class="fa fa-th mb-2" style="font-size: 70px;"></i>
                    <a href="blog"><h4 style="color:white;">Total Blog</h4></a>
                    <h5 style="color:white;">
                        {{ \App\Models\Blog::count() }}
                   </h5>
                </div>
            </div>
            
            <div class="col-sm-3">
                <div class="card">
                        <i class="fa fa-th mb-2" style="font-size: 70px;"></i>
                        <a href="/admin/orders"><h4 style="color:white;">Total Order</h4></a>
                        <h5 style="color:white;">
                            {{ \App\Models\Order::count() }}
                       </h5>
                    </div>
                </div>
        </div>
        
    </div>
       
            
        


    <script type="text/javascript" src=".js/ajaxWork.js"></script>    
    <script type="text/javascript" src=".js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
</body>
 
</html>