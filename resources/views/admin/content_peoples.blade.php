<div style="margin:0px 50px 0px 50px;">

    @if($peoples)

        <table class="table table-hover table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Имя</th>
                <th>Описание</th>
                <th>Картинка</th>
                <th>Дата создания</th>
                <th>Удалить</th>
            </tr>
            </thead>
            <tbody>

            @foreach($peoples as $k => $item)

                <tr>

                    <td>{{ $item->id }}</td>
                    <td>{!! Html::link(route('peopleEdit',['people'=>$item->id]),$item->name,['alt'=>$item->name]) !!}</td>
                    <td>{{ $item->text }}</td>
                    <td>{!! Html::image('public/assets/img/'.$item->images,'',['width'=>'90', 'style'=>'border: 1px solid black']) !!}</td>
                    <td>{{ $item->created_at }}</td>

                    <td>
                        {!! Form::open(['url'=>route('peopleEdit',['portfolio'=>$item->id]), 'class'=>'form-horizontal','method' => 'POST']) !!}

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

    {!! Html::link(route('peopleAdd'),'Новый сотрудник',['class' => 'btn btn-success']) !!}

</div>
<br>