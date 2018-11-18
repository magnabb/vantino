<?php declare(strict_types=1);

namespace App\Serializer;

use Symfony\Component\PropertyAccess\PropertyAccessorInterface;
use Symfony\Component\PropertyInfo\PropertyTypeExtractorInterface;
use Symfony\Component\Serializer\Mapping\Factory\ClassMetadataFactoryInterface;
use Symfony\Component\Serializer\NameConverter\NameConverterInterface;

class ObjectNormalizer extends \Symfony\Component\Serializer\Normalizer\ObjectNormalizer
{
    public function __construct(ClassMetadataFactoryInterface $classMetadataFactory = null, NameConverterInterface $nameConverter = null, PropertyAccessorInterface $propertyAccessor = null, PropertyTypeExtractorInterface $propertyTypeExtractor = null)
    {
        parent::__construct($classMetadataFactory, $nameConverter, $propertyAccessor, new \Symfony\Component\PropertyInfo\Extractor\ReflectionExtractor());

        $this->setCircularReferenceHandler(function ($object) {
            /* @noinspection PhpUndefinedMethodInspection */
            return $object->getId();
        });
    }
}
