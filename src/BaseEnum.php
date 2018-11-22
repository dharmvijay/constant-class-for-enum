<?php

namespace Dharmvijay\ConstantClassForEnum;

use ReflectionClass;

abstract class BaseEnum
{
    const DEFAULT_VALUE = 0;

    /**
     * Returns value for existing constant using its key
     * @method getValueByKey()
     * @param $key
     * @return int|mixed
     * @throws \ReflectionException
     */
    public static function getValueByKey($key)
    {
        $className = get_called_class();
        $reflectionClass = new ReflectionClass($className);

        if (! $reflectionClass->hasConstant($key)) {
            return static::DEFAULT_VALUE;
        }

        return $reflectionClass->getConstant($key);
    }

    /**
     * Returns the enum values.
     *
     * @return array
     * @throws \ReflectionException
     */
    public static function getValues()
    {
        return array_values(static::toDictionary());
    }

    /**
     * Returns the enum keys.
     * @return array
     * @throws \ReflectionException
     */
    public static function getKeys()
    {
        return array_keys(static::toDictionary());
    }

    /**
     * Returns the enum as dictionary.
     * @return array
     * @throws \ReflectionException
     */
    public static function toDictionary()
    {
        $className = get_called_class();
        $reflectionClass = new ReflectionClass($className);
        $dictionary = $reflectionClass->getConstants();
        
        unset($dictionary['DEFAULT_VALUE']);

        return $dictionary;
    }

    /**
     * Returns the enum as dictionary in ascending order.
     * @return array
     * @throws \ReflectionException
     */
    protected static function getClassConstantsInAscendingOrder()
    {
        $constants = self::toDictionary();

        ksort($constants);

        return $constants;
    }

    /**
     * Returns the enum as dictionary in descending order.
     * @return array
     * @throws \ReflectionException
     */
    protected static function getClassConstantsInDescendingOrder()
    {
        $constants = self::toDictionary();

        krsort($constants);

        return $constants;
    }

    /**
     * Checks if a value exists in constant values.
     *
     * @param mixed $value
     *
     * @return bool
     * @throws \ReflectionException
     */
    public static function hasValue($value)
    {
        return in_array($value, static::getValues(), true);
    }

    /**
     * Checks if a key exists in constant names.
     *
     * @param string $key
     *
     * @return bool
     * @throws \ReflectionException
     */
    public static function hasKey($key)
    {
        return in_array($key, static::getKeys());
    }

}
