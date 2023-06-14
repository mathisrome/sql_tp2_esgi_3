<?php

namespace App\Factory;

use App\Entity\PrestationMedical;
use App\Repository\PrestationMedicalRepository;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @extends ModelFactory<PrestationMedical>
 *
 * @method        PrestationMedical|Proxy                     create(array|callable $attributes = [])
 * @method static PrestationMedical|Proxy                     createOne(array $attributes = [])
 * @method static PrestationMedical|Proxy                     find(object|array|mixed $criteria)
 * @method static PrestationMedical|Proxy                     findOrCreate(array $attributes)
 * @method static PrestationMedical|Proxy                     first(string $sortedField = 'id')
 * @method static PrestationMedical|Proxy                     last(string $sortedField = 'id')
 * @method static PrestationMedical|Proxy                     random(array $attributes = [])
 * @method static PrestationMedical|Proxy                     randomOrCreate(array $attributes = [])
 * @method static PrestationMedicalRepository|RepositoryProxy repository()
 * @method static PrestationMedical[]|Proxy[]                 all()
 * @method static PrestationMedical[]|Proxy[]                 createMany(int $number, array|callable $attributes = [])
 * @method static PrestationMedical[]|Proxy[]                 createSequence(iterable|callable $sequence)
 * @method static PrestationMedical[]|Proxy[]                 findBy(array $attributes)
 * @method static PrestationMedical[]|Proxy[]                 randomRange(int $min, int $max, array $attributes = [])
 * @method static PrestationMedical[]|Proxy[]                 randomSet(int $number, array $attributes = [])
 */
final class PrestationMedicalFactory extends ModelFactory
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
        return PrestationMedical::class;
    }
}
