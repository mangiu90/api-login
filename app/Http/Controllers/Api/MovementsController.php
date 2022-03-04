<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryCollection;
use App\Models\Category;
use App\Models\Movement;
use App\Models\User;
use Illuminate\Http\Request;

class MovementsController extends Controller
{
    public function getCategories()
    {
        return new CategoryCollection(Category::all());
    }

    public function getMovements(Request $request)
    {
        return response()->json([
            'movements' => $request->user()
                ->movements()
                ->with('category')
                ->limit(20)
                ->orderBy('created_at', 'desc')
                ->get(),
        ]);
    }

    public function createMovement(Request $request)
    {
        $validatedData = $request->validate([
            'category_id' => 'required',
            'type' => 'required|in:' . implode(',', Movement::TYPE_OPTIONS),
            'amount' => 'required|numeric|between:0.01,999999.99',
            'description' => 'nullable|string',
        ]);

        $movement = Movement::create([
            'user_id' => $request->user()->id,
            'category_id' => $validatedData['category_id'],
            'type' => $validatedData['type'],
            'amount' => $validatedData['amount'],
            'description' => $validatedData['description'],
        ]);

        return response()->json([
            'movement' => $movement,
        ]);
    }

    public function getBalance(Request $request)
    {
        return response()->json([
            'balance' => $request->user()->balance() ?? '0',
        ]);
    }
}
