<?php

namespace App\Factory;

use App\Entity\ActeMedical;
use App\Repository\ActeMedicalRepository;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @extends ModelFactory<ActeMedical>
 *
 * @method        ActeMedical|Proxy                     create(array|callable $attributes = [])
 * @method static ActeMedical|Proxy                     createOne(array $attributes = [])
 * @method static ActeMedical|Proxy                     find(object|array|mixed $criteria)
 * @method static ActeMedical|Proxy                     findOrCreate(array $attributes)
 * @method static ActeMedical|Proxy                     first(string $sortedField = 'id')
 * @method static ActeMedical|Proxy                     last(string $sortedField = 'id')
 * @method static ActeMedical|Proxy                     random(array $attributes = [])
 * @method static ActeMedical|Proxy                     randomOrCreate(array $attributes = [])
 * @method static ActeMedicalRepository|RepositoryProxy repository()
 * @method static ActeMedical[]|Proxy[]                 all()
 * @method static ActeMedical[]|Proxy[]                 createMany(int $number, array|callable $attributes = [])
 * @method static ActeMedical[]|Proxy[]                 createSequence(iterable|callable $sequence)
 * @method static ActeMedical[]|Proxy[]                 findBy(array $attributes)
 * @method static ActeMedical[]|Proxy[]                 randomRange(int $min, int $max, array $attributes = [])
 * @method static ActeMedical[]|Proxy[]                 randomSet(int $number, array $attributes = [])
 */
final class ActeMedicalFactory extends ModelFactory
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
            'cout' => self::faker()->randomNumber(),
            'nom' => self::faker()->text(255),
            'pourcentage_securite_social' => self::faker()->randomNumber(),
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): self
    {
        return $this
            // ->afterInstantiate(function(ActeMedical $acteMedical): void {})
        ;
    }

    protected static function getClass(): string
    {
        return ActeMedical::class;
    }
}
