function filterResults() {
    var ville = $('#ville').val();
    var typeMaison = $('#type_maison').val();
    var quartier = $('#quartier').val();
    var select1 = $('#select1').val();
    var select2 = $('#select2').val();
    var select3 = $('#select3').val();
    var select4 = $('#select4').val();
    var select5 = $('#select5').val();

    // Vous pouvez implémenter ici la logique de filtrage
    // Utilisez les valeurs des champs pour filtrer les résultats

    console.log('Filtrage en cours...');
    console.log('Ville:', ville);
    console.log('Type de maison:', typeMaison);
    console.log('Quartier:', quartier);
    console.log('Select 1:', select1);
    console.log('Select 2:', select2);
    console.log('Select 3:', select3);
    console.log('Select 4:', select4);
    console.log('Select 5:', select5);
}

$(document).ready(function() {
    // Écouteurs d'événements pour les champs de sélection
    $('#ville, #type_maison, #quartier, #select1, #select2, #select3, #select4, #select5').on('change', function() {
        filterResults();
    });
});