<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\MissingValue;
use function foo\func;

class UserResource extends JsonResource
{
    public static $wrap = "fgfg";
//    or disable in appServiceProvider

    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "UserName" => $this->name,
            "email" => $this->email,
            "foo" => "bar",
            "posts" => $this->whenLoaded('posts', function () use($request){
//              return $this->posts;
              return $request->with == "posts"?PostResource::collection($this->posts):new MissingValue();
            }),
            $this->mergeWhen($request->with == "posts", [
                "fooo1" => "bar1",
                "fooo" => "bar"
            ])
        ];
//        return parent::toArray($request);
    }

    public function with($request)
    {
        return [
            'state' => "ok"
        ];
    }
}
