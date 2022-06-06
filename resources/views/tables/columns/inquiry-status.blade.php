<div>
    @if ($getState() == 'New')
    <span class="bg-yellow-100 text-yellow-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-yellow-200 dark:text-yellow-900">{{ $getState() }}</span>
    @elseif ($getState() == 'Resolved')
    <span class="bg-green-100 text-green-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-green-200 dark:text-green-900">{{ $getState() }}</span>
    @else
        {{ $getState() }}
    @endif
</div>
