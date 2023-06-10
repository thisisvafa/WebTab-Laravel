<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CommentsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
//        childrenRecursive
        return [
            'id' => $this->id,
            'text' => $this->text,
            'user' => $this->whenLoaded('user', function () {
                return [
                    'name' => $this->user->name,
                    'email' => $this->user->email,
                ];
            }),
            'admin' => $this->whenLoaded('admin', function () {
                return [
                    'name' => $this->admin->name,
                    'email' => $this->admin->email,
                ];
            }),
            'children' => $this->whenLoaded('childrenRecursive', function () {
                return $this->childrenRecursive($this->childrenRecursive);
            }),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }

    protected function childrenRecursive($children)
    {
        $resource = [];

        foreach ($children as $child) {
            $resource[] = $child;
        }

        return $resource;
    }

    public function with($request)
    {
        return [
            'meta' => [
                'version' => '1.0',
            ],
        ];
    }
}
