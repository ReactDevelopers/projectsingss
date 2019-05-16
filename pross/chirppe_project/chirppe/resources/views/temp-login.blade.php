<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Temp Login</title>
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes">     -->
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
          <img src="{{ url('images/user-icon.png') }}">
          <input type="text" class="login__input name" name="email" autocomplete="off" placeholder="Username"/>
        </div>
        <div class="login__row">
          <img src="{{ url('images/lock-icon.png') }}">
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
