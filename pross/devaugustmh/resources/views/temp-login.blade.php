<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>{!!env('PROJ_NAME')!!} Temp Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes">    
    <link rel="icon" href="{{asset('favicon.ico')}}" type="image/x-icon" />
    <link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Open+Sans'>
    <link rel="stylesheet" href="{{asset('css/temp.css')}}">  
    <link rel="shortcut icon" href="{{{ asset('favicon.png') }}}">
  </head>
  <body>

    <div class="cont">
    <div class="demo">
    <div class="login">
      <div class="login__check">
       
      </div>

      <form role="form" method="post" action="">
        {{ csrf_field() }}
      <div class="login__form">

      @if(Session::has('error'))
              <p class="error">{{ Session::get('error') }}</p>         
      @endif
      
        <div class="login__row">
          <svg class="login__icon name svg-icon" viewBox="0 0 20 20">
            <path d="M0,20 a10,8 0 0,1 20,0z M10,0 a4,4 0 0,1 0,8 a4,4 0 0,1 0,-8" />
          </svg>
          <input type="text" class="login__input name" name="email" autocomplete="off" placeholder="Username"/>
          
        </div>
        <div class="login__row">
          <svg class="login__icon pass svg-icon" viewBox="0 0 20 20">
            <path d="M0,20 20,20 20,8 0,8z M10,13 10,16z M4,8 a6,8 0 0,1 12,0" />
          </svg>
          <input type="password" class="login__input pass" name="password" autocomplete="off" placeholder="Password"/>
           
        </div>
        <input type="submit" class="login__submit" value="Login" />
        
      </div>
      </form>
    </div>
    
  </div>
</div>
    
    
  </body>
</html>
