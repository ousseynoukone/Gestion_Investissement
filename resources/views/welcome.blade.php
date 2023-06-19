
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with LeadMark landing page.">
    <meta name="author" content="Devcrud">
    <title>Bienvenue</title>
    <!-- font icons -->
    <link rel="stylesheet" href="template/assets/vendors/themify-icons/css/themify-icons.css">
    <!-- Bootstrap + LeadMark main styles -->
	<link rel="stylesheet" href="template/assets/css/leadmark.css">
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="40" id="home">

    <!-- page Navigation -->
    <nav class="navbar custom-navbar navbar-expand-md navbar-light fixed-top" data-spy="affix" data-offset-top="10">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="template/assets/imgs/logo.png" alt="">
            </a>
            <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">    
                <div>
                    
                    @if (Route::has('login'))
                            <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                                @auth
                                    <a href="{{ Auth::user()->role=="entrepreneur" ? route('entrepreneurs.index') : route('investisseurs.index')  }}" style="text-decoration: none !important;color:aliceblue ; " >Accueil</a>
                                @else
                                   

                                    @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a href="{{ route('register') }}" style="color:aliceblue" class="ml-4 nav-link btn btn-primary btn-sm rounded">Inscription</a>
                                        </li>
                                    @endif
                                @endauth
                            </div>
                    @endif
                    
                </div>   
                    @if (Route::has('login'))
                    <li class="nav-item">
                        <a href="{{ route('login') }}" style="color:aliceblue" class="ml-4 nav-link btn btn-primary btn-sm rounded">Connexion</a>
                        </li>
                    @endif              
                    
                    
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Of Second Navigation -->

    <!-- Page Header -->
    <header class="header">
        <div class="overlay">
            <h1 class="subtitle">Investissement prometteurs et avec des entrepreneurs.

            </h1>
            <h1 class="title">Stratégie Stimulante</h1>  
        </div>  
        <div class="shape">
            <svg viewBox="0 0 1500 200">
                <path d="m 0,240 h 1500.4828 v -71.92164 c 0,0 -286.2763,-81.79324 -743.19024,-81.79324 C 300.37862,86.28512 0,168.07836 0,168.07836 Z"/>
            </svg>
        </div>  
        <div class="mouse-icon"><div class="wheel"></div></div>
    </header>
    <!-- End Of Page Header -->


    <!-- End OF About Section -->

    <!-- Portfolio Section -->
    <section id="portfolio" class="section portfolio-section">
        <div class="container">
            <h6 class="section-title text-center">Notre portfolio</h6>
            <h6 class="section-subtitle mb-5 text-center">De nouveaux projets époustouflants pour nos incroyables investisseur</h6>
            <div class="filters">
                <a href="#" data-filter=".new" class="active">
                    Offre
                </a>
                <a href="#" data-filter=".branding">
                    Technologie
                </a>
                <a href="#" data-filter=".advertising">
                    Marketing
                </a>
                
               
            </div>
            <div class="portfolio-container"> 
                
                
                <div class="col-md-6 col-lg-4 advertising new">
                    <div class="portfolio-item">
                        <img src="template/assets/imgs/pexels-pixabay-534220.jpg" class="img-fluid" alt="Download free bootstrap 4 admin dashboard, free boootstrap 4 templates">                         
                        <div class="content-holder">
                            <a class="img-popup" href="template/assets/imgs/pexels-pixabay-534220.jpg"></a>
                            <div class="text-holder">
                                <h6 class="title">DECOUVRIR</h6>
                                <p class="subtitle">L'entreprise assiste ses clients dans l'élaboration d'une stratégie!</p>
                            </div>
                        </div>    
                    </div>              
                </div> 
                

                <div class="col-md-6 col-lg-4 advertising"> 
                    <div class="portfolio-item">
                        <img src="template/assets/imgs/pexels-max-fischer-5872348.jpg" class="img-fluid" alt="Download free bootstrap 4 admin dashboard, free boootstrap 4 templates">                               
                        <div class="content-holder">
                            <a class="img-popup" href="template/assets/imgs/pexels-max-fischer-5872348.jpg"></a>
                            <div class="text-holder">
                                <h6 class="title">DECOUVRIR</h6>
                                <p class="subtitle">L'entreprise assiste ses clients dans l'élaboration d'une stratégie!</p>
                            </div>
                        </div>
                    </div>                                                       
                </div> 
                
                <div class="col-md-6 col-lg-4 advertising new">
                    <div class="portfolio-item">
                        <img src="template/assets/imgs/pexels-nextvoyage-1481105.jpg" class="img-fluid" alt="Download free bootstrap 4 admin dashboard, free boootstrap 4 templates">       
                       <div class="content-holder">
                            <a class="img-popup" href="template/assets/imgs/pexels-nextvoyage-1481105.jpg"></a>
                            <div class="text-holder">
                                <h6 class="title">DECOUVRIR</h6>
                                <p class="subtitle">L'entreprise assiste ses clients dans l'élaboration d'une stratégie!</p>
                            </div>
                        </div>
                    </div>                                                       
                </div> 
                <div class="col-md-6 col-lg-4 advertising new"> 
                    <div class="portfolio-item">
                        <img src="template/assets/imgs/pexels-david-mcbee-396303.jpg" class="img-fluid" alt="Download free bootstrap 4 admin dashboard, free boootstrap 4 templates">            
                        <div class="content-holder">
                            <a class="img-popup" href="template/assets/imgs/pexels-david-mcbee-396303.jpg"></a>
                            <div class="text-holder">
                                <h6 class="title">DECOUVRIR</h6>
                                <p class="subtitle">EL'entreprise assiste ses clients dans l'élaboration d'une stratégie!</p>
                            </div>
                        </div>
                    </div>
                            
                </div> 
                <div class="col-md-6 col-lg-4 branding new">
                    <div class="portfolio-item">
                        <img src="template/assets/imgs/branding-1.jpg" class="img-fluid" alt="Download free bootstrap 4 admin dashboard, free boootstrap 4 templates">                        
                        <div class="content-holder">
                            <a class="img-popup" href="template/assets/imgs/branding-1.jpg"></a>
                            <div class="text-holder">
                                <h6 class="title">DECOUVRIR</h6>
                                <p class="subtitle">L'entreprise assiste ses clients dans l'élaboration d'une stratégie!</p>
                            </div>
                        </div> 
                    </div>
                </div> 
                <div class="col-md-6 col-lg-4 branding">
                    <div class="portfolio-item">
                        <img src="template/assets/imgs/branding-2.jpg" class="img-fluid" alt="Download free bootstrap 4 admin dashboard, free boootstrap 4 templates">  
                        <div class="content-holder">
                            <a class="img-popup" href="template/assets/imgs/branding-2.jpg"></a>
                            <div class="text-holder">
                                <h6 class="title">DECOUVRIR</h6>
                                <p class="subtitle">L'entreprise assiste ses clients dans l'élaboration d'une stratégie!</p>
                            </div>
                        </div>
                    </div>                                                     
                </div> 
                <div class="col-md-6 col-lg-4 branding new">
                    <div class="portfolio-item">
                        <img src="template/assets/imgs/branding-3.jpg" class="img-fluid" alt="Download free bootstrap 4 admin dashboard, free boootstrap 4 templates">   
                        <div class="content-holder">
                            <a class="img-popup" href="template/assets/imgs/branding-3.jpg"></a>
                            <div class="text-holder">
                                <h6 class="title">DECOUVRIR</h6>
                                <p class="subtitle">L'entreprise assiste ses clients dans l'élaboration d'une stratégie!</p>
                            </div>
                        </div>
                    </div>                                                    
                </div> 
                <div class="col-md-6 col-lg-4 branding new">
                    <div class="portfolio-item">
                        <img src="template/assets/imgs/123456.jpg" class="img-fluid" alt="Download free bootstrap 4 admin dashboard, free boootstrap 4 templates">   
                        <div class="content-holder">
                            <a class="img-popup" href="template/assets/imgs/branding-3.jpg"></a>
                            <div class="text-holder">
                                <h6 class="title">DECOUVRIR</h6>
                                <p class="subtitle">L'entreprise assiste ses clients dans l'élaboration d'une stratégie!</p>
                            </div>
                        </div>
                    </div>                                                    
                </div> 
                
               
            </div>   
        </div>            
    </section>
    <!-- End of portfolio section -->

    <!-- Blog Section -->
   
    <!-- End of Blog Section -->

    <!-- Testmonial Section -->
    <section class="section" id="testmonial">
        <div class="container">
            <h6 class="section-title text-center mb-0">Testmoignage</h6>
            <h6 class="section-subtitle mb-5 text-center">Ce que disent nos partenaire</h6>
            <div class="row">
                <div class="col-md-4 my-3 my-md-0">
                    <div class="card">
                        <div class="card-body">
                            <div class="media align-items-center mb-3">
                                <img class="mr-3" src="template/assets/imgs/avatar.jpg" alt="">
                                <div class="media-body">
                                    <h6 class="mt-1 mb-0">Ousseynou kone</h6>
                                    <small class="text-muted mb-0">Analyste d'affaires</small>     
                                </div>
                            </div>
                            <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus enim modi, id dicta reiciendis itaque.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 my-3 my-md-0">
                    <div class="card">
                        <div class="card-body">
                            <div class="media align-items-center mb-3">
                                <img class="mr-3" src="template/assets/imgs/avatar-1.jpg" alt="">
                                <div class="media-body">
                                    <h6 class="mt-1 mb-0">Mariama wade</h6>
                                    <small class="text-muted mb-0">Agent d'assurance</small>      
                                </div>
                            </div>
                            <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus enim modi, id dicta reiciendis itaque.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 my-3 my-md-0">
                    <div class="card">
                        <div class="card-body">
                            <div class="media align-items-center mb-3">
                                <img class="mr-3" src="template/assets/imgs/avatar-2.jpg" alt="">
                                <div class="media-body">
                                    <h6 class="mt-1 mb-0">Dieynaba Coly</h6>
                                    <small class="text-muted mb-0">Évaluateur résidentiel</small>        
                                </div>
                            </div>
                            <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus enim modi, id dicta reiciendis itaque.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End of Testmonial Section -->

    <!-- Contact Section -->
    <section id="contact" class="section has-img-bg pb-0">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-5 my-3">
                    <h6 class="mb-0">Telephone</h6>
                    <p class="mb-4">+ 221 33 876 23 45</p>

                    <h6 class="mb-0">Address</h6>
                    <p class="mb-4">Yoff Virage, Route de l’aéroport. Dakar, Sénégal</p>

                    <h6 class="mb-0">Email</h6>
                    <p class="mb-0">infogroupe@website.com</p>
                    <p></p>
                </div>
                
                <div class="col-md-7">
                    <form>
                        <h4 class="mb-4">Écrivez-nous</h4>
                        <div class="form-row">
                            <div class="form-group col-sm-4">
                                <input type="text" class="form-control text-white rounded-0 bg-transparent" name="name" placeholder="Nom">
                            </div>
                            <div class="form-group col-sm-4">
                                <input type="email" class="form-control text-white rounded-0 bg-transparent" name="Email" placeholder="Email">
                            </div>
                            <div class="form-group col-sm-4">
                                <input type="text" class="form-control text-white rounded-0 bg-transparent" name="subject" placeholder=Object">
                            </div>
                            <div class="form-group col-12">
                                <textarea name="message" id="" cols="30" rows="4" class="form-control text-white rounded-0 bg-transparent" placeholder="Message"></textarea>

                            </div>
                            <div class="form-group col-12 mb-0">
                                <button type="submit" class="btn btn-primary rounded w-md mt-3">Envoyer</button>
                            </div>                          
                        </div>                          
                    </form>
                </div>
            </div>
            <!-- Page Footer -->
            <footer class="mt-5 py-4 border-top border-secondary">
                <p class="mb-0 small">&copy; <script>document.write(new Date().getFullYear())</script>, entreprenneur Created By <a href="https://www.devcrud.com" target="_blank">DevCrud.</a>  All rights reserved </p>     
            </footer>
            <!-- End of Page Footer -->  
        </div>
    </section>
	
	<!-- core  -->
    <script src="template/assets/vendors/jquery/jquery-3.4.1.js"></script>
    <script src="template/assets/vendors/bootstrap/bootstrap.bundle.js"></script>

    <!-- bootstrap 3 affix -->
	<script src="template/assets/vendors/bootstrap/bootstrap.affix.js"></script>

    <!-- Isotope -->
    <script src="template/assets/vendors/isotope/isotope.pkgd.js"></script>

    <!-- LeadMark js -->
    <script src="template/assets/js/leadmark.js"></script>

</body>
</html>
