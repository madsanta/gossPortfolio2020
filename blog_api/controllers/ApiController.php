<?php

namespace app\controllers;

use app\models\Post;
use Yii;
use yii\web\Controller;
use yii\web\Response;

class ApiController extends Controller
{
    /**
     * @return Post|Post[]|array|null
     */
    public function actionPosts()
    {
        $query = Post::find();
        Yii::$app->response->format = Response::FORMAT_JSON;

        if ($id = Yii::$app->request->get('id')) {
            $query->where([
                'id' => $id
            ]);
            $posts = $query->one();
        } else {
            $posts = $query->all();
        }

        return $posts;
    }

    /**
     * @return int|string
     */
    public function actionCreate()
    {
        $newPost = new Post();
        $newPost->setAttributes(Yii::$app->request->post());

        return $newPost->save() ? $newPost->id : 'false';
    }

    /**
     * @return array|string
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     */
    public function actionDelete()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $id = Yii::$app->request->get('id');
        if (empty($id)) {
            return 'false';
        }

        $post = Post::findOne(['id' => $id]);
        $response = $post->getAttributes();
        $post->delete();

        return $response;
    }
}