 <!-- nav -->
 <nav  class="navbar navbar-expand-lg navbar-light px-5" style="background-color: #3B3131;">
    
    <a class="navbar-brand ml-5" href="./index.php">
        <img src="./assets/images/logo.png" width="80" height="80" alt="">
    </a>
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0"></ul>
    
    <div class="user-cart">  
        
            
            <li>
                @if(Auth::check())                  
                   
                    <a href="#">Welcome back,{{ (auth()->user()->name) }} ▾</a>
                <form action="/logout" method="POST">
                  @csrf
                  <button class="btn" type="submit" style="text-decoration:none;><i class="fa fa-sign-in mr-5" style="font-size:30px; color:#fff;" aria-hidden="true"></button></i>      
                </form>
              </li>
              @endif
            
        
    </div>  
</nav>
