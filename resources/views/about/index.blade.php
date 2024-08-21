<x-guest-layout>
    <h1 class="font-extrabold text-3xl mb-6 text-transparent bg-clip-text bg-gradient-to-r from-instagramPurple via-instagramRed to-instagramOrange">
        Qui je suis ..
    </h1>
    <div class="text-black" id="about-text">


        <p >
            Bienvenue sur Pokédexia ! Je suis Mohammed Malha, un étudiant en informatique et fervent admirateur de l'univers Pokémon. Pokédexia est bien plus qu'une simple application, c'est un projet né de mon désir d'offrir à chaque dresseur une ressource inestimable pour explorer le monde des Pokémon. Mon objectif est de vous accompagner dans vos aventures, en vous fournissant les informations les plus complètes et les plus fiables.

            Pokédexia a été conçu pour être votre guide ultime dans l'univers Pokémon. Avec des technologies modernes comme Vue.js et Python, j'ai mis en place une plateforme à la fois puissante et accessible. L'expérience utilisateur est au cœur de mon travail, vous assurant une navigation fluide et une recherche rapide pour trouver toutes les informations dont vous avez besoin.

            Ce que Pokédexia vous offre :
            Une Interface Clairvoyante : Grâce à une interface soignée et intuitive, Pokédexia vous permet de découvrir et d'explorer chaque Pokémon avec facilité.

            Sécurité et Confidentialité : Votre sécurité est une priorité. Pokédexia intègre des protocoles avancés pour protéger vos données tout en vous offrant une expérience sereine.

            Des Performances de Haut Niveau : Pokédexia est optimisé pour vous fournir des réponses rapides et précises, afin que vous puissiez vous concentrer sur l'essentiel : votre passion pour les Pokémon.

            Adaptabilité et Evolution : Pokédexia est conçu pour évoluer avec vos besoins, offrant des options de personnalisation qui vous permettent d'enrichir et de moduler votre expérience.

            "Comme un dresseur qui façonne son équipe pour devenir maître, Pokédexia est là pour vous offrir les outils nécessaires à votre succès."

            "Pokédexia est le lien entre vous et le monde des Pokémon, un guide aussi indispensable que votre premier Starter Pokémon."

            "Créée avec la même attention que le Professeur Chen consacre à ses recherches, Pokédexia est votre source d'information la plus fiable."

            "À l'image de la détermination de chaque dresseur, Pokédexia est une application conçue pour s'adapter et grandir avec vous."

            Merci d'avoir choisi Pokédexia pour vous accompagner dans votre aventure Pokémon. J'espère que cette application sera à la hauteur de vos attentes et deviendra votre alliée fidèle dans vos découvertes. Vos impressions sont précieuses, et je suis enthousiaste à l'idée de voir comment Pokédexia pourra enrichir votre parcours. Ensemble, continuons d'explorer les mystères de cet univers fascinant.</p>
    </div>
</x-guest-layout>

<script>
document.addEventListener("DOMContentLoaded", function() {
    function typeEffect(element, speed) {
        let text = element.innerHTML;
        element.innerHTML = "";
        let i = 0;
        let timer = setInterval(function() {
            if (i < text.length) {
                element.append(text.charAt(i));
                i++;
            } else {
                clearInterval(timer);
            }
        }, speed);
    }

    let speed = 60; // Vitesse de l'effet
    let line1 = document.getElementById('line1');
    let line2 = document.getElementById('line2');

    typeEffect(line1, speed);

    // Ajoute un délai avant de commencer la deuxième ligne
    setTimeout(function() {
        typeEffect(line2, speed);
    }, line1.innerHTML.length * speed + 500); // Délai basé sur la longueur du texte
});
</script>

<style>
    #about-text {
        white-space: pre-wrap; /* Préserve les espaces et les retours à la ligne */
    }
</style>
