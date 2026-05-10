<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StoreSubscriptionRequest;
use App\Http\Controllers\Controller;
use App\Services\SubscriptionService;

class SubscriptionController extends Controller
{
    protected $subscriptionService;

    public function __construct(SubscriptionService $subscriptionService)
    {
        $this->subscriptionService = $subscriptionService;
    }

    public function index()
    {
        $subscriptions = $this->subscriptionService->getAllSubscriptions();
        return response()->json([
            'success' => true,
            'data' => $subscriptions
        ]);
    }

    public function show($id)
    {
        $subscription = $this->subscriptionService->getSubscriptionWithRelations($id);
        
        if (!$subscription) {
            return response()->json([
                'success' => false,
                'message' => 'Subscription not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $subscription
        ]);
    }

    public function store(StoreSubscriptionRequest $request)
    {
        $subscription = $this->subscriptionService->createSubscription($request->validated());
        return response()->json([
            'success' => true,
            'message' => 'Subscription created successfully',
            'data' => $subscription
        ], 201);
    }

    public function update(StoreSubscriptionRequest $request, $id)
    {
        $subscription = $this->subscriptionService->updateSubscription($id, $request->validated());
        
        if (!$subscription) {
            return response()->json([
                'success' => false,
                'message' => 'Subscription not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Subscription updated successfully',
            'data' => $subscription
        ]);
    }

    public function destroy($id)
    {
        $deleted = $this->subscriptionService->deleteSubscription($id);
        
        if (!$deleted) {
            return response()->json([
                'success' => false,
                'message' => 'Subscription not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Subscription deleted successfully'
        ]);
    }
}
