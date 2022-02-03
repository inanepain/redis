<?php

declare(strict_types=1);

namespace Inane\Redis\Types;

use Inane\Redis\Type;

/**
 * Redis String Type
 *
 * @version 0.1.0
 * @package Lab\Redis
 */
class StringType extends AbstractType {
    /**
     * Get Type
     *
     * @return \Inane\Redis\Type Type
     */
    public function getType(): Type {
        return Type::STRING;
    }

    /**
     * Set Type
     *
     * @param \Inane\Redis\Type $type type
     *
     * @return \Inane\Redis\Types\TypeInterface
     */
    protected function setType(Type $type): TypeInterface {
        $this->type = $type;

        return $this;
    }

    /**
     * Get the value of value
     *
     * @return string
     */
    public function getValue(): string {
        return $this->conn()->get($this->getKey());
    }

    /**
     * Set the value of value
     *
     * @param mixed $value
     *
     * @return self|bool false if failed to set value else self
     */
    public function setValue(mixed $value): self|bool {
        $result = $this->conn()->set($this->getKey(), $value);

        return $result ? $this : false;
    }
}
