<?php

<<<<<<< HEAD
=======
declare(strict_types=1);

>>>>>>> 6824861dc37871b6d9adc282a23e55ea8f13ddd7
namespace Carbon\Doctrine;

use Carbon\Carbon;
use Carbon\CarbonInterface;
use DateTimeInterface;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Platforms\DB2Platform;
use Doctrine\DBAL\Platforms\OraclePlatform;
<<<<<<< HEAD
use Doctrine\DBAL\Platforms\SqlitePlatform;
use Doctrine\DBAL\Platforms\SQLServerPlatform;
use Doctrine\DBAL\Types\ConversionException;
=======
use Doctrine\DBAL\Platforms\SQLitePlatform;
use Doctrine\DBAL\Platforms\SQLServerPlatform;
use Doctrine\DBAL\Types\Exception\InvalidType;
use Doctrine\DBAL\Types\Exception\ValueNotConvertible;
>>>>>>> 6824861dc37871b6d9adc282a23e55ea8f13ddd7
use Exception;

/**
 * @template T of CarbonInterface
 */
trait CarbonTypeConverter
{
    /**
     * This property differentiates types installed by carbonphp/carbon-doctrine-types
     * from the ones embedded previously in nesbot/carbon source directly.
     *
     * @readonly
     */
    public bool $external = true;

    /**
     * @return class-string<T>
     */
    protected function getCarbonClassName(): string
    {
        return Carbon::class;
    }

    public function getSQLDeclaration(array $fieldDeclaration, AbstractPlatform $platform): string
    {
        $precision = min(
            $fieldDeclaration['precision'] ?? DateTimeDefaultPrecision::get(),
            $this->getMaximumPrecision($platform),
        );

        $type = parent::getSQLDeclaration($fieldDeclaration, $platform);

        if (!$precision) {
            return $type;
        }

        if (str_contains($type, '(')) {
            return preg_replace('/\(\d+\)/', "($precision)", $type);
        }

        [$before, $after] = explode(' ', "$type ");

        return trim("$before($precision) $after");
    }

    /**
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function convertToDatabaseValue($value, AbstractPlatform $platform): ?string
    {
        if ($value === null) {
            return $value;
        }

        if ($value instanceof DateTimeInterface) {
            return $value->format('Y-m-d H:i:s.u');
        }

        throw InvalidType::new(
            $value,
            static::class,
            ['null', 'DateTime', 'Carbon']
        );
    }

    private function doConvertToPHPValue(mixed $value)
    {
        $class = $this->getCarbonClassName();

        if ($value === null || is_a($value, $class)) {
            return $value;
        }

        if ($value instanceof DateTimeInterface) {
            return $class::instance($value);
        }

        $date = null;
        $error = null;

        try {
            $date = $class::parse($value);
        } catch (Exception $exception) {
            $error = $exception;
        }

        if (!$date) {
            throw ValueNotConvertible::new(
                $value,
<<<<<<< HEAD
                $this->getTypeName(),
=======
                static::class,
>>>>>>> 6824861dc37871b6d9adc282a23e55ea8f13ddd7
                'Y-m-d H:i:s.u or any format supported by '.$class.'::parse()',
                $error
            );
        }

        return $date;
    }

<<<<<<< HEAD
    /**
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function convertToDatabaseValue($value, AbstractPlatform $platform): ?string
=======
    private function getMaximumPrecision(AbstractPlatform $platform): int
>>>>>>> 6824861dc37871b6d9adc282a23e55ea8f13ddd7
    {
        if ($platform instanceof DB2Platform) {
            return 12;
        }

        if ($platform instanceof OraclePlatform) {
            return 9;
        }

<<<<<<< HEAD
        throw ConversionException::conversionFailedInvalidType(
            $value,
            $this->getTypeName(),
            ['null', 'DateTime', 'Carbon']
        );
=======
        if ($platform instanceof SQLServerPlatform || $platform instanceof SQLitePlatform) {
            return 3;
        }

        return 6;
>>>>>>> 6824861dc37871b6d9adc282a23e55ea8f13ddd7
    }

    private function getTypeName(): string
    {
        $chunks = explode('\\', static::class);
        $type = preg_replace('/Type$/', '', end($chunks));

        return strtolower(preg_replace('/([a-z])([A-Z])/', '$1_$2', $type));
    }

    private function getMaximumPrecision(AbstractPlatform $platform): int
    {
        if ($platform instanceof DB2Platform) {
            return 12;
        }

        if ($platform instanceof OraclePlatform) {
            return 9;
        }

        if ($platform instanceof SQLServerPlatform || $platform instanceof SqlitePlatform) {
            return 3;
        }

        return 6;
    }
}
