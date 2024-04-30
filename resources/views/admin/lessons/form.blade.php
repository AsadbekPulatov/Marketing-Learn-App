<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="row">
                        <div class="col-10">
                            <h1 class="card-title">@if($lesson->id){{'Обновить Урок'}}@else{{'Добавить Урок'}}@endif</h1>
                        </div>
                    </div>
                    <div class="row">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <strong>Ой!</strong>С вашим вводом возникли некоторые проблемы.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="@if($lesson->id) {{ route('lessons.update', ['lesson' => $lesson->id]) }} @else {{ route('lessons.store') }} @endif"
                              method="POST" enctype="multipart/form-data">
                            @csrf
                            @if($lesson->id)
                                @method('PUT')
                            @endif
                            <div class="form-group mb-3">
                                <label for="title">Урок</label>
                                <input type="text" name="title" class="form-control" id="title" placeholder="Урок" value="{{$lesson->title}}">
                            </div>

                            <div class="form-group mb-3">
                                <label for="url">Ссылка</label>
                                <input type="url" name="url" class="form-control" id="url" placeholder="Ссылка" value="{{$lesson->url}}">
                            </div>
                            <button type="submit" class="btn btn-primary">Сохранить</button>
                            <input type="reset" class="btn btn-danger" value="Очистить">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
