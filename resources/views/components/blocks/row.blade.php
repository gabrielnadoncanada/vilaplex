@props(['layout', 'columns'])


<div class="row">
    @foreach ($columns as $column)
        <div class="col">
            <x-render-blocks :blocks="$column['content']"/>
        </div>
    @endforeach
</div>
