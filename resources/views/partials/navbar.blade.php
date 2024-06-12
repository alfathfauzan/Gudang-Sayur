<div class="nav">

  <nav class="nav">
     <input type="checkbox" id="check" />
     <label for="check" class="checkbtn">
       <i class="fa fa-bars"></i>
     </label>

     <label for="" class="logo">Gudang Sayur</label>

     <ul>
       <li><a href="/">Home</a></li>
       <li><a href="/about">About</a></li>
       <li><a href="#services">Services</a></li>
       <li><a href="/products">Products</a></li>
       <li><a href="/blog">Blog</a></li>
       <li class="right-links">

        @if (Auth::check())                  
                   <li>
                    <a href="#">Welcome back,{{ (auth()->user()->name) }} ▾</a>
                    <ul class="dropdown">
                      <li>
                        <form action="/update" >
                          @csrf
                          <button class="btn" type="submit">Edit Profile</button>      
                        </form>
                      </li>
                      <li>                    
                          <button class="btn" type="submit"><a href="/alamat" style="background-color: transparent;color:white">Address</a></button>                           
                      </li>
                      <li>                    
                        <button class="btn" type="submit"><a href="/orders" style="background-color: transparent;color:white">My Order</a></button>                           
                    </li>
                        <li>
                          <form action="/logout" method="POST">
                            @csrf
                            <button class="btn" type="submit">Logout</button>      
                          </form>
                        </li>
                        
                    </ul>
                    
                </li>
                <li class="carts">
                  <i class='bx bx-shopping-bag carts' id= "cart-icon" ></i>Cart
                  <span id="cart_count" class="text-warning bg-light">
                    {{ isset($cartItemsCount) ? $cartItemsCount : 0 }}
                  </span>
                </li>
                
            @else
            <a href="login"> <button class="btn">Login</button> </a>
            @endif
       

         
         
       </ul>

     </nav>

     
 </div>