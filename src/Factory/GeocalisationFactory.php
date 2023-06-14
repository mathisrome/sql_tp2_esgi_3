<?php

namespace App\Factory;

use App\Entity\Geocalisation;
use App\Repository\GeocalisationRepository;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @extends ModelFactory<Geocalisation>
 *
 * @method        Geocalisation|Proxy                     create(array|callable $attributes = [])
 * @method static Geocalisation|Proxy                     createOne(array $attributes = [])
 * @method static Geocalisation|Proxy                     find(object|array|mixed $criteria)
 * @method static Geocalisation|Proxy                     findOrCreate(array $attributes)
 * @method static Geocalisation|Proxy                     first(string $sortedField = 'id')
 * @method static Geocalisation|Proxy                     last(string $sortedField = 'id')
 * @method static Geocalisation|Proxy                     random(array $attributes = [])
 * @method static Geocalisation|Proxy                     randomOrCreate(array $attributes = [])
 * @method static GeocalisationRepository|RepositoryProxy repository()
 * @method static Geocalisation[]|Proxy[]                 all()
 * @method static Geocalisation[]|Proxy[]                 createMany(int $number, array|callable $attributes = [])
 * @method static Geocalisation[]|Proxy[]                 createSequence(iterable|callable $sequence)
 * @method static Geocalisation[]|Proxy[]                 findBy(array $attributes)
 * @method static Geocalisation[]|Proxy[]                 randomRange(int $min, int $max, array $attributes = [])
 * @method static Geocalisation[]|Proxy[]                 randomSet(int $number, array $attributes = [])
 */
final class GeocalisationFactory extends ModelFactory
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
            'latitude' => self::faker()->latitude(),
            'longitude' => self::faker()->longitude(),
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): self
    {
        return $this
            // ->afterInstantiate(function(Geocalisation $geocalisation): void {})
        ;
    }

    protected static function getClass(): string
    {
        return Geocalisation::class;
    }
}
