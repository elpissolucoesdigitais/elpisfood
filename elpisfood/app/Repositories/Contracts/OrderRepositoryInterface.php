<?php

namespace App\Repositories\Contracts;

interface OrderRepositoryInterface
{
    public function createNewOrder(string $identify, float $total, string $status, int $tenantId, int $clientId, int $tableId);

    public function getOrderByIdentify(string $identify);
}
