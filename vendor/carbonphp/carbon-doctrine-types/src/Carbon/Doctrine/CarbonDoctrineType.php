<?php

<<<<<<< HEAD
=======
declare(strict_types=1);

>>>>>>> 6824861dc37871b6d9adc282a23e55ea8f13ddd7
namespace Carbon\Doctrine;

use Doctrine\DBAL\Platforms\AbstractPlatform;

interface CarbonDoctrineType
{
    public function getSQLDeclaration(array $fieldDeclaration, AbstractPlatform $platform);

<<<<<<< HEAD
    public function convertToPHPValue($value, AbstractPlatform $platform);
=======
    public function convertToPHPValue(mixed $value, AbstractPlatform $platform);
>>>>>>> 6824861dc37871b6d9adc282a23e55ea8f13ddd7

    public function convertToDatabaseValue($value, AbstractPlatform $platform);
}
