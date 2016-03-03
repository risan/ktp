<?php

namespace Ktp\Contracts;

interface Finder
{
    /**
     * Find by NIK.
     *
     * @param  int $nik
     * @return array|null
     */
    public function findByNik($nik);
}
