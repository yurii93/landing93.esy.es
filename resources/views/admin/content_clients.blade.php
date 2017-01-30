<div style="margin:0px 50px 0px 50px;">

    @if($clients)

        <table class="table table-hover table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Название</th>
                <th>Логотип</th>
                <th>Дата создания</th>
                <th>Удалить</th>
            </tr>
            </thead>
            <tbody>

            @foreach($clients as $k => $item)

                <tr>

                    <td>{{ $item->id }}</td>
                    <td>{!! Html::link(route('clientEdit',['client'=>$item->id]),$item->name,['alt'=>$item->name]) !!}</td>
                    <td>{!! Html::image('public/assets/img/'.$item->images,'',['height'=>'50', 'style'=>'border: 1px solid black; background: red']) !!}</td>
                    <td>{{ $item->created_at }}</td>

                    <td>
                        {!! Form::open(['url'=>route('clientEdit',['client'=>$item->id]), 'class'=>'form-horizontal','method' => 'POST']) !!}

                        {{--{!! Form::hidden('_method','delete') !!}--}}

                        {{ method_field('delete') }}
                        {!! Form::button('Удалить',['class'=>'btn btn-danger','type'=>'submit']) !!}

                        {!! Form::close() !!}
                    </td>
                </tr>

            @endforeach


            </tbody>
        </table>
    @endif

    {!! Html::link(route('clientAdd'),'Новый клиент',['class' => 'btn btn-success']) !!}

</div>
<br>