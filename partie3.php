
<?php

class Personne {

    private string $nom = "";
    private string $prenom = "";
    private string $dateNaissance = "";

    // Modifier une propriété
    public function __set(string $name, mixed $value): void {

        if (!property_exists($this, $name)) {
            echo "Propriété $name inexistante" . PHP_EOL;
            return;
        }

        if ($name === "nom") {
            if (strlen(trim((string)$value)) < 2) {
                throw new InvalidArgumentException(
                    "Le nom doit contenir au moins 2 caractères."
                );
            }
        }

        $this->$name = $value;
    }

    // Lire une propriété
    public function __get(string $name): mixed {

        if (property_exists($this, $name)) {
            return $this->$name;
        }

        return null;
    }

    // Vérifier l'existence d'une propriété
    public function __isset(string $name): bool {

        if (property_exists($this, $name)) {
            return isset($this->$name);
        }

        return false;
    }

    // Supprimer une propriété
    public function __unset(string $name): void {

        if (property_exists($this, $name)) {
            $this->$name = "";
        }
    }
}

// Tests
$p = new Personne();

$p->nom = "Hachimi";
echo $p->nom . PHP_EOL;

var_dump(isset($p->nom));

unset($p->nom);

var_dump(isset($p->nom));

$p->telephone = "0600000000";

// Test de validation
try {
    $p->nom = "A";
} catch (InvalidArgumentException $e) {
    echo $e->getMessage() . PHP_EOL;
}
