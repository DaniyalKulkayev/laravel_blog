<?php

namespace App\Service;

use App\Models\Post;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostService
{
    public function store(array $data): Post
    {
        try {
            DB::beginTransaction();
            if (isset($data['tag_ids'])) {
                $tagIds = $data['tag_ids'];
                unset($data['tag_ids']);
            } else
                $tagIds = [];

            $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
            $data['main_image'] = Storage::disk('public')->put('/images', $data['main_image']);

            $post = Post::firstOrCreate($data);

            $post->tags()->attach($tagIds);
            DB::commit();
        } catch (Exception $exception) {
            DB::rollBack();
            abort(500);
        }

        return $post;
    }

    public function update(array $data, Post $post): Post
    {
        try {
            DB::beginTransaction();

            // Обработка тегов
            $tagIds = is_array($data['tag_ids'] ?? null) ? $data['tag_ids'] : [];

            unset($data['tag_ids']);

            // Если пришло новое изображение — сохраняем и удаляем старое
            if (!empty($data['preview_image'])) {
                Storage::disk('public')->delete($post->preview_image);
                $data['preview_image'] = Storage::disk('public')->put('images', $data['preview_image']);
            }

            if (!empty($data['main_image'])) {
                Storage::disk('public')->delete($post->main_image);
                $data['main_image'] = Storage::disk('public')->put('images', $data['main_image']);
            }

            // Обновление поста
            $post->update($data);

            // Обновление тегов
            $post->tags()->sync($tagIds);


            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            // Можно логировать $e->getMessage()
            abort(500, 'Ошибка при обновлении поста');
        }

        return $post;
    }
}
