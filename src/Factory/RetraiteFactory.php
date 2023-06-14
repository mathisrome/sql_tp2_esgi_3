<?php

namespace App\Factory;

use App\Entity\Retraite;
use App\Repository\RetraiteRepository;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @extends ModelFactory<Retraite>
 *
 * @method        Retraite|Proxy                     create(array|callable $attributes = [])
 * @method static Retraite|Proxy                     createOne(array $attributes = [])
 * @method static Retraite|Proxy                     find(object|array|mixed $criteria)
 * @method static Retraite|Proxy                     findOrCreate(array $attributes)
 * @method static Retraite|Proxy                     first(string $sortedField = 'id')
 * @method static Retraite|Proxy                     last(string $sortedField = 'id')
 * @method static Retraite|Proxy                     random(array $attributes = [])
 * @method static Retraite|Proxy                     randomOrCreate(array $attributes = [])
 * @method static RetraiteRepository|RepositoryProxy repository()
 * @method static Retraite[]|Proxy[]                 all()
 * @method static Retraite[]|Proxy[]                 createMany(int $number, array|callable $attributes = [])
 * @method static Retraite[]|Proxy[]                 createSequence(iterable|callable $sequence)
 * @method static Retraite[]|Proxy[]                 findBy(array $attributes)
 * @method static Retraite[]|Proxy[]                 randomRange(int $min, int $max, array $attributes = [])
 * @method static Retraite[]|Proxy[]                 randomSet(int $number, array $attributes = [])
 */
final class RetraiteFactory extends ModelFactory
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
            // ->afterInstantiate(function(Retraite $retraite): void {})
        ;
    }

    protected static function getClass(): string
    {
        return Retraite::class;
    }
}
