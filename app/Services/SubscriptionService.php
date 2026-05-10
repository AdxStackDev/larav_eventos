<?php

namespace App\Services;

use App\Repositories\Interfaces\SubscriptionRepositoryInterface;
use App\Models\Subscription;

class SubscriptionService
{
    protected $subscriptionRepository;

    public function __construct(SubscriptionRepositoryInterface $subscriptionRepository)
    {
        $this->subscriptionRepository = $subscriptionRepository;
    }

    public function getAllSubscriptions()
    {
        return Subscription::with(['user', 'event', 'category'])->get();
    }

    public function getSubscriptionWithRelations($id)
    {
        return Subscription::with(['user', 'event', 'category'])->find($id);
    }

    public function createSubscription(array $data)
    {
        return $this->subscriptionRepository->create($data);
    }

    public function updateSubscription($id, array $data)
    {
        return $this->subscriptionRepository->update($data, $id);
    }

    public function deleteSubscription($id)
    {
        return $this->subscriptionRepository->delete($id);
    }
}
