<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=<div class="container">
    <link rel="stylesheet" href="template/fontawesome-free-5.15.3-web/css/all.min.css">
        <link rel="stylesheet" href="template/index.css">
   
<div class="container">
	<div class="screen">
		<div class="screen__content">
            @if(Auth::user()==null)
            
			<form method="POST" action="{{ route('login') }}" class="login">
            @csrf

                    <!-- Email Address -->
                    <div class="login__field">
                    <i class="login__icon fas fa-envelope"></i>
					<input  for="email" type="text" class="login__input" placeholder="Email" id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" >
                        <!-- <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" /> -->
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div  class="login__field">
                    <i class="login__icon fas fa-lock"></i>
					<input type="password" class="login__input" placeholder="Mots de passe" for="password" :value="__('Password')" id="password" class="block mt-1 w-full"
                                        type="password"
                                        name="password"
                                        required autocomplete="current-password">
                       
                        

                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>


                    <button class="button login__submit" class="flex items-center justify-end mt-4">
                        <span class="button__text">Connexion</span>
                        <i class="button__icon fas fa-chevron-right"></i>
                        <x-primary-button class="ml-3">
                                {{ __('') }}
                            </x-primary-button>
				     </button>
            	
			</form>
            @else
            <a href="{{ Auth::user()->role=="entrepreneur" ? route('entrepreneurs.index') : route('investisseurs.index')  }}" style="text-decoration: none !important;color:aliceblue ; " >Accueil</a>


            @endif
           
			<div class="social-login">
				<h4>Compte Inexistant ?</h4>
                <div>
                    @if (Route::has('login'))
                            <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                                @auth
                                    <a href="{{ Auth::user()->role=="entrepreneur" ? route('entrepreneurs.index') : route('investisseurs.index')  }}" style="text-decoration: none !important;color:aliceblue ; " >Accueil</a>
                                @else
                                   

                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}" style="color:aliceblue" >Inscription</a>
                                    @endif
                                @endauth
                            </div>
                    @endif
                </div>
                <div class="social-icons">
					<a href="#" class="social-login__icon fab fa-instagram"></a>
					<a href="#" class="social-login__icon fab fa-facebook"></a>
					<a href="#" class="social-login__icon fab fa-twitter"></a>
				</div>
			</div>
		</div>
		<div class="screen__background">
			<span class="screen__background__shape screen__background__shape4"></span>
			<span class="screen__background__shape screen__background__shape3"></span>		
			<span class="screen__background__shape screen__background__shape2"></span>
			<span class="screen__background__shape screen__background__shape1"></span>
		</div>		
	</div>
</div>
    <title>Document</title>
</head>
<body>
    
</body>
</html>