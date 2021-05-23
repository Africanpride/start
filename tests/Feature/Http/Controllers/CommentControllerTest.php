<?php

namespace Tests\Feature\Http\Controllers;

use App\Comment;
use App\Events\Newcomment;
use App\Jobs\SyncMedia;
use App\Mail\Reviewcomment;
use App\Mail\SupportcommentDeleted;
use App\Notification\Reviewcomment;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Queue;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\CommentController
 */
class CommentControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $comments = Comment::factory()->count(3)->create();

        $response = $this->get(route('comment.index'));

        $response->assertOk();
        $response->assertViewIs('comment.index');
        $response->assertViewHas('comments');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('comment.create'));

        $response->assertOk();
        $response->assertViewIs('comment.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\CommentController::class,
            'store',
            \App\Http\Requests\CommentStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $comment = Comment::factory()->create();
        $content = $this->faker->paragraphs(3, true);

        Queue::fake();
        Notification::fake();
        Mail::fake();
        Event::fake();

        $response = $this->post(route('comment.store'), [
            'comment_id' => $comment->id,
            'content' => $content,
        ]);

        $comments = Comment::query()
            ->where('comment_id', $comment->id)
            ->where('content', $content)
            ->get();
        $this->assertCount(1, $comments);
        $comment = $comments->first();

        $response->assertRedirect(route('comment.index'));
        $response->assertSessionHas('comment.title', $comment->title);

        Queue::assertPushed(SyncMedia::class, function ($job) use ($comment) {
            return $job->comment->is($comment);
        });
        Notification::assertSentTo($comment->author, Reviewcomment::class, function ($notification) use ($comment) {
            return $notification->comment->is($comment);
        });
        Mail::assertSent(Reviewcomment::class, function ($mail) use ($comment) {
            return $mail->hasTo($comment->author) && $mail->comment->is($comment);
        });
        Event::assertDispatched(Newcomment::class, function ($event) use ($comment) {
            return $event->comment->is($comment);
        });
    }


    /**
     * @test
     */
    public function update_behaves_as_expected()
    {
        $comment = Comment::factory()->create();

        Queue::fake();

        $response = $this->put(route('comment.update', $comment));

        $comment->refresh();

        Queue::assertPushed(SyncMedia::class, function ($job) use ($comment) {
            return $job->comment->is($comment);
        });
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $comment = Comment::factory()->create();

        Mail::fake();

        $response = $this->delete(route('comment.destroy', $comment));

        $response->assertRedirect(route('comment.index'));
        $response->assertSessionHas('comment.title', $comment->title);

        $this->assertDeleted($comment);

        Mail::assertSent(SupportcommentDeleted::class, function ($mail) use ($comment) {
            return $mail->hasTo($support) && $mail->comment->is($comment);
        });
    }
}
