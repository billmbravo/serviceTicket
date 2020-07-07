<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Scopes\AgentScope;
use Illuminate\Support\Facades\Notification;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ticket extends Model
{
    use SoftDeletes;

    public $table = 'tickets';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'servicio',
        'descripcion',
        'status_id',
        'created_at',
        'updated_at',
        'deleted_at',
        'priority_id',
        'autor',
        'assigned_to_user_id'
    ];

    public static function boot()
    {
        parent::boot();

        Ticket::observe(new \App\Observers\TicketActionObserver);

        static::addGlobalScope(new AgentScope);
    }

    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }


    public function priority()
    {
        return $this->belongsTo(Priority::class, 'priority_id');
    }

    public function assigned_to_user()
    {
        return $this->belongsTo(User::class, 'assigned_to_user_id');
    }
}
