<?php

/**
 * App\Content
 * @property mixed $id
 * @property mixed $name
 * @property mixed $title
 * @property mixed $description
 * @property mixed $labels
 * @property mixed $content
 * @property mixed $type
 * @property mixed $status
 * @property mixed $image
 * @property mixed $seo
 * @property mixed $orderby
 * @property mixed $content_id
 * @property mixed $public_date
 * @property mixed $gallery_id
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    public $table = "tt_contents";

    public $timestamps = true;

    protected $fillable = ['main','lang','name', 'title', 'description', 'labels', 'content', 'type', 'status', 'image', 'seo', 'orderby', 'content_id', 'public_date', 'gallery_id'];

    public function getAll($filters = array())
    {
        $users = $this->select('*');
        foreach ($filters as $key => $value) {
            $users->where($value['field'], $value['operation'], $value['value']);
        }
        return $users->paginate(10);
    }

    public function getHomeContents($lang = "tr")
    {
        $users = $this->select('*');
        $users->where("lang", "=", $lang);
        $users->where("main", "=", "1");
        return $users->get();
    }

}
