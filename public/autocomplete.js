// autocomplete.js

// Définissez votre source de données (par exemple, une liste de mots-clés)
const data = [
    "ouagadougou",
    "Koudougou",
    "bobo",
    "dorie",
    // Ajoutez d'autres mots-clés ou utilisez une source de données dynamique
];

// Sélectionnez le champ de saisie par sa classe
const input = document.querySelector(".autocomplete-input");

// Initialisez Autocomplete.js avec le champ de saisie et les données
new Autocomplete(input, {
    data: {
        src: data,
    },
    // Définissez les options supplémentaires ici
});