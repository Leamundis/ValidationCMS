<?php
class ActionController
{
    public function deleteOne()
    {
        $id = $_POST['id'];
        $page = new PageModel();
        $page->deleteOne($id);
        header('Location: /view/edit');
    }

    public function updateOne()
    {
        $title = $_POST['title'];
        $content = $_POST['content'];
        $hidden = $_POST['hidden'];
        $id = $_POST['id'];
        $page = new PageModel();
        $page->updateOne($title, $content, $hidden, $id);
        header('Location: /view/edit');
    }
}