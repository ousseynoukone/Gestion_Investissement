
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=<div class="container">
    <link rel="stylesheet" href="template/index1.css">
	<link rel="stylesheet" href="template/fontawesome-free-5.15.3-web/css/all.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
		
<div class="container">
	<div class="screen">
		<div class="screen__content">
			<form class="login" method="POST" action="{{ route('register') }}">
            @csrf
				<!-- Name -->
				<div class="login__field">
				<i class="login__icon fas fa-user"></i>
					<input type="text" class="login__input" placeholder="name" id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name"/>
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
				</div>
				 <!-- Email Address -->
				<div class="login__field">
			

				<i class="login__icon fas fa-envelope"></i>
					<input type="Email" class="login__input" placeholder="Email" id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username"/>
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
				</div>
				<!-- select role -->
				<div  class="login__field">
				<i class="login__icon fas fa-inbox"></i>
					<!-- <x-input-label for="role" :value="__('Je suis :  ')" /> -->
					<select id="role" onchange="voitureEnable()" name="role" class="login__input block mt-1 w-full custom-select" style="height: 40px;" required>
						<option value="">Qui Etes Vous.........</option>
						<option value="entrepreneur" {{ old('role') == 'entrepreneurs' ? 'selected' : '' }}>Entrepreneurs</option>
						<option value="investisseur" {{ old('role') == 'investisseurs' ? 'selected' : '' }}>Investisseurs</option>
					</select>
					<x-input-error :messages="$errors->get('role')" class="mt-2" />
				</div>
				
                 <!-- Password -->
                <div class="login__field">
              
				<i class="login__icon fas fa-lock"></i>
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    <input type="password" class="login__input" placeholder="Password" id="password" class="block mt-1 w-full"
                                    type="password"
                                    name="password"
                                    required autocomplete="new-password" />
                </div>

                
				<!-- Confirm Password -->
                <div class="login__field">
				<i class="login__icon fas fa-lock"></i>
                <input type="password" class="login__input" placeholder="Confirm Password" id="password_confirmation" class="block mt-1 w-full"
                                        type="password"
                                        name="password_confirmation" required autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>
				
				<button class="button login__submit">
					<span class="button__text">Inscription</span>
					<i class="button__icon fas fa-chevron-right"></i>
					<x-primary-button class="ml-4">
						{{ __('') }}
					</x-primary-button>
				</button>
              		
			</form>
			<div class="social-login">
				<h3>Connexion</h3>
                <a style="color:aliceblue" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Déjà un compte?') }}
            </a>
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