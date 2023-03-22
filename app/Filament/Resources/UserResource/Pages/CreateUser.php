<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use App\Models\User;
use Filament\Facades\Filament;
use Filament\Resources\Pages\CreateRecord;
use Spatie\Permission\Models\Role;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    public function create(bool $another = false): void
    {
        $this->callHook('beforeValidate');

        $data = $this->form->getState();

        $this->callHook('afterValidate');

        $data = $this->mutateFormDataBeforeCreate($data);

        $user = User::where('email', $this->data['email'])->first();
        if ($user != null) {
            Filament::notify('danger', 'User with this email already existed.');
            return;
        }

        $this->callHook('beforeCreate');

        $this->record = $this->handleRecordCreation($data);

        $this->form->model($this->record)->saveRelationships();

        $this->callHook('afterCreate');

        if (filled($this->getCreatedNotificationMessage())) {
            $this->notify(
                'success',
                $this->getCreatedNotificationMessage(),
            );
        }

        if ($another) {
            // Ensure that the form record is anonymized so that relationships aren't loaded.
            $this->form->model($this->record::class);
            $this->record = null;

            $this->fillForm();

            return;
        }

        $this->redirect($this->getRedirectUrl());
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['password'] = bcrypt($data['password']);
        return $data;
    }

    public function afterCreate()
    {
        $user = User::find($this->record->id);

        $role = Role::where('id', $this->data['role'])->first();
        $user->assignRole($role);
    }
}
