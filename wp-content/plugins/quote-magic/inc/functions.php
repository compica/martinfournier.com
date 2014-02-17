<?php
function magic_quote_function() {
	$quote_form='
	 <div id="quote_form">
            <h1>Formulaire de soumission<h1>
            <br>
           <input type="text" id="distance" name="distance" size="6" value="100"/>
            <input type="radio"  name="distance_unit" value="F" CHECKED/>
            Pied(s)
            <input type="radio"  name="distance_unit" value="M"/>
            Metres
            <br>
            <input type="radio" name="option_cedres" value="1" /> Cèdres hauteur 2 à 3 pieds. Distance 1.5 pied
            <br>
            <input type="radio" name="option_cedres" value="2" CHECKED/> Cèdres hauteur 2 à 3 pieds. Distance 2 pieds
            <br>
            <input type="radio" name="option_cedres" value="3" /> Cèdres hauteur 3 à 4 pieds. Distance 2 pieds
            <br>
        </div>
        
	<div id="quote">
            <div id="quote_title">
                 Soumission
            </div> 
            <br>
            <div id="quantite_de_cedres">
            </div>
            <div id="prix_chaque">
            </div>
            <br>
            <div id="price_without_installation">  
            </div>
            <div id="installation_cost">
            </div>
            <div id="price_with_installation">
            </div>
        </div>
       
	';
   return $quote_form;
}

function register_shortcodes(){
   add_shortcode('magic-quote', 'magic_quote_function');
}

add_action( 'init', 'register_shortcodes');