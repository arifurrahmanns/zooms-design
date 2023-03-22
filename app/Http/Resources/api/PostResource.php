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
        $image = asset('images/placeholder.png');
        try {
            $image = $this->getMedia('thumbnail')[0]->getFullUrl();
        } catch (\Throwable $th) {}
        return [
            'id' => $this->id,
            'title' => $this->title,
            'slug' => $this->slug,
            'content' => $this->content,
            'desc' => Str::limit(strip_tags($this->content), 100),
            'author_name' => $this->author_name,
            'created_at' => $this->created_at->format('F d, Y'),
            'thumbnail' => $image,
        ];
    }
}
