<?php

class GithubEventsClient
{
    public function forUser(string $username): array
    {
        $context = stream_context_create([
            'http' => ['user_agent' => 'prodelpe'],
        ]);

        $events = file_get_contents("https://api.github.com/users/$username/events", context: $context);

        return json_decode($events, true);
    }
}
