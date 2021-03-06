<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use  Carbon\Carbon;
use GrahamCampbell\Markdown\Facades\Markdown;

class Post extends Model {

    protected $dates = ['published_at'];

    public function author() {
        return $this->belongsTo(User::class);
    }

    // Accessors
    public function getDateAttribute($value) {
        return is_null($this->published_at) ? '' : $this->published_at->diffForHumans();
    }

    public function getBodyHtmlAttribute($value) {
        return $this->body ? Markdown::convertToHtml(e($this->body)) : NULL;
    }

    public function getExcerptHtmlAttribute($value) {
        return $this->excerpt ? Markdown::convertToHtml(e($this->excerpt)) : NULL;
    }

    // Scoped Functions
    public function scopeLatestFirst($query) {
        return $query->orderBy('created_at', 'asc');
    }

    public function scopePublished($query) {
        return $query->where("published_at", "<=", Carbon::now());
    }
}
