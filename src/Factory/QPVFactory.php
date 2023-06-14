<?php

namespace App\Factory;

use App\Entity\QPV;
use App\Repository\QPVRepository;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @extends ModelFactory<QPV>
 *
 * @method        QPV|Proxy                     create(array|callable $attributes = [])
 * @method static QPV|Proxy                     createOne(array $attributes = [])
 * @method static QPV|Proxy                     find(object|array|mixed $criteria)
 * @method static QPV|Proxy                     findOrCreate(array $attributes)
 * @method static QPV|Proxy                     first(string $sortedField = 'id')
 * @method static QPV|Proxy                     last(string $sortedField = 'id')
 * @method static QPV|Proxy                     random(array $attributes = [])
 * @method static QPV|Proxy                     randomOrCreate(array $attributes = [])
 * @method static QPVRepository|RepositoryProxy repository()
 * @method static QPV[]|Proxy[]                 all()
 * @method static QPV[]|Proxy[]                 createMany(int $number, array|callable $attributes = [])
 * @method static QPV[]|Proxy[]                 createSequence(iterable|callable $sequence)
 * @method static QPV[]|Proxy[]                 findBy(array $attributes)
 * @method static QPV[]|Proxy[]                 randomRange(int $min, int $max, array $attributes = [])
 * @method static QPV[]|Proxy[]                 randomSet(int $number, array $attributes = [])
 */
final class QPVFactory extends ModelFactory
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
            'nom' => self::faker()->name(),
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): self
    {
        return $this
            // ->afterInstantiate(function(QPV $qPV): void {})
        ;
    }

    protected static function getClass(): string
    {
        return QPV::class;
    }
}
