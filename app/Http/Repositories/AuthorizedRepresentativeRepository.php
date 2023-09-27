<?php

namespace App\Http\Repositories;

use App\Models\AuthorizedRepresentative;

class AuthorizedRepresentativeRepository extends BaseRepository
{
    public function __construct(AuthorizedRepresentative $authorizedRepresentative)
    {
        $this->model = $authorizedRepresentative;
    }
}
