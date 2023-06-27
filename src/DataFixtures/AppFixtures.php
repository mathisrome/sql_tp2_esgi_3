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

        QPVFactory::createOne([
            'points' => '45.73214477619171 4.816716534414758, 45.74400463795999 4.813080546592355, 45.749804177101524 4.819462076239839, 45.7462313179966, 4.828960166877956'
        ]);

        QPVFactory::createOne([
            'points' => '45.76157337233287 4.845381542401693, 45.75387585748982 4.846945894161872, 45.751664061596934 4.853573805853284, 45.76068304235505 4.852009454093105'
        ]);

        QPVFactory::createOne([
            'points' => '45.739202170596535 4.892211539586822, 45.73551268749595 4.9025589603428, 45.7472867810717 4.906720423038139, 45.75046536063158 4.897216542017703'
        ]);

        AdresseFactory::createOne([
            'rue' => '70 Quai Perrache',
            'ville' => 'Lyon',
            'region' => RegionFactory::createOne([
                'nom' => 'Rhône-Alpes'
            ]),
            'geocalisation' => GeocalisationFactory::createOne([
                'longitude' => 45.73746383873708,
                'latitude' => 4.820755684763793
            ])
        ]);

        AdresseFactory::createOne([
            'rue' => '48 Quai Perrache',
            'ville' => 'Lyon',
            'region' => RegionFactory::random([
                'nom' => 'Rhône-Alpes'
            ]),
            'geocalisation' => GeocalisationFactory::createOne([
                'longitude' => 45.74077026415555,
                'latitude' => 4.823165445560088
            ])
        ]);

        AdresseFactory::createOne([
            'rue' => '95 Bd Pinel',
            'ville' => 'Bron',
            'region' => RegionFactory::random([
                'nom' => 'Rhône-Alpes'
            ]),
            'geocalisation' => GeocalisationFactory::createOne([
                'longitude' => 45.741748719265495,
                'latitude' => 4.894672358032629,
            ])
        ]);

        AdresseFactory::createMany(97, function () {
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
                    'salaires' => SalaireFactory::createMany(rand(1, 10), [
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
                    'salaires' => SalaireFactory::createMany(rand(1, 10), [
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
