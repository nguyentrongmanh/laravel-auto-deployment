<?php

namespace Tests\Feature\Api;

use App\Jobs\ProcessTestJob;
use Illuminate\Support\Facades\Queue;
use Tests\TestCase;

class TestJobControllerTest extends TestCase
{
    public function test_dispatches_job_and_returns_json(): void
    {
        Queue::fake();

        $response = $this->postJson('/api/test-job');

        $response->assertOk()
            ->assertJsonStructure(['message', 'job', 'dispatched_at'])
            ->assertJsonFragment(['job' => ProcessTestJob::class]);

        Queue::assertPushed(ProcessTestJob::class);
    }
}
