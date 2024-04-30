<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="row">
                        <div class="col-9"><h1 class="card-title">Сообщении</h1></div>
                    </div>
                    <div class="row table-responsive">
                        <table class="table table-bordered table-hover text-center">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Имя</th>
                                <th scope="col">Email</th>
                                <th scope="col">Заглавие</th>
                                <th scope="col">Сообщение</th>
                                <th scope="col">События</th>
                                <th scope="col">Действие</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($massages as $key => $massage)
                                <tr>
                                    <th scope="row" class="col-1">{{$key+1}}</th>
                                    <td>{{$massage->name}}</td>
                                    <td>{{$massage->email}}</td>

                                    <td>{{$massage->title}}</td>
                                    <td>{{ \Illuminate\Support\Str::limit($massage->message, 20) }}</td>
                                    <td>
                                        @if($massage->activity) <button class="btn btn-success">Новый</button>
                                        @else <button class="btn btn-danger">Старый</button>
                                        @endif
                                    </td>
                                    <td class="col-2">
                                        <form action="{{ route('messages.destroy',$massage->id) }}" method="POST">
                                            <a class="btn btn-info btn-sm" href="{{ route('messages.show',$massage->id) }}">
                                    <span class="btn-label">
                                        <i class="bi bi-eye"></i>
                                    </span>

                                            </a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="confirm(' Haqiqatdan ham bu yozuvni o\'chirmoqchimisz ')" class="btn btn-danger btn-sm"><span class="btn-label">
                                        <i class="bi bi-trash"></i>
                                    </span></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
