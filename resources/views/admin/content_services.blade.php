<div style="margin:0px 50px 0px 50px;">

    @if($services)

        <table class="table table-hover table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Имя</th>
                <th>Текст</th>
                <th>Иконка</th>
                <th>Дата создания</th>
                <th>Удалить</th>
            </tr>
            </thead>
            <tbody>

            @foreach($services as $k => $item)

                <tr>

                    <td>{{ $item->id }}</td>
                    <td>{!! Html::link(route('serviceEdit',['service'=>$item->id]),$item->name,['alt'=>$item->name]) !!}</td>
                    <td>{{ $item->text }}</td>
                    <td><span class="fa {{ $item->icon }} fa-4x" style="color: #df0031;"></span></td>
                    <td>{{ $item->created_at }}</td>

                    <td>
                        {!! Form::open(['url'=>route('serviceEdit',['service'=>$item->id]), 'class'=>'form-horizontal','method' => 'POST']) !!}

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

    {!! Html::link(route('serviceAdd'),'Новый сервис',['class' => 'btn btn-success']) !!}

</div>
<br>