<?php

namespace src\handlers;

use src\models\Post;
use src\models\User;
use src\models\UserRelation;

class PostHandler
{

    public static function addPost($content, $id){
        $data = [
            'iduser'=> $id,
            'type' => 'post',
            'content'=> $content
        ];
        Post::insert($data)->execute();
    }

    public static function getHomeFeed($idUser){
        // 1. pegar a lista de usuarios que eu sigo.
        $usersList = UserRelation::select('userto')->where('userfrom', $idUser)->get();
        // $users = [];
        // foreach($usersList as $userItem){
        //     $users[] = $userItem['userto'];
        // }
        $usersList[] = $idUser;
        // 2. pegar os posts dessa galera ordenado pela data.

        $postsList = Post::select()
                    ->where('iduser', 'in', $usersList)
                    ->orderBy('created_at', 'desc')
                ->get();
        // 3. transformar o resultado em objetos dos models.
            $posts = [];

            foreach($postsList as $postItem) {
            
                $newPost = new Post();
                $newPost->id = $postItem['id'];
                $newPost->type = $postItem['type'];
                $newPost->content = $postItem['content'];
                $newPost->createdAt = $postItem['created_at'];
                $newPost->mine = false;

                if($postItem['iduser'] == $idUser){
                    $newPost->mine = true;
                }
                // 4. preencher as informalçoes adicionais no post.
                
                $newUser = User::select()->where('id', $postItem['iduser'])->one();
                
                $newPost->user = new User();
            
                $newPost->user->id = $newUser['id'];
                $newPost->user->avatar = $newUser['avatar'];
                $newPost->user->name = $newUser['name'];
                
                // TO-TO: 4.1 preencher info likes 
                $newPost->likeCount = 0;
                $newPost->liked = false;
                // TO-TO: 4.2 preencher info comments
                $newPost->comments = [];

                $posts[] = $newPost;
            }
            
        // 5. retornar o resultado.
        return $posts;
    }
}
