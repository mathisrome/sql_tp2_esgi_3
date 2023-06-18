<?php

namespace App\Factory;

use App\Entity\Salaire;
use App\Repository\SalaireRepository;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @extends ModelFactory<Salaire>
 *
 * @method        Salaire|Proxy                     create(array|callable $attributes = [])
 * @method static Salaire|Proxy                     createOne(array $attributes = [])
 * @method static Salaire|Proxy                     find(object|array|mixed $criteria)
 * @method static Salaire|Proxy                     findOrCreate(array $attributes)
 * @method static Salaire|Proxy                     first(string $sortedField = 'id')
 * @method static Salaire|Proxy                     last(string $sortedField = 'id')
 * @method static Salaire|Proxy                     random(array $attributes = [])
 * @method static Salaire|Proxy                     randomOrCreate(array $attributes = [])
 * @method static SalaireRepository|RepositoryProxy repository()
 * @method static Salaire[]|Proxy[]                 all()
 * @method static Salaire[]|Proxy[]                 createMany(int $number, array|callable $attributes = [])
 * @method static Salaire[]|Proxy[]                 createSequence(iterable|callable $sequence)
 * @method static Salaire[]|Proxy[]                 findBy(array $attributes)
 * @method static Salaire[]|Proxy[]                 randomRange(int $min, int $max, array $attributes = [])
 * @method static Salaire[]|Proxy[]                 randomSet(int $number, array $attributes = [])
 */
final class SalaireFactory extends ModelFactory
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
            'salaire_brut' => rand(1200, 5000) * 100,
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): self
    {
        return $this
            // ->afterInstantiate(function(Salaire $salaire): void {})
        ;
    }

    protected static function getClass(): string
    {
        return Salaire::class;
    }
}
