<?php

namespace MPWAR\Module\Player\Domain;

use MPWAR\Module\Player\Contract\Exception\PlayerIdNotValidException;
use Rhumsaa\Uuid\Uuid;

final class PlayerId
{
    private $id;

    public function __construct($id)
    {
        $this->guard($id);

        $this->id = $id;
    }

    public function id()
    {
        return $this->id;
    }

    private function guard($id)
    {
        if (!Uuid::isValid($id)) {
            throw new PlayerIdNotValidException($id);
        }
    }

    public function __toString()
    {
        return $this->id();
    }
}