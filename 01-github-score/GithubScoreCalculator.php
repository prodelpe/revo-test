<?php

class GithubScoreCalculator
{
    private const POINTS_BY_TYPE = [
        'PushEvent' => 5,
        'CreateEvent' => 4,
        'IssuesEvent' => 3,
        'CommitCommentEvent' => 2,
    ];

    private const DEFAULT_POINTS = 1;

    public function calculate(array $events): int
    {
        $pointsArray = array_map(function ($event) {
            return self::POINTS_BY_TYPE[$event['type']] ?? self::DEFAULT_POINTS;
        }, $events);

        return array_sum($pointsArray);
    }
}
