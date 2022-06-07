<?php

namespace App\Http\Resources\api;

use Illuminate\Http\Resources\Json\JsonResource;

class ItemResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            "id" => $this->id,
            "title" => $this->title,
            "desc" => $this->desc,
            "category_id" => $this->category_id,
            "category" => $this->category->name,
            "price" => count($this->plans) > 0 ? $this->plans[0]->price : 0,
            "media" => $this->getFirstMediaUrl(),
            "plans" => $this->plans,
        ];
    }
}
