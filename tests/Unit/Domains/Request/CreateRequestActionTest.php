<?php

namespace Tests\Unit\Domains\Request;

use Tests\TestCase;
use App\Domains\Request\DataTransfers\RequestData;
use App\Domains\Request\Actions\CreateRequestAction;

class CreateRequestActionTest extends TestCase
{
    public function test_create_request_action()
    {
        app(CreateRequestAction::class)->handle(
            new RequestData(
                email: 'test@chate.lt',
                content: 'test content'
            )
        );

        $this->assertDatabaseHas('requests', [
            'email' => 'test@chate.lt',
            'content' => 'test content'
        ]);
    }
}
