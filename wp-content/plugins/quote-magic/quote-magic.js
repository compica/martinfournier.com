/**
 * 
 */
function getRandom() {
	var my_num = Math.floor(Math.random() * 5);
	jQuery("#price_total").append(my_num);
}

function updateQuote() {
	var length_in_feet;
	var distance_between_trees;
	var unit_price;
	var installation_price;
	var number_of_trees;
	var price_without_installation;
	var price_with_installation;
	var installation_cost;
	var total_price;

	// This piece of code check if the user wants to have
	// unit in Meters or in Foot.
	if (jQuery("input[name=distance_unit]:checked").val() == 'M') {
		length_in_feet = jQuery("#distance").val() * 3.2808399;
	} else if (jQuery("input[name=distance_unit]:checked").val() == 'F') {
		length_in_feet = jQuery("#distance").val();
	}

	// This piece of code check what option the customer wants
	// option 1 = ceder

	if (jQuery("input[name=option_cedres]:checked").val() == '1') {
		distance_between_trees=1.5;
		unit_price=4;
		installation_price=16;

	} else if (jQuery("input[name=option_cedres]:checked").val() == '2') {
		distance_between_trees=2;
		unit_price=4;
		installation_price=16;

	} else if (jQuery("input[name=option_cedres]:checked").val() == '3') {
		distance_between_trees=2;
		installation_price=16;
		unit_price=12.50

	}
	
	number_of_trees = Math.ceil(length_in_feet/distance_between_trees);
	total_price = (number_of_trees * unit_price).toFixed(2);
	price_without_installation = (number_of_trees * unit_price).toFixed(2);
	installation_cost = (number_of_trees * installation_price).toFixed(2);
	price_with_installation = ((number_of_trees * unit_price)+(number_of_trees * installation_price)).toFixed(2);
	
	jQuery("#quantite_de_cedres").text(number_of_trees+" cèdre(s) ");
	jQuery("#prix_chaque").text(" @ " + unit_price + " $ l'unité");
	jQuery("#price_without_installation").text("Prix pour les cèdres "+price_without_installation + " $");
	jQuery("#installation_cost").text("Coût d'installation "+installation_cost + " $");
	jQuery("#price_with_installation").text("Prix avec plantation "+price_with_installation + " $");
	// alert($("input[name=distance_unit]:checked").val()); 
}

var hideCode = function() {
	var numRand = getRandom(4);
	jQuery(".guess_box").each(function(index, value) {
		if (numRand == index) {
			jQuery(this).append("<span id='has_discount'></span>");
			return false;
		}
	});
}

 jQuery().ready(function() {
	updateQuote();
	jQuery("#distance").keyup(function(event) {
		updateQuote();
	});
	
	jQuery("input[name=distance_unit]").click(function(event) {
		updateQuote();
	});
	
	jQuery("input[name=option_cedres]").click(function(event) {
		updateQuote();
	});

}); // End document.ready()
