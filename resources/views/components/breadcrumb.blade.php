<nav class="flex" aria-label="Breadcrumb">
    <ol role="list" class="flex items-center space-x-4">
        @foreach($items as $index => $item)
            <li>
                <div class="flex items-center">
                    @if($index > 0)
                        <svg class="h-5 w-5 flex-shrink-0 text-gray-300" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                            <path d="M5.555 17.776l8-16 .894.448-8 16-.894-.448z" />
                        </svg>
                    @else
                        <a href="#" class="text-gray-400 hover:text-gray-500">
                            <svg class="h-5 w-5 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M9.293 2.293a1 1 0 011.414 0l7 7A1 1 0 0117 11h-1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-3a1 1 0 00-1-1H9a1 1 0 00-1 1v3a1 1 0 01-1 1H5a1 1 0 01-1-1v-6H3a1 1 0 01-.707-1.707l7-7z" clip-rule="evenodd" />
                            </svg>
                            <span class="sr-only">Home</span>
                        </a>
                    @endif
                    <a href="{{ $item['url'] }}" class="ml-4 text-sm font-medium @if($index === count($items) - 1) text-indigo-500 @else text-gray-500 @endif hover:text-gray-700" @if($index === count($items) - 1) aria-current="page" @endif>{{ $item['label'] }}</a>
                </div>
            </li>
        @endforeach
    </ol>
</nav>
