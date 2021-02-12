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

            .history_table{
                background-color: whitesmoke ;
            }
            .isihistory{
                background-color: #555555;
                color: white;
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
                <a href="{{ url('/homepagenonlogin/cart') }}"> <button class="submit">Cart</button> </a>
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

<table align="center" width ="60%" border="0">
        

        
      <?php

    if(empty($gambars)){
    ?>
    </tr><tr>
    <td>
     <h1>There is no product match with the keyword</h1>
    </td>
    <?php
    }

      $tanggal = NULL;
      foreach($gambars as $gambar){
      ?>  
      <thead align="center" class="history_table">
        <?php
        
        if($gambar-> tanggal != $tanggal){
        $tanggal = $gambar -> tanggal;
        
        ?>
        

        
        <th colspan="2" align="left">{{$tanggal}}</th> <th colspan="2">Total: Rp.{{$gambar->total}}</th>
      </thead>
        <?php
            foreach($gambars as $gambar){
                if($tanggal == $gambar -> tanggal){
                ?>
                <tr align="center" class="isihistory">
                <td>{{$gambar->nama}}</td> <td>Rp.{{$gambar->harga}}</td> <td>quantity:{{$gambar->qty}}</td><td>Sub Total:Rp.{{$gambar->subtotal}}</td> 
                </tr>
                <?php
                }
            }
        }

        ?>
      
    <?php
      }
      ?>
    
</table>

</body>
</html>

@endif