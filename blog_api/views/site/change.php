<?php
/* @var $this yii\web\View */
/** @var \app\models\Post $post */
?>
<label>Title</label>
<input id="title" class="form-control" name="title"  value="<?= (isset($post)) ? $post->title : ''?>">

<label>Categories</label>
<input id="categories" class="form-control" name="categories"  value="<?= (isset($post)) ? $post->categories : ''?>">

<label>Content</label>
<input id="content" class="form-control" name="content"  value="<?= (isset($post)) ? $post->content : ''?>">

<button id="<?= (isset($post)) ? 'update-btn' : 'create-btn' ?>" class="btn btn-primary" value="<?= (isset($post)) ? $post->id : '' ?>"><?= (isset($post)) ? 'Update' : 'Create' ?></button>
