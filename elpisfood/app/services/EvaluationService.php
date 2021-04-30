<?php

namespace App\Services;

use App\Repositories\Contracts\EvaluationRepositoryInterface;
use App\Repositories\Contracts\OrderRepositoryInterface;
use Illuminate\Http\Request;

class EvaluationService
{
    protected $evaluationRepository, $orderRepository;

    public function __construct(
        EvaluationRepositoryInterface $evaluation,
        OrderRepositoryInterface $orderRepository
        )
    {
        $this->evaluationRepository = $evaluation;
        $this->OrderRepository = $orderRepository;
    }

    public function createNewEvaluationOrder(string $identifyOrder)
    {
        $clientId = $this->getIdClient();
        $order = $this->orderRepository->getOrderByIdentify($identifyOrder);
        return $this->evaluationRepository->newEvaluationOrder($order->id,$clientId);
    }

    private function getIdClient()
    {
        return auth()->user()->id;
    }

    public function getEvaluationByUuid(string $uuid)
    {
        return $this->evaluation->getEvaluationByUuid($uuid);
    }
}
