<?php

namespace App\Repositories\CustomerSingleEntry;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface CustomerSingleEntryRepository
 * @package namespace App\Repositories\CustomerSingleEntry;
 */
interface CustomerSingleEntryRepository extends RepositoryInterface
{
    public function summary();
    public function betweenCreatedAtDatesRange($start, $stop);
    public function groupByCreatedAtMonth();
    public function orderByCreatedAt();
}
