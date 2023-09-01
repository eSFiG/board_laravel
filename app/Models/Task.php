<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends Model {

    protected $fillable = [
        'title',
        'description',
        'priority',
        'type',
        'owner_id',
        'assignee_id',
        'status',
        'link',
        'created_at',
        'updated_at'
    ];

    public function owner(): BelongsTo {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function priorities(): BelongsTo {
        return $this->belongsTo(Priority::class, 'priority');
    }

    public function types(): BelongsTo {
        return $this->belongsTo(Type::class, 'type');
    }

    public function statuses(): BelongsTo {
        return $this->belongsTo(Status::class, 'status');
    }

    public function comments() {
        return $this->hasMany(Comment::class, 'task_id', 'id');
    }

    public function getColor($name) {
        if($name == 'priority') {
            switch($this->priorities->name) {
                case 'low':
                    return "green";
                case 'medium':
                    return "yellow";
                case 'high':
                    return "orange";
                case 'highest':
                    return "red";
            }
        }
        if($name == 'type') {
            switch($this->types->name) {
                case 'task':
                    return "blue";
                case 'story':
                    return "green";
                case 'bug':
                    return "red";
            }
        }
        if($name == 'status') {
            switch($this->statuses->name) {
                case 'open':
                    return "gray";
                case 'in progress':
                    return "blue";
                case 'finished':
                    return "green";
            }
        }
    }
}
