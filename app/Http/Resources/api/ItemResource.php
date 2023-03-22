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
        $image = asset('images/placeholder.png');
        try {
            $image = $this->getMedia('images')[0]->getFullUrl();
        } catch (\Throwable $th) {}
        return [
            'id' => $this->id,
            'title' => $this->title,
            'slug' => $this->slug,
            'desc' => $this->desc,
            'category_id' => $this->category_id,
            'category' => $this->category,
            'price' => count($this->plans) > 0 ? $this->plans[0]->price : 0,
            'media' => $image,
            'plans' => $this->plans,
            'discount' => count($this->plans) > 0 ? $this->plans[0]->discount : 0,
        ];
    }
}
