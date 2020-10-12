<?php

namespace Modules\Core\Helpers;

use Modules\Core\Entities\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait HasAuthor
{
    public function author(): User
    {
        return $this->authorRelation;
    }

    public function authoredBy(User $author)
    {
        $this->authorRelation()->associate($author);
    }

    public function authorRelation(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function isAuthoredBy(User $user): bool
    {
        return $this->author()->matches($user);
    }
}
