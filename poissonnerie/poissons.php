<?php 


$poissons = [

    [
    "id"=>1,
    "nom"=>"Colin",
    "description"=>"c'est un poisson gentil mais arrogant",
    "prix"=>43,
    "image"=>"colin.png",
    "feminin"=>false,
    "eau"=>"mer",
    "protege"=> false
    ],
    [
    "id"=>2,
    "nom"=>"Carpe",
    "description"=>"c'est un poisson tender mais débile",
    "prix"=>32,
    "image"=>"carpe.png",
    "feminin"=>true,
    "eau"=>"douce",
    "protege"=> false
    ],
    [
        "id"=>3,
      "nom"=>"Cabillaud",
    "description"=>"c'est un poisson pilier du rayon surgelés",
    "prix"=>43,
    "image"=>"cabillaud.png",
    "feminin"=>false,
    "eau"=>"mer",
    "protege"=> false
    ],
    [
        "id"=>4,
      "nom"=>"Thon",
    "description"=>"c'est un poisson qui finit souvent en boite",
    "prix"=>43,
    "image"=>"thon.png",
    "feminin"=>false,
    "eau"=>"mer",
    "protege"=> false
    ],
    [
        "id"=>5,
      "nom"=>"Truite",
    "description"=>"c'est bon avec de l'huile",
    "prix"=>43,
    "image"=>"truite.png",
    "feminin"=>true,
    "eau"=>"douce",
    "protege"=> false
    ],
    [
        "id"=>6,
      "nom"=>"Dauphin",
    "description"=>"c'est bon avec de l'huile",
    "prix"=>43,
    "image"=>"dauphin.png",
    "feminin"=>false,
    "eau"=>"mer",
    "protege"=> true
    ],
    [
        "id"=>7,
      "nom"=>"Requin Marteau",
    "description"=>"c'est bon avec de l'huile",
    "prix"=>43,
    "image"=>"requin.png",
    "feminin"=>false,
    "eau"=>"mer",
    "protege"=> true
    ]
    
  
  ];
  
  $typeDePoisson = false;
  
  if( isset($_GET['type']) ){
  
    $typeDePoisson = $_GET['type'];
  
  }
  
  
  //echo $typeDePoisson;
  
  
  
  
  $contenuDeLaPage = "";
  
  
  foreach($poissons as $poisson) {

                $genre;
                $poisson['feminin']?$genre='e':$genre='';

                

              $cartePoisson = "<div class='card col-3'>
              <img src='images/{$poisson['image']}' class='card-img-top photoPoisson' style='max-height:150px' alt='...'>
              <div class='card-body justify-content-center'>
                <h5 class='card-title text-center'>{$poisson['nom']}</h5>
                <p class='card-text'>{$poisson['description']}</p>
                <p class='card-text'>Prix au kilo : {$poisson['prix']} euros</p>
                <a href='#' class='btn btn-primary'>Attrape un{$genre} {$poisson['nom']}</a>
              </div>
              </div>
              ";
  
            if(
              
                ( !$typeDePoisson || $typeDePoisson == $poisson['eau'])
  
                &&
  
               ( !$poisson['protege']  ||   $isLoggedIn  )
            
            
              ){
  
                $contenuDeLaPage.=$cartePoisson;
  
            }
  
           
  
  }
  


?>