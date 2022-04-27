<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CourseResource extends JsonResource {
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request) {
        return [
            'id'           => $this->id,
            'name'         => $this->name,
            'slug'         => $this->slug,
            'description'  => $this->description,
            'overview'     => $this->overview,
            'duration'     => $this->duration,
            'total_class'  => $this->total_class,
            'class_info'   => $this->class_info,
            'course_fee'   => $this->course_fee,
            'usdeuro'      => $this->usdeuro,
            'banner_image' => $this->banner_image,
            'status'       => $this->status,
        ];
    }
}
