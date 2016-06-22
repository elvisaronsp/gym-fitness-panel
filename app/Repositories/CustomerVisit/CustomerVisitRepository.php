<?php

namespace App\Repositories\CustomerVisit;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface CustomerVisitRepository
 * @package namespace App\Repositories\CustomerVisit;
 */
interface CustomerVisitRepository extends RepositoryInterface
{
    public function insertVisit(array $data);
    public function cancelVisit(array $data);
}
