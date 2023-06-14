<?php

namespace App\Factory;

use App\Entity\TypeActeurMedical;
use App\Repository\TypeActeurMedicalRepository;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @extends ModelFactory<TypeActeurMedical>
 *
 * @method        TypeActeurMedical|Proxy                     create(array|callable $attributes = [])
 * @method static TypeActeurMedical|Proxy                     createOne(array $attributes = [])
 * @method static TypeActeurMedical|Proxy                     find(object|array|mixed $criteria)
 * @method static TypeActeurMedical|Proxy                     findOrCreate(array $attributes)
 * @method static TypeActeurMedical|Proxy                     first(string $sortedField = 'id')
 * @method static TypeActeurMedical|Proxy                     last(string $sortedField = 'id')
 * @method static TypeActeurMedical|Proxy                     random(array $attributes = [])
 * @method static TypeActeurMedical|Proxy                     randomOrCreate(array $attributes = [])
 * @method static TypeActeurMedicalRepository|RepositoryProxy repository()
 * @method static TypeActeurMedical[]|Proxy[]                 all()
 * @method static TypeActeurMedical[]|Proxy[]                 createMany(int $number, array|callable $attributes = [])
 * @method static TypeActeurMedical[]|Proxy[]                 createSequence(iterable|callable $sequence)
 * @method static TypeActeurMedical[]|Proxy[]                 findBy(array $attributes)
 * @method static TypeActeurMedical[]|Proxy[]                 randomRange(int $min, int $max, array $attributes = [])
 * @method static TypeActeurMedical[]|Proxy[]                 randomSet(int $number, array $attributes = [])
 */
final class TypeActeurMedicalFactory extends ModelFactory
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
            'nom' => self::faker()->name,
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): self
    {
        return $this
            // ->afterInstantiate(function(TypeActeurMedical $typeActeurMedical): void {})
        ;
    }

    protected static function getClass(): string
    {
        return TypeActeurMedical::class;
    }
}
