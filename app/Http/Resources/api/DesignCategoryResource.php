<?php

namespace App\Http\Resources\api;

use Illuminate\Http\Resources\Json\JsonResource;

class DesignCategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'desc' => $this->desc,
            'color' => $this->color,
            'bg_color' => $this->bg_color,
            'image' => $this->getMedia('image')[0]->getFullUrl(),
        ];
    }
}
