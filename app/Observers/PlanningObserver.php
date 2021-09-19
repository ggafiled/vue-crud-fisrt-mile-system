<?php

namespace App\Observers;

use Carbon\Carbon;
use App\Models\Planing;

class PlanningObserver
{

    /**
     * Handle the post "saving" event.
     *
     * @param  \App\Post  $post
     * @return void
     */
    public function saving(Planing $planing)
    {
        $planing->task_id = "TK".substr(Carbon::now()->year + 543,2).Carbon::now()->timestamp;
    }

    /**
     * Handle the Planing "created" event.
     *
     * @param  \App\Models\Planing  $planing
     * @return void
     */
    public function created(Planing $planing)
    {
        //
    }

    /**
     * Handle the Planing "updated" event.
     *
     * @param  \App\Models\Planing  $planing
     * @return void
     */
    public function updated(Planing $planing)
    {
        //
    }

    /**
     * Handle the Planing "deleted" event.
     *
     * @param  \App\Models\Planing  $planing
     * @return void
     */
    public function deleted(Planing $planing)
    {
        //
    }

    /**
     * Handle the Planing "restored" event.
     *
     * @param  \App\Models\Planing  $planing
     * @return void
     */
    public function restored(Planing $planing)
    {
        //
    }

    /**
     * Handle the Planing "force deleted" event.
     *
     * @param  \App\Models\Planing  $planing
     * @return void
     */
    public function forceDeleted(Planing $planing)
    {
        //
    }
}