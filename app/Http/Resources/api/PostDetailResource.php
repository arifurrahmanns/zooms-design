<?php

namespace App\Http\Resources\api;

use Illuminate\Http\Resources\Json\JsonResource;

class PostDetailResource extends JsonResource
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
        $thumb = asset('images/placeholder.png');
        try {
            $thumb = $this->getMedia('thumbnail')[0]->getFullUrl();
            $image = $this->getMedia('author_image')[0]->getFullUrl();
        } catch (\Throwable $th) {}
        return [
            'id' => $this->id,
            'title' => $this->title,
            'slug' => $this->slug,
            'content' => $this->content,
            'desc' => $this->content,
            'author_name' => $this->author_name,
            'created_at' => $this->created_at->format('d/m/Y'),
            'thumbnail' => $thumb,
            'author_image' => $image,
            'category' => $this->category->name,
        ];
    }
}
