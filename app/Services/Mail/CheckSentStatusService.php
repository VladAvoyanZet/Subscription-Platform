<?php

namespace App\Services\Mail;

use App\Jobs\EmailJob;
use App\Models\Site;
use JetBrains\PhpStorm\NoReturn;

class CheckSentStatusService
{
    #[NoReturn] public function checkStatus($subscribers): void
    {
        $posts = Site::with('posts')->get();

        $ids = [];
        foreach ($posts as $post) {
            $ids[] = $post;
        };
        $duplicate = new DuplicateMailService();

        foreach ($subscribers as $subscriber) {
            foreach ($ids as $id) {
                if ($subscriber['id'] === $id->subscriber_id && $id->posts->isNotEmpty()) {
                    foreach ($id->posts as $post) {
                        if ($subscriber['is_sent'] == 0 && $post->is_sent_post == 0) {
                            $duplicate->checkDuplicate($subscriber['id'], $post->id);
                            EmailJob::dispatch($subscriber['email'], $id->posts)->onQueue('email');
                        } elseif ($subscriber['is_sent'] == 1 && $post->is_post_sent == 0) {
                            $duplicate->checkDuplicate($subscriber['id'], $post->id);
                            EmailJob::dispatch($subscriber['email'], $id->posts)->onQueue('email');
                        } elseif ($subscriber['is_sent'] == 0 && $post->is_post_sent == 1) {
                            $duplicate->checkDuplicate($subscriber['id'], $post->id);
                            EmailJob::dispatch($subscriber['email'], $id->posts)->onQueue('email');
                        } else {
                            echo 'Mail Already Sanded for --> ' . $subscriber['email'] . '|||';
                        }
                    }
                }
            }
        }
    }
}
