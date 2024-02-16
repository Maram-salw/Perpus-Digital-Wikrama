<?php

<<<<<<< HEAD
namespace Carbon\Doctrine;

use Carbon\Carbon;
=======
declare(strict_types=1);

namespace Carbon\Doctrine;

use Carbon\Carbon;
use DateTime;
use Doctrine\DBAL\Platforms\AbstractPlatform;
>>>>>>> 6824861dc37871b6d9adc282a23e55ea8f13ddd7
use Doctrine\DBAL\Types\VarDateTimeType;

class DateTimeType extends VarDateTimeType implements CarbonDoctrineType
{
    /** @use CarbonTypeConverter<Carbon> */
    use CarbonTypeConverter;
<<<<<<< HEAD
=======

    /**
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function convertToPHPValue(mixed $value, AbstractPlatform $platform): ?Carbon
    {
        return $this->doConvertToPHPValue($value);
    }
>>>>>>> 6824861dc37871b6d9adc282a23e55ea8f13ddd7
}
