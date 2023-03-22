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
        $image = asset('images/placeholder.png');
        try {
            $image = $this->getMedia('image')[0]->getFullUrl();
        } catch (\Throwable $th) {}

        $color = $this->color;
        $bg_color = '#FFFFFF';
        try {
            list($r, $g, $b) = sscanf($this->color, "#%02x%02x%02x");
            $color = "rgb($r, $g, $b)";
            $bg_color = "rgba($r, $g, $b, 0.2)";
        } catch (\Throwable $th) {}

        return [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'desc' => $this->desc,
            'color' => $this->color,
            'color_rgb' => $color,
            'bg_color' => $bg_color,
            'image' => $image,
        ];
    }
}
