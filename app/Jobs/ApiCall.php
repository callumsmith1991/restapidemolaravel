<?php

namespace App\Jobs;

use App\SearchResults;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ApiCall implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $post_data = array();
    private $response;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($post_data = array())
    {
        $this->post_data = $post_data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $api_key = env('NEWS_API_KEY');

        $filter_all = '';

        $this->post_data['apiKey'] = $api_key;

        unset($this->post_data['source']);

        $filter_all = 1;

        $data_string = http_build_query($this->post_data);
        
        $output = file_get_contents("https://newsapi.org/v2/everything?" . $data_string . "");
        
        $data = json_decode($output, JSON_PRETTY_PRINT);

        if(count($data['articles']) > 0) {

            echo '<div class="alert alert-success" role="alert">Search returned results, refresh to see results!</div>';

            unset($this->post_data['apiKey']);
            $this->post_data['user_id'] = auth()->id();
            $this->post_data['results'] = $output;

            if($filter_all == 1) {

                $this->post_data['source'] = 'All news networks';

            }

            SearchResults::create($this->post_data);

        } else {

            echo '<div class="alert alert-danger">search did not return any results</div>';

        }

        
    



    }

}
