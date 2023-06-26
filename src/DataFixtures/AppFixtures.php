<?php

namespace App\DataFixtures;

use App\Entity\Entreprise;
use App\Factory\ActeMedicalFactory;
use App\Factory\AdresseFactory;
use App\Factory\EntrepriseFactory;
use App\Factory\GeocalisationFactory;
use App\Factory\PrestationMedicaleFactory;
use App\Factory\QPVFactory;
use App\Factory\RegionFactory;
use App\Factory\RetraiteFactory;
use App\Factory\SalaireFactory;
use App\Factory\SalarieFactory;
use App\Factory\StatutFactory;
use App\Factory\TypeActeurMedicalFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $hopital = TypeActeurMedicalFactory::createOne([
            'nom' => 'Hôpital'
        ]);

        $hopital->addActeMedical(ActeMedicalFactory::createOne([
            'nom' => 'Accueil Urgence',
            'cout' => 70 * 100,
            'pourcentage_securite_social' => 100
        ])->object());
        $hopital->addActeMedical(ActeMedicalFactory::createOne([
            'nom' => 'Chirurgie du pied',
            'cout' => 570 * 100,
            'pourcentage_securite_social' => 100
        ])->object());
        $hopital->addActeMedical(ActeMedicalFactory::createOne([
            'nom' => 'Chirurgie esthétique',
            'cout' => 1500 * 100,
            'pourcentage_securite_social' => 20
        ])->object());
        $hopital->addActeMedical(ActeMedicalFactory::createOne([
            'nom' => 'Chirurgie cardiaque',
            'cout' => 3000 * 100,
            'pourcentage_securite_social' => 95
        ])->object());
        $hopital->addActeMedical(ActeMedicalFactory::createOne([
            'nom' => 'Intervention estomac (anneau gastrique)',
            'cout' => 394 * 100,
            'pourcentage_securite_social' => 57
        ])->object());
        $hopital->addActeMedical(ActeMedicalFactory::createOne([
            'nom' => 'Radiologie tête',
            'cout' => 216 * 100,
            'pourcentage_securite_social' => 100
        ])->object());
        $hopital->addActeMedical(ActeMedicalFactory::createOne([
            'nom' => 'Radiologie jambe',
            'cout' => 345 * 100,
            'pourcentage_securite_social' => 67
        ])->object());
        $hopital->addActeMedical(ActeMedicalFactory::createOne([
            'nom' => 'Dents de sagesse',
            'cout' => 850 * 100,
            'pourcentage_securite_social' => 72
        ])->object());
        $hopital->addActeMedical(ActeMedicalFactory::createOne([
            'nom' => 'Pose de prothèse',
            'cout' => 4678 * 100,
            'pourcentage_securite_social' => 31
        ])->object());


        $generaliste = TypeActeurMedicalFactory::createOne([
            'nom' => 'Généraliste'
        ]);
        $generaliste->addActeMedical(ActeMedicalFactory::createOne([
            'nom' => 'Consultation',
            'cout' => 50 * 100,
            'pourcentage_securite_social' => 100
        ])->object());
        $generaliste->addActeMedical(ActeMedicalFactory::createOne([
            'nom' => 'Vaccination',
            'cout' => 72 * 100,
            'pourcentage_securite_social' => 89
        ])->object());
        $generaliste->addActeMedical(ActeMedicalFactory::createOne([
            'nom' => 'Déplacement à domicile',
            'cout' => 130 * 100,
            'pourcentage_securite_social' => 23
        ])->object());

        $specialiste = TypeActeurMedicalFactory::createOne([
            'nom' => 'Spécialiste'
        ]);
        $specialiste->addActeMedical(ActeMedicalFactory::createOne([
            'nom' => 'Echographie cardiaque',
            'cout' => 245 * 100,
            'pourcentage_securite_social' => 84
        ])->object());
        $specialiste->addActeMedical(ActeMedicalFactory::createOne([
            'nom' => 'Dermato',
            'cout' => 111 * 100,
            'pourcentage_securite_social' => 100
        ])->object());
        $specialiste->addActeMedical(ActeMedicalFactory::createOne([
            'nom' => 'Dentiste – routine',
            'cout' => 65 * 100,
            'pourcentage_securite_social' => 87
        ])->object());
        $specialiste->addActeMedical(ActeMedicalFactory::createOne([
            'nom' => 'Dentiste – couronne',
            'cout' => 2300 * 100,
            'pourcentage_securite_social' => 62
        ])->object());
        $specialiste->addActeMedical(ActeMedicalFactory::createOne([
            'nom' => 'Podologue',
            'cout' => 56 * 100,
            'pourcentage_securite_social' => 100
        ])->object());
        $specialiste->addActeMedical(ActeMedicalFactory::createOne([
            'nom' => 'Psychologue',
            'cout' => 70 * 100,
            'pourcentage_securite_social' => 92
        ])->object());
        $specialiste->addActeMedical(ActeMedicalFactory::createOne([
            'nom' => 'Virusologue',
            'cout' => 142 * 100,
            'pourcentage_securite_social' => 7
        ])->object());
        $specialiste->addActeMedical(ActeMedicalFactory::createOne([
            'nom' => 'Kiné',
            'cout' => 60 * 100,
            'pourcentage_securite_social' => 23
        ])->object());

        $cadre = StatutFactory::createOne([
            'nom' => 'Cadre',
            'pourcentage_taxe' => 27
        ])->object();

        $non_cadre = StatutFactory::createOne([
            'nom' => 'Non cadre',
            'pourcentage_taxe' => 23
        ])->object();

        $entreprises_proxy = EntrepriseFactory::createMany(10);

        GeocalisationFactory::createMany(100);
        QPVFactory::createMany(10, function () {
            return [
                'geocalisations' => GeocalisationFactory::randomRange(3, 6),
            ];
        });

        AdresseFactory::createMany(50, function () {
            return [
                'region' => RegionFactory::createOne(),
                'geocalisation' => GeocalisationFactory::random(),
                'qpv' => QPVFactory::random()
            ];
        });

        AdresseFactory::createMany(100, function () {
            return [
                'region' => RegionFactory::randomOrCreate(),
                'geocalisation' => GeocalisationFactory::random()
            ];
        });

        foreach ($entreprises_proxy as $entreprise_proxy) {
            /** @var Entreprise $entreprise */
            $entreprise = $entreprise_proxy->object();
            $salaries_proxy = SalarieFactory::createMany(rand(3, 50), function () use ($cadre, $entreprise) {
                return [
                    'statut' => $cadre,
                    'salaires' => SalaireFactory::createMany(rand(0, 10), [
                        'entreprise' => $entreprise
                    ]),
                    'adresse' => AdresseFactory::random(),
                    'entreprise' => $entreprise
                ];
            });
            foreach ($salaries_proxy as $item) {
                $entreprise->addSalary($item->object());
            }

            $salaries_proxy = SalarieFactory::createMany(rand(3, 50), function () use ($non_cadre, $entreprise) {
                return [
                    'statut' => $non_cadre,
                    'salaires' => SalaireFactory::createMany(rand(0, 10), [
                        'entreprise' => $entreprise
                    ]),
                    'adresse' => AdresseFactory::random(),
                    'entreprise' => $entreprise
                ];
            });
            foreach ($salaries_proxy as $item) {
                $entreprise->addSalary($item->object());
            }
        }

        RetraiteFactory::createMany(50, function () {
            return [
                'adresse' => AdresseFactory::random()
            ];
        });

        PrestationMedicaleFactory::createMany(40, function () use ($cadre) {
            return [
                'acte_medical' => ActeMedicalFactory::random(),
                'utilisateur' => SalarieFactory::random([
                    'statut' => $cadre
                ]),
            ];
        });

        PrestationMedicaleFactory::createMany(40, function () use ($non_cadre) {
            return [
                'acte_medical' => ActeMedicalFactory::random(),
                'utilisateur' => SalarieFactory::random([
                    'statut' => $non_cadre
                ])
            ];
        });

        PrestationMedicaleFactory::createMany(20, function () use ($non_cadre) {
            return [
                'acte_medical' => ActeMedicalFactory::random(),
                'utilisateur' => RetraiteFactory::random()
            ];
        });

        $manager->flush();
    }
}
