<?php

class GithubEventsClient
{
    public function forUser(string $username): array
    {
        $context = stream_context_create([
            'http' => ['user_agent' => 'prodelpe'],
        ]);

        $events = file_get_contents("https://api.github.com/users/$username/events", context: $context);

        if ($events === false) {
            throw new RuntimeException("Could not fetch the GitHub events of {$username}");
        }

        return json_decode($events, true);
    }
}
