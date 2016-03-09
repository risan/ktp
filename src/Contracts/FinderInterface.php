<?php

namespace Ktp\Contracts;

interface FinderInterface
{
    /**
     * Find by NIK.
     *
     * @param int $nik
     *
     * @return array|null
     */
    public function findByNik($nik);
}
