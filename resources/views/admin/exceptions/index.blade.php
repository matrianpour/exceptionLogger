<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Exceptions') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Tracking Code
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    User Name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Created Date
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($exceptions as $exception)
                            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white cursor-pointer">
                                    <a href="{{ route('exceptions.show', ['trackingcode' => $exception->code]) }}">
                                        {{ $exception->code }}
                                    </a>
                                </td>
                                <td class="px-6 py-4">
                                    {{ $exception->userName }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $exception->formattedCreatedDate }}
                                </td>
                            </tr> 
                            @endforeach
                        </tbody>
                    </table>
                    {{ $exceptions->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>