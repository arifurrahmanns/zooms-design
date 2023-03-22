<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use App\Models\User;
use Filament\Resources\Pages\EditRecord;
use Spatie\Permission\Models\Role;

class EditUser extends EditRecord
{
    protected static string $resource = UserResource::class;

    public function afterSave()
    {
        $user = User::find($this->record->id);

        $role = Role::where('name', 'user')->first();
        $user->assignRole($role);
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $data['password'] = bcrypt($data['password']);
        return $data;
    }
}
