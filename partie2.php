
<?php

class Voiture {

    public function __construct(
        public string $couleur = "Blanche",
        public int $vitesse = 0
    ) {}

    public function afficher(): void {
        echo "Couleur : {$this->couleur} | Vitesse : {$this->vitesse} km/h" . PHP_EOL;
    }
}

$v1 = new Voiture();
$v2 = new Voiture("Rouge", 50);
$v3 = new Voiture("Noire");
$v4 = new Voiture(120);

$v1->afficher();
$v2->afficher();
$v3->afficher();
$v4->afficher();

2.2
public function __construct(
    string $nom = "",
    string $prenom = ""
) {
    echo "Création " . __CLASS__ . PHP_EOL;

    $this->nom = $nom;
    $this->prenom = $prenom;
}
2.3

<?php

class Voiture {

    public function __construct(public string $couleur) {
        echo "Voiture {$this->couleur} créée." . PHP_EOL;
    }

    public function __destruct() {
        echo "Voiture {$this->couleur} détruite." . PHP_EOL;
    }
}

$maVoiture = new Voiture("Blanche");

unset($maVoiture);

echo "Fin du script." . PHP_EOL;
