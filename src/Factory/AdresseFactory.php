<?php

namespace App\Factory;

use App\Entity\Adresse;
use App\Repository\AdresseRepository;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @extends ModelFactory<Adresse>
 *
 * @method        Adresse|Proxy                     create(array|callable $attributes = [])
 * @method static Adresse|Proxy                     createOne(array $attributes = [])
 * @method static Adresse|Proxy                     find(object|array|mixed $criteria)
 * @method static Adresse|Proxy                     findOrCreate(array $attributes)
 * @method static Adresse|Proxy                     first(string $sortedField = 'id')
 * @method static Adresse|Proxy                     last(string $sortedField = 'id')
 * @method static Adresse|Proxy                     random(array $attributes = [])
 * @method static Adresse|Proxy                     randomOrCreate(array $attributes = [])
 * @method static AdresseRepository|RepositoryProxy repository()
 * @method static Adresse[]|Proxy[]                 all()
 * @method static Adresse[]|Proxy[]                 createMany(int $number, array|callable $attributes = [])
 * @method static Adresse[]|Proxy[]                 createSequence(iterable|callable $sequence)
 * @method static Adresse[]|Proxy[]                 findBy(array $attributes)
 * @method static Adresse[]|Proxy[]                 randomRange(int $min, int $max, array $attributes = [])
 * @method static Adresse[]|Proxy[]                 randomSet(int $number, array $attributes = [])
 */
final class AdresseFactory extends ModelFactory
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
            'rue' => self::faker()->streetAddress,
            'ville' => self::faker()->city,
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): self
    {
        return $this
            // ->afterInstantiate(function(Adresse $adresse): void {})
        ;
    }

    protected static function getClass(): string
    {
        return Adresse::class;
    }
}
