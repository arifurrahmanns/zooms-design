<?php

namespace App\Http\Resources\api;

use Illuminate\Http\Resources\Json\JsonResource;

class ItemDetailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $images = [];
        foreach ($this->getMedia('images') as $media) {
            $images[] = [
                'id' => $media->id,
                'thumb' => $media->getFullUrl(),
            ];
        }
        return [
            'id' => $this->id,
            'category_id' => $this->category_id,
            'desc' => $this->desc,
            'created_at' => $this->created_at->format('Y-m-d'),
            'updated_at' => $this->updated_at->format('Y-m-d'),
            'images' => $images,
            'plans' => $this->plans,
            'title' => $this->title,
        ];
    }
}
