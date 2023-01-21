<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected  $fillable = [
        'commenter_id',
        'commenter_type',
        'commentable_type',
        'commentable_id',
        'guest_name',
        'guest_email',
        'approved',
        'child_id',
        'likes',
        'dislikes',
        'rate',
        'is_active',
        'comment'
    ];

    protected $appends = [
        'name',
        'date',
        'by',
        'type',
        'uname'
    ];

    protected $casts = [
        'approved' => 'boolean'
    ];

    public function getTypeAttribute(){
        $types  = [
            Blog::class => 'Blog',
            Product::class => 'Product'
        ];

        if(in_array($this->commentable_type,array_keys($types)))
        return $types[$this->commentable_type];
        return null;
    }

    public function getUnameAttribute(){
        return $this->commenter->name;
    }


    public function getNameAttribute(){
        if(get_class($this->commentable) === Blog::class)
            return $this->commentable->title;
        return $this->commentable->name;
    }

    public function getDateAttribute(){
            return translateDate($this->created_at);
    }
    public function getByAttribute(){
        if($this->guest_name && $this->gust_email) return $this->guest_name;
        return $this->commenter->name;
    }


    public function commenter(){
        return $this->morphTo('commenter');
    }

    public function commentable(){
        return $this->morphTo('commentable');
    }

    public function children()
    {
        $children= $this->morphMany(Comment::class, 'commentable')->where('child_id',$this->id)->get();

        return $children;
    }
}
