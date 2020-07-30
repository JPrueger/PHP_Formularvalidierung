window.addEventListener('load', function(){

    // --------------- ANIMATION: Card vergrößern ---------------

    // alle cards in var deklarieren
    var mag = document.querySelectorAll('.magazin_cover');
    console.log(mag)

    // mittel Schleife alle cards durchgehen 
    for (var i = 0; i < mag.length; i++) {

        // jeder card mouseenter hinzufügen
        mag[i].addEventListener('mouseenter', function (_e) {

            // aktuelle card auf der sich cursor befindet, in var deklarieren
            var current_card = _e.target;
            console.log(current_card)

            // Animation auf currend card hinzufügen
            gsap.to(current_card, {
                scale: 1.03, 
                ease: "power1.inOut",
                // from: "center",
            });

        });

        // jeder card mouseleave hinzufügen
        mag[i].addEventListener('mouseleave', function (_e) {

            // aktuelle card auf der sich cursor befindet, in var deklarieren
            var current_card = _e.target;
            console.log(current_card)

            // Animation auf currend card hinzufügen
            gsap.to(current_card, {
                scale: 1, 
                ease: "power1.inOut",
                // from: "center",
            });

        });

    };

});