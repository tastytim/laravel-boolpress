<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        $postsList = [
            0 => [
              'userId' => 1,
              'id' => 1,
              'title' => 'sunt aut facere repellat provident occaecati excepturi optio reprehenderit',
              'body' => 'quia et suscipit
          suscipit recusandae consequuntur expedita et cum
          reprehenderit molestiae ut ut quas totam
          nostrum rerum est autem sunt rem eveniet architecto',
            ],
            1 => [
              'userId' => 1,
              'id' => 2,
              'title' => 'qui est esse',
              'body' => 'est rerum tempore vitae
          sequi sint nihil reprehenderit dolor beatae ea dolores neque
          fugiat blanditiis voluptate porro vel nihil molestiae ut reiciendis
          qui aperiam non debitis possimus qui neque nisi nulla',
            ],
            2 => [
              'userId' => 1,
              'id' => 3,
              'title' => 'ea molestias quasi exercitationem repellat qui ipsa sit aut',
              'body' => 'et iusto sed quo iure
          voluptatem occaecati omnis eligendi aut ad
          voluptatem doloribus vel accusantium quis pariatur
          molestiae porro eius odio et labore et velit aut',
            ],
            3 => [
              'userId' => 1,
              'id' => 4,
              'title' => 'eum et est occaecati',
              'body' => 'ullam et saepe reiciendis voluptatem adipisci
          sit amet autem assumenda provident rerum culpa
          quis hic commodi nesciunt rem tenetur doloremque ipsam iure
          quis sunt voluptatem rerum illo velit',
            ],
            4 => [
              'userId' => 1,
              'id' => 5,
              'title' => 'nesciunt quas odio',
              'body' => 'repudiandae veniam quaerat sunt sed
          alias aut fugiat sit autem sed est
          voluptatem omnis possimus esse voluptatibus quis
          est aut tenetur dolor neque',
            ],
        ];

        return $postsList;
    }
}
