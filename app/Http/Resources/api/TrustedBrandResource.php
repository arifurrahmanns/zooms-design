<?php

namespace App\Http\Resources\api;

use Illuminate\Http\Resources\Json\JsonResource;

class TrustedBrandResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $image = asset('images/placeholder.png');
        try {
            $image = $this->getMedia('image')[0]->getFullUrl();
        } catch (\Throwable $th) {}
        return [
            'id' => $this->id,
            'name' => $this->name,
            'image' => $image,
        ];
    }
}
