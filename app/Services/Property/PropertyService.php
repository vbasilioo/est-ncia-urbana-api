<?php

namespace App\Services\Property;

use App\Models\Property;

class PropertyService {
    public function store(array $data): array{
        return Property::create($data)->toArray();
    }

    public function index(array $data): array{
        return Property::paginate($data['per_page'], ['*'], 'page', $data['page'])->toArray();;
    }

    public function show(array $data): array{
        return Property::find($data['id']);
    }

    public function update(array $data): array{
        Property::where('id', $data['id'])->update($data);
        return Property::find($data['id']);
    }

    public function destroy(array $data): array{
        Property::find($data['id'])->delete();
        return Property::onlyTrashed()->find(['id' => $data['id']])->first();;
    }

    public function restore(array $data): array{
        Property::withTrashed()->where('id', $data['id'])->restore();
        return Property::find($data['id']);
    }
}