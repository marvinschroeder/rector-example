<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Http\Request;

final class DashboardController extends Controller
{
    public function __invoke(Request $request): void
    {
        $query = User::with(['customer' => fn (BelongsToMany $query) => $query->where('column')]);

        if ($request->get('someParam')) {
            $query->where('other', 'val');
        }

        $result = $query->get();
    }
}
