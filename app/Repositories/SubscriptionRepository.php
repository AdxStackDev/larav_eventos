<?php

namespace App\Repositories;

use App\Repositories\Interfaces\SubscriptionRepositoryInterface;
use App\Models\Subscription;

class SubscriptionRepository implements SubscriptionRepositoryInterface
{
    public function all()
    {
        return Subscription::all();
    }

    public function find($id)
    {
        return Subscription::find($id);
    }

    public function create(array $data)
    {
        return Subscription::create($data);
    }

    public function update(array $data, $id)
    {
        $subscription = Subscription::find($id);
        if ($subscription) {
            $subscription->update($data);
            return $subscription;
        }
        return null;
    }

    public function delete($id)
    {
        $subscription = Subscription::find($id);
        if ($subscription) {
            $subscription->delete();
            return true;
        }
        return false;
    }
}
