<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Login | V A CORPORATION</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- site icon -->
      <link rel="icon" href="images/fevicon.png" type="image/png" />
      <!-- bootstrap css -->
      <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" />
      <!-- site css -->
      <link rel="stylesheet" href="{{asset('style.css')}}" />
      <!-- responsive css -->
      <link rel="stylesheet" href="{{asset('css/responsive.css')}}" />
      <!-- color css -->
      <link rel="stylesheet" href="{{asset('css/colors.css')}}" />
      <!-- select bootstrap -->
      <link rel="stylesheet" href="{{asset('css/bootstrap-select.css')}}" />
      <!-- scrollbar css -->
      <link rel="stylesheet" href="{{asset('css/perfect-scrollbar.css')}}" />
      <!-- custom css -->
      <link rel="stylesheet" href="{{asset('css/custom.css')}}" />
      <!-- calendar file css -->
      <link rel="stylesheet" href="{{asset('js/semantic.min.css')}}" />
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
   </head>
   <body class="inner_page login">
      <div class="full_container">
         <div class="container">
            <div class="center verticle_center full_height">
               <div class="login_section">
                  <div class="logo_login">
                     <div class="center">
                     <h2 style="color:white">V A Corporation</h2>
                     </div>
                  </div>
                  <div class="login_form">
                     <form action="{{ route('login.submit') }}" method="POST">
    @csrf
    <fieldset>
        <div class="field">
            <label class="label_field">Email Address</label>
            <input type="email" name="email" placeholder="E-mail" value="{{ old('email') }}" />
            @if ($errors->has('email'))
                <span class="text-danger" style="margin-left:145px;">{{ $errors->first('email') }}</span>
            @endif
        </div>
        <div class="field">
            <label class="label_field">Password</label>
            <input type="password" name="password" placeholder="Password" />
            @if ($errors->has('password'))
                <span class="text-danger" style="margin-left:145px;">{{ $errors->first('password') }}</span>
            @endif
        </div>
        
        <div class="field margin_0">
            <label class="label_field hidden">hidden label</label>
            <button class="main_bt" type="submit">Sign In</button>
        </div>
    </fieldset>
</form>

                  </div>
               </div>
            </div>
         </div>
      </div>
      <script>
    document.getElementById('loginForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent default form submission

        const formData = new FormData(this);

        fetch('{{ route('login.submit') }}', {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.error) {
                alert(data.error);
            } else {
                alert(data.message);
                // Redirect to the desired page after successful login
                window.location.href = '/'; // Change to your desired route
            }
        })
        .catch(error => console.error('Error:', error));
    });
</script>

      <!-- jQuery -->
      <script src="{{asset('js/jquery.min.js')}}"></script>
      <script src="{{asset('js/popper.min.js')}}"></script>
      <script src="{{asset('js/bootstrap.min.js')}}"></script>
      <!-- wow animation -->
      <script src="{{asset('js/animate.js')}}"></script>
      <!-- select country -->
      <script src="{{asset('js/bootstrap-select.js')}}"></script>
      <!-- nice scrollbar -->
      <script src="{{asset('js/perfect-scrollbar.min.js')}}"></script>
      <script>
         var ps = new PerfectScrollbar('#sidebar');
      </script>
      <!-- custom js -->
      <script src="{{asset('js/custom.js')}}"></script>
   </body>
</html>