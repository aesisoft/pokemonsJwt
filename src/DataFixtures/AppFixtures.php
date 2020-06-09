<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Entity\Pokemon;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    private $passwordEncoder;
   public function __construct(UserPasswordEncoderInterface $passwordEncoder)
   {
      $this->passwordEncoder = $passwordEncoder;
   }

    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setUsername('angular');
        $user->setRoles( array_unique( ['ROLE_user']) );
        $password = $this->passwordEncoder->encodePassword($user, 'angular2020');
        $user->setPassword($password);           
        $manager->persist($user);
        $manager->flush();

        $this->addPokemon('Piafabec',  70, 20, ['Normal','Vol'], 'https://www.pokepedia.fr/images/7/7d/Piafabec-RFVF.png', $manager);
        $this->addPokemon('Salamèche',   60, 10, ['Feu'], 'https://www.pokepedia.fr/images/8/89/Salam%C3%A8che-RFVF.png', $manager);
        $this->addPokemon('Pikachu',    70, 20, ['Electrik'], 'https://www.pokepedia.fr/images/e/e7/Pikachu-RFVF.png', $manager);
        $this->addPokemon('Couafarel',  80, 30, ['Normal'], 'https://www.pokepedia.fr/images/0/0e/Couafarel_%28Forme_Sauvage%29-XY.png', $manager);
        $this->addPokemon('Psykokwak',  60, 30, ['Eau'], 'https://www.pokepedia.fr/images/4/44/Psykokwak-RFVF.png', $manager);
        $this->addPokemon('Spododo',    60, 10, ['Plante', 'Fée'], 'https://www.pokepedia.fr/images/1/10/Spododo-SL.png', $manager);
        $this->addPokemon('Mimitoss',   60, 20, ['Insecte','Poison'], 'https://www.pokepedia.fr/images/a/a5/Mimitoss-RFVF.png', $manager);
        $this->addPokemon('Cosmog',     60,  0, ['Psy'], 'https://www.pokepedia.fr/images/6/6f/Cosmog-SL.png', $manager);
        $this->addPokemon('Larveyette', 50, 20, ['Insecte','Plante'], 'https://www.pokepedia.fr/images/1/1f/Larveyette-NB.png', $manager);
        $this->addPokemon('Écayon',     50, 10, ['Eau'], 'https://www.pokepedia.fr/images/4/48/%C3%89cayon-DP.png', $manager);
        $this->addPokemon('Mucuscule',  50, 20, ['Dragon'], 'https://www.pokepedia.fr/images/a/a6/Mucuscule-XY.png', $manager);
        $this->addPokemon('Saquedeneu', 30, 20, ['Plante'], 'https://www.pokepedia.fr/images/d/dc/Saquedeneu-RFVF.png', $manager);
    }

    private function addPokemon($nom, $pv, $pd, $types,$img, ObjectManager $manager) {
        $pokemon = new Pokemon();
        $pokemon->setNom($nom);
        $pokemon->setPtvie($pv);
        $pokemon->setPtdegat($pd);
        $pokemon->setTypes($types);
        $pokemon->setImage($img);
        $pokemon->setCreated(new \DateTime());
        $manager->persist($pokemon);
        $manager->flush();
    }
}
