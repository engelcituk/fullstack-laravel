<?php

namespace App\Traits\ViewModels;

trait WithPerPage {
    protected function perPage( int $perPage = 10 ): int
    {
        return request('perPage') ?? $perPage;
    }
}
