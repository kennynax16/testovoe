<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateRequest;
use App\Models\Card;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request ,Card $card)
    {
        $data = $request->validated();
        $card->update($data);
        return $card;
    }
}
