<table id="rate" class="display" style="width:100%">
    <thead>
    <tr>
        <th>Название валюты</th>
        <th>Цена</th>
        <th>Количество</th>
    </tr>
    </thead>
    <tbody>
    @foreach($stocks as $stock)
        <tr>
            <td>{{$stock->name}}</td>
            <td>{{$stock->volume}}</td>
            <td>{{$stock->price->amount}}</td>
        </tr>
    @endforeach
    </tbody>
    <tfoot>
    <tr>
        <th>Название валюты</th>
        <th>Цена</th>
        <th>Количество</th>
    </tr>
    </tfoot>
</table>

<script>
    $('#rate').DataTable();
</script>