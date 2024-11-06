<?php

namespace App\Services\Leasing;

use App\Models\Leasing;

class LeasingService {
    public function store(array $data): array{
        return Leasing::create($data)->toArray();
    }

    public function index(array $data): array{
        return Leasing::paginate($data['per_page'], ['*'], 'page', $data['page'])->toArray();
    }

    public function show(array $data): array{
        return Leasing::find($data['id']);
    }

    public function update(array $data): array{
        Leasing::where('id', $data['id'])->update($data);
        return Leasing::find($data['id']);
    }

    public function destroy(array $data): array{
        Leasing::find($data['id'])->delete();
        return Leasing::onlyTrashed()->find(['id' => $data['id']])->first();
    }

    public function restore(array $data): array{
        Leasing::withTrashed()->where('id', $data['id'])->restore();
        return Leasing::find($data['id']);
    }
}