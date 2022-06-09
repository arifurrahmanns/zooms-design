<?php

namespace App\Http\Resources\api;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class PostResource extends JsonResource
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
            'title' => $this->title,
            'content' => $this->content,
            'desc' => Str::limit(strip_tags($this->content), 100),
            'author_name' => $this->author_name,
            'created_at' => $this->created_at->format('Y-m-d'),
            'thumbnail' => $this->getMedia('thumbnail')[0]->getFullUrl(),
        ];
    }
}
