<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="col-md-12">
                        <div class="p-5" style="background-color: lightgray;">
                            <h1 class="" style="font-size: 36px; color: black;">{{ $massage->title }}</h1>
                            <hr>
                            <p class="p-3" style="font-size: 24px; color: black;">{{ $massage->message }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
