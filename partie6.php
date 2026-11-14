<?php

class Animal {

    public function manger(): void {
        echo "Je mange." . PHP_EOL;
    }
}

class Chien extends Animal {

    public function aboyer(): void {
        echo "Wouf !" . PHP_EOL;
    }
}

class Chat extends Animal {

    public function miauler(): void {
        echo "Miaou !" . PHP_EOL;
    }
}

$c = new Chien();
$c->manger();
$c->aboyer();

$chat = new Chat();
$chat->manger();
$chat->miauler();

6.2
<?php

class Personne {

    public function __construct(protected string $nom) {}

    public function presentation(): string {
        return "Je suis " . $this->nom;
    }
}

class Etudiant extends Personne {

    public function __construct(
        string $nom,
        private string $filiere
    ) {
        parent::__construct($nom);
    }

    public function presentation(): string {
        return parent::presentation() .
               ", étudiant en " . $this->filiere;
    }
}

$e = new Etudiant("Ahmed", "Informatique");

echo $e->presentation() . PHP_EOL;
6.3
<?php

class Base {

    final public function afficher(): void {
        echo "Méthode finale" . PHP_EOL;
    }
}

final class Outil {
    public const VERSION = "1.0";
}

class Produit {

    public function __construct(
        public readonly string $reference
    ) {}
}

$p = new Produit("REF-001");

echo $p->reference . PHP_EOL;

// Test interdit :
// $p->reference = "REF-002";
6.4

<?php

class Personne {

    public string $nom;
    public string $prenom;

    private string $dateNaissance;
    private string $villeNaissance;
    private string $cin;

    public function __construct(
        string $nom,
        string $prenom,
        string $dateNaissance,
        string $villeNaissance,
        string $cin
    ) {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->dateNaissance = $dateNaissance;
        $this->villeNaissance = $villeNaissance;
        $this->cin = $cin;
    }

    protected function getAge(): int {

        $naissance = new DateTime($this->dateNaissance);
        $aujourdhui = new DateTime();

        return $naissance->diff($aujourdhui)->y;
    }

    public function __toString(): string {

        return $this->prenom . " " .
               $this->nom . " (" .
               $this->getAge() . " ans)";
    }
}

class Etudiant extends Personne {

    private string $cne;

    public function __construct(
        string $nom,
        string $prenom,
        string $dateNaissance,
        string $villeNaissance,
        string $cin,
        string $cne
    ) {
        parent::__construct(
            $nom,
            $prenom,
            $dateNaissance,
            $villeNaissance,
            $cin
        );

        $this->cne = $cne;
    }

    public function getCne(): string {
        return $this->cne;
    }

    public function __toString(): string {

        return parent::__toString() .
               " | CNE : " . $this->cne;
    }
}

// Création du tableau
$etudiants = [];

$etudiants[] = new Etudiant(
    "Hachimi", "Sara", "2000-05-14",
    "Marrakech", "EE123456", "CNE001"
);

$etudiants[] = new Etudiant(
    "Amrani", "Ahmed", "2002-03-10",
    "Casablanca", "EE123457", "CNE002"
);

$etudiants[] = new Etudiant(
    "Bennani", "Salma", "2003-07-20",
    "Rabat", "EE123458", "CNE003"
);

$etudiants[] = new Etudiant(
    "Alaoui", "Hind", "2001-11-05",
    "Fes", "EE123459", "CNE004"
);

$etudiants[] = new Etudiant(
    "Karimi", "Youssef", "2002-01-15",
    "Agadir", "EE123460", "CNE005"
);

// Affichage
foreach ($etudiants as $e) {
    echo $e . PHP_EOL;
}

