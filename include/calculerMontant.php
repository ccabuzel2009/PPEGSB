<?php $laPuissance = gsb::getPuissance($_SESSION['matricule']); ?>

<script>

/**
* Méthode qui sera appelée sur l'appui d'une touche
*/

function calculerMontant() {
	var KM = document.getElementById('KM').value * '<?php echo $laPuissance['tarifKM'] ?>';
	var nbNuitee = document.getElementById('nbNuitee').value;
	var nbRepas = document.getElementById('nbRepas').value;
	var nbRelaisEtape = document.getElementById('nbRelaisEtape').value;
	var total = nbRepas * 25;
	total += nbNuitee * 60;
	total += nbRelaisEtape * 110;
	total += KM;
	document.ajout.montantTotal.value = total;
}

var element1 = document.getElementById('KM');
var element2 = document.getElementById('nbNuitee');
var element3 = document.getElementById('nbRepas');
var element4 = document.getElementById('nbRelaisEtape');

element1.onkeyup = function () {
	calculerMontant();
}
element2.onkeyup = function () {
	calculerMontant();
}
element3.onkeyup = function () {
	calculerMontant();
}
element4.onkeyup = function () {
	calculerMontant();
}
</script>