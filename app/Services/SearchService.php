<?php namespace Codestudy\Services;

use Codestudy\Note;

class SearchService
{

    protected $searchableColumns = ['title', 'body'];

    public function find($search)
    {
        $results = Note::where('title', 'like', "%$search%")
            ->orWhere('body', 'like', "%$search%")
            ->get();

        return $this->rankResults($results, $search);
    }

    protected function rankResults($results, $search)
    {
        foreach ($results as $key => $result) {
            if (!$result['rank'] = substr_count(strip_tags(strtolower($result->title)), strtolower($search)) +
                substr_count(strip_tags(strtolower($result->body)), strtolower($search))
            ) {
                $results->pull($key);
            }
        }

        return $results->sortByDesc('rank');
    }
} 