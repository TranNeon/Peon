<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class Call implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public ?\Closure $callback = null;

    public function __construct(\Closure $other )
    {
        $this->callback = \Closure::bind($other);
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        //
    }
}
