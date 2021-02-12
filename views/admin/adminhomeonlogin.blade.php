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
        width: 82%;
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

            .card{
                background-color: whitesmoke;
                width: 16rem;
                height: 25rem;
                align-items: center;
        
            }

            
</style>
<body>


<table width ="100%" style="background-color: white;" border="0">
<tr align="center">
    <td>
        <div class="title m-b-md">
            <div class="judul">
        <a href="{{ url('/admin/home') }}">  ReadandWArite </a>
        </div>
        </div>
    </td>
                <td>
                <form action="/adminhomeonlogin" method="GET" class="form">
                <input type="text" name="cari" placeholder="masukan nama barang.." value="{{ old('cari') }}" class="search">
                <input type="submit" value="search" class="submit">
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
                     <a href="{{ url('/admin/home') }}">Home</a> 
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
<button style="color: black;"><a href="{{ url('/adminhomeonlogin/additem') }}"> Add New Stationary </a></button>
<button style="color: black;"><a href="{{ url('/adminhomeonlogin/addtype') }}"> Add New Stationary Type </a></button>
<button style="color: black;"><a href="{{ url('/adminhomeonlogin/updatetype') }}"> Update Stationary Type </a></button>
<table cellpadding="30" align="center" width=80% border="0">
   
<tr>
    <?php
    $countitem = 1;
    if(empty($gambars)){
        ?>
        </tr><tr>
        <td>
         <h1>There is no product match with the keyword</h1>
        </td>
        <?php
        }
    foreach($gambars as $gambar){
    ?>
    
    <td>
    <a href="/adminhomeonlogin/detail?id=<?= $gambar->nama;?>" class="detaillink">
        <div class="card" align ="center">
            <img src="/images/{{$gambar->photo}}" height="200" width="200" alt="">
            <div align="center">
                <h3> {{$gambar->nama}} </h3><br>
                {{$gambar->description}}

            </div>
            
        </div>
    </a>
        <?php
        $countitem = $countitem + 1;
        
        ?>
    </td>
    <?php
                if($countitem == 4){
                    $countitem = 1;
            ?>
            </tr> <tr>
            <?php
            }
            ?> 

        
     
    <?php
   
    }
   
    ?>
    </tr>

</table>


</body>
</html>

@endif