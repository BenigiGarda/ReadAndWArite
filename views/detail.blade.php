@if (Auth::check()) 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ReadandWArite</title>

      <!-- Fonts -->
      
      <script src="{{ asset('js/app.js') }}" defer></script>
        <!-- Styles -->
        
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>


<style>
body{
    background: url('/images/background.jpg');
                background-repeat: no-repeat;
                padding: 0px;
                margin: 0px;
                background-size: cover;
        }

        .search{
        width: 70%;
        padding: 9px;
        }

        .submit{
            border: 1px solid #cecece;
		    border-radius: 3px;
		    padding: 10px;
		    box-shadow: 2px 2px 6px rgba(0, 0, 0, 0.4);
		    color: white;
            font-size: 15px;
		    background-color: #555555;
            letter-spacing: .1rem;
         }

         
         .submit:hover{
            border: 2px solid #b1b1b1;
		box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.5);

         }

         .m-b-md {
                
                text-shadow: 10px 10px 20px rgba(0, 0, 0, 0.4);
                font-size: 20px;
            }
            .links > a {
                color: #636b6f;
                
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
                padding: 10px;
            }

            .judul > a{
            
                color: #636b6f;
        
                text-decoration: none;
    
            }

            .header{
                padding: 0px;
                margin: 0px;
            }

      
            
            .detaillink {
                color: #636b6f;
        
        text-decoration: none;

            }

            .detailitem{
                background-color: whitesmoke;
            }

            .form{
            float:left;
            width: 80%;
            }


</style>

<body>

<table width ="100%" style="background-color: white;" border="0">
<tr align="center">
    <td>
        <div class="title m-b-md">
            <div class="judul">
        <a href="{{ url('/home') }}">  ReadandWArite </a>
        </div>
        </div>
    </td>
                <td>
                <form action="/homepagenonlogin" method="GET" class="form">
                <input type="text" name="cari" placeholder="masukan nama barang.." value="{{ old('cari') }}" class="search">
                <input type="submit" value="search" class="submit">
                </form>
               <a href="/homepagenonlogin/cart"> <button class="submit">Cart</button></a>
                <a href="{{ url('/homepagenonlogin/history') }}"> <button class="submit">History</button> </a>
                </td>

                <td align="right">
                @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                    <span>
                   <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                   </span> 
                     <a href="{{ url('/home') }}">Home</a> 
                    @else
                    <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                  <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
                </td>

        </tr>
</table>
<br><br>
<table align="center" width=80% border="0" class="detailitem">
<tr>
    <?php
    foreach($gambars as $gambar){
    ?>
    <td>
    <img src="/images/{{$gambar->item_image}}" height="300" width="300" alt="">  
    </td>
    
    
    <td>
        <pre>
  Stationary Name    : {{$gambar->item_name}} 
  Stationary Price   : {{$gambar->item_price}} 
  Stationary Stock   : {{$gambar->item_stock}} 
  Stationary Type    : {{$gambar->type_name}} 
  Description        : {{$gambar->item_description}} 
       </pre>
    </td>
    <td align="right" valign="bottom">
    <form action="/homepagenonlogin/addcart" method="GET">
    <input type="hidden" name="barang_id" value="{{$gambar->id}}">
    <input type="number" name="quantity" min="1" max="1000">
    <input type="submit" value="Add to Cart" class="submit">

    </form>
    </td>

    <?php
    }
    ?>
    
</tr>

</table>



</body>
</html>

@endif