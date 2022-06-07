<?php

namespace App\Http\Resources;


use Illuminate\Support\Str;

use Illuminate\Http\Resources\Json\JsonResource;

class CaseStudyResource extends JsonResource
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
            'author_image' => $this->getMedia('author_image')[0]->getFullUrl()
        ];
    }
}
