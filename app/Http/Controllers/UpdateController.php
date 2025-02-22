<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateRequest;
use App\Models\Card;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
    public function __invoke(Request $request, $id)
    {   dd($id);
        dd($request->file('auth_p12', false));
        dd($request->all());
        dd($request->file("urlPhoto"));
        dump($request->all());
        dd($validatedData);
        dd($request->all());
        $data = $request->validate([
            'name' => '',
            'description' => '',
            'urlPhoto' => '', // Добавьте валидацию для изображения
        ]);

        // Дамп запроса для отладки
         //dump($request);

        // Проверяем, был ли загружен файл с ключом 'urlPhoto'
        if ($request->hasFile('urlPhoto')) {
            $image = $request->file('urlPhoto');

            // Генерируем уникальное имя файла
            $filename = time() . '-' . $image->getClientOriginalName();

            // Сохраняем файл в папку 'public/images'
            $filePath = $image->storeAs('public/images', $filename);

            // Сохраняем путь к изображению в массив данных
            $data['urlPhoto'] = $filePath;
        }
        // dump($data);
        // Обновляем модель Card новыми данными
        $model = Card::find($id);
        $model->update($data);

        // Возвращаем обновлённый объект Card
        return response()->json(['card' => $card, 'urlPhoto' => Storage::url($data['urlPhoto'] ?? '')]);
    }
}
