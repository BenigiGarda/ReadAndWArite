
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>ReadAndWarite</title>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
         <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <script src="{{ asset('js/app.js') }}" defer></script>
        <!-- Styles -->
        
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <style>
            html, body {
                
                background-color:whitesmoke;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;

            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
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
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
                text-shadow: 10px 10px 20px rgba(0, 0, 0, 0.4);
                font-size: 100px;
            }

        .search{
        width: 100%;
        padding: 10px;
        border: 0px;
        }

        .submit{
            border: 1px solid #cecece;
		    border-radius: 3px;
		    padding: 10px;
		    box-shadow: 2px 2px 6px rgba(0, 0, 0, 0.4);
		    color: white;
            font-size: 15px;
		    background-color: #555555;
         }

         .submit:hover{
            border: 2px solid #b1b1b1;
		box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.5);

         }

    
         .links > a:hover{
        border: 0px solid #b1b1b1;
		box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.5);
    }



        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
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

            <div class="content">
                <div class="title m-b-md">
                    ReadAndWArite
                </div>

                <form action="/homepagenonlogin" method="GET">
                <input type="text" name="cari" placeholder="masukan nama barang.." value="{{ old('cari') }}" class="search"><br><br>
                <input type="submit" value="search" class="submit">
            </form> <br>
            <table width ="100%">
            <tr>
            <?php
            foreach($gambars as $gambar){
            ?>
            <td>
            <a href="/homepagenonlogin/type?id={{$gambar->type}}" class="btn_type"> <img src="/images/{{$gambar->photo}}" height="200" width="200" alt=""> </a>
           </td>
           <?php    
            }
            ?>
            </tr>
            </table>
            </div>
        </div>
    </body>
</html>
