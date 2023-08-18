
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Endpoint extends Model
{
    protected $fillable = ['url'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
