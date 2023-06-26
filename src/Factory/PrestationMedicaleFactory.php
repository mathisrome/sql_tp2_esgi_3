<?php

namespace App\Factory;

use App\Entity\PrestationMedicale;
use App\Repository\PrestationMedicaleRepository;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @extends ModelFactory<PrestationMedical>
 *
 * @method        PrestationMedicale|Proxy                     create(array|callable $attributes = [])
 * @method static PrestationMedicale|Proxy                     createOne(array $attributes = [])
 * @method static PrestationMedicale|Proxy                     find(object|array|mixed $criteria)
 * @method static PrestationMedicale|Proxy                     findOrCreate(array $attributes)
 * @method static PrestationMedicale|Proxy                     first(string $sortedField = 'id')
 * @method static PrestationMedicale|Proxy                     last(string $sortedField = 'id')
 * @method static PrestationMedicale|Proxy                     random(array $attributes = [])
 * @method static PrestationMedicale|Proxy                     randomOrCreate(array $attributes = [])
 * @method static PrestationMedicaleRepository|RepositoryProxy repository()
 * @method static PrestationMedicale[]|Proxy[]                 all()
 * @method static PrestationMedicale[]|Proxy[]                 createMany(int $number, array|callable $attributes = [])
 * @method static PrestationMedicale[]|Proxy[]                 createSequence(iterable|callable $sequence)
 * @method static PrestationMedicale[]|Proxy[]                 findBy(array $attributes)
 * @method static PrestationMedicale[]|Proxy[]                 randomRange(int $min, int $max, array $attributes = [])
 * @method static PrestationMedicale[]|Proxy[]                 randomSet(int $number, array $attributes = [])
 */
final class PrestationMedicaleFactory extends ModelFactory
{
    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#factories-as-services
     *
     * @todo inject services if required
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     *
     * @todo add your default values here
     */
    protected function getDefaults(): array
    {
        return [
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): self
    {
        return $this
            // ->afterInstantiate(function(PrestationMedical $prestationMedical): void {})
        ;
    }

    protected static function getClass(): string
    {
        return PrestationMedicale::class;
    }
}
