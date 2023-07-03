<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="template/authe1.css">
    <link rel="stylesheet" href="template/fontawesome-free-5.15.3-web/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div id="container" class="container">
		{{-- <nav class="nav">
			<a class="nav-logo" href="#">
			<img src="template/logo.png" alt="" style="width: 70px;">
			   </a>
				<div class="nav-menu" id="navMenu">
					<ul>
						<li><a href="#" class="link active"></a></li>
						<li><a href="#" class="link"></a></li>
						<li><a href="#" class="link"></a></li>
						<li><a href="#" class="link"></a></li>
					</ul>
				</div>
                <div class="nav-button">
            <button class="btn white-btn" id="loginBtn" onclick="login()"><i class="fa fa-home"></i></i><a href="/" style="color: black;"></i>Accueil</h2></a></button>
            
        </div>

				<div class="nav-menu-btn">
					<i class="bx bx-menu" onclick="myMenuFunction()"></i>
				</div>
			</nav> --}}
		<!-- FORM SECTION -->
        <div class="nav-button">
            <button class="btn white-btn" id="loginBtn" onclick="login()"><i class="fa fa-home"></i></i><a href="/" style="color: black;"></i>Accueil</h2></a></button>
            
        </div>
		<div class="row">
    
			<!-- SIGN UP -->
			
			<div class="col align-items-center flex-col sign-up" >
				<form class="login" method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
					@csrf
				
				<div class="form-wrapper align-items-center">
					<div class="form sign-up">
						<!-- Name -->
						<div class="input-group">
							<i class="login__icon fas fa-user"></i>
					       <input type="text" class="login__input" placeholder="Nom complet" id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name"/>
                           <x-input-error :messages="$errors->get('name')" class="mt-2" />
						</div>
						 <!-- Email Address -->
						<div class="input-group">
							<i class="login__icon fas fa-envelope"></i>
							<input type="Email" class="login__input" placeholder="Email" id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username"/>
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
						</div>
						<!-- select role -->
						<div class="input-group">
							
					<!-- <x-input-label for="role" :value="__('Je suis :  ')" /> -->
							<select id="role" onchange="voitureEnable()" name="role" class="login__input block mt-1 w-full custom-select" style="height: 40px; width: 400px;"  required>
								<option value="">Qui Etes Vous.........</option>
								<option value="entrepreneur" {{ old('role') == 'entrepreneurs' ? 'selected' : '' }}>Entrepreneur</option>
								<option value="investisseur" {{ old('role') == 'investisseurs' ? 'selected' : '' }}>Investisseur</option>
							</select>
					        <x-input-error :messages="$errors->get('role')" class="mt-2" />
						  </div>
						  <!-- image -->
						  <div class="input-group bubble">
							<input type="file" class="login__input" placeholder="	" id="photo" class="block mt-1 w-full"
								name="photo" accept="image/*" />
							<x-input-error :messages="$errors->get('photo')" class="mt-2" />
						  </div>
						  
						  
						   <!-- Password -->
						
						<div class="input-group">
							<i class="login__icon fas fa-lock"></i>
                           <input type="password" class="login__input" placeholder="Mots de passe" id="password" class="block mt-1 w-full"
                                    type="password"
                                    name="password"
                                    required autocomplete="new-password" />
									<x-input-error :messages="$errors->get('password')" class="mt-2" />
						</div>
						<!-- Confirm Password -->
						<div class="input-group ">
							<i class="login__icon fas fa-lock"></i>
                                      <input type="password" class="login__input" placeholder="Confirmez mots de passe" id="password_confirmation" class="block mt-1 w-full"
                                        type="password"
                                        name="password_confirmation" required autocomplete="new-password" />
                           <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
						</div>
						<button  >
							<span class="button__text">Inscription</span>
							<i class="button__icon fas fa-chevron-right"></i>
							<x-primary-button class="ml-4 ">
								{{ __('') }}
							</x-primary-button>
						</button>
						<p>
							<span>
								Vous avez déjà un compte?
							</span>
							<b onclick="toggle()" class="pointer">
								Connexion
							</b>
						</p>
					</div>
				</div>
				</form>
			
			</div>
			
		
		
			<!-- END SIGN UP -->
			<!-- SIGN IN -->
			<div class="col align-items-center flex-col sign-in">
				@if(Auth::user()==null)
            
				<form method="POST" action="{{ route('login') }}" class="login">
				  @csrf
				<div class="form-wrapper align-items-center">
					<div class="form sign-in">
						<div class="input-group">
							<i class="login__icon fas fa-envelope"></i>
					     <input  for="email" type="text" class="login__input" placeholder="Email" id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" >
                        <!-- <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" /> -->
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />

						</div>
						<div class="input-group">
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
						<p>
							<b>
								Mot de passe oublié?
							</b>
						</p>
						<p>
							<span>
								Vous n'avez pas de compte ?
							</span>
							<b onclick="toggle()" class="pointer">
								Inscrivez-vous ici
							</b>
						</p>
					</div>
				</div>
				<div class="form-wrapper">
		
				</div>
			</form>
            @else
            <a href="{{ Auth::user()->role=="entrepreneur" ? route('entrepreneurs.index') : route('investisseurs.index')  }}" style="text-decoration: none !important;color:aliceblue ; " >Accueil</a>


            @endif
			</div>
			<!-- END SIGN IN -->
		</div>

		<!-- END FORM SECTION -->
		<!-- CONTENT SECTION -->
		<div class="row content-row">
            
			<!-- SIGN IN CONTENT -->
			<div class="col align-items-center flex-col">
				<div class="text sign-in">
					<h2 >
						Bienvenue
					</h2>
	
				</div>
				<div class="img sign-in">
		
				</div>
			</div>
			<!-- END SIGN IN CONTENT -->
			<!-- SIGN UP CONTENT -->
			<div class="col align-items-center flex-col">
				<div class="img sign-up">
				
				</div>
				<div class="text sign-up">
					<h2>
						Rejoignez-nous
					</h2>
	
				</div>
			</div>
			<!-- END SIGN UP CONTENT -->
		</div>
		<!-- END CONTENT SECTION -->
	</div>
    <script>
        
 let container = document.getElementById('container')

toggle = () => {
	container.classList.toggle('sign-in')
	container.classList.toggle('sign-up')
}

setTimeout(() => {
	container.classList.add('sign-in')
}, 200)
    </script>




    
</body>
</html>
