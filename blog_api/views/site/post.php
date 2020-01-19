<?php

/* @var $this yii\web\View */
/* @var $posts \app\models\Post[] */

echo '<a href="' . \yii\helpers\Url::to(['site/create']) . '" <button id="create-btn" type="button" class="btn btn-primary" value="">Create</button></a>';
foreach ($posts as $post) {
    echo '<div class="panel panel-default">
              <a href="' . \yii\helpers\Url::to(['site/update', 'id' => $post->id]) . '"><h1>' . $post->title . '</h1></a>
              <p>' . $post->categories . '</p>
              <p>' . $post->content . '</p>  
              <button type="button" class="btn btn-danger del-btn" value="' . $post->id . '">Delete</button>   
          </div>';
}
?>